<?

include 'data/movies_db.php';
include 'main_tv_show_template.php';
include 'tv_show_template.php';

$movies_db = json_decode($movies_db_json, true);
$movies_db = $movies_db["tv_shows"];

$main_tv_shows_html = '';
$tv_shows_html = '';

$sort_method = "SortByScore";
if (isset($_GET["sort"]) && is_numeric($_GET["sort"]))
{
	switch ($_GET["sort"])
	{
		case 1:
			$sort_method = "SortByName";
			break;

		case 2:
			$sort_method = "SortByDate";
			break;
	}
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

usort($movies_db, $sort_method);

for ($i = 0; $i < count($movies_db); $i++)
{
	$tv_show = $movies_db[$i];

	$is_featured = isset($tv_show["featured"]) && $tv_show["featured"] == true;
	$is_on_air = isset($tv_show["is_on_air"]) && $tv_show["is_on_air"] == true;

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
	$timeLeft = GetDaysLeft($day, $month, $year, $timestamp);
	$timeLeftUnits = "days";
	if ($timeLeft == null)
		$timeLeftUnits = "";

	$score = $tv_show["imdb_score"];
	if ($score !== "")
		$score = sprintf("%.1f", $score);

	$element_html = str_replace("__ID__", $tv_show["id"], $element_html);
	$element_html = str_replace("__TITLE__", $tv_show["title"], $element_html);
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

	if ($is_on_air)
	{	
		$element_html = str_replace("__ON_AIR_EXTRA__", $tv_show["on_air_extra"], $element_html);
		$element_html = str_replace("__COUNTER_DISPLAY__", "none", $element_html);
		$element_html = str_replace("__ON_AIR_DISPLAY__", "unset", $element_html);
	}
	else
	{
		$element_html = str_replace("__COUNTER_DISPLAY__", "unset", $element_html);
		$element_html = str_replace("__ON_AIR_DISPLAY__", "none", $element_html);
	}

	$is_confirmed = isset($tv_show["confirmed"]) && $tv_show["confirmed"] == true;
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

function GetDaysLeft($day, $month, $year, $timestamp)
{
	if (is_numeric($timestamp) && $timestamp != 0)
	{
		$currentDate = new DateTime("now");
		$releaseDate = new DateTime();
		$releaseDate->setTimestamp($timestamp / 1000);

		if ($currentDate->getTimestamp() > $releaseDate->getTimestamp())
			return NULL;

		$diff = $currentDate->diff($releaseDate);

		$approx = false;
		if (!is_numeric($day))
			$approx = true;

		$result = (string)$diff->days;
		if ($approx)
			$result = "~" . $result;

		return $result;
	}

	if (!is_numeric($month) || !is_numeric($year))
		return NULL;

	$approx = false;
	if (!is_numeric($day))
	{
		$day = 15;  // Take a half of the month as an approximation.
		$approx = true;
	}

	$currentDate = new DateTime("now");
	$releaseDate = new DateTime();
	$releaseDate->setDate($year, $month, $day);
	$diff = $currentDate->diff($releaseDate);

	$result = (string)$diff->days;
	if ($approx)
		$result = "~" . $result;

	return $result;
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
<html xmlns:og="http://ogp.me/ns#">
<head>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-118904948-1"></script>
	<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());
	gtag('config', 'UA-118904948-1');
	</script>

	<meta property="og:type" content= "website" />
    <meta property="og:url" content="http://showwhen.com/"/>
    <meta property="og:site_name" content="Show When" />
	<meta property="og:title" content="When is the next season of your favorite TV Show?" />
	<meta property="og:description" content="" />
    <meta property="og:image" itemprop="image primaryImageOfPage" content="http://showwhen.com/img/web_image_v3.jpg" />

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<title>When is the next season of your favorite TV Show?</title>
	<link rel="stylesheet" type="text/css" href="style.css?v=6" />
	<link rel="stylesheet" type="text/css" href="tv_show.css?v=6" />
	<link rel="stylesheet" type="text/css" href="main_tv_show.css?v=6" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body onload="Init();">

<div class="bg"></div>

<div class="main_canvas">
	<div id="header">
		<div id="header_gradient"></div>
		<img id="header_title" src="img/title.png">
		<div class="header_subtitle text_green">WHEN IS THE NEXT SEASON OF YOUR FAVORITE TV SHOW?</div>
		<div class="search_bar_group">
			<form action="javascript:void(0);">
				<input id="search" type="search" class="search_bar" value="Search by Title...">
			</form>
			<img class="mag" src="img/mag.png">
		</div>
	</div>

	<div class="sort_bar">
		<span class="sort_option">Sort by:</span>
		<a href="index.php"><span class="sort_option">Score</span></a>
		<a href="index.php?sort=1"><span class="sort_option">Title</span></a>
		<a href="index.php?sort=2"><span class="sort_option">Date</span></a>
	</div>

	<div id="no_results_message" class="search_reslut">No results found for "<span id="no_results_phrase"></span>"</div>

	<div class="main_tv_show_container">
		<? echo $main_tv_shows_html ?>
	</div>
	
	<div class="tv_show_list">
		<? echo $tv_shows_html ?>
	</div>

	<div class="footer">
		<a class="contact" href="mailto: contact@showwhen.com">Contact</a>
	</div>
</div>

<script>

var defaultSearchText = "Search by Title...";
var movies_db_json = <? echo $movies_db_json ?>

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
	search_icon.attr("src", "img/cancel_search.png");

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
	search_icon.attr("src", "img/mag.png");
}

function myFunction()
{
	var inner_span = dupa.childNodes[3];
	var score = inner_span.textContent;
	score = score.substr(0, score.length - 3).trim();
	alert(score);
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
	var timestamp_diff = timestamp - Date.now();
	
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

</script>

</body>
</html>

<!-- IMDB Plugin BEGIN-->
<!-- <span class="imdbRatingPlugin" data-user="ur87405355" data-title="tt0944947" data-style="p4" id="dupa">
		<a href="https://www.imdb.com/title/tt0944947/?ref_=plg_rt_1">
			<img src="img/imdb2.png" alt=" Game of Thrones (2011) on IMDb" />
		</a>
		</span>
	<script>(function(d,s,id){var js,stags=d.getElementsByTagName(s)[0];if(d.getElementById(id)){return;}js=d.createElement(s);js.id=id;js.src="https://ia.media-imdb.com/images/G/01/imdb/plugins/rating/js/rating.js";stags.parentNode.insertBefore(js,stags);})(document,'script','imdb-rating-api');</script> -->
<!-- IMDB Plugin END-->