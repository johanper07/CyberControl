<?php
if(isset($_POST['nombres'])) {

// Debes editar las próximas dos líneas de código de acuerdo con tus preferencias
$email_to = "jogan34343@gmail.com";
$email_subject = "jogan34343@gmail.com";

// Aquí se deberían validar los datos ingresados por el usuario
if(!isset($_POST['comentarios']) ||
!isset($_POST['nombres'])) {

echo "<b>Ocurrió un error y el formulario no ha sido enviado. </b><br />";
echo "Por favor, vuelva atrás y verifique la información ingresada<br />";
die();
}

$email_message = "Detalles del formulario de CYBER CONTOL:\n\n";
$email_message .= "Nombre del usuario: " . $_POST['nombres'] . "\n";
$email_message .= "Apellidos del usuario: " . $_POST['apellidos'] . "\n";
$email_message .= "Telefono del usuario: " . $_POST['telefono'] . "\n"
$email_message .= "Correo electronico: " . $_POST['correo'] . "\n";
$email_message .= "Comentarios del usuario:  " . $_POST['comentarios'] . "\n";


//echo $email_message;


// Ahora se envía el e-mail usando la función mail() de PHP
$headers = 'From: '.$_POST['nombre']."\r\n".
'Reply-To: '.$_POST['nombre']."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);

echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0;URL=https://holasoyperalta.000webhostapp.com/\">"; 
} else {
    echo "No se puede enviar el formulario, verifica los campos";
}

?>