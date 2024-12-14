<?php
/**
 * Template part for displaying matches section
 *
 * @package Boxing Martial Arts
 * @subpackage boxing_martial_arts
 */

?>
<?php $boxing_martial_arts_static_image= get_stylesheet_directory_uri() . '/assets/images/sliderimage.png'; ?>
<?php if( get_theme_mod( 'boxing_martial_arts_matches_enable',false ) != '') { ?>

<section id="matches" class="my-5">
  <div class="container">
  	<div class="match-heading text-center">
  		<?php if( get_theme_mod( 'boxing_martial_arts_matches_sub_heading' ) != '') { ?>
	        <p class="mb-3"><?php echo esc_html(get_theme_mod('boxing_martial_arts_matches_sub_heading')); ?></p>
	     <?php }?>
  		<?php if( get_theme_mod( 'boxing_martial_arts_matches_heading' ) != '') { ?>
	        <h2><?php echo esc_html(get_theme_mod('boxing_martial_arts_matches_heading')); ?></h2>
	     <?php }?>
  	</div>
  	<div class="row">
	 <?php
    $post_category = get_theme_mod('boxing_martial_arts_matches_section_category');
    if($post_category){
      $page_query = new WP_Query(array( 'category_name' => esc_html( $post_category ,'boxing-martial-arts')));?>
      <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
      		<div class="col-lg-6 col-md-6 col-sm-6">
      			<div class="match-box my-5">
      				<div class="row">
	      				<div class="col-lg-6 px-lg-0 main-match">
		        		<?php if(has_post_thumbnail()){ ?>
	         					<img src="<?php the_post_thumbnail_url('full'); ?>"/> <?php }else {echo ('<img src="'. esc_url($boxing_martial_arts_static_image).'">'); } ?>
	            	</div>
	          		<div class="col-lg-6"> 
			            <div class="demo-box">
			              <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			              <p class="mb-5"><?php echo wp_trim_words( get_the_content(),20 );?></p>
			              	<i class="far fa-clock px-2 mb-2"></i><?php echo esc_html (get_the_time()) ; ?>
			              	<br>
			              	 <?php if( get_post_meta($post->ID, 'boxing_martial_arts_location', true) ) {?>
			                  <p><i class="fas fa-map-marker-alt px-2"></i><?php echo esc_html(get_post_meta($post->ID,'boxing_martial_arts_location',true)); ?></p>
			                <?php } ?>
			            </div>
	          		</div>
	          		<div class="box-btn text-center">
	              	<a href="<?php the_permalink(); ?>"><?php esc_html_e('GET DETAILS','boxing-martial-arts'); ?><i class="fas fa-arrow-right ml-2"></i></a>
	            	</div>
      				</div>
      			</div>
      		</div>
  		<?php endwhile;
        wp_reset_postdata();
      	}
    	?> 
    	</div>
    </div>
</section>

<?php }?>
