<?

include 'data/movies_db.php';
include 'main_tv_show_template.php';
include 'tv_show_template.php';

$movies_db = json_decode($movies_db_json, true);
$movies_db = $movies_db["tv_shows"];

$main_tv_shows_html = '';
$tv_shows_html = '';

$hide_unconfirmed = 0;
$hide_on_air = 0;
$sort_id = 0;

function DecodeFilterValue()
{
	global $hide_unconfirmed;
	global $hide_on_air;
	global $sort_id;

	if (!isset($_GET["f"]) || !is_numeric($_GET["f"]))
		return;

	$filter = (int)$_GET["f"];

	$mask_on_air = 1 << 7;
	$mask_unconfirmed = 1 << 6;
	$mask_sort_id = 0x0F;

	$hide_on_air = ($filter & $mask_on_air) == $mask_on_air ? 1 : 0;
	$hide_unconfirmed = ($filter & $mask_unconfirmed) == $mask_unconfirmed ? 1 : 0;
	$sort_id = (int)($filter & $mask_sort_id);
}

DecodeFilterValue();

// echo "hide_unconfirmed: " . $hide_unconfirmed . "<br>";
// echo "hide_on_air: " . $hide_on_air . "<br>";
// echo "sort: " . $sort_id . "<br>";

$sort_method = "SortByScore";
switch ($sort_id)
{
	case 1:
		$sort_method = "SortByName";
		break;

	case 2:
		$sort_method = "SortByDate";
		break;
}

function SortByDate($a, $b)
{
	if ($b["timestamp"] == null)
		return -1;

	if ($a["timestamp"] == null)
		return 1;

	return $a["timestamp"] - $b["timestamp"];
}

function SortByName($a, $b)
{
	return strcmp($a["title"], $b["title"]);
}

function sign($n) {
    return ($n > 0) - ($n < 0);
}

function SortByScore($a, $b)
{
	if ($b["imdb_score"] == null)
		return -1;

	if ($a["imdb_score"] == null)
		return 1;

	return sign((float)($b["imdb_score"]) - (float)($a["imdb_score"]));
}

function SimplifyTitle($title)
{
	$title = str_replace(" ", "-", $title);
	$title = str_replace("'", "", $title);
	$title = str_replace("?", "", $title);
	$title = str_replace("!", "", $title);
	$title = str_replace("\"", "", $title);
	$title = str_replace("%", "", $title);
	$title = str_replace(".", "", $title);

	$title = strtolower($title);

	return $title;
}

function FindTvShowBySimplifiedTitle($title)
{
	global $movies_db;

	for ($i = 0; $i < count($movies_db); $i++)
	{
		$tv_show = $movies_db[$i];
		if ($title == SimplifyTitle($tv_show["title"]))
			return $tv_show;
	}

	return null;
}

usort($movies_db, $sort_method);

$only_mode = false;
$only = null;
if (isset($_GET["only"]))
{
	$only = $_GET["only"];
	$only_mode = true;
}

function GetShareImageFileName($title_id, $days_left)
{
	return "img_gen/" . $title_id . "-" . $days_left . ".jpg";
}

