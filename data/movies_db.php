<?

$movies_db_json = '
{
	"tv_shows": [
		{
			"id": 0,
			"imdb_score": 9.5,
			"watch_url": "https://www.hbo.com/game-of-thrones",
			"day": "",
			"source_url": "https://www.imdb.com/list/ls025720609/videoplayer/vi1996995353?pf_rd_m=A2FGELUUNOQJNL&pf_rd_p=5278ed79-7742-4d46-9f13-6e21ec3e341e&pf_rd_r=JV53EAESY11N5BCQX1NB&pf_rd_s=center-3&pf_rd_t=15021&pf_rd_i=tt0944947&ref_=tt_vd_got_sfm_sm",
			"year": 2019,
			"hour": 20,
			"confirmed": false,
			"imdb_url": "https://www.imdb.com/title/tt0944947/",
			"episodes": 6,
			"title": "Game of Thrones",
			"is_on_air": false,
			"watch_logo": "hbo",
			"featured": true,
			"thumbnail": "game_of_thrones.jpg",
			"on_air_extra": "every Sunday",
			"month": "",
			"period": "Spring",
			"season": 8,
			"timestamp": 1557140400000
		},
		{
			"id": 1,
			"imdb_score": 8.9,
			"watch_url": "https://www.netflix.com/title/80057281",
			"day": "",
			"source_url": "https://www.polygon.com/tv/2018/7/30/17629596/stranger-things-season-3-release-date-delayed",
			"year": 2019,
			"hour": "",
			"confirmed": false,
			"imdb_url": "https://www.imdb.com/title/tt4574334/?ref_=ttep_ep_tt",
			"episodes": 8,
			"title": "Stranger Things",
			"is_on_air": false,
			"watch_logo": "netflix",
			"featured": true,
			"thumbnail": "stranger_things.jpg",
			"on_air_extra": "",
			"month": "",
			"period": "Summer",
			"season": 3,
			"timestamp": 1565017200000
		},
		{
			"id": 2,
			"imdb_score": 8.4,
			"watch_url": "https://www.amc.com/livestream",
			"day": 7,
			"source_url": "http://www.digitalspy.com/tv/the-walking-dead/news/a865656/the-walking-dead-season-9-premiere-extended-episode/",
			"year": 2018,
			"hour": 21,
			"confirmed": true,
			"imdb_url": "https://www.imdb.com/title/tt1520211/",
			"episodes": 16,
			"title": "The Walking Dead",
			"is_on_air": false,
			"watch_logo": "amc",
			"featured": true,
			"thumbnail": "walking_dead.jpg",
			"on_air_extra": "",
			"month": 10,
			"period": "",
			"season": 9,
			"timestamp": 1539000000000
		},
		{
			"id": 3,
			"imdb_score": 8.6,
			"watch_url": "https://www.history.com/shows/vikings",
			"day": 28,
			"source_url": "https://www.express.co.uk/showbiz/tv-radio/992833/vikings-season-5-part-2-release-date-uk-hb-history-amazon-prime",
			"year": 2018,
			"hour": 21,
			"confirmed": true,
			"imdb_url": "https://www.imdb.com/title/tt2306299/",
			"episodes": 10,
			"title": "Vikings",
			"is_on_air": false,
			"watch_logo": "history",
			"featured": true,
			"thumbnail": "vikings.jpg",
			"on_air_extra": "",
			"month": 11,
			"period": "",
			"season": "5 part II",
			"timestamp": 1543496400000
		},
		{
			"id": 4,
			"imdb_score": 8.3,
			"watch_url": "https://www.cbs.com/shows/big_bang_theory/video/",
			"day": 24,
			"source_url": "https://the-big-bang-theory.com/next-season/",
			"year": 2018,
			"hour": 20,
			"confirmed": true,
			"imdb_url": "https://www.imdb.com/title/tt0898266/",
			"episodes": 24,
			"title": "The Big Bang Theory",
			"is_on_air": false,
			"watch_logo": "cbs",
			"featured": true,
			"thumbnail": "big_bang_theory.jpg",
			"on_air_extra": "every Wednesday",
			"month": 9,
			"period": "",
			"season": 12,
			"timestamp": 1537873200000
		},
		{
			"id": 5,
			"imdb_score": 7.6,
			"watch_url": "https://abc.go.com/shows/greys-anatomy",
			"day": 27,
			"source_url": "https://abc.go.com/shows/greys-anatomy/news/news/greys-anatomy-season-15-premiere-date-announced",
			"year": 2018,
			"hour": 0,
			"confirmed": true,
			"imdb_url": "https://www.imdb.com/title/tt0413573/",
			"episodes": 24,
			"title": "Grey\'s Anatomy",
			"is_on_air": false,
			"watch_logo": "abc",
			"featured": false,
			"thumbnail": "",
			"on_air_extra": "",
			"month": 9,
			"period": "",
			"season": 15,
			"timestamp": 1538060400000
		},
		{
			"id": 6,
			"imdb_score": 8.2,
			"watch_url": "https://www.netflix.com/title/80057918",
			"day": "",
			"source_url": "http://www.digitalspy.com/tv/ustv/feature/a860487/lucifer-season-4-netflix-release-date-cast-trailer-episodes-spoilers/",
			"year": 2019,
			"hour": "",
			"confirmed": false,
			"imdb_url": "https://www.imdb.com/title/tt4052886/",
			"episodes": 10,
			"title": "Lucifer",
			"is_on_air": false,
			"watch_logo": "netflix",
			"featured": true,
			"thumbnail": "lucifer.jpg",
			"on_air_extra": "",
			"month": "",
			"period": "early",
			"season": 4,
			"timestamp": 1554130800000
		},
		{
			"id": 7,
			"imdb_score": 8.9,
			"watch_url": "https://www.netflix.com/title/70264888",
			"day": "",
			"source_url": "https://www.nme.com/blogs/tv-blogs/black-mirror-season-5-release-date-trailers-cast-writers-everything-we-know-so-far-2205640",
			"year": 2018,
			"hour": "",
			"confirmed": false,
			"imdb_url": "https://www.imdb.com/title/tt2085059/",
			"episodes": 6,
			"title": "Black Mirror",
			"is_on_air": false,
			"watch_logo": "netflix",
			"featured": true,
			"thumbnail": "black_mirror.jpg",
			"on_air_extra": "",
			"month": "",
			"period": "late",
			"season": 5,
			"timestamp": 1538319600000
		},
		{
			"id": 8,
			"imdb_score": 8.7,
			"watch_url": "https://www.showtime.com/?s_cid=pse-shameless-12744",
			"day": 9,
			"source_url": "https://tvline.com/2018/06/07/shameless-season-9-premiere-date-showtime/",
			"year": 2018,
			"hour": 21,
			"confirmed": true,
			"imdb_url": "https://www.imdb.com/title/tt1586680/?ref_=ttep_ep_tt",
			"episodes": 12,
			"title": "Shameless",
			"is_on_air": true,
			"watch_logo": "showtime",
			"featured": true,
			"thumbnail": "shameless.jpg",
			"on_air_extra": "since Sep 9, every Sunday",
			"month": 9,
			"period": "",
			"season": 9,
			"timestamp": 1536580800000
		},
		{
			"id": 9,
			"imdb_score": 8.1,
			"watch_url": "https://www.nbc.com/the-blacklist",
			"day": "",
			"source_url": "https://otakukart.com/tvshows/the-blacklist-season-6-everything-we-know/",
			"year": 2019,
			"hour": "",
			"confirmed": false,
			"imdb_url": "https://www.imdb.com/title/tt2741602/",
			"episodes": 22,
			"title": "The Blacklist",
			"is_on_air": false,
			"watch_logo": "nbc",
			"featured": true,
			"thumbnail": "blacklist.jpg",
			"on_air_extra": "",
			"month": 10,
			"period": "",
			"season": 6,
			"timestamp": 1571151600000
		},
		{
			"id": 10,
			"imdb_score": 8.8,
			"watch_url": "https://www.bbc.co.uk/programmes/b045fz8r",
			"day": "",
			"source_url": "https://www.express.co.uk/showbiz/tv-radio/879873/Peaky-Blinders-season-5-release-date-cast-plo-When-is-the-series-released-BBC-Netflix",
			"year": 2019,
			"hour": "",
			"confirmed": false,
			"imdb_url": "https://www.imdb.com/title/tt2442560/",
			"episodes": 6,
			"title": "Peaky Blinders",
			"is_on_air": false,
			"watch_logo": "bbc",
			"featured": true,
			"thumbnail": "peaky_blinders.jpg",
			"on_air_extra": "",
			"month": "",
			"period": "Spring",
			"season": 5,
			"timestamp": 1557068400000
		},
		{
			"id": 11,
			"imdb_score": 8.9,
			"watch_url": "https://www.hbo.com/westworld",
			"day": "",
			"source_url": "https://www.harpersbazaar.com/culture/film-tv/a20115800/westworld-season-3-news-date-cast-spoilers/",
			"year": 2020,
			"hour": "",
			"confirmed": false,
			"imdb_url": "https://www.imdb.com/title/tt0475784/",
			"episodes": 10,
			"title": "Westworld",
			"is_on_air": false,
			"watch_logo": "hbo",
			"featured": true,
			"thumbnail": "westworld_v3.jpg",
			"on_air_extra": "",
			"month": "",
			"period": "early",
			"season": 3,
			"timestamp": 1585753200000
		},
		{
			"id": 12,
			"imdb_score": 8.1,
			"watch_url": "https://www.netflix.com/title/80117470",
			"day": "",
			"source_url": "http://www.digitalspy.com/tv/13-reasons-why/feature/a856648/13-reasons-why-season-3-release-date-trailer-spoilers-cast/",
			"year": 2019,
			"hour": "",
			"confirmed": false,
			"imdb_url": "https://www.imdb.com/title/tt1837492/",
			"episodes": 13,
			"title": "13 Reasons Why",
			"is_on_air": false,
			"watch_logo": "netflix",
			"featured": true,
			"thumbnail": "13_Reasons_Why.jpg",
			"on_air_extra": "",
			"month": "",
			"period": "Spring",
			"season": 3,
			"timestamp": 1557068400000
		},
		{
			"id": 13,
			"imdb_score": 8.6,
			"watch_url": "https://www.hbo.com/silicon-valley/",
			"day": "",
			"source_url": "https://www.thecinemaholic.com/silicon-valley-latest-news-plot-wiki-imdb-reviews/",
			"year": 2019,
			"hour": "",
			"confirmed": false,
			"imdb_url": "https://www.imdb.com/title/tt2575988/",
			"episodes": 8,
			"title": "Silicon Valley",
			"is_on_air": false,
			"watch_logo": "hbo",
			"featured": true,
			"thumbnail": "silicon_valley.jpg",
			"on_air_extra": "",
			"month": 5,
			"period": "",
			"season": 6,
			"timestamp": 1557932400000
		},
		{
			"id": 14,
			"imdb_score": 8.9,
			"watch_url": "https://www.netflix.com/title/70178217",
			"day": 2,
			"source_url": "http://www.denofgeek.com/us/tv/house-of-cards/265301/house-of-cards-season-6-release-date-trailer-cast-news",
			"year": 2018,
			"hour": 12,
			"confirmed": true,
			"imdb_url": "https://www.imdb.com/title/tt1856010/",
			"episodes": 8,
			"title": "House of Cards",
			"is_on_air": false,
			"watch_logo": "netflix",
			"featured": true,
			"thumbnail": "house_of_cards_v2.jpg",
			"on_air_extra": "",
			"month": 11,
			"period": "",
			"season": 6,
			"timestamp": 1541214000000
		},
		{
			"id": 15,
			"imdb_score": 8.3,
			"watch_url": "https://www.netflix.com/title/80017537",
			"day": "",
			"source_url": "https://www.whats-on-netflix.com/news/grace-and-frankie-season-5-everything-we-know/",
			"year": 2019,
			"hour": "",
			"confirmed": false,
			"imdb_url": "https://www.imdb.com/title/tt3609352/",
			"episodes": 13,
			"title": "Grace and Frankie",
			"is_on_air": false,
			"watch_logo": "netflix",
			"featured": true,
			"thumbnail": "grace_and_frankie1.jpg",
			"on_air_extra": "",
			"month": 1,
			"period": "",
			"season": 5,
			"timestamp": 1547568000000
		},
		{
			"id": 16,
			"imdb_score": 8.6,
			"watch_url": "http://www.usanetwork.com/suits/episodes",
			"day": 19,
			"source_url": "https://www.express.co.uk/showbiz/tv-radio/863549/Suits-season-8-Release-date-cast-trailer-Meghan-Markle-series-Prince-Harry-Patrick-J-Adams",
			"year": 2018,
			"hour": "",
			"confirmed": true,
			"imdb_url": "https://www.imdb.com/title/tt1632701/",
			"episodes": 16,
			"title": "Suits",
			"is_on_air": true,
			"watch_logo": "usa_network",
			"featured": true,
			"thumbnail": "suits.jpg",
			"on_air_extra": "since Jul 19, every Wednesday",
			"month": 7,
			"period": "",
			"season": 8,
			"timestamp": 1532012400000
		},
		{
			"id": 17,
			"imdb_score": 8.2,
			"watch_url": "https://www.netflix.com/title/80097140",
			"day": "",
			"source_url": "http://www.digitalspy.com/tv/altered-carbon/feature/a849018/altered-carbon-season-2-netflix-release-date-trailer-cast-plot/",
			"year": 2019,
			"hour": "",
			"confirmed": false,
			"imdb_url": "https://www.imdb.com/title/tt2261227",
			"episodes": 8,
			"title": "Altered Carbon",
			"is_on_air": false,
			"watch_logo": "netflix",
			"featured": true,
			"thumbnail": "altered_carbon_v2.jpg",
			"on_air_extra": "",
			"month": "",
			"period": "late",
			"season": 2,
			"timestamp": 1569855600000
		},
		{
			"id": 18,
			"imdb_score": 8.6,
			"watch_url": "https://www.fxnetworks.com/shows/atlanta",
			"day": "",
			"source_url": "http://www.digitalspy.com/tv/ustv/feature/a860838/atlanta-season-three-release-date-trailer-plot-cast/",
			"year": 2020,
			"hour": "",
			"confirmed": false,
			"imdb_url": "https://www.imdb.com/title/tt4288182/",
			"episodes": 10,
			"title": "Atlanta",
			"is_on_air": false,
			"watch_logo": "fx",
			"featured": true,
			"thumbnail": "atlanta.jpg",
			"on_air_extra": "",
			"month": "",
			"period": "early",
			"season": 3,
			"timestamp": 1585753200000
		},
		{
			"id": 19,
			"imdb_score": 8.8,
			"watch_url": "https://www.nbc.com/this-is-us",
			"day": 25,
			"source_url": "https://www.countryliving.com/life/entertainment/a21638279/this-is-us-start-date-season-3-september/",
			"year": 2018,
			"hour": 21,
			"confirmed": true,
			"imdb_url": "https://www.imdb.com/title/tt5555260/",
			"episodes": 18,
			"title": "This is Us",
			"is_on_air": false,
			"watch_logo": "nbc",
			"featured": true,
			"thumbnail": "this_is_us.jpg",
			"on_air_extra": "",
			"month": 9,
			"period": "",
			"season": 3,
			"timestamp": 1537963200000
		},
		{
			"id": 20,
			"imdb_score": 8.6,
			"watch_url": "https://www.hulu.com/castle-rock",
			"day": "",
			"source_url": "https://www.express.co.uk/showbiz/tv-radio/1004105/Castle-Rock-season-2-release-date-cast-trailer-plot-series-Hulu-Stephen-King",
			"year": 2019,
			"hour": 0,
			"confirmed": false,
			"imdb_url": "https://www.imdb.com/title/tt6548228/",
			"episodes": 10,
			"title": "Castle Rock",
			"is_on_air": false,
			"watch_logo": "hulu",
			"featured": true,
			"thumbnail": "castle_rock_v2.jpg",
			"on_air_extra": "every Wednesday",
			"month": "",
			"period": "Summer",
			"season": 2,
			"timestamp": 1565017200000
		},
		{
			"id": 21,
			"imdb_score": "",
			"watch_url": "https://www.netflix.com/title/80124522",
			"day": 21,
			"source_url": "https://deadline.com/2018/07/maniac-release-date-netflix-emma-stone-jonah-hill-teaser-trailer-video-tca-1202435943/",
			"year": 2018,
			"hour": 12,
			"confirmed": true,
			"imdb_url": "https://www.imdb.com/title/tt5580146/?ref_=ttep_ep_tt",
			"episodes": 10,
			"title": "Maniac",
			"is_on_air": false,
			"watch_logo": "netflix",
			"featured": false,
			"thumbnail": "",
			"on_air_extra": "",
			"month": 9,
			"period": "",
			"season": 1,
			"timestamp": 1537585200000
		},
		{
			"id": 22,
			"imdb_score": "",
			"watch_url": "https://www.netflix.com/title/80186863",
			"day": "",
			"source_url": "http://www.denofgeek.com/us/tv/the-umbrella-academy/266165/the-umbrella-academy-release-date-cast-everything-else-we-know",
			"year": 2019,
			"hour": "",
			"confirmed": false,
			"imdb_url": "https://www.imdb.com/title/tt1312171/",
			"episodes": 10,
			"title": "The Umbrella Academy",
			"is_on_air": false,
			"watch_logo": "netflix",
			"featured": false,
			"thumbnail": "",
			"on_air_extra": "",
			"month": "",
			"period": "early",
			"season": 1,
			"timestamp": 1554130800000
		},
		{
			"id": 23,
			"imdb_score": 8.1,
			"watch_url": "https://www.starz.com/series/counterpart/episodes",
			"day": 2,
			"source_url": "https://www.thecinemaholic.com/counterpart-latest-news-plot-wiki-imdb-reviews/",
			"year": 2019,
			"hour": "",
			"confirmed": true,
			"imdb_url": "https://www.imdb.com/title/tt4643084/",
			"episodes": 10,
			"title": "Counterpart",
			"is_on_air": false,
			"watch_logo": "netflix",
			"featured": false,
			"thumbnail": "",
			"on_air_extra": "",
			"month": 1,
			"period": "",
			"season": 2,
			"timestamp": 1546444800000
		},
		{
			"id": 24,
			"imdb_score": 8.1,
			"watch_url": "https://www.amc.com/shows/the-terror",
			"day": "",
			"source_url": "http://www.digitalspy.com/tv/ustv/feature/a863637/the-terror-season-2-release-date-cast-plot-trailer/",
			"year": 2019,
			"hour": "",
			"confirmed": false,
			"imdb_url": "https://www.imdb.com/title/tt2708480/?ref_=ttep_ep_tt",
			"episodes": 10,
			"title": "The Terror",
			"is_on_air": false,
			"watch_logo": "amc",
			"featured": false,
			"thumbnail": "",
			"on_air_extra": "",
			"month": 3,
			"period": "",
			"season": 2,
			"timestamp": 1552662000000
		},
		{
			"id": 25,
			"imdb_score": 8.7,
			"watch_url": "https://www.fox.com/the-simpsons/",
			"day": 30,
			"source_url": "http://www.denofgeek.com/us/tv/the-simpsons/274565/the-simpsons-season-30-release-date-and-episode-details",
			"year": 2018,
			"hour": "",
			"confirmed": true,
			"imdb_url": "https://www.imdb.com/title/tt0096697/",
			"episodes": 22,
			"title": "The Simpsons",
			"is_on_air": false,
			"watch_logo": "fox",
			"featured": true,
			"thumbnail": "simpsons.jpg",
			"on_air_extra": "",
			"month": 9,
			"period": "",
			"season": 30,
			"timestamp": 1538319600000
		},
		{
			"id": 26,
			"imdb_score": 8.6,
			"watch_url": "http://www.usanetwork.com/mrrobot",
			"day": "",
			"source_url": "http://www.denofgeek.com/us/tv/mr-robot/269653/mr-robot-season-4-release-date-trailer-cast-plot-news",
			"year": 2018,
			"hour": "",
			"confirmed": false,
			"imdb_url": "https://www.imdb.com/title/tt4158110/",
			"episodes": 10,
			"title": "Mr. Robot",
			"is_on_air": false,
			"watch_logo": "usa_network",
			"featured": true,
			"thumbnail": "mr_robot.jpg",
			"on_air_extra": "",
			"month": "",
			"period": "Fall",
			"season": 4,
			"timestamp": 1541433600000
		},
		{
			"id": 27,
			"imdb_score": 8.2,
			"watch_url": "https://www.fox.com/family-guy/",
			"day": 30,
			"source_url": "https://tvline.com/2018/07/13/family-guy-season-17-first-look-comic-con-poster/",
			"year": 2018,
			"hour": 21,
			"confirmed": true,
			"imdb_url": "https://www.imdb.com/title/tt0182576/",
			"episodes": 20,
			"title": "Family Guy",
			"is_on_air": false,
			"watch_logo": "fox",
			"featured": true,
			"thumbnail": "family_guy.jpg",
			"on_air_extra": "",
			"month": 9,
			"period": "",
			"season": 17,
			"timestamp": 1538395200000
		},
		{
			"id": 28,
			"imdb_score": 7.5,
			"watch_url": "https://www.netflix.com/title/80074220",
			"day": "",
			"source_url": "https://www.independent.co.uk/arts-entertainment/tv/news/netflix-renews-sleeper-brazilian-series-3-for-third-season-a8384256.html",
			"year": 2019,
			"hour": "",
			"confirmed": false,
			"imdb_url": "https://www.imdb.com/title/tt4922804/",
			"episodes": 10,
			"title": "3%",
			"is_on_air": false,
			"watch_logo": "netflix",
			"featured": false,
			"thumbnail": "",
			"on_air_extra": "",
			"month": "",
			"period": "",
			"season": 3,
			"timestamp": 1546358400000
		},
		{
			"id": 29,
			"imdb_score": 8.7,
			"watch_url": "https://www.netflix.com/title/80025678",
			"day": "",
			"source_url": "http://www.digitalspy.com/tv/the-crown/feature/a842031/the-crown-season-three-netflix-premiere-release-date-cast-story/",
			"year": 2019,
			"hour": "",
			"confirmed": false,
			"imdb_url": "https://www.imdb.com/title/tt4786824/",
			"episodes": 10,
			"title": "The Crown",
			"is_on_air": false,
			"watch_logo": "netflix",
			"featured": true,
			"thumbnail": "the_crown_v2.jpg",
			"on_air_extra": "",
			"month": "",
			"period": "early",
			"season": 3,
			"timestamp": 1554130800000
		},
		{
			"id": 30,
			"imdb_score": 8.2,
			"watch_url": "https://www.netflix.com/title/70242311",
			"day": "",
			"source_url": "http://www.digitalspy.com/tv/orange-is-the-new-black/feature/a861055/orange-is-the-new-black-season-7-netflix-release-date-trailer-cast-spoilers/",
			"year": 2019,
			"hour": "",
			"confirmed": false,
			"imdb_url": "https://www.imdb.com/title/tt2372162/?ref_=ttep_ep_tt",
			"episodes": 13,
			"title": "Orange is the New Black",
			"is_on_air": false,
			"watch_logo": "netflix",
			"featured": true,
			"thumbnail": "orange-is-the-new-black.jpg",
			"on_air_extra": "",
			"month": 7,
			"period": "",
			"season": 7,
			"timestamp": 1563202800000
		},
		{
			"id": 31,
			"imdb_score": 8.9,
			"watch_url": "https://www.netflix.com/title/80997085",
			"day": 16,
			"source_url": "https://www.independent.co.uk/arts-entertainment/tv/news/narcos-season-4-mexico-release-date-cast-trailer-michael-pena-diego-luna-netflix-a8525836.html",
			"year": 2018,
			"hour": 12,
			"confirmed": true,
			"imdb_url": "https://www.imdb.com/title/tt8714904/?ref_=nv_sr_1",
			"episodes": 10,
			"title": "Narcos",
			"is_on_air": false,
			"watch_logo": "netflix",
			"featured": true,
			"thumbnail": "narcos_mexico.jpg",
			"on_air_extra": "",
			"month": 11,
			"period": "",
			"season": 4,
			"timestamp": 1542427200000
		},
		{
			"id": 32,
			"imdb_score": 8,
			"watch_url": "https://www.netflix.com/title/80105699",
			"day": "",
			"source_url": "http://www.denofgeek.com/us/tv/travelers/271433/travelers-season-3-release-date-cast-news-and-more",
			"year": 2018,
			"hour": "",
			"confirmed": false,
			"imdb_url": "https://www.imdb.com/title/tt5651844/?ref_=ttep_ep_tt",
			"episodes": 12,
			"title": "Travelers",
			"is_on_air": false,
			"watch_logo": "netflix",
			"featured": false,
			"thumbnail": "",
			"on_air_extra": "",
			"month": 12,
			"period": "",
			"season": 3,
			"timestamp": 1544889600000
		},
		{
			"id": 33,
			"imdb_score": 7.8,
			"watch_url": "https://www.netflix.com/title/80100929",
			"day": 7,
			"source_url": "https://www.imdb.com/title/tt5674718/episodes?season=3",
			"year": 2018,
			"hour": "",
			"confirmed": true,
			"imdb_url": "https://www.imdb.com/title/tt5674718/?ref_=nv_sr_1",
			"episodes": 8,
			"title": "Cable Girls",
			"is_on_air": true,
			"watch_logo": "netflix",
			"featured": false,
			"thumbnail": "",
			"on_air_extra": "all epis available since Sep 9th",
			"month": 9,
			"period": "",
			"season": 3,
			"timestamp": 1536332400000
		},
		{
			"id": 34,
			"imdb_score": 6.3,
			"watch_url": "https://www.netflix.com/title/80154610",
			"day": "",
			"source_url": "http://www.digitalspy.com/tv/cult/feature/a856753/the-rain-season-2-release-date-cast-spoilers-trailer/",
			"year": 2019,
			"hour": "",
			"confirmed": false,
			"imdb_url": "https://www.imdb.com/title/tt6656238/",
			"episodes": 8,
			"title": "The Rain",
			"is_on_air": false,
			"watch_logo": "netflix",
			"featured": false,
			"thumbnail": "",
			"on_air_extra": "",
			"month": "",
			"period": "",
			"season": 2,
			"timestamp": 1546358400000
		},
		{
			"id": 35,
			"imdb_score": 6.5,
			"watch_url": "https://www.netflix.com/title/80065386",
			"day": 14,
			"source_url": "https://www.bustle.com/p/when-does-supergirl-season-4-premiere-the-cw-series-will-be-more-inclusive-than-ever-when-it-returns-9403029",
			"year": 2018,
			"hour": 12,
			"confirmed": true,
			"imdb_url": "https://www.imdb.com/title/tt4016454/?ref_=ttep_ep_tt",
			"episodes": 23,
			"title": "Supergirl",
			"is_on_air": false,
			"watch_logo": "netflix",
			"featured": false,
			"thumbnail": "",
			"on_air_extra": "",
			"month": 10,
			"period": "",
			"season": 4,
			"timestamp": 1539572400000
		},
		{
			"id": 36,
			"imdb_score": 8,
			"watch_url": "https://www.netflix.com/title/80027042",
			"day": 9,
			"source_url": "http://www.digitalspy.com/tv/the-flash/feature/a855034/the-flash-season-5-release-date-cast-plot-trailer/",
			"year": 2018,
			"hour": "",
			"confirmed": false,
			"imdb_url": "https://www.imdb.com/title/tt3107288/?ref_=ttep_ep_tt",
			"episodes": 23,
			"title": "Flash",
			"is_on_air": false,
			"watch_logo": "netflix",
			"featured": false,
			"thumbnail": "",
			"on_air_extra": "",
			"month": 10,
			"period": "",
			"season": 5,
			"timestamp": 1539097200000
		},
		{
			"id": 37,
			"imdb_score": 7.4,
			"watch_url": "https://www.hbo.com/crashing",
			"day": "",
			"source_url": "https://www.bustle.com/p/when-does-crashing-season-3-premiere-on-hbo-pete-has-a-whole-new-journey-ahead-of-him-8350848",
			"year": 2019,
			"hour": "",
			"confirmed": false,
			"imdb_url": "https://www.imdb.com/title/tt5037914/",
			"episodes": 8,
			"title": "Crashing",
			"is_on_air": false,
			"watch_logo": "hbo",
			"featured": false,
			"thumbnail": "",
			"on_air_extra": "",
			"month": 1,
			"period": "",
			"season": 3,
			"timestamp": 1547568000000
		},
		{
			"id": 38,
			"imdb_score": 8.1,
			"watch_url": "https://www.netflix.com/title/80002311",
			"day": "",
			"source_url": "http://www.denofgeek.com/us/tv/jessica-jones/271596/jessica-jones-season-3-release-date-trailer-story-news",
			"year": 2019,
			"hour": "",
			"confirmed": false,
			"imdb_url": "https://www.imdb.com/title/tt2357547/",
			"episodes": 13,
			"title": "Marvel\'s Jessica Jones",
			"is_on_air": false,
			"watch_logo": "netflix",
			"featured": false,
			"thumbnail": "",
			"on_air_extra": "",
			"month": 11,
			"period": "",
			"season": 3,
			"timestamp": 1573833600000
		},
		{
			"id": 39,
			"imdb_score": 7.9,
			"watch_url": "https://www.hbo.com/high-maintenance/",
			"day": "",
			"source_url": "https://www.thecinemaholic.com/high-maintenance-latest-news-plot-wiki-imdb-reviews/",
			"year": 2019,
			"hour": "",
			"confirmed": false,
			"imdb_url": "https://www.imdb.com/title/tt6078096/",
			"episodes": 10,
			"title": "High Maintenance",
			"is_on_air": false,
			"watch_logo": "hbo",
			"featured": false,
			"thumbnail": "",
			"on_air_extra": "",
			"month": "",
			"period": "early",
			"season": 3,
			"timestamp": 1554130800000
		},
		{
			"id": 40,
			"imdb_score": 7.4,
			"watch_url": "http://www.sho.com/the-chi#/closed",
			"day": "",
			"source_url": "https://deadline.com/2018/07/the-chi-promoted-shamon-brown-jr-barton-fitzpatrick-michael-epps-series-regulars-season-2-1202432012/",
			"year": 2019,
			"hour": "",
			"confirmed": false,
			"imdb_url": "https://www.imdb.com/title/tt6294706/",
			"episodes": 10,
			"title": "The Chi",
			"is_on_air": false,
			"watch_logo": "showtime",
			"featured": false,
			"thumbnail": "",
			"on_air_extra": "",
			"month": "",
			"period": "",
			"season": 2,
			"timestamp": 1546358400000
		},
		{
			"id": 41,
			"imdb_score": 7.8,
			"watch_url": "http://www.tvland.com/shows/younger/episode-guide",
			"day": "",
			"source_url": "https://www.marieclaire.com/culture/a21999922/younger-season-6-facts-release-date-cast-spoilers/",
			"year": 2019,
			"hour": "",
			"confirmed": false,
			"imdb_url": "https://www.imdb.com/title/tt3288518/",
			"episodes": 12,
			"title": "Younger",
			"is_on_air": false,
			"watch_logo": "tv_land",
			"featured": false,
			"thumbnail": "",
			"on_air_extra": "",
			"month": 6,
			"period": "",
			"season": 6,
			"timestamp": 1560610800000
		},
		{
			"id": 42,
			"imdb_score": 7.5,
			"watch_url": "https://www.fxnetworks.com/shows/baskets",
			"day": "",
			"source_url": "https://www.bustle.com/p/when-does-baskets-season-4-premiere-zach-galifianakis-clown-comedy-is-coming-back-for-more-8605328",
			"year": 2019,
			"hour": "",
			"confirmed": false,
			"imdb_url": "https://www.imdb.com/title/tt3468798/",
			"episodes": 10,
			"title": "Baskets",
			"is_on_air": false,
			"watch_logo": "fx",
			"featured": false,
			"thumbnail": "",
			"on_air_extra": "",
			"month": "",
			"period": "",
			"season": 4,
			"timestamp": 1546358400000
		},
		{
			"id": 43,
			"imdb_score": 7.6,
			"watch_url": "https://www.amazon.com/dp/B07CPM85L3/DVM_PTM_AMG_US_AC_C_ACQ_ASIN_HBO",
			"day": "",
			"source_url": "https://www.express.co.uk/showbiz/tv-radio/999736/Succession-season-2-renewal-release-date-cast-plot-HNO-drama-Brian-Cox",
			"year": 2019,
			"hour": "",
			"confirmed": false,
			"imdb_url": "https://www.imdb.com/title/tt7660850/",
			"episodes": 10,
			"title": "Succesion",
			"is_on_air": false,
			"watch_logo": "amazon",
			"featured": false,
			"thumbnail": "",
			"on_air_extra": "",
			"month": "",
			"period": "early Summer",
			"season": 2,
			"timestamp": 1561129200000
		},
		{
			"id": 44,
			"imdb_score": 6.3,
			"watch_url": "https://www.netflix.com/title/80095698",
			"day": "",
			"source_url": "https://www.express.co.uk/showbiz/tv-radio/1002675/Dear-White-People-season-3-Netflix-release-date-cast-trailer-plot-Giancarlo-Esposito",
			"year": 2019,
			"hour": "",
			"confirmed": false,
			"imdb_url": "https://www.imdb.com/title/tt5707802/",
			"episodes": 10,
			"title": "Dear White People",
			"is_on_air": false,
			"watch_logo": "netflix",
			"featured": false,
			"thumbnail": "",
			"on_air_extra": "",
			"month": "",
			"period": "early Summer",
			"season": 3,
			"timestamp": 1561129200000
		},
		{
			"id": 45,
			"imdb_score": 8.4,
			"watch_url": "http://www.sho.com/billions/season/3",
			"day": "",
			"source_url": "https://decider.com/2018/07/30/billions-season-4-premiere/",
			"year": 2019,
			"hour": "",
			"confirmed": false,
			"imdb_url": "https://www.imdb.com/title/tt4270492/",
			"episodes": 12,
			"title": "Billions",
			"is_on_air": false,
			"watch_logo": "showtime",
			"featured": true,
			"thumbnail": "billions.jpg",
			"on_air_extra": "",
			"month": 4,
			"period": "",
			"season": 4,
			"timestamp": 1555340400000
		},
		{
			"id": 46,
			"imdb_score": 8.4,
			"watch_url": "https://www.cbs.com/shows/the-good-fight/",
			"day": "",
			"source_url": "http://www.digitalspy.com/tv/the-good-wife/feature/a859822/the-good-fight-season-3-release-date-cast-episodes-plot-trailer/",
			"year": 2019,
			"hour": "",
			"confirmed": false,
			"imdb_url": "https://www.imdb.com/title/tt5853176/",
			"episodes": 13,
			"title": "The Good Fight",
			"is_on_air": false,
			"watch_logo": "cbs",
			"featured": true,
			"thumbnail": "the_good_fight.jpg",
			"on_air_extra": "",
			"month": 3,
			"period": "",
			"season": 3,
			"timestamp": 1552662000000
		},
		{
			"id": 47,
			"imdb_score": 8.3,
			"watch_url": "https://www.netflix.com/title/80117552",
			"day": 31,
			"source_url": "https://www.radiotimes.com/news/on-demand/2018-09-07/ozark-season-2-release-date-netflix-cast-plot/",
			"year": 2018,
			"hour": 0,
			"confirmed": true,
			"imdb_url": "https://www.imdb.com/title/tt5071412/?ref_=nv_sr_1",
			"episodes": 10,
			"title": "Ozark",
			"is_on_air": true,
			"watch_logo": "netflix",
			"featured": true,
			"thumbnail": "ozark1.jpg",
			"on_air_extra": "since Aug 31 (all)",
			"month": 8,
			"period": "",
			"season": 2,
			"timestamp": 1535727600000
		},
		{
			"id": 48,
			"imdb_score": 6.7,
			"watch_url": "https://www.netflix.com/title/80002612",
			"day": 7,
			"source_url": "https://screenrant.com/iron-fist-season-2-release-time-netflix/",
			"year": 2018,
			"hour": 12,
			"confirmed": true,
			"imdb_url": "https://www.imdb.com/title/tt3322310/",
			"episodes": 10,
			"title": "Iron Fist",
			"is_on_air": true,
			"watch_logo": "netflix",
			"featured": false,
			"thumbnail": "",
			"on_air_extra": "all episodes available",
			"month": 9,
			"period": "",
			"season": 2,
			"timestamp": 1536375600000
		},
		{
			"id": 49,
			"imdb_score": 8.5,
			"watch_url": "https://www.netflix.com/title/70300800",
			"day": 14,
			"source_url": "https://www.nme.com/blogs/season-five-bojack-horseman-netflix-2170869",
			"year": 2018,
			"hour": 0,
			"confirmed": true,
			"imdb_url": "https://www.imdb.com/title/tt3398228/",
			"episodes": 12,
			"title": "BoJack Horseman",
			"is_on_air": false,
			"watch_logo": "netflix",
			"featured": true,
			"thumbnail": "bojack_horseman.jpg",
			"on_air_extra": "",
			"month": 9,
			"period": "",
			"season": 5,
			"timestamp": 1536937200000
		},
		{
			"id": 50,
			"imdb_score": 7.8,
			"watch_url": "https://www.netflix.com/title/80044950",
			"day": "",
			"source_url": "http://www.digitalspy.com/tv/the-oa/feature/a835812/the-oa-season-2-netflix-release-date-theories-cast-plot-trailer-teaser/",
			"year": 2019,
			"hour": "",
			"confirmed": false,
			"imdb_url": "https://www.imdb.com/title/tt4635282/",
			"episodes": 8,
			"title": "The OA",
			"is_on_air": false,
			"watch_logo": "netflix",
			"featured": false,
			"thumbnail": "",
			"on_air_extra": "",
			"month": "",
			"period": "early",
			"season": 2,
			"timestamp": 1554130800000
		},
		{
			"id": 51,
			"imdb_score": 7.3,
			"watch_url": "https://www.netflix.com/title/80066429",
			"day": 14,
			"source_url": "https://www.thecinemaholic.com/ingobernable-latest-news-plot-wiki-imdb-reviews/",
			"year": 2019,
			"hour": 12,
			"confirmed": true,
			"imdb_url": "https://www.imdb.com/title/tt6495756/?ref_=fn_al_tt_1",
			"episodes": 15,
			"title": "Ingobernable",
			"is_on_air": false,
			"watch_logo": "netflix",
			"featured": false,
			"thumbnail": "",
			"on_air_extra": "",
			"month": 9,
			"period": "",
			"season": 2,
			"timestamp": 1568516400000
		},
		{
			"id": 52,
			"imdb_score": 8.1,
			"watch_url": "https://www.amazon.com/gp/video/detail/B07FDKRJQC/ref=atv_dp_season_select_atf",
			"day": 5,
			"source_url": "https://www.nme.com/news/tv/man-high-castle-season-3-trailer-release-date-revealed-2358169",
			"year": 2018,
			"hour": 0,
			"confirmed": true,
			"imdb_url": "https://www.imdb.com/title/tt1740299/",
			"episodes": 10,
			"title": "The Man in The High Castle",
			"is_on_air": false,
			"watch_logo": "amazon",
			"featured": true,
			"thumbnail": "the-man-in-the-high-castle_v2.jpg",
			"on_air_extra": "",
			"month": 10,
			"period": "",
			"season": 3,
			"timestamp": 1538751600000
		},
		{
			"id": 53,
			"imdb_score": 8.8,
			"watch_url": "https://www.fxnetworks.com/shows/its-always-sunny-in-philadelphia",
			"day": 5,
			"source_url": "https://www.nme.com/blogs/tv-blogs/always-sunny-philadelphia-season-13-plot-cast-trailers-rumours-2116554",
			"year": 2018,
			"hour": 22,
			"confirmed": true,
			"imdb_url": "https://www.imdb.com/title/tt0472954",
			"episodes": 10,
			"title": "It\'s Always Sunny in Philadelphia",
			"is_on_air": true,
			"watch_logo": "fxx",
			"featured": true,
			"thumbnail": "sunny_philadelphia.jpg",
			"on_air_extra": "every Wednesday",
			"month": 9,
			"period": "",
			"season": 13,
			"timestamp": 1536238800000
		},
		{
			"id": 54,
			"imdb_score": 9,
			"watch_url": "https://www.hbo.com/true-detective",
			"day": "",
			"source_url": "https://www.youtube.com/watch?v=YpUznQds8p4",
			"year": 2019,
			"hour": "",
			"confirmed": true,
			"imdb_url": "https://www.imdb.com/title/tt2356777",
			"episodes": 8,
			"title": "True Detective",
			"is_on_air": false,
			"watch_logo": "hbo",
			"featured": true,
			"thumbnail": "true_detective.jpg",
			"on_air_extra": "",
			"month": 1,
			"period": "",
			"season": 3,
			"timestamp": 1547568000000
		}
	]
}';

?>