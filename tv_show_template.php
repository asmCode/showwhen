<?

$tv_show_template = '
    <div id="movie_id___INDEX__" class="tv_show">
        <div class="tv_show_title text_green">__TITLE__</div>
        <a href="__SOURCE_URL__" target="_blank">
            <div class="tv_show_date">
                __DATE__
                <img class="main_tv_show_date_info_icon" src="img/info_icon.png">
            </div>
        </a>
        <div class="tv_show_counter">(67
            <span class="counter_unit_small">days</span>)
        </div>
        <div class="tv_show_season">Season __SEASON__</div>
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