function GenerateShareImage($file_name, $bg_filename, $days_left, $approx, $on_air)
{
	if (!file_exists($bg_filename))
		return FALSE;

	putenv('GDFONTPATH=' . realpath('.'));

	$logo_filename = "img/title_fb_share.png";

	$bg_image = @imagecreatefromjpeg($bg_filename);
	if ($bg_image == FALSE)
		return FALSE;

	list($width, $height, $type, $attr) = getimagesize($bg_filename);

	$logo_image = imagecreatefrompng($logo_filename);
	if ($logo_image == FALSE)
		return FALSE;

	$grad_image = imagecreatefrompng("img/share_grad.png");
	if ($grad_image == FALSE)
		return FALSE;

	list($logo_width, $logo_height, $logo_type, $logo_attr) = getimagesize($logo_filename);

	imagecopy($bg_image, $grad_image, 0, 0, 0, 0, $width, $height);
	imagecopy($bg_image, $logo_image, $width - $logo_width - 20, 20, 0, 0, $logo_width, $logo_height);

	$text_color = imagecolorallocate($logo_image, 255, 255, 255);

	$font_size = 56;

	if ($on_air)
		$text = "ON AIR";
	else
	{
		$text = $days_left . " Days Left";
		if ($approx)
			$text = "~" . $text;
	}

	$dimensions = imagettfbbox($font_size , 0, 'trebucbd.ttf', $text);
	$text_width = $dimensions[4] - $dimensions[0];

	$a = imagettftext(
		$bg_image,
		$font_size,
		0,
		($width - $text_width) / 2,
		$height - 54,
		$text_color, 'trebucbd.ttf', $text);

	imagefilledrectangle($bg_image, 100, $height - 35, $width - 100, $height - 31, $text_color);
		

	imagejpeg($bg_image, $file_name, 80);
	imagedestroy($bg_image);
	imagedestroy($logo_image);
	imagedestroy($grad_image);

	return TRUE;
}

function GenerateShareImageIfNeeded($title_id, $bg_filename, $days_left, $approx, $on_air)
{
	if (!function_exists("imagecreatefromjpeg"))
		return FALSE;

	$file_name = GetShareImageFileName($title_id, $days_left);
	if (file_exists($file_name))
		return $file_name;

	if (!GenerateShareImage($file_name, $bg_filename, $days_left, $approx, $on_air))
		return FALSE;

	return $file_name;
}

$og_image = "http://showwhen.com/img/web_image.jpg";
$og_url = "http://showwhen.com/";
$og_title = "When is the next season of my favorite TV Show?";
$og_description = "";
$og_image_width = 800;
$og_image_height = 420;
$page_title = $og_title;

$global_title_id = "";
$sort_bar_group_display = "";
$search_bar_group_display = "";
$hide_in_single_mode = "";
$show_in_single_mode = "hide";

if ($only_mode)
{
	$global_title_id = $only;

	$sort_bar_group_display = "hide";
	$search_bar_group_display = "hide";
	$hide_in_single_mode = "hide";
	$show_in_single_mode = "";

	$tv_show = FindTvShowBySimplifiedTitle($only);
	if ($tv_show != null)
	{
		$approx = !is_numeric($tv_show["day"]);

		$on_air = IsOnAir($tv_show);

		if ($on_air)
		{
			$og_description = "On air";
			if (isset($tv_show["on_air_extra"]))
				$og_description .= ": " . $tv_show["on_air_extra"];
		}
		else
			$og_description = "Release: " . GetDateAsString($tv_show);

		$og_url = "http://showwhen.com/" . $only;
		$og_title = $tv_show["title"] . " (Season " . (int)$tv_show["season"] . ")";
		$page_title = "When is the next season of " . $tv_show["title"];

		$thumbnail = "img/tvshow_thumbnails/" . $tv_show["thumbnail"];
		$share_image = GenerateShareImageIfNeeded($only, $thumbnail, GetDaysLeft($tv_show["timestamp"]), $approx, $on_air);
		if ($share_image != FALSE)
		{
			$og_image = "http://showwhen.com/". $share_image;
		}
	}
}

function IsOnAir($tv_show)
{
	if (isset($tv_show["is_on_air"]) && $tv_show["is_on_air"] == true)
		return true;

	$date = new DateTime();
	$current_timestamp = $date->getTimestamp();

	if (is_numeric($tv_show["timestamp"]))
		return (Integer)$tv_show["timestamp"] / 1000 < $current_timestamp;
}

