<?php
    echo '<div class="sidebar-text-wrapper">';
    while( $sidebar_text->have_fields('sidebar-text') ) {
            echo '<div class="sidebar-text">';
                if ($sidebar_text->get_the_value('sidebar-text-title'))  { echo '<h2 class="sub-menu-header">' . $sidebar_text->get_the_value('sidebar-text-title') .'</h2>'; } 
                if ($sidebar_text->get_the_value('sidebar-text-copy'))   { echo '<p>' . $sidebar_text->get_the_value('sidebar-text-copy') . '</p>'; }
            echo '</div>';
    }
    echo '</div>';
?>