<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://zorca.org
 * @since      1.0.0
 *
 * @package    Newconomy_Rss
 * @subpackage Newconomy_Rss/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<div class="wrap">
    <h1>Newconomy RSS Options</h1>
    <form method="POST">
        <label for="newconomy_rss_options_channel">Channel</label>
        <input type="text" name="newconomy_rss_options_channel" id="newconomy_rss_options_channel" value="<?php echo $newconomy_rss_options_channel; ?>">
        <input type="submit" value="Save" class="button button-primary button-large">
    </form>
</div>
