<?php 
/**
 * Template part for displaying Featured features Section
 *
 *@package Boxing Club
 */
    $featured_features_column                  = boxing_club_get_option( 'featured_features_column' );
    $featured_features_content_type            = boxing_club_get_option( 'featured_features_content_type' );
    $number_of_featured_features_items         = boxing_club_get_option( 'number_of_featured_features_items' );
    $featured_features_category                = boxing_club_get_option( 'featured_features_category' );

    if( $featured_features_content_type == 'featured_features_page' ) :
        for( $i=1; $i<=$number_of_featured_features_items; $i++ ) :
            $featured_features_posts[] = boxing_club_get_option( 'featured_features_page_'.$i );
        endfor;  
    elseif( $featured_features_content_type == 'featured_features_post' ) :
        for( $i=1; $i<=$number_of_featured_features_items; $i++ ) :
            $featured_features_posts[] = boxing_club_get_option( 'featured_features_post_'.$i );
        endfor;
    endif;
    ?>
    <?php if( $featured_features_content_type == 'featured_features_page' ) : ?>
        <div class="section-content <?php echo esc_attr($featured_features_column); ?> clear">
            <?php $args = array (
                'post_type'     => 'page',
                'posts_per_page' => absint( $number_of_featured_features_items ),
                'post__in'      => $featured_features_posts,
                'orderby'       =>'post__in',
            );        
            $loop = new WP_Query($args);                        
            if ( $loop->have_posts() ) :
            $i=-1; $j=0; 
                while ($loop->have_posts()) : $loop->the_post(); $i++; $j++; 
                $featured_features_icon[$j] = boxing_club_get_option( 'featured_features_icon_'.$j ); ?>          
                
                <article>
                    <div class="features-block">
                        <?php if( !empty( $featured_features_icon[$j] ) ) : ?>
                            <div class="icon-container">
                                <a href="<?php the_permalink(); ?>">
                                    <i class="<?php echo esc_attr( $featured_features_icon[$j] )?>"></i>
                                </a>
                            </div><!-- .icon-container -->
                        <?php endif; ?>
                        <h4 class="features-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
                        <div class="features-details">
                        <?php
                            $excerpt = boxing_club_the_excerpt( 12 );
                            echo wp_kses_post( wpautop( $excerpt ) );
                        ?>
                        </div>
                    </div>
                </article>

                <?php endwhile; ?>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
        </div><!-- .section-content -->
    <?php else: ?>
        <div class="section-content <?php echo esc_attr($featured_features_column); ?> clear">
            <?php $args = array (
                'post_type'     => 'post',
                'posts_per_page' => absint( $number_of_featured_features_items ),
                'post__in'      => $featured_features_posts,
                'orderby'       =>'post__in',
                'ignore_sticky_posts' => true,
            );          
            $loop = new WP_Query($args);                        
            if ( $loop->have_posts() ) :
            $i=-1; $j=0; 
                while ($loop->have_posts()) : $loop->the_post(); $i++; $j++; 
                $featured_features_icon[$j] = boxing_club_get_option( 'featured_features_icon_'.$j ); ?>          
                
                <article>
                    <div class="features-block">
                        <?php if( !empty( $featured_features_icon[$j] ) ) : ?>
                            <div class="icon-container">
                                <a href="<?php the_permalink(); ?>">
                                    <i class="<?php echo esc_attr( $featured_features_icon[$j] )?>"></i>
                                </a>
                            </div><!-- .icon-container -->
                        <?php endif; ?>
                        <h4 class="features-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
                        <div class="features-details">
                        <?php
                            $excerpt = boxing_club_the_excerpt( 12 );
                            echo wp_kses_post( wpautop( $excerpt ) );
                        ?>
                        </div>
                    </div>
                </article>

                <?php endwhile; ?>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
        </div><!-- .section-content -->
    <?php endif;