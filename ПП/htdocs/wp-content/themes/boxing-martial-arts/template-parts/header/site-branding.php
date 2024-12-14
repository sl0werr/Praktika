<?php
/*
* Display Logo and nav
*/
?>

<?php
$boxing_martial_arts_sticky = get_theme_mod('boxing_martial_arts_sticky');
    $boxing_martial_arts_data_sticky = "false";
    if ($boxing_martial_arts_sticky) {
    $boxing_martial_arts_data_sticky = "true";
    }
    global $wp_customize;
?>

<div class="headerbox <?php if( is_user_logged_in() && !isset( $wp_customize ) ){ echo "login-user";} ?>" data-sticky="<?php echo esc_attr($boxing_martial_arts_data_sticky); ?>">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-4 col-sm-4 align-self-center">
       <?php $boxing_martial_arts_logo_settings = get_theme_mod( 'boxing_martial_arts_logo_settings','Different Line');
          if($boxing_martial_arts_logo_settings == 'Different Line'){ ?>
            <div class="logo">
              <?php if( has_custom_logo() ) boxing_martial_arts_the_custom_logo(); ?>
              <?php if(get_theme_mod('boxing_martial_arts_site_title',true) == 1){ ?>
                <?php if (is_front_page() || is_home()) : ?>
                  <h1 class="text-capitalize">
                      <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>
                  </h1>
                <?php else : ?>
                  <p class="text-capitalize site-title">
                      <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>
                  </p>
                <?php endif; ?>
              <?php }?>
              <?php $boxing_martial_arts_description = get_bloginfo( 'description', 'display' );
              if ( $boxing_martial_arts_description || is_customize_preview() ) : ?>
                <?php if(get_theme_mod('boxing_martial_arts_site_tagline',false)){ ?>
                  <p class="site-description mb-0"><?php echo esc_html($boxing_martial_arts_description); ?></p>
                <?php }?>
              <?php endif; ?>
            </div>
          <?php }else if($boxing_martial_arts_logo_settings == 'Same Line'){ ?>
            <div class="logo logo-same-line mb-md-0 text-center text-lg-start">
              <div class="row">
                <div class="col-lg-5 col-md-5 align-self-md-center">
                  <?php if( has_custom_logo() ) boxing_martial_arts_the_custom_logo(); ?>
                </div>
                <div class="col-lg-7 col-md-7 align-self-md-center">
                  <?php if(get_theme_mod('boxing_martial_arts_site_title',true) == 1){ ?>
                    <?php if (is_front_page() || is_home()) : ?>
                      <h1 class="text-capitalize">
                          <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>
                      </h1>
                    <?php else : ?>
                      <p class="text-capitalize site-title">
                          <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>
                      </p>
                    <?php endif; ?>
                    <?php }?>
                    <?php $boxing_martial_arts_description = get_bloginfo( 'description', 'display' );
                    if ( $boxing_martial_arts_description || is_customize_preview() ) : ?>
                    <?php if(get_theme_mod('boxing_martial_arts_site_tagline',false)){ ?>
                      <p class="site-description mb-0"><?php echo esc_html($boxing_martial_arts_description); ?></p>
                    <?php }?>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          <?php }?>
      </div>
      <div class="col-lg-6 col-md-4 col-sm-2 col-3 align-self-center">
        <?php
          get_template_part( 'template-parts/navigation/site', 'nav' );
        ?>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-6 col-9 align-self-center">
       <div class="join-btn text-md-end text-center">
          <?php if( get_theme_mod( 'boxing_martial_arts_membership_link' ) != '' || get_theme_mod( 'boxing_martial_arts_membership_button' ) != '') { ?>
            <a href="<?php echo esc_url( get_theme_mod( 'boxing_martial_arts_membership_link','' ) ); ?>" class="register-btn"><?php echo esc_html( get_theme_mod( 'boxing_martial_arts_membership_button','' ) ); ?><i class="fas fa-arrow-right px-2"></i></a>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>