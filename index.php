<?

include 'data/movies_db.php';
include 'main_tv_show_template.php';
include 'tv_show_template.php';

$movies_db = json_decode($movies_db_json, true);
$movies_db = $movies_db["tv_shows"];

$main_tv_shows_html = '';
$tv_shows_html = '';

for ($i = 0; $i < count($movies_db); $i++)
{
	$tv_show = $movies_db[$i];

	$is_featured = isset($tv_show["featured"]) && $tv_show["featured"] == true;

	if ($is_featured)
		$element_html = $main_tv_show_template;
	else
		$element_html = $tv_show_template;

	$element_html = str_replace("__TITLE__", $tv_show["title"], $element_html);
	$element_html = str_replace("__SEASON__", $tv_show["season"], $element_html);
	$element_html = str_replace("__DATE__", GetDateAsString($tv_show), $element_html);
	$element_html = str_replace("__IMDB_SCORE__", $tv_show["imdb_score"], $element_html);
	$element_html = str_replace("__WATCH_IMG__", $tv_show["watch_img"], $element_html);

	if ($is_featured)
		$main_tv_shows_html .= $element_html;
	else
		$tv_shows_html .= $element_html;
}


function GetDateAsString($tv_show)
{
	$result = '';

	$day = $tv_show["release_date_day"];
	$month = $tv_show["release_date_month"];
	$year = $tv_show["release_date_year"];

	if (isset($month))
	{
		$date_obj = DateTime::createFromFormat('!m', $month);
		$result .= $date_obj->format('M');
	}

	if (isset($day))
	{
		$date_obj = DateTime::createFromFormat('!d', $day);
		$result .= " " . $date_obj->format('dS');
	}

	if ($result != '')
		$result .= ", ";
	$result .= $year;

	return $result;
}

?>

<!DOCTYPE html>
<html>
<head>
        <title>When is the next Season?</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
		<link rel="stylesheet" type="text/css" href="tv_show.css" />
		<link rel="stylesheet" type="text/css" href="main_tv_show.css" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body onload="Init();">

