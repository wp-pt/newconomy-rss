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

if ( $rss_items ) {
    echo '<ul class="newconomy-rss">';
    foreach ( $rss_items as $item ) {
        echo '<li class="newconomy-rss__item">';
        echo '<a class="newconomy-rss__link" target="_blank" rel="nofollow" href="' . '/rss-item/' . $item->get_id() . '">' . $item->get_title() . '</a>';
        echo '<div class="newconomy-rss__datetime">'.$item->get_date('j F Y | g:i a') . '</div>';
        echo '</li>';
    }
    echo '</ul>';
}