for ($i = 0; $i < count($movies_db); $i++)
{
	$tv_show = $movies_db[$i];

	$is_confirmed = isset($tv_show["confirmed"]) && $tv_show["confirmed"] == true;
	if ($hide_unconfirmed && !$is_confirmed)
		continue;

	$is_on_air = IsOnAir($tv_show);
	if ($hide_on_air && $is_on_air)
		continue;

	$title_id = SimplifyTitle($tv_show["title"]);

	if ($only_mode)
	{
		if ($only != $title_id)
			continue;
	}

	$is_featured = isset($tv_show["featured"]) && $tv_show["featured"] == true;

	if ($is_featured)
		$element_html = $main_tv_show_template;
	else
		$element_html = $tv_show_template;

	$episodes = trim((string)$tv_show["episodes"]);
	if (strlen($episodes) == 0)
		$episodes = "";
	else
		$episodes .= " Episodes";

	$timestamp = $tv_show["timestamp"];
	if ($is_featured && is_numeric($timestamp))
		$updateTimeCode .= sprintf("UpdateTime(%d, \"movie_id_%d\");\n", $timestamp, $tv_show["id"]);

	$season = (int)$tv_show["season"];
	$day = $tv_show["day"];
	$month = $tv_show["month"];
	$year = $tv_show["year"];
	$timeLeft = GetDaysLeft($timestamp);
	$timeLeftUnits = "days";
	if ($timeLeft == null)
		$timeLeftUnits = "";

	$score = $tv_show["imdb_score"];
	if ($score !== "")
		$score = sprintf("%.1f", $score);

	if (gethostname() == "DESKTOP-81KA7BE")
		$only_mode_url = "?only=" . $title_id;
	else
		$only_mode_url = "/" . $title_id;

	$element_html = str_replace("__ID__", $tv_show["id"], $element_html);
	$element_html = str_replace("__TITLE__", $tv_show["title"], $element_html);
	$element_html = str_replace("__ONLY_MODE_URL__", $only_mode_url, $element_html);
	$element_html = str_replace("__SEASON__", $season, $element_html);
	$element_html = str_replace("__EPISODES__", $episodes, $element_html);
	$element_html = str_replace("__DATE__", GetDateAsString($tv_show), $element_html);
	$element_html = str_replace("__IMDB_SCORE__", $score, $element_html);
	$element_html = str_replace("__IMDB_URL__", $tv_show["imdb_url"], $element_html);
	$element_html = str_replace("__WATCH_IMG__", GetWatchLogo($tv_show), $element_html);
	$element_html = str_replace("__WATCH_URL__", $tv_show["watch_url"], $element_html);
	$element_html = str_replace("__SOURCE_URL__", $tv_show["source_url"], $element_html);
	$element_html = str_replace("__TIME_LEFT__", $timeLeft, $element_html);
	$element_html = str_replace("__TIME_LEFT_UNITS__", $timeLeftUnits, $element_html);
	$element_html = str_replace("__THUMBNAIL__", $tv_show["thumbnail"], $element_html);
	$element_html = str_replace("__ON_AIR_EXTRA__", $tv_show["on_air_extra"], $element_html);

	if ($score > 0)
	{
		$element_html = str_replace("__IMDB_SCORE_DISPLAY__", "unset", $element_html);
	}
	else
	{
		$element_html = str_replace("__IMDB_SCORE_DISPLAY__", "none", $element_html);
	}

	if ($only_mode)
	{
		$element_html = str_replace("__SHARE_ICON_DISPLAY__", "none", $element_html);
		$element_html = str_replace("__ONLY_MODE_URL_POINTER_EVENTS__", "none", $element_html);		
		$element_html = str_replace("__LARGE_TILE_CLASS__", "large_tile", $element_html);		
	}
	else
	{
		$element_html = str_replace("__SHARE_ICON_DISPLAY__", "unset", $element_html);
		$element_html = str_replace("__ONLY_MODE_URL_POINTER_EVENTS__", "unset", $element_html);		
		$element_html = str_replace("__LARGE_TILE_CLASS__", "", $element_html);
	}

	$approx = false;
	if (!is_numeric($day))
		$approx = true;
	if ($approx)
		$element_html = str_replace("__APPROX_DISPLAY__", "unset", $element_html);
	else
		$element_html = str_replace("__APPROX_DISPLAY__", "none", $element_html);

	if ($is_on_air)
	{
		$element_html = str_replace("__COUNTER_DISPLAY__", "none", $element_html);
		$element_html = str_replace("__ON_AIR_DISPLAY__", "unset", $element_html);
	}
	else
	{
		$element_html = str_replace("__COUNTER_DISPLAY__", "unset", $element_html);
		$element_html = str_replace("__ON_AIR_DISPLAY__", "none", $element_html);
	}

	if ($is_confirmed)
		$element_html = str_replace("__CONFIRMED_DISPLAY__", "unset", $element_html);
	else
		$element_html = str_replace("__CONFIRMED_DISPLAY__", "none", $element_html);

	if ($is_featured)
		$main_tv_shows_html .= $element_html;
	else
		$tv_shows_html .= $element_html;
}