<div class="main_canvas">
	<div id="header">
		<div id="header_gradient"></div>
		<img id="header_title" src="img/title.png">
		<div class="header_subtitle text_green">WHEN IS THE NEXT SEASON OF YOUR FAVORITE TV SHOW?</div>
		<div class="search_bar_group">
			<input type="text" class="search_bar" value="Search...">
			<img class="mag" src="img/mag.png">
		</div>
	</div>

	<div class="main_tv_show_container">
		<? echo $main_tv_shows_html ?>
	</div>
	
	<div class="tv_show_list">
		<? echo $tv_shows_html ?>

		<div class="tv_show">
			<div class="tv_show_title text_green">Orange is the New Black
			</div>
			<a href="http://gol24.pl" target="_blank">
				<div class="tv_show_date">
					July 12th, 2018
					<img class="main_tv_show_date_info_icon" src="img/info_icon.png">
				</div>
			</a>
			<div class="tv_show_counter">(67
				<span class="counter_unit_small">days</span>)
			</div>
			<div class="tv_show_season">Season 4</div>
			<div class="tv_show_meta_group">
				<img class="tv_show_channel" src="img/hbo2.png">
				<div class="tv_show_imdb">
					<img class="tv_show_imdb_logo" src="img/imdb2.png">
					<span class="tv_show_imdb_score">7.2</span>
				</div>
			</div>
			<div class="tv_show_separator"></div>
		</div>

		<div class="tv_show">
				<div class="tv_show_title text_green">Orange is the New Black
				</div>
				<div class="tv_show_date">July 12th, 2018</div>
				<div class="tv_show_counter">(67
					<span class="counter_unit_small">days</span>)
				</div>
				<div class="tv_show_season">Season 4</div>
				<div class="tv_show_meta_group">
					<img class="tv_show_channel" src="img/hbo2.png">
					<div class="tv_show_imdb">
						<img class="tv_show_imdb_logo" src="img/imdb2.png">
						<span class="tv_show_imdb_score">7.2</span>
					</div>
				</div>
				<div class="tv_show_separator"></div>
			</div>

			<div class="tv_show">
					<div class="tv_show_title text_green">Orange is the New Black
					</div>
					<div class="tv_show_date">July 12th, 2018</div>
					<div class="tv_show_counter">(67
						<span class="counter_unit_small">days</span>)
					</div>
					<div class="tv_show_season">Season 4</div>
					<div class="tv_show_meta_group">
						<img class="tv_show_channel" src="img/hbo2.png">
						<div class="tv_show_imdb">
							<img class="tv_show_imdb_logo" src="img/imdb2.png">
							<span class="tv_show_imdb_score">7.2</span>
						</div>
					</div>
					<div class="tv_show_separator"></div>
				</div>

				<div class="tv_show">
						<div class="tv_show_title text_green">Orange is the New Black
						</div>
						<div class="tv_show_date">July 12th, 2018</div>
						<div class="tv_show_counter">(67
							<span class="counter_unit_small">days</span>)
						</div>
						<div class="tv_show_season">Season 4</div>
						<div class="tv_show_meta_group">
							<img class="tv_show_channel" src="img/hbo2.png">
							<div class="tv_show_imdb">
								<img class="tv_show_imdb_logo" src="img/imdb2.png">
								<span class="tv_show_imdb_score">7.2</span>
							</div>
						</div>
						<div class="tv_show_separator"></div>
					</div>

					<div class="tv_show">
							<div class="tv_show_title text_green">Orange is the New Black
							</div>
							<div class="tv_show_date">July 12th, 2018</div>
							<div class="tv_show_counter">(67
								<span class="counter_unit_small">days</span>)
							</div>
							<div class="tv_show_season">Season 4</div>
							<div class="tv_show_meta_group">
								<img class="tv_show_channel" src="img/hbo2.png">
								<div class="tv_show_imdb">
									<img class="tv_show_imdb_logo" src="img/imdb2.png">
									<span class="tv_show_imdb_score">7.2</span>
								</div>
							</div>
							<div class="tv_show_separator"></div>
						</div>

						<div class="tv_show">
								<div class="tv_show_title text_green">Orange is the New Black
								</div>

								<a href="http://gol24.pl" target="_blank">
									<div class="tv_show_date">
										July 12th, 2018
										<div class="tv_show_date_source_placeholder">
											<div class="date_source">
												<div class="date_source_bg">
													<div class="date_source_arrow"></div>
												</div>
											</div>
										</div>
									</div>
								</a>

								<div class="tv_show_counter">(67
									<span class="counter_unit_small">days</span>)
								</div>
								<div class="tv_show_season">Season 4</div>
								<div class="tv_show_meta_group">
									<img class="tv_show_channel" src="img/hbo2.png">
									<div class="tv_show_imdb">
										<img class="tv_show_imdb_logo" src="img/imdb2.png">
										<span class="tv_show_imdb_score">7.2</span>
									</div>
								</div>
								<div class="tv_show_separator"></div>
							</div>
	</div>

	<div class="footer">
		<a class="contact" href="mailto: contact@showwhen.com">Contact</a>
	</div>
</div>

