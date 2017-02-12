<?php
/**
 * Template Name: Enews
 */

get_header();
global $slider;
global $home_meta;
global $search_meta;
$slider->the_meta();
$home_meta->the_meta();
$search_meta->the_meta();
?>
<div id="enews">
  <section id="sign-up-top">
    <div class="row">
      <div class="small-12 large-12">
        <h1 class="title">There’s no place like “home”</h1>
        <p class="subhead">Up to 10 million eczema-triggering dust mites could be living inside your old mattress. Know what’s lurking in yours? </p>
      </div>
      <div class="small-12 large-6 columns checklist">
        <p><span><img src="<?php echo get_stylesheet_directory_uri();?>/images/icon/checkbox.svg"></span>Get the dirt on common allergens that share your home — like dust mites, mold, and pet dander.</p>
        <p><span><img src="<?php echo get_stylesheet_directory_uri();?>/images/icon/checkbox.svg"></span>Learn practical tips that maximize cleaning, to rid your home of unwelcome pests.</p>
        <p><span><img src="<?php echo get_stylesheet_directory_uri();?>/images/icon/checkbox.svg"></span>Discover the most unlikely places allergens could be hiding — like your child’s stuffed animals.</p>
        <p><span><img src="<?php echo get_stylesheet_directory_uri();?>/images/icon/checkbox.svg"></span>Learn which household cleaning products are the safest and most effective, plus how to prevent skin irritation.</p>
      </div>
      <div class="small-12 large-6 columns email-capture-box">
          <h2>Sign up to receive more eczema hacks! </h2>
          <p>Plus the NEA pack of digital guides for newly diagnosed patients</p>
          <!-- <input type="email" placeholder="Email">
          <input type="text" placeholder="Zip">
          <input type="submit" value="Get Free E-news"> -->

          <!-- form below for live site only -->
          <div id="enews-email-capture-upper">
              <?php gravity_form(43, false, false, false, '', true, 345); ?>
          </div>
          <!-- form below for dev server only -->
          <!-- <div id="enews-email-capture-upper">
              <?php gravity_form(5, false, false, false, '', true, 345); ?>
          </div> -->

      </div>
    </div>
  </section>
  <section id="enews-quote">
    <div class="row">
      <div class="small-12 large-12 quote">
        <div class="holder wow fadeInLeft" data-wow-duration="3s">
          <h1>“What does laundry have to do with eczema? A whole lot!”</h1>
          <span>- Jennifer Roberge,<br> on how simple changes to her laundry routine helped reduce her son’s eczema symptoms</span>
        </div>
      </div>
    </div>
  </section>
  <section id="benifits">
      <div class="row">
        <div class="small-12 large-6 columns wow fadeInLeft" data-wow-duration="2s">
          <p>Sign up to get help with...</p>
        </div>
        <div class="small-12 large-6 columns wow fadeInRight" data-wow-duration="2s">
          <p><span><img src="<?php echo get_stylesheet_directory_uri();?>/images/icon/heart.svg"></span>Diet & Lifestyle </p>
          <p><span><img src="<?php echo get_stylesheet_directory_uri();?>/images/icon/hand.svg"></span>Managing Triggers </p>
          <p><span><img src="<?php echo get_stylesheet_directory_uri();?>/images/icon/people.svg"></span>NEA-Approved Products</p>
          <p><span><img src="<?php echo get_stylesheet_directory_uri();?>/images/icon/beaker.svg"></span>Treatment Options </p>
        </div>
      </div>
  </section>
  <section id="sign-up-bottom">
    <div class="row email-capture-box landscape">
      <div class="small-12 large-12">
        <h2>Sign up and get health tips</h2>
        <!-- <input type="email" placeholder="Email">
        <input type="text" placeholder="Zip">
        <input type="submit" value="Sign Up"> -->

        <!-- form below for live site only -->
        <div id="enews-email-capture-lower">
            <?php gravity_form(42, false, false, false, '', true, 567); ?>
        </div>
        <!-- form below for dev server only -->
        <!-- <div id="enews-email-capture-lower">
            <?php gravity_form(6, false, false, false, '', true, 567); ?>
        </div> -->
      </div>
    </div>
  </section>
  <section id="footer-text">
    <div class="row">
      <!-- <p>You don't have to struggle with the symptoms of psoriatic disease. Sign up for our newsletter and get the info you need to take control, live healthfully and thrive. Our newsletter reaches more than 400,000 people affected by psoriasis and psoriatic arthritis.</p> -->
    </div>
  </section>
</div>

<?php get_footer(); ?>
