<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="Поиск">
    <button class="search_btn">Поиск</button>
</form>
