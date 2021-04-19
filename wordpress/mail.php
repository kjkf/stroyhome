<?php
$method = $_SERVER['REQUEST_METHOD'];

//Script Foreach
$c = true;
if ( $method === 'POST' ) {

    $project_name = trim($_POST["project_name"]);
    $admin_email  = trim($_POST["admin_email"]);
    $form_subject = trim($_POST["form_subject"]);

    foreach ( $_POST as $key => $value ) {
        if ( $value != "" && $key != "project_name" && $key != "admin_email" && $key != "form_subject" ) {
            $message .= "
			" . ( ($c = !$c) ? '<tr>':'<tr style="background-color: #f8f8f8;">' ) . "
				<td style='padding: 10px; border: #e9e9e9 1px solid;'><b>$key</b></td>
				<td style='padding: 10px; border: #e9e9e9 1px solid;'>$value</td>
			</tr>
			";
        }
    }
} else if ( $method === 'GET' ) {

    $project_name = trim($_GET["project_name"]);
    $admin_email  = trim($_GET["admin_email"]);
    $form_subject = trim($_GET["form_subject"]);

    foreach ( $_GET as $key => $value ) {
        if ( $value != "" && $key != "project_name" && $key != "admin_email" && $key != "form_subject" ) {
            $message .= "
			" . ( ($c = !$c) ? '<tr>':'<tr style="background-color: #f8f8f8;">' ) . "
				<td style='padding: 10px; border: #e9e9e9 1px solid;'><b>$key</b></td>
				<td style='padding: 10px; border: #e9e9e9 1px solid;'>$value</td>
			</tr>
			";
        }
    }
}

$message = "<table style='width: 100%;'>$message</table>";

// Кому отправляем
$to = $admin_email; //'my.fordevemail@gmail.com';

// Тема письма
$subject = $form_subject; //'Проверка wp_mail';

// Само сообщение
//$message = 'Это тестовое сообщение';

// Загружаем только ядро WordPress
define( 'WP_USE_THEMES', false );
require( 'wp-load.php' );

// Отправляем письмо
$sent_message = wp_mail( $to, $subject, $message );

if ( $sent_message ) {
    // Если сообщение успешно отправилось
    echo "Message has been sent successfully";
} else {
    // Ошибки при отправке
    echo "Mailer Error: " . $mail->ErrorInfo;
}



