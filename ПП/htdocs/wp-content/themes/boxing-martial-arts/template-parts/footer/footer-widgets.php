<?php
/**
 * Displays footer widgets if assigned
 *
 * @package Boxing Martial Arts
 * @subpackage boxing_martial_arts
 */

?>
<?php

// Determine the number of columns dynamically for the footer (you can replace this with your logic).
$boxing_martial_arts_number_of_footer_columns = get_theme_mod('boxing_martial_arts_footer_columns', 4); // Change this value as needed.

// Calculate the Bootstrap class for large screens (col-lg-X) for footer.
$col_lg_footer_class = 'col-lg-' . (12 / $boxing_martial_arts_number_of_footer_columns);

// Calculate the Bootstrap class for medium screens (col-md-X) for footer.
$boxing_martial_arts_col_md_footer_class = 'col-md-' . (12 / $boxing_martial_arts_number_of_footer_columns);
?>
<div class="container">
    <aside class="widget-area row pt-3" role="complementary" aria-label="<?php esc_attr_e( 'Footer', 'boxing-martial-arts' ); ?>">
        <div class="<?php echo esc_attr($col_lg_footer_class); ?> <?php echo esc_attr($boxing_martial_arts_col_md_footer_class); ?>">
            <?php dynamic_sidebar('footer-1'); ?>
        </div>
        <?php
        // Footer boxes 2 and onwards.
        for ($i = 2; $i <= $boxing_martial_arts_number_of_footer_columns; $i++) :
            if ($i <= $boxing_martial_arts_number_of_footer_columns) :
                ?>
               <div class="col-12 <?php echo esc_attr($col_lg_footer_class); ?> <?php echo esc_attr($boxing_martial_arts_col_md_footer_class); ?>">
                    <?php dynamic_sidebar('footer-' . $i); ?>
                </div><!-- .footer-one-box -->
                <?php
            endif;
        endfor;
        ?>
    </aside>
</div>