<?php
    echo '<div class="sidebar-wrapper">';
    while( $sidebar_meta->have_fields('sidebar-item') ) {
        $sidebar_type   = $sidebar_meta->get_the_value('sidebar-select');
        if ($sidebar_type == 'ad') {
            $ad             = $sidebar_meta->get_the_value('sidebar-ads');
            $ad_post    = get_post($ad);
            echo '<div class="sidebar-item">';
                echo '<h2 class="sub-menu-header">' . $ad_post->post_title .'</h2>';
                echo $ad_post->post_content;
            echo '</div>';
        } else {
            $external       = ($sidebar_meta->get_the_value('sidebar-link-external') == 1) ? 'target="_blank"' : '';
            echo '<div class="sidebar-item">';
                if ($sidebar_meta->get_the_value('sidebar-title'))  { echo '<h2 class="sub-menu-header">' . $sidebar_meta->get_the_value('sidebar-title') .'</h2>'; } 
                if ($sidebar_meta->get_the_value('sidebar-logo'))   { echo '<img src="'. $sidebar_meta->get_the_value('sidebar-logo') .'" class="sidebar-logo" >'; }
                if ($sidebar_meta->get_the_value('sidebar-copy'))   { echo '<p>' . $sidebar_meta->get_the_value('sidebar-copy') . '</p>'; }
                if ($sidebar_meta->get_the_value('sidebar-link'))   { echo '<a href="'. $sidebar_meta->get_the_value('sidebar-link') .'" ' . $external .' class="overlay"></a>'; }
            echo '</div>';
        }
    }
    echo '</div>';
?>