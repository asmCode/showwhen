<?

$main_tv_show_template = '
    <div id="movie_id___ID__" class="main_tv_show_bg __LARGE_TILE_CLASS__">
        <div class="main_tv_show_gradient"></div>
        <div class="main_tv_show_thumbnail" style="background-image: url(/img/tvshow_thumbnails/__THUMBNAIL__);">
            <div class="main_tv_show_thumbnail_gradient"></div>
            <div class="main_tv_show_thumbnail_linear_gradient"></div>
            <img class="share_icon" src="/img/share.png" style="display: __SHARE_ICON_DISPLAY__" alt="share icon" >
        </div>
        <a href="__ONLY_MODE_URL__" style="pointer-events: __ONLY_MODE_URL_POINTER_EVENTS__">
            <div class="title_and_season_group">
                <div class="main_tv_show_title text_green">
                    <div class="main_tv_show_season_number">Season __SEASON__ (__EPISODES__)</div>
                    __TITLE__
                </div>
            </div>
        </a>
        <div class="main_tv_show_info_section">
            <a href="__SOURCE_URL__" target="_blank" style="display: __COUNTER_DISPLAY__">
                <div class="main_tv_show_counter"><span style="display: __APPROX_DISPLAY__">~</span><span id="movie_id___ID___time_left">__TIME_LEFT__</span>
                    <div class="time_left_labels">
                        <span class="time_left_label_days">DAYS</span>
                        <span class="time_left_label_hrs">HRS</span>
                        <span class="time_left_label_mins">MINS</span>
                        <span class="time_left_label_secs">SECS</span>
                    </div>
                    <div class="main_tv_show_date">
                        <!--<img class="main_tv_show_date_info_icon" src="/img/info_icon.png">-->
                        __DATE__
                        <img class="main_tv_show_date_info_icon" style="display: __CONFIRMED_DISPLAY__" src="/img/confirmed.png" title="Release date confirmed." alt="confirmed">
                    </div>
                    <div class="main_tv_show_info_section_separator"></div>
                </div>
            </a>

            <!-- ON AIR -->
            <div class="on_air_group" style="display: __ON_AIR_DISPLAY__">
                since __DATE__
                <div class="main_tv_show_info_section_separator_on_air"></div>
                <div class="main_tv_show_on_air" style="display: unset">ON AIR</div>
                <div class="main_tv_show_on_air_extra" style="display: unset">__ON_AIR_EXTRA__</div>
            </div>
            
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
                <img class="main_tv_show_channel" src="/img/channels/__WATCH_IMG__" alt="channel">
            </a>
            <a href="__IMDB_URL__" target="_blank">
                <div class="main_tv_show_imdb">
                    <img class="main_tv_show_imdb_logo" src="/img/imdb.png" alt="imdb">
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