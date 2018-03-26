<?php // MyPlugin - Admin Menu
// deshabilita acceso directo a archivo
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
/**
 *
 */

class Admin_Menu
{

	public function __construct()
	{
		//run();

	}


public function recordatorioCS_add_toplevel_menu() {

	add_menu_page(
		esc_html__('RecordatorioCS', 'recordatorioCS'),
		esc_html__('RecordatorioCS', 'recordatorioCS'),
		'manage_options',
		'recordatorioCS',
		'recordatorioCS_display_settings_page'
	);

}
public function run(){
	add_action( 'admin_menu', 'recordatorioCS_add_toplevel_menu' );
}

}
