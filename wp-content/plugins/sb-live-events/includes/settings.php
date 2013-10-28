<div class="wrap">
    <h2>SB Live Events</h2>
    <form method="post" action="options.php"> 
        <?php @settings_fields('sb-live-events-group'); ?>
        <?php @do_settings_fields('sb-live-events-group'); ?>

        <table class="form-table">  
            <tr valign="top">
                <th scope="row"><label for="setting_a">Endpoint</label></th>
                <td><input type="text" name="endpoint_name" id="endpoint_name" value="<?php echo get_option('endpoint_name'); ?>" /></td>
            </tr>
            <tr valign="top">
                <th scope="row"><label for="setting_b">Number of Events</label></th>
                <td><input type="text" name="number_of_events" id="number_of_events" value="<?php echo get_option('number_of_events'); ?>" /></td>
            </tr>
        </table>

        <?php @submit_button(); ?>
    </form>
</div>