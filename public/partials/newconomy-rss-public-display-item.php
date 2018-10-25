<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://zorca.org
 * @since      1.0.0
 *
 * @package    Newconomy_Rss
 * @subpackage Newconomy_Rss/public/partials
 */

if ( $rss_item_current ) {
    echo '<h1>' . $rss_item_current->get_title() . '</h1>';
    echo '<p>' . $rss_item_current->get_description() . '</p>';
    echo '<div><span>Original Article Source:</span> <a target="_blank" rel="nofollow" href="' . $rss_item_current->get_permalink() . '">' . $rss_item_current->get_title() . '</a></div>';
} else {
    status_header( 404 );
    nocache_headers();
    include( get_query_template( '404' ) );
}
