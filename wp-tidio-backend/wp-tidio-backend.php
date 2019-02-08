<?php

/*
 * Plugin Name:       Tidio Backend Support Chat
 * Plugin URI:        https://sparrow.media
 * Description:       Add tidio chat widget to the Administrative area of Wordpress.
 * Version:           1.0.0
 * Author:            Sparrow Media - Frank Carentz
 * Author URI:        https://sparrow.media
 * License:           Commercial
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       sparrow-tidio
 * Domain Path:       /languages
*/

// Cannot be called directly
if ( ! defined( 'WPINC' ) ) {
    die;
}


class WP_Tidio_Backend{


    public function __construct(){



        if(!defined('WP_TIDIO')){
            add_action( 'admin_notices', array(&$this, 'sparrow_admin_notice') );
        }

        if ( is_admin() ){ // admin actions

            add_action('admin_footer', array(&$this, 'insert_tidio'));
        }
    }
    public function insert_tidio(){
        echo  '<script src="'. WP_TIDIO .'"></script>';
    }

    public function sparrow_admin_notice(){
        ?>
        <div class="notice notice-error is-dismissible">
            <h4><?php _e( 'Missing your Tidio', 'sparrow-text-domain' ); ?></h4>
            <p>You are missing your Tidio js URL. Please follow the plugin instructions or it will not function.</p>
        </div>
        <?php
    }
}

function run_tidio_backend() {
    new WP_Tidio_Backend();
}
run_tidio_backend();