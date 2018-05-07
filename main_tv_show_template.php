<?

$main_tv_show_template = '
    <div class="main_tv_show_bg">
        <div class="main_tv_show_gradient"></div>
        <div class="main_tv_show_thumbnail">
            <div class="main_tv_show_thumbnail_gradient"></div>
            <div class="main_tv_show_thumbnail_linear_gradient"></div>
        </div>
        <div class="title_and_season_group">
            <div class="main_tv_show_title text_green">__TITLE__</div>
            <div class="main_tv_show_season_number">Season __SEASON__</div>
        </div>
        <div class="main_tv_show_info_section">
            <a href="__SOURCE_URL__" target="_blank">
                <span id="days_left" class="main_tv_show_counter">100<span class="counter_unit">days</span>
                    <div class="main_tv_show_date">
                        __DATE__
                        <img class="main_tv_show_date_info_icon" src="img/info_icon.png">
                    </div>
                    <div class="main_tv_show_info_section_separator"></div>
                </span>
            </a>
            <div class="main_tv_show_date_source_placeholder">
                <div class="date_source">
                    <div class="date_source_bg">
                        <div class="date_source_arrow"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main_tv_show_meta_section">
            <img class="main_tv_show_channel" src="img/__WATCH_IMG__">
            <div class="main_tv_show_imdb">
                <img class="main_tv_show_imdb_logo" src="img/imdb2.png">
                <span class="main_tv_show_imdb_score">
                    __IMDB_SCORE__
                    <span class="main_tv_show_imdb_score_ten">/10</span>
                </span>
            </div>
        </div>
    </div>
';

?>