function GetWatchLogo($tv_show)
{
	return $tv_show["watch_logo"] . ".png";
}

function GetDaysLeft($timestamp)
{
	if (!is_numeric($timestamp) || $timestamp == 0)
		return null;
	
	$currentDate = new DateTime("now");
	$releaseDate = new DateTime();
	$releaseDate->setTimestamp($timestamp / 1000);

	if ($currentDate->getTimestamp() > $releaseDate->getTimestamp())
		return null;

	$diff = $currentDate->diff($releaseDate);

	return $diff->days;
}

function GetDateAsString($tv_show)
{
	$result = '';

	$day = $tv_show["day"];
	$month = $tv_show["month"];
	$year = $tv_show["year"];

	if (is_numeric($month))
	{
		$date_obj = DateTime::createFromFormat('!m', $month);
		$result .= $date_obj->format('M');
	}

	if (is_numeric($day))
	{
		// Below ads "st", "rd", "th" to the days, but we don't need this
		// $date_obj = DateTime::createFromFormat('!d', $day);
		// $result .= " " . $date_obj->format('dS');

		$result .= " " . str_pad($day, 2, "0", STR_PAD_LEFT);
	}

	if ($result != '')
		$result .= ", ";
	$result .= $year;

	if (isset($tv_show["period"]))
		$result = $tv_show["period"] . ' ' . $result;

	return $result;
}

?>

<!DOCTYPE html>
<html itemscope xmlns:og="http://ogp.me/ns#" lang="en">
<head>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-118904948-1"></script>
	<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());
	gtag('config', 'UA-118904948-1');
	</script>

	<meta charset="UTF-8">
	<meta property="description" content="<?=$page_title?>" />
	<meta property="og:type" content= "website" />
    <meta property="og:url" content="<?=$og_url?>"/>
    <meta property="og:site_name" content="Show When" />
	<meta property="og:title" content="<?=$og_title?>" />
	<meta property="og:description" content="<?=$og_description?>" />
    <meta property="og:image" itemprop="image primaryImageOfPage" content="<?=$og_image?>" />
	<meta property="og:image:width" content="<?=$og_image_width?>" />
	<meta property="og:image:height" content="<?=$og_image_height?>" />

	<meta name="twitter:card" content="summary_large_image">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<title><?=$page_title?></title>
	<link rel="icon" type="image/png" href="http://showwhen.com/img/icon.png">
	<link rel="stylesheet" type="text/css" href="/style.css?v=6" />
	<link rel="stylesheet" type="text/css" href="/tv_show.css?v=6" />
	<link rel="stylesheet" type="text/css" href="/main_tv_show.css?v=6" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body onload="Init();">

<div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>

<div class="bg"></div>

