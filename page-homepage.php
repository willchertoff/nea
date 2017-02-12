<?php
/**
 * Template Name: Homepage
 */

get_header();
global $slider;
global $home_meta;
global $search_meta;
$slider->the_meta();
$home_meta->the_meta();
$search_meta->the_meta();
?>
<div class="page-wrapper homepage">
    <section id="hero" style="background: url('/wp-content/themes/nea_v2-child/images/cover-photo-min.jpg') no-repeat center center; background-size: cover;">
        <div class="small-12 large-12">
            <h1>Healthy. Happy.</h1>
            <h2>We're here to help you live well with eczema</h2>
            <a href="/enews"><input type="submit" value="SIGN UP"></a>
        </div>
    </section>
    <section id="mission-statement">
        <div class="small-12 large-12">
            <h2>Improving the health and quality of life for individuals with eczema through research, support and education</h1>
        </div>
    </section>
    <section id="social" class="wow fadeInRight" data-wow-duration=".5s" data-wow-offset="100">
        <div class="row">
            <h1>CONNECT TO OUR COMMUNITY</h1>
            <h2>Need support? You found the right network</h2>
            <div class="small-12 large-3 columns">
                <a href="https://www.facebook.com/nationaleczema/posts/1143502652389276" class="card-link" target="_blank">
                    <div class="card">
                        <div id="facebook" class="image">
                            <img src="<?php echo get_stylesheet_directory_uri();?>/images/home/Facebook.svg">
                        </div>
                        <div class="copy">
                            <p>Hot temperatures, or sudden changes in temperature, can be poorly tolerated by people with eczema.</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="small-12 large-3 columns">
                <a href="http://www.twitter.com/nationaleczema" class="card-link" target="_blank">
                    <div class="card">
                        <div id="twitter" class="image">
                            <img src="<?php echo get_stylesheet_directory_uri();?>/images/home/Twitter.svg">
                        </div>
                        <div class="copy">
                            <p>Do you think <strong>#eczema</strong> affects people’s happiness? <strong>#ExposingEczema</strong></p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="small-12 large-3 columns">
                <a href="https://www.inspire.com/groups/national-eczema-association/discussion/the-ideal-moisturizer/" class="card-link" target="_blank">
                    <div class="card">
                        <div id="forum" class="image" style="background-position-y:-200px">
                            <img src="<?php echo get_stylesheet_directory_uri();?>/images/home/support-forum.svg">
                        </div>
                        <div class="copy">
                            <p>The Ideal Moisturizer - Expert post from Steven Q. Wang, MD</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="small-12 large-3 columns">
                <a href="https://www.youtube.com/user/NationalEczema/videos" class="card-link" target="_blank">
                    <div class="card">
                        <div id="youtube" class="image" style="background-position-y:-200px">
                            <img src="<?php echo get_stylesheet_directory_uri();?>/images/home/Youtube.svg">
                        </div>
                        <div class="copy">
                            <p>We're calling on you to raise your hand and raise your voice.</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>
    <section id="about-boxes" class="wow fadeInLeft" data-wow-duration="1s" data-wow-offset="100">
        <div class="row">
            <h1 class="section-title">Understanding Eczema</h1>
            <div class="small-12 large-6 columns">
            <img src="<?php echo get_stylesheet_directory_uri();?>/images/home/about/questionmark.svg">
                <a href="/eczema"><h1>What is Eczema?</h1></a>
                <h2>Learn about the different types of eczema</h2>
            </div>
            <div class="small-12 large-6 columns">
                <img src="<?php echo get_stylesheet_directory_uri();?>/images/home/about/water.svg">
                <a href="/eczema/treatment"><h1>Take Better Care</h1></a>
                <h2>Get the info you need to know for greater eczema care and control</h2>
            </div>
            <div class="small-12 large-6 columns">
                <img src="<?php echo get_stylesheet_directory_uri();?>/images/home/about/child.svg">
                <a href="/eczema/child-eczema"><h1>Eczema in Childhood </h1></a>
                <h2>Learn the facts about this common rash, which usually starts during infancy</h2>
            </div>
            <div class="small-12 large-6 columns">
                <img src="<?php echo get_stylesheet_directory_uri();?>/images/home/about/hand.svg">
                <a href="/eczema/types-of-eczema/hand-eczema"><h1> Protect Your Hands</h1></a>
                <h2>Discover which irritants to avoid, and how to protect your hands at work</h2>
            </div>
        </div>
    </section>
    <section id="news" class="wow fadeInRight" data-wow-duration="1s" data-wow-offset="100">
        <div class="row">
            <a href="/news"><h1 class="section-title">Latest News</h1></a>
        <?php
        $args_news = array(
            'post_type' => 'post',
            'posts_per_page' => 2,
        );
        // The Query
        $the_query_news = new WP_Query( $args_news );

        // The Loop
        if ( $the_query_news->have_posts() ) {
        // NEWS
            while ( $the_query_news->have_posts() ) {
                $the_query_news->the_post();
                $excerpt_content = get_the_excerpt();
                $excerpt = substr($excerpt_content, 0, 200); ?>
                        <div class="small-12 large-10">
                        <h1><a href="<?php echo get_permalink(); ?>"><?php the_title() ?></a></h1>
                        <p class="grey"><?php echo $excerpt; ?>&hellip;</p>
                        <a class="green news-read-more" href="<?php echo get_permalink(); ?>" class="">Read More &#187;</a>
                        </div>
            <?php }
        }
        wp_reset_postdata(); ?>
        </div>
    </section><!--news-->
</div>

<?php get_footer(); ?>
