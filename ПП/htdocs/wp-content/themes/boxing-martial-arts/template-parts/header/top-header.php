<?php
/*
* Display topbar details
*/
?>
<div class="topbar">
  <div class="container">
    <div class="row">
      <div class="col-lg-5 align-self-center">
         <div class="py-2">
          <?php if( get_theme_mod( 'boxing_martial_arts_topbar_text' ) != '') { ?>
            <p class="mb-0"><?php echo esc_html( get_theme_mod('boxing_martial_arts_topbar_text','')); ?></p>
          <?php } ?>
        </div>
      </div>
      <div class="col-lg-4 align-self-center">
        <div class="shop-link mb-lg-0 text-lg-end">
          <?php if( get_theme_mod( 'boxing_martial_arts_topbar_discount_text' ) != '') { ?>
            <p><?php echo esc_html( get_theme_mod('boxing_martial_arts_topbar_discount_text','')); ?><span><a target="_blank" href="<?php echo esc_url( get_theme_mod('boxing_martial_arts_shop_btn_url')); ?>"><?php esc_html_e(' | SHOP NOW','boxing-martial-arts'); ?></a></span></p>
          <?php } ?>
        </div>
      </div>
      <div class="col-lg-3 align-self-center text-lg-end">
          <?php if( get_theme_mod( 'boxing_martial_arts_mail' ) != '') { ?>
            <p class="mb-0"><a href="mailto:<?php echo esc_html( get_theme_mod('boxing_martial_arts_mail','') ); ?>"><i class="fas fa-envelope px-2"></i><?php echo esc_html( get_theme_mod('boxing_martial_arts_mail','')); ?></a></p>
          <?php } ?>
      </div>
    </div>
  </div>
</div>