<div class="main_canvas">
	<div id="header">
		<div id="header_gradient"></div>
		<a href="./">
			<img id="header_title" src="/img/title.png" alt="header">
		</a>
		<div class="header_subtitle text_green">WHEN IS THE NEXT SEASON OF MY FAVORITE TV SHOW?</div>
		<div class="search_bar_group <?=$search_bar_group_display?>">
			<form action="javascript:void(0);">
				<input id="search" type="search" class="search_bar" value="Search by Title...">
			</form>
			<img class="mag" src="/img/mag.png" alt="mag">
		</div>
	</div>
	
	<div class="sort_bar <?=$sort_bar_group_display?>">
		<span class="sort_option_label">Sort by:</span>
		<a href="javascript: setSort(0)"><span id="sort_button_0" class="sort_option">Score</span></a>
		<a href="javascript: setSort(1)"><span id="sort_button_1" class="sort_option">Title</span></a>
		<a href="javascript: setSort(2)"><span id="sort_button_2" class="sort_option">Date</span></a>
	</div>

	<div class="filters_bar <?=$sort_bar_group_display?>" onload="ApplyFilter(0)">
		<span class="sort_option_label">Filter:</span>
		<a href="javascript: filter_on_air();"><span id="filter_button_hide_on_air" class="sort_option">On Air</span></a>
		<a href="javascript: filter_unconfirmed();"><span id="filter_button_hide_unconfirmed" class="sort_option">Unconfirmed</span></a>
	</div>

	<div id="no_results_message" class="search_reslut">No results found for "<span id="no_results_phrase"></span>"</div>

	<div class="<?=$show_in_single_mode?>" style="position:absolute; margin:10px;">
		<a href="./">
			<< Go back
		</a>
	</div>

	<div class="main_tv_show_container">
		<? echo $main_tv_shows_html ?>
	</div>
	
	<div class="tv_show_list">
		<? echo $tv_shows_html ?>
	</div>

	<div class="share_bar_large <?=$show_in_single_mode?>">
		<div class="fb-share-button share_element" data-href="http://showwhen.com/<?=$global_title_id?>" data-size="large" data-layout="button"></div>
		<div class="share_element"><a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-size="large" data-url="http://showwhen.com/<?=$global_title_id?>" data-hashtags="showwhen" data-show-count="false">Tweet</a><script async src="https://platform.twitter.com/widgets.js"></script></div>
	</div>

	<div style="height: 30px"></div>

	<div class="footer <?=$hide_in_single_mode?>">
		<div class="share_bar">
			<div class="fb-share-button share_element" data-href="http://showwhen.com/<?=$global_title_id?>" data-layout="button"></div>
			<div class="share_element"><a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-size="small" data-url="http://showwhen.com/<?=$global_title_id?>" data-hashtags="showwhen" data-show-count="false">Tweet</a><script async src="https://platform.twitter.com/widgets.js"></script></div>
			<a class="share_element" href="mailto:contact@showwhen.com"><img style="height: 16px; margin-top: 2px;" src="/img/contact.png" alt="contact"></a>
		</div>
	</div>
</div>

<form method="post" action="index.php" id="filters_form">
	<input type="hidden" name="hide_on_air" value="1" id="filters_form_hide_on_air" />
	<input type="hidden" name="hide_unconfirmed" value="1" id="filters_form_hide_unconfirmed" />
</form>

<script>

var defaultSearchText = "Search by Title...";
var movies_db_json = <? echo $movies_db_json . ";\n" ?>
var global_sort_id = <? echo $sort_id ?>;
var global_hide_on_air = <?=$hide_on_air?>;
var global_hide_unconfirmed = <?=$hide_unconfirmed?>;

/* Sorting tv_shows by the timestamp (It works!)
movies_db_json.tv_shows.sort(function(a, b)
{
	if (typeof b.timestamp == 'undefined')
		return -1;

	if (typeof a.timestamp == 'undefined')
		return 1;

	return a.timestamp - b.timestamp
});
*/

$(".mag").click(function()
{
	var search = $("#search");
	if (search.val() === defaultSearchText)
		search.focus();
	else
	{
		SetDefaultSearchText();
		UpdateFilter();
	}
});

$("#search").keyup(function()
{
	UpdateFilter();
});

$("#search").change(function()
{
	UpdateFilter();
});

