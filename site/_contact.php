<?php

// configure
$from = '<yugiholic@gmail.com>';
$sendTo = 'D:\xampp\mailtodisk\mailtodisk.exe';
$subject = 'New message from contact form';
$fields = array('name' => 'Nama Depan', 'surname' => 'Nama Belakang', 'phone' => 'No Telepon', 'email' => 'Email', 'message' => 'Pesan'); // array variable name => Text to appear in the email
$okMessage = 'Pesan berhasil dikirim. Kami akan menghubungi anda secepatnya, terima kasih';
$errorMessage = 'Terjadi kesalahan, coba lagi nanti';

// let's do the sending

try
{
    $emailText = "You have new message from contact form\n=============================\n";

    foreach ($_POST as $key => $value) {

        if (isset($fields[$key])) {
            $emailText .= "$fields[$key]: $value\n";
        }
    }

    $headers = array('Content-Type: text/html; charset="UTF-8";',
        'From: ' . $from,
        'Reply-To: ' . $from,
        'Return-Path: ' . $from,
    );
    
    mail($sendTo, $subject, $emailText, implode("\n", $headers));

    $responseArray = array('type' => 'success', 'message' => $okMessage);
}
catch (\Exception $e)
{
    $responseArray = array('type' => 'danger', 'message' => $errorMessage);
}

if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    $encoded = json_encode($responseArray);

    header('Content-Type: application/json');

    echo $encoded;
}
else {
    echo $responseArray['message'];
}