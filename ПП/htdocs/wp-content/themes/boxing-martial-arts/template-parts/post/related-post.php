<?php

$boxing_martial_arts_post_args = array(
    'posts_per_page'    => get_theme_mod( 'boxing_martial_arts_related_post_per_page', 3 ),
    'orderby'           => 'rand',
    'post__not_in'      => array( get_the_ID() ),
);

$related = wp_get_post_terms( get_the_ID(), 'category' );
$boxing_martial_arts_ids = array();
foreach( $related as $term ) {
    $boxing_martial_arts_ids[] = $term->term_id;
}

$boxing_martial_arts_post_args['category__in'] = $boxing_martial_arts_ids; 

$related_posts = new WP_Query( $boxing_martial_arts_post_args );

if ( $related_posts->have_posts() ) : ?>
        <div class="related-post-block">
        <h3 class="text-center mb-3"><?php esc_html_e('Related Posts','boxing-martial-arts'); ?></h3>
        <div class="row">
            <?php while ( $related_posts->have_posts() ) : $related_posts->the_post(); ?>
                <div class="col-lg-4 col-md-6">
                    <div id="category-post">
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <div class="page-box">
                                <?php if(has_post_thumbnail()) { ?>
                                        <?php the_post_thumbnail();  ?>    
                                <?php } ?>
                                <div class="box-content text-center">
                                    <h4 class="text-center py-2"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php the_title();?></a></h4>
                                    <div class="box-info">
                                        <?php $blog_archive_ordering = get_theme_mod('blog_meta_order', array('date', 'author', 'comment', 'category'));
                                        foreach ($blog_archive_ordering as $blog_data_order) : 
                                            if ('date' === $blog_data_order) : ?>
                                              <i class="far fa-calendar-alt mb-1"></i><span class="entry-date"><?php echo get_the_date('j F, Y'); ?></span>
                                            <?php elseif ('author' === $blog_data_order) : ?>
                                              <i class="fas fa-user mb-1"></i><span class="entry-author"><?php the_author(); ?></span>
                                            <?php elseif ('comment' === $blog_data_order) : ?>
                                              <i class="fas fa-comments mb-1"></i><span class="entry-comments"><?php comments_number(__('0 Comments', 'boxing-martial-arts'), __('0 Comments', 'boxing-martial-arts'), __('% Comments', 'boxing-martial-arts')); ?></span>
                                            <?php elseif ('category' === $blog_data_order) :?>
                                                        <i class="fas fa-list mb-1"></i><span class="entry-category"><?php boxing_martial_arts_display_post_category_count(); ?></span>
                                            <?php endif;
                                        endforeach; ?>
                                    </div>
                                    <p><?php echo wp_trim_words(get_the_content(), get_theme_mod('boxing_martial_arts_excerpt_count',10) );?></p>
                                    <?php if(get_theme_mod('boxing_martial_arts_remove_read_button',true) != ''){ ?>
                                    <div class="readmore-btn text-center mb-1">
                                        <a href="<?php echo esc_url( get_permalink() );?>" class="blogbutton-small" title="<?php esc_attr_e( 'Read More', 'boxing-martial-arts' ); ?>"><?php echo esc_html(get_theme_mod('boxing_martial_arts_read_more_text',__('Read More','boxing-martial-arts')));?></a>
                                    </div>
                                    <?php }?>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </article>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
<?php endif;
wp_reset_postdata();