<?php
/**
 * Plugin Name: WPGraphQL increase limits
 * Version: 1.0
 * Author: Liam Martens
 */

add_filter( 'graphql_post_object_connection_query_args', function( $query_args, $source, $args, $context, $info ) {
  // Make sure we don't override the first/last input which sets the amount to request
  if (!isset( $args['first'] ) && ! isset( $args['last'] ) ) {
      $query_args['posts_per_page'] = PHP_INT_MAX;
  }
  return $query_args;
}, 10, 5 );

add_filter( 'graphql_connection_max_query_amount', function( $amount, $source, $args, $context, $info  ) {
  return PHP_INT_MAX;
}, 10, 5 );