<script>

	Element.prototype.serializeWithStyles = (function () {  

// Mapping between tag names and css default values lookup tables. This allows to exclude default values in the result.
var defaultStylesByTagName = {};

// Styles inherited from style sheets will not be rendered for elements with these tag names
var noStyleTags = {"BASE":true,"HEAD":true,"HTML":true,"META":true,"NOFRAME":true,"NOSCRIPT":true,"PARAM":true,"SCRIPT":true,"STYLE":true,"TITLE":true};

// This list determines which css default values lookup tables are precomputed at load time
// Lookup tables for other tag names will be automatically built at runtime if needed
var tagNames = ["A","ABBR","ADDRESS","AREA","ARTICLE","ASIDE","AUDIO","B","BASE","BDI","BDO","BLOCKQUOTE","BODY","BR","BUTTON","CANVAS","CAPTION","CENTER","CITE","CODE","COL","COLGROUP","COMMAND","DATALIST","DD","DEL","DETAILS","DFN","DIV","DL","DT","EM","EMBED","FIELDSET","FIGCAPTION","FIGURE","FONT","FOOTER","FORM","H1","H2","H3","H4","H5","H6","HEAD","HEADER","HGROUP","HR","HTML","I","IFRAME","IMG","INPUT","INS","KBD","KEYGEN","LABEL","LEGEND","LI","LINK","MAP","MARK","MATH","MENU","META","METER","NAV","NOBR","NOSCRIPT","OBJECT","OL","OPTION","OPTGROUP","OUTPUT","P","PARAM","PRE","PROGRESS","Q","RP","RT","RUBY","S","SAMP","SCRIPT","SECTION","SELECT","SMALL","SOURCE","SPAN","STRONG","STYLE","SUB","SUMMARY","SUP","SVG","TABLE","TBODY","TD","TEXTAREA","TFOOT","TH","THEAD","TIME","TITLE","TR","TRACK","U","UL","VAR","VIDEO","WBR"];

// Precompute the lookup tables.
for (var i = 0; i < tagNames.length; i++) {
	if(!noStyleTags[tagNames[i]]) {
		defaultStylesByTagName[tagNames[i]] = computeDefaultStyleByTagName(tagNames[i]);
	}
}

function computeDefaultStyleByTagName(tagName) {
	var defaultStyle = {};
	var element = document.body.appendChild(document.createElement(tagName));
	var computedStyle = getComputedStyle(element);
	for (var i = 0; i < computedStyle.length; i++) {
		defaultStyle[computedStyle[i]] = computedStyle[computedStyle[i]];
	}
	document.body.removeChild(element); 
	return defaultStyle;
}

function getDefaultStyleByTagName(tagName) {
	tagName = tagName.toUpperCase();
	if (!defaultStylesByTagName[tagName]) {
		defaultStylesByTagName[tagName] = computeDefaultStyleByTagName(tagName);
	}
	return defaultStylesByTagName[tagName];
}

return function serializeWithStyles() {
	if (this.nodeType !== Node.ELEMENT_NODE) { throw new TypeError(); }
	var cssTexts = [];
	var elements = this.querySelectorAll("*");
	for ( var i = 0; i < elements.length; i++ ) {
		var e = elements[i];
		if (!noStyleTags[e.tagName]) {
			var computedStyle = getComputedStyle(e);
			var defaultStyle = getDefaultStyleByTagName(e.tagName);
			cssTexts[i] = e.style.cssText;
			for (var ii = 0; ii < computedStyle.length; ii++) {
				var cssPropName = computedStyle[ii];
				if (computedStyle[cssPropName] !== defaultStyle[cssPropName]) {
					e.style[cssPropName] = computedStyle[cssPropName];
				}
			}
		}
	}
	var result = this.outerHTML;
	for ( var i = 0; i < elements.length; i++ ) {
		elements[i].style.cssText = cssTexts[i];
	}
	return result;
}
})();

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

function UpdateTime()
{
	var time_left = Math.abs(GetPremiereDate() - new Date());
	
	time_left /= 1000;
	
	var seconds_in_minute = 60;
	var seconds_in_hour = seconds_in_minute * 60;
	var seconds_in_day = seconds_in_hour * 24;
	
	var days = Math.floor(time_left / seconds_in_day);
	time_left -= days * seconds_in_day;
	
	var hours = Math.floor(time_left / seconds_in_hour);
	time_left -= hours * seconds_in_hour;
	
	var minutes = Math.floor(time_left / seconds_in_minute);
	time_left -= minutes * seconds_in_minute;
	
	var seconds = Math.floor(time_left);

	var days_left = document.getElementById('days_left');
	// days_left.outerText = days + " days";
	
	var time_left = document.getElementById('time_left');
	// time_left.textContent = pad(hours, 2) + ":" + pad(minutes, 2) + ":" + pad(seconds, 2);
	
	setTimeout(UpdateTime, 1000);
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