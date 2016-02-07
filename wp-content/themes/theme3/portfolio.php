<?php get_header(); ?>

 <div class="page-title">
        <?php $cat = get_the_category(); ?>
    	<h1><?php echo $cat[0]->name ?></h1>
        <p class="page-title-map"><a href="<?php echo home_url(); ?>">Home</a>  / <a href="<?php get_category_link($cat[0]->cat_ID ); ?>"><?php echo $cat[0]->name; ?></a> / <?php the_title(); ?></p>
 </div>

 <?php 
 $gallery = get_post_meta( $post->ID, 'gallery', true ); 
 if(!empty($gallery)): $gallery = explode(",", $gallery); ?>
 <div class="slider-porfolio">
        <div class="flexslider">
          <ul class="slides">
			<?php foreach($gallery as $item) : ?>
				<li>            	
  	    	    <?php echo wp_get_attachment_image( $item, 'full'); ?>
                <img src="<?php bloginfo('template_url' ) ?>/images/portfolio-shadow.png" alt="" />
  	    		</li>
			<?php endforeach; ?>
           </ul>
       </div>
   </div>
 <?php endif; ?>


    <div class="content-main">
    	
        <div class="content-left">
        	<h2 class="projeact-descrip"><span><img src="<?php bloginfo('template_url' ); ?>/images/progect-descript.jpg" alt="" /> Project Description</span></h2>
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <?php the_content( ); ?>
            <?php endwhile; ?>
            <!-- post navigation -->
            <?php else: ?>
            <!-- no posts found -->
            <?php endif; ?>
            </div>
        
        <div class="right-bar">
        	<?php if(!dynamic_sidebar('single_portfolio')){ echo "<h2>Место для виджета</h2>";}?>
        	 
        </div>
        
        <div class="clr"></div><br />

        <?php
        $tags = strip_tags(my_list_tags(false));
        if($tags){
        	//получаем номер категории
        	$cat = get_the_category();
        	$cat = $cat[0]->cat_ID;
        	$args = array(
        		'cat' => $cat,
        		'tag' =>$tags,
        		'posts_per_page' => 4,
        		'post__not_in' =>array($post->ID)
        		);
        }
        $posts_related = new WP_Query($args);
        ?>

        <?php if ( $posts_related->have_posts() ) : ?>
        <h1 class="center-n"><span class="hnc">Related Projects</span></h1> 
        <div class="our-works-main">
        <?php while ( $posts_related->have_posts() ) : $posts_related->the_post(); ?>
        
		<div class="our-works">
            	<a class="our-work-href" href="<?php the_permalink(); ?>">                    
                     <img class="our-work-img" src="<?php echo get_post_meta( $post->ID, 'portfolio_img', true); ?>" alt="" />
                </a>
            </div>

        <?php endwhile; ?>
       </div> 
        <?php else: ?>
        <div class="our-works">
        	Похожих записей нет
        </div>
        <?php endif; ?>
               
    	<!--<h1 class="center-n"><span class="hnc">Related Projects</span></h1> 
        <div class="our-works-main">
        	<div class="our-works">
            	<a class="our-work-href" href="#">                    
                    <img class="our-work-img" src="images/our-work1.jpg" alt="" />
                </a>
            </div>
            <div class="our-works">
                <a class="our-work-href" href="#">
                    <img class="our-work-img" src="images/our-work2.jpg" alt="" />
                </a>
            </div>
            <div class="our-works">
                <a class="our-work-href" href="#">
                    <img class="our-work-img" src="images/our-work3.jpg" alt="" />
                </a>
            </div>
            <div class="our-works">
                <a class="our-work-href" href="#">
                    <img class="our-work-img" src="images/our-work4.jpg" alt="" />
                </a>
            </div>
        </div>-->
           
    </div>
<?php get_footer( ); ?>