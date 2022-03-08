<?php

$args = array(
  'post_type' => 'post', /* product post type */
  'posts_per_page' => -1 /* all products */
);

$all_posts = new WP_Query( $args );

// check if products exists
if( $all_posts->have_posts() ) {

  // loop products
  while( $all_posts->have_posts() ): $all_posts->the_post();
    
    $publish_date = get_the_date( 'F j, Y' );
  // check if field exists
  if( !get_field( 'last_modified_date' ) ) {
        update_field('last_modified_date', $publish_date, get_the_ID());
  }
  
  endwhile; 

  // reset query to default query
  wp_reset_postdata();

}
