<?php
// deshabilito acceso directo a archivos
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
/**
 *
 */
class Settings_Page
{

	public function __construct()
	{
		//recordatorioCS_display_settings_page();
	}


// muestra el formulario de configuración
public function recordatorioCS_form() {
		?>
		<form method="post">
			<p><label for="texAlarma"><?php esc_html_e('Enter The name of event', 'recordatorioCS');?></label></p>
			<p><textarea id="texAlarma" name="texto-alarma" cols="40" rows="5"></textarea></p>
			<p><label for="email"><?php esc_html_e('Introduzca la direccion de correo electronico del remitente', 'recordatorioCS');?></label></p>
			<p><input type="email" id="email" name="email" required pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" placeholder="minombre@hotmail.com" size="40"></p>
			<input type="date" name="fecha-alarma" step="1"  min="2018-01-01" max="2018-12-31" value="2018-03-01">
			<input type="time" name="hora-alarma" step="1" value="10:15:10" >
   		<p><input type="submit" value="Enviar"></p>
		</form>
	<?php
	}
	// Procesa el env�o del formulario
	public function recordatorioCS_process() {
		if ( isset($_POST['texto-alarma'])) {
			$txtAlarma = sanitize_text_field( $_POST[ 'texto-alarma' ] );
			$fecha= sanitize_text_field( $_POST[ 'fecha-alarma' ] );
			$hora= sanitize_text_field( $_POST[ 'hora-alarma' ] );

			$to = sanitize_text_field( $_POST[ 'email' ] );
			$subject = esc_html__('EVENTO registrado a traves de Plugin RecordatorioCS en WordPress', 'recordatorioCS');
			$message = esc_html__(' Usted Tiene el siguiente evento: ','recordatorioCS').$txtAlarma.esc_html__(' para el ','recordatorioCS').$fecha.esc_html__(' a horas ','recordatorioCS').$hora;
			//mensajes de validacion
			if (!empty( $txtAlarma ) ) {
				wp_mail( $to, $subject, $message );
				echo  esc_html_e(' El evento ha sido enviado al correo : ','recordatorioCS').$to;
				//.esc_html_e(' para ','recordatorioCS').$fecha.esc_html_e(' y ','recordatorioCS').$hora.esc_html_e('horas ha sido enviado al correo  ','recordatorioCS').$to;
			//	'<p>El evento '.$txtAlarma.' para '.$fecha.' y '.$hora.' horas ha sido enviado al correo '.$to.'</p>';
			} else {
				  esc_html_e('Name of Event is empty', 'recordatorioCS');//El nombre del evento esta vacio
			}


		}
}

	public function recordatorioCS_display_settings_page() {
		// check if user is allowed access
		if ( ! current_user_can( 'manage_options' ) ) return;
		?>
		<div class="wrap">
			<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
			<?php recordatorioCS_form(); ?>
			<?php recordatorioCS_process(); ?>
		</div>
	<?php
	}
}
