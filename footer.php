<?php
/** FOOTER */
?>
    </div><!-- #container -->
	<div class="footer">
		<div class="row">
      <div class="small-12 large-3 columns">
        <a class="footer-menu-title" href="/">NEA</a>
        <?php wp_nav_menu( array('menu' => 'Footer Menu - 1', 'menu_class' => 'nea-footer-menu-1', )); ?>
      </div>
      <div class="small-12 large-3 columns">
        <a class="footer-menu-title" href="/about-nea">ABOUT</a>
        <?php wp_nav_menu( array('menu' => 'Footer Menu - 2', 'menu_class' => 'nea-footer-menu-2', )); ?>
      </div>
      <div class="small-12 large-3 columns">
        <a class="footer-menu-title" href="#">CONNECT</a>
				<?php wp_nav_menu( array('menu' => 'Footer Menu - 3', 'menu_class' => 'nea-footer-menu-3', )); ?>
      </div>
      <div class="small-12 large-3 columns last-footer-column">
        <a href="https://www.nationalhealthcouncil.org/resources/standards-excellence-certification-program" target="_blank">
        <img id="nhc-logo" src="<?php echo get_stylesheet_directory_uri();?>/images/nhc.jpg"></a>
      </div>
		</div>
	</div>
	</div><!-- #site -->
<?php wp_footer(); ?>
</body>
<!-- <script src="<?php echo get_template_directory_uri(); ?>/js/nea-footer.js"></script> -->
<!-- this site is being served from SiteGround -->
</html>
