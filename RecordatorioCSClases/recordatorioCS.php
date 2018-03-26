<?php
/*
Plugin Name:  RecordatorioCSClases
Description: Plugin que permite registrar eventos en una fecha y hora determinada y enviarlos al correo electronico
Plugin URI:   https://profiles.wordpress.org/recordatorioCS
Author:      Claudia Salazar Gonzales
Version:      1.0
Text Domain:  recordatorioCS
Domain Path:  /languages
License:      GPL v2 or later
License URI:  https://www.gnu.org/licenses/gpl-2.0.txt
*/

// salida si el archivo se solicita directo
/**
 *
 */
 if ( ! defined( 'ABSPATH' ) ) {
 	exit;
};
/*class Recordatorio_Plugin
{

	public function __construct()
	{
		$this->load_dependencies();
		//new Admin_Menu();
    //run();
	}

	private function load_dependencies()
	{
		require_once plugin_dir_path( __FILE__ ) . 'admin/class-admin-menu.php';// contien las funciones corespondi
		require_once plugin_dir_path( __FILE__ ) . 'admin/settings-page.php';
		new Admin_Menu();
		//admin::run();

	}

};
$recordatorio= new Recordatorio_Plugin();*/
//Recordatorio_Plugin;
require_once plugin_dir_path( __FILE__ ) . 'admin/class-admin-menu.php';// contien las funciones corespondi
require_once plugin_dir_path( __FILE__ ) . 'admin/settings-page.php';

$plugin = new Admin_Menu();
	$plugin->run();
