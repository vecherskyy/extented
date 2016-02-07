<div class="footer">
<?php printf(__('/%d queries /%s seconds'), get_num_queries(), timer_stop(0, 3));
 if ( function_exists('memory_get_usage') ) echo ' /' . round(memory_get_usage()/1024/1024, 2) . ' mb'; ?>
    	<p class="copy">Copyright 2012. All Right Reserved MonkeeThemes.</p>
       <?php  
                wp_nav_menu( array(
                    'theme_location' => 'footer_menu',
                    'container_class' => 'ftrmenu',
                    'menu_class' => '',
                )); ?>
    </div>
</div>
  <!-- jQuery -->
 
  <script>window.jQuery || document.write('<script src="<?php bloginfo('template_url') ?>/js/libs/jquery-1.7.min.js">\x3C/script>')</script>

  <!-- FlexSlider -->
 

  <script type="text/javascript">
    $(function(){
      $( "#accordion" ).accordion();
	  $( "#tabs" ).tabs();
    });
    $(window).load(function(){
      $('.flexslider').flexslider({
        animation: "slide",
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });
  </script>
  
  <!-- Optional FlexSlider Additions -->
  <?php wp_footer(); ?>
</body>
</html>
