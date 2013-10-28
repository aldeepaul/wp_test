<div class="wrap">
    <h2>SB Live Events</h2>
    <form method="post" action="options.php"> 
        <?php @settings_fields('sb-popular-events-group'); ?>
        <?php @do_settings_fields('sb-popular-events-group'); ?>

        <table class="form-table">  
            <tr valign="top">
                <th scope="row"><label for="setting_a">Endpoint</label></th>
                <td><input type="text" name="sb_popular_endpoint_name" id="sb_popular_endpoint_name" value="<?php echo get_option('sb_popular_endpoint_name'); ?>" /></td>
            </tr>
            <tr valign="top">
                <th scope="row"><label for="setting_b">Number of Events</label></th>
                <td><input type="text" name="sb_popular_number_of_events" id="sb_popular_number_of_events" value="<?php echo get_option('sb_popular_number_of_events'); ?>" /></td>
            </tr>
        </table>

        <?php @submit_button(); ?>
    </form>
</div>