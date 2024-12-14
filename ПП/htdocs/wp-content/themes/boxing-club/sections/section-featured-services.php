<?php 
/**
 * Template part for displaying Featured Courses Section
 *
 *@package Boxing Club
 */
    $featured_services_section_title      = boxing_club_get_option( 'featured_services_section_title' );
    $featured_services_column                  = boxing_club_get_option( 'featured_services_column' );
    $featured_services_content_type            = boxing_club_get_option( 'featured_services_content_type' );
    $number_of_featured_services_items         = boxing_club_get_option( 'number_of_featured_services_items' );
    $featured_services_category                = boxing_club_get_option( 'featured_services_category' );

    if( $featured_services_content_type == 'featured_services_page' ) :
        for( $i=1; $i<=$number_of_featured_services_items; $i++ ) :
            $featured_services_posts[] = boxing_club_get_option( 'featured_services_page_'.$i );
        endfor;  
    elseif( $featured_services_content_type == 'featured_services_post' ) :
        for( $i=1; $i<=$number_of_featured_services_items; $i++ ) :
            $featured_services_posts[] = boxing_club_get_option( 'featured_services_post_'.$i );
        endfor;
    endif;
    ?>
    <?php if( !empty($featured_services_section_title) ):?>
    <div class="title-section">
        <h1><?php echo esc_html($featured_services_section_title);?></h1>
        <img src="<?php echo esc_url(get_template_directory_uri()."/assets/images/boxing-gloves.png")?>">
    </div>
    <?php endif;?>
    <?php if( $featured_services_content_type == 'featured_services_page' ) : ?>
        <div class="section-content <?php echo esc_attr($featured_services_column); ?> clear">
            <?php $args = array (
                'post_type'     => 'page',
                'posts_per_page' => absint( $number_of_featured_services_items ),
                'post__in'      => $featured_services_posts,
                'orderby'       =>'post__in',
            );        
            $loop = new WP_Query($args);                        
            if ( $loop->have_posts() ) :
            $i=-1; $j=0; 
                while ($loop->have_posts()) : $loop->the_post(); $i++; $j++;
                $featured_services_icon[$j] = boxing_club_get_option( 'featured_services_icon_'.$j ); ?>          
                
                <article>
                    <div class="featured-service-item">
                        <div class="entry-container">

                            
                            <div class="content-image">
                                <?php if (has_post_thumbnail( $post->ID ) ): ?>
                                <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                                <div class="image-container" style="background-image: url(<?php echo $image[0]; ?>);">
                                
                                </div>
                                <?php endif; ?>

                                <header class="entry-header">
                                    <h2 class="entry-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                                </header>
                            </div>

                            <div class="entry-content">
                                <?php
                                    $excerpt = boxing_club_the_excerpt( 20 );
                                    echo wp_kses_post( wpautop( $excerpt ) );
                                ?>
                            </div><!-- .entry-content -->
                            <div class="button-content">
                                <a href="<?php the_permalink(); ?>">
                                Read More
                                </a>
                            </div><!-- .button-content -->
                        </div><!-- .entry-container -->
                    </div><!-- .featured-service-item -->
                </article>

                <?php endwhile; ?>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
        </div><!-- .section-content -->
    
    <?php else: ?>
        <div class="section-content <?php echo esc_attr($featured_services_column); ?> clear">
            <?php $args = array (
                'post_type'     => 'post',
                'posts_per_page' => absint( $number_of_featured_services_items ),
                'post__in'      => $featured_services_posts,
                'orderby'       =>'post__in',
                'ignore_sticky_posts' => true,
            );        
            $loop = new WP_Query($args);                        
            if ( $loop->have_posts() ) :
            $i=-1; $j=0; 
                while ($loop->have_posts()) : $loop->the_post(); $i++; $j++;
                $featured_services_icon[$j] = boxing_club_get_option( 'featured_services_icon_'.$j ); ?>  
                
                <article>
                    <div class="featured-service-item">
                        <div class="entry-container">

                            <div class="content-image">
                                <?php if (has_post_thumbnail( $post->ID ) ): ?>
                                <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                                <div class="image-container" style="background-image: url(<?php echo $image[0]; ?>);">
                                
                                </div>
                                <?php endif; ?>

                                <header class="entry-header">
                                    <h2 class="entry-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                                </header>
                            </div>

                            <div class="entry-content">
                                <?php
                                    $excerpt = boxing_club_the_excerpt( 20 );
                                    echo wp_kses_post( wpautop( $excerpt ) );
                                ?>
                            </div><!-- .entry-content -->
                            <div class="button-content">
                                <a href="<?php the_permalink(); ?>">
                                Read More
                                </a>
                            </div><!-- .button-content -->
                        </div><!-- .entry-container -->
                    </div><!-- .featured-service-item -->
                </article>

                <?php endwhile; ?>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
        </div><!-- .section-content -->
    <?php endif;