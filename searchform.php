<form method="get" id="searchform" action="<?php  echo home_url(); ?>/">
  <div id="search-text">
    <input type="text" value="<?php the_search_query(); ?>" name="s" id="s" placeholder="Search" autocomplete="off" />
  </div>
  <!-- <input type="submit" id="searchsubmit" value="Search" /> -->
  <br class="clear">
</form>
