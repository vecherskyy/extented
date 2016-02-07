

<?php get_header(); ?>
    
    <div class="page-title">
        
    	<h1><?php the_title(); ?></h1>
        <p class="page-title-map"><a href="<?php echo home_url(); ?>">Home</a> / <?php the_title(); ?></p>
    </div>
    
    <div class="content-main">

        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <?php the_post_thumbnail('full', array('class' => 'img-lefter')); ?>
         <h1 class="center-n"><span class="hnc"><?php the_title(); ?></span></h1>
         <?php the_content( ); ?>
        <?php endwhile; ?>
        <!-- post navigation -->
        <?php else: ?>
        <!-- no posts found -->
        <?php endif; ?>
    
           
    </div>
    
   <?php get_footer(); ?>