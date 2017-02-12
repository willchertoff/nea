<?php

get_header();

?>
<div id="long-form-body">
  <?php
    $pc = get_post_custom();
    echo('<section id="top-bar">');
    echo('<div class="row">');
    echo('<div class="small-12 large-12 columns title">');
    echo('<span id="title">');
    echo($pc['headline'][0]);
    echo('</span>');
    echo("<p class='subhead'>");
    echo($pc['sub_headline'][0]);
    echo("</p>");
    echo('</div>');
    echo '<div class="small-12 large-6 columns top-bullets">';
    echo($pc['top_level_content'][0]);
    echo '</div>';
    echo '<div class="small-12 large-6 columns email-cap">';
    echo('<div class="email-capture-box">');
    echo('<h2>'.$pc['email_capture_headline'][0].'</h2>');
    echo('<p>'.$pc['email_capture_sub_headline'][0].'</p>');
    ?>
        <!-- form below for live site only -->
        <div id="longform-email-capture">
            <?php gravity_form(45, false, false, false, '', true, 345); ?>
        </div>

        <!-- form below for dev server only -->
     <!-- <div id="longform-email-capture">
         <?php gravity_form(7, false, false, false, '', true, 345); ?>
     </div> -->
    <?php
    echo('</div>');
    echo '</div>';
    echo '</div>'; // End title
    echo('</section>'); //End top-bar

    echo('<section id="long-form-body">');
    echo('<div id="sidebar-dummy">');
    echo('</div>');
    echo('<div class="row">');
    echo('<div id="sidebar" class="small-0 large-4 columns">');
    echo('<ul>');
    echo('</ul>');
    echo('</div>');
    echo('<div class="small-12 large-8 columns">');
    echo('<p>');
    echo(wpautop($pc['page_body'][0]));
    echo('</p>');
    echo '</div>';
    echo '</div>';
    echo('</section>');
?>
</div>


<?php get_footer(); ?>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri();?>/js/notify.min.js"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri();?>/js/jquery.waypoints.min.js"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri();?>/js/nea-child-sidebar-scroll.js"></script>
