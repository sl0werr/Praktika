<?php
/**
 * Template part for displaying slider section
 *
 * @package Boxing Martial Arts
 * @subpackage boxing_martial_arts
 */

?>
<?php $boxing_martial_arts_static_image= get_stylesheet_directory_uri() . '/assets/images/sliderimage.png'; ?>
<?php if( get_theme_mod( 'boxing_martial_arts_slider_arrows') != '') { ?>
  <section id="slider">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <?php $boxing_martial_arts_slide_pages = array();
      for ( $boxing_martial_arts_count = 1; $boxing_martial_arts_count <= 4; $boxing_martial_arts_count++ ) {
        $mod = intval( get_theme_mod( 'boxing_martial_arts_slider_page' . $boxing_martial_arts_count ));
        if ( 'page-none-selected' != $mod ) {
          $boxing_martial_arts_slide_pages[] = $mod;
        }
      }
      if( !empty($boxing_martial_arts_slide_pages) ) :
        $boxing_martial_arts_args = array(
          'post_type' => 'page',
          'post__in' => $boxing_martial_arts_slide_pages,
          'orderby' => 'post__in'
        );
        $boxing_martial_arts_query = new WP_Query( $boxing_martial_arts_args );
        if ( $boxing_martial_arts_query->have_posts() ) :
          $i = 1;
    ?>
    <div class="carousel-inner" role="listbox">
      <?php  while ( $boxing_martial_arts_query->have_posts() ) : $boxing_martial_arts_query->the_post(); ?>
        <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
          <?php if(has_post_thumbnail()){ ?>
              <img src="<?php the_post_thumbnail_url('full'); ?>"/> <?php }else {echo ('<img src="'. esc_url($boxing_martial_arts_static_image).'">'); } ?>
          <div class="carousel-caption">
            <div class="inner_carousel">
              <?php if( get_theme_mod( 'boxing_martial_arts_slider_short_heading' ) != '' ) { ?>
                <p class="slider-text"><?php echo esc_html( get_theme_mod( 'boxing_martial_arts_slider_short_heading','' ) ); ?></p>
              <?php } ?>
              <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
              <p><?php echo esc_html( wp_trim_words( get_the_content(), 20 ) );?></p>
            </div>
          </div>
           <div class="joiner-box">
            <?php if( get_theme_mod( 'boxing_martial_arts_slider_second_img' ) != '') { ?>
              <img src="<?php echo esc_attr( get_theme_mod( 'boxing_martial_arts_slider_second_img','' ) ); ?>">
            <?php } ?>
            <p><?php echo esc_html( get_theme_mod( 'boxing_martial_arts_slider_join_text','' ) ); ?></p>
              <div class="more-btn">
                <a href="<?php the_permalink(); ?>"><?php esc_html_e('READ MORE','boxing-martial-arts'); ?><i class="fas fa-arrow-right px-2"></i></a>
              </div>
          </div>
        </div>

      <?php $i++; endwhile;
      wp_reset_postdata();?>
    </div>
    <?php else : ?>
        <div class="no-postfound"></div>
      <?php endif;
    endif;?>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-angle-left"></i></span>
      <span class="screen-reader-text"><?php esc_html_e('Previous','boxing-martial-arts'); ?></span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-angle-right"></i></span>
      <span class="screen-reader-text"><?php esc_html_e('Next','boxing-martial-arts'); ?></span>
    </a>
  </div>
  <div class="clearfix"></div>
</section>

<?php } ?>
