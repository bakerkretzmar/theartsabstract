<?php

/**
 * Plugin Name: The Arts Abstract Intervention Configuration
 */
add_filter('sober/intervention/return', fn () => ACORN_BASEPATH . '/config/intervention.php');
