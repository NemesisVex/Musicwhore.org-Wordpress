<div class="wrap">
    <h2>Musicwhore Artist Connector Settings</h2>
    <form method="post" action="options.php"> 
        <?php @settings_fields('musicwhore_artist_connector-group'); ?>
        <?php @do_settings_fields('musicwhore_artist_connector-group'); ?>

        <?php @do_settings_sections('musicwhore-artist-connector'); ?>

        <?php @submit_button(); ?>
    </form>
</div>