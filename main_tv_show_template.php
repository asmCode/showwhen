<?

$main_tv_show_template = '
    <div id="movie_id___INDEX__" class="main_tv_show_bg">
        <div class="main_tv_show_gradient"></div>
        <div class="main_tv_show_thumbnail" style="background-image: url(img/tvshow_thumbnails/__THUMBNAIL__);">
            <div class="main_tv_show_thumbnail_gradient"></div>
            <div class="main_tv_show_thumbnail_linear_gradient"></div>
        </div>
        <div class="title_and_season_group">
            <div class="main_tv_show_title text_green">__TITLE__</div>
            <div class="main_tv_show_season_number">Season __SEASON__ (__EPISODES__)</div>
        </div>
        <div class="main_tv_show_info_section">
            <a href="__SOURCE_URL__" target="_blank" style="display: __COUNTER_DISPLAY__">
                <span class="main_tv_show_counter"><span id="movie_id___INDEX___time_left">__TIME_LEFT__</span>
                    <div class="time_left_labels">
                        <span class="time_left_label_days">DAYS</span>
                        <span class="time_left_label_hrs">HRS</span>
                        <span class="time_left_label_mins">MINS</span>
                        <span class="time_left_label_secs">SECS</span>
                    </div>
                    <div class="main_tv_show_date">
                        __DATE__
                        <img class="main_tv_show_date_info_icon" src="img/info_icon.png">
                    </div>
                    <div class="main_tv_show_info_section_separator"></div>
                </span>
            </a>
            <div class="main_tv_show_on_air" style="display: __ON_AIR_DISPLAY__">ON AIR</div>
            <div class="main_tv_show_on_air_extra" style="display: __ON_AIR_DISPLAY__">__ON_AIR_EXTRA__</div>
            <div class="main_tv_show_date_source_placeholder">
                <div class="date_source">
                    <div class="date_source_bg">
                        <div class="date_source_arrow"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main_tv_show_meta_section">
            <a href="__WATCH_URL__" target="_blank">
                <img class="main_tv_show_channel" src="img/__WATCH_IMG__">
            </a>
            <a href="__IMDB_URL__" target="_blank">
                <div class="main_tv_show_imdb">
                    <img class="main_tv_show_imdb_logo" src="img/imdb.png">
                    <span class="main_tv_show_imdb_score">
                        __IMDB_SCORE__
                        <span class="main_tv_show_imdb_score_ten">/10</span>
                    </span>
                </div>
            </a>
        </div>
    </div>
';

?>