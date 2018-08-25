<?

$tv_show_template = '
    <div id="movie_id___INDEX__" class="tv_show">
        <div class="tv_show_title text_green">__TITLE__</div>
        <a href="__SOURCE_URL__" target="_blank" style="display: __COUNTER_DISPLAY__">
            <div class="tv_show_date">
                __DATE__
                <img class="main_tv_show_date_info_icon" src="img/info_icon.png">
            </div>
        </a>
        <div class="tv_show_on_air" style="display: __ON_AIR_DISPLAY__">ON AIR, __ON_AIR_EXTRA__</div>
        <div class="tv_show_counter" style="display: __COUNTER_DISPLAY__">__TIME_LEFT__
            <span class="counter_unit_small">__TIME_LEFT_UNITS__</span>
        </div>
        <div class="tv_show_season">S __SEASON__</div>
        <div class="tv_show_episodes">__EPISODES__</div>
        <div class="tv_show_meta_group">
            <a href="__WATCH_URL__" target="_blank">
                <img class="tv_show_channel" src="img/__WATCH_IMG__">
            </a>
            <a href="__IMDB_URL__" target="_blank">
                <div class="tv_show_imdb">
                    <img class="tv_show_imdb_logo" src="img/imdb.png">
                    <span class="tv_show_imdb_score">__IMDB_SCORE__</span>
                </div>
            </a>
        </div>
        <div class="tv_show_separator"></div>
    </div>
';

?>