$("#search").focusin(function()
{
	var search = $("#search");
	if (search.val() === defaultSearchText)
		search.val("");
	else
		search.select();
});

$("#search").focusout(function()
{
	var search = $("#search");
	if (search.val() === "")
		SetDefaultSearchText();
});

function UpdateFilter()
{
	ShowAllMovies();

	var searchPhrase = $("#search").val();
	var foundCount = FilterElements(searchPhrase.trim());

	UpdateSearchResultMessage(foundCount, searchPhrase);
}

function UpdateSearchResultMessage(foundCount, searchPhrase)
{
	if (foundCount == 0)
	{
		$("#no_results_phrase").text(searchPhrase);
		$("#no_results_message").show();
	}
	else
	{
		$("#no_results_message").hide();
	}
}

function FilterElements(searchPhrase)
{
	if (searchPhrase === defaultSearchText)
	{
		$("#search").css('color', '#888888');
		return -1;
	}

	searchPhrase = searchPhrase.toLowerCase();

	$("#search").css('color', '#ffffff');
	var search_icon = $(".mag");
	search_icon.attr("src", "/img/cancel_search.png");

	var foundCount = 0;

	$.each(movies_db_json.tv_shows, function(index, item)
	{
        var found = item.title.trim().toLowerCase().search(searchPhrase) != -1;

		var id = MakeMovieElementId(item.id);

		if (found)
		{
			$("#" + id).show();
			foundCount++;
		 }
		 else
		 	$("#" + id).hide();
    });

	return foundCount;
}

function MakeMovieElementId(index)
{
	return "movie_id_" + index;
}

function ShowAllMovies()
{
	for (var i = 0; i < movies_db_json.tv_shows.length; i++)
	{
		var movieId = MakeMovieElementId(movies_db_json.tv_shows[i].id);
		$("#" + movieId).show();
    }
}

function SetDefaultSearchText()
{
	var search = $("#search");
	search.val(defaultSearchText);
	search.css('color', '#888888');
	search.blur();

	var search_icon = $(".mag");
	search_icon.attr("src", "/img/mag.png");
}

function myFunction()
{
	var inner_span = zzz.childNodes[3];
	var score = inner_span.textContent;
	score = score.substr(0, score.length - 3).trim();
	alert(score);
}

function InitSortButtons()
{
	for (var i = 0; i < 3; i++)
	{
		var sort_button = $("#sort_button_" + i);
		var color = "rgba(139, 198, 63, 0.3)";
		if (i == global_sort_id) {
			color = "rgba(139, 198, 63, 0.9)";
			sort_button.css('background-color', color);
		}
	}
}

function InitFilterButtons()
{
	var color = "rgba(139, 198, 63, 0.3)";
	var colorActive = "rgba(139, 198, 63, 0.9)";

	$("#filter_button_hide_on_air").css("background-color", global_hide_on_air == 1 ? color : colorActive);
	$("#filter_button_hide_unconfirmed").css("background-color", global_hide_unconfirmed == 1 ? color : colorActive);
}

function Init()
{	
    // UpdateTime();
	SetDefaultSearchText();
	UpdateSearchResultMessage(-1, "");
	UpdateNoise();
}

function GetPremiereDate()
{
	return new Date("09:00 PM, July 23, 2017");
}

function pad(n, width, z) {
  z = z || '0';
  n = n + '';
  return n.length >= width ? n : new Array(width - n.length + 1).join(z) + n;
}

<? echo $updateTimeCode; ?>

function UpdateTime(timestamp, movie_id)
{
	var debug_time_diff = 0;
	// var m = 100 * 10 * 60; // minute
	// var h = 100 * 10 * 60 * 60; // hour
	// debug_time_diff = h * 24 * 4;
	// debug_time_diff += h * 5;
	// debug_time_diff += m * 5;

	var timestamp_diff = timestamp - (Date.now() + debug_time_diff);

	if (timestamp_diff < 0)
	{
		$("#" + movie_id + "_on_air").css('display', 'unset');
		$("#" + movie_id + "_counter").css('display', 'none');
		return;
	}
	
	timestamp_diff /= 1000.0;
	
	var seconds_in_minute = 60;
	var seconds_in_hour = seconds_in_minute * 60;
	var seconds_in_day = seconds_in_hour * 24;
	
	var days = Math.floor(timestamp_diff / seconds_in_day);
	timestamp_diff -= days * seconds_in_day;
	
	// var hours = Math.floor(timestamp_diff / seconds_in_hour);
	var hours = Math.floor(timestamp_diff / seconds_in_hour);
	timestamp_diff -= hours * seconds_in_hour;
	
	var minutes = Math.floor(timestamp_diff / seconds_in_minute);
	timestamp_diff -= minutes * seconds_in_minute;
	
	var seconds = Math.floor(timestamp_diff);

	var days_left = document.getElementById(movie_id + '_days_left');
	if (days_left != undefined)
		days_left.textContent = days;
	
	var time_left = document.getElementById(movie_id + '_time_left');
	if (time_left != undefined)
		time_left.textContent = days + " : " + pad(hours, 2) + " : " + pad(minutes, 2) + " : " + pad(seconds, 2);

	// time_left.textContent = "000 : 00 : 00 : 00"
	
	setTimeout(function()
	{
		UpdateTime(timestamp, movie_id);
	},
	1000);
}

function UpdateNoise()
{
	var header = document.getElementById("header");
	header.style.backgroundPositionX = Math.random() * 200 + "px";
	header.style.backgroundPositionY = Math.random() * 200 + "px";

	setTimeout(UpdateNoise, 90);
}

function ToggleFilterValue(filter)
{
	if (filter == 1)
		return 0;
	else
		return 1;
}

function EncodeFilter(hide_on_air, hide_unconfirmed, sort_id)
{
	var filter = sort_id;
	if (hide_on_air == 1)
		filter |= (1 << 7);
	if (hide_unconfirmed == 1)
		filter |= (1 << 6);

	return filter;
}

// function ApplyFilter(hide_on_air, hide_unconfirmed)
// {
// 	document.getElementById("filters_form_hide_on_air").value = hide_on_air;
// 	document.getElementById("filters_form_hide_unconfirmed").value = hide_unconfirmed;
// 	document.getElementById("filters_form").submit();
// }

function ApplyFilter(filter)
{
	window.open("?f=" + filter, "_self");
}

function filter_on_air()
{
	var filter = EncodeFilter(ToggleFilterValue(global_hide_on_air), global_hide_unconfirmed, global_sort_id);
	ApplyFilter(filter);
}

function filter_unconfirmed()
{
	var filter = EncodeFilter(global_hide_on_air, ToggleFilterValue(global_hide_unconfirmed), global_sort_id);
	ApplyFilter(filter);
}

function setSort(sort_id)
{
	var filter = EncodeFilter(global_hide_on_air, global_hide_unconfirmed, sort_id);
	ApplyFilter(filter);
}

// window.addEventListener("scroll", function (event) {
//     var scroll = this.scrollY;
//     console.log(scroll)
// });

InitSortButtons();
InitFilterButtons();

</script>

</body>
</html>

<!-- IMDB Plugin BEGIN-->
<!-- <span class="imdbRatingPlugin" data-user="ur87405355" data-title="tt0944947" data-style="p4" id="zzz">
		<a href="https://www.imdb.com/title/tt0944947/?ref_=plg_rt_1">
			<img src="img/imdb2.png" alt=" Game of Thrones (2011) on IMDb" />
		</a>
		</span>
	<script>(function(d,s,id){var js,stags=d.getElementsByTagName(s)[0];if(d.getElementById(id)){return;}js=d.createElement(s);js.id=id;js.src="https://ia.media-imdb.com/images/G/01/imdb/plugins/rating/js/rating.js";stags.parentNode.insertBefore(js,stags);})(document,'script','imdb-rating-api');</script> -->
<!-- IMDB Plugin END-->