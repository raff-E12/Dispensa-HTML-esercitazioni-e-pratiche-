<?php
$destinatario='mliguori.ilas@gmail.com';
$sito='marioliguori.it';
$grazie='invio-ok.html';
$errore='invio-no.html';
$nome=$_POST['nomeUtente'];
$emailUtente=$_POST['email-utente'];
$messaggio=$_POST['messaggio'];
$accettazione=$_POST['accettazione'];

if($nome && $emailUtente && $messaggio && $accettazione){
    //invia la mail
    $to=$destinatario;
    $subject="Hai ricevuto una nuova e-mail dal tuo sito web: - $sito";
    $msg="<!DOCTYPE html>
    <html lang='it'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Email da $sito</title>
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH' crossorigin='anonymous'>
        <style>
        body{
            font-family:sans-serif;
        }
        table{
            width:100%;
            background:whitesmoke;
            border:1px solid #333;
        }
        table tr th{
            text-align:left;
        }
        </style>
    </head>
    <body>
    <h1 class='text-info fw-600' >Ciao!</h1>

        <table width='100%' cellpadding='5' border='0'>
            <tr>
                <th>Nome</th><th>Email</th><th>Messaggio</th>
            </tr>
            <tr>
                <td>$nome</td><td>$emailUtente</td><td>$messaggio</td>
            </tr>
            <tr>
                <td colspan='3'> L'utente ha accettato il trattamento dei dati personali: $accettazione</td>
            </tr>
        </table>
        
    </body>
    </html>";
    $headers[]= 'MIME-Version: 1.0';
    $headers[]= 'Content-type: text/html; charset=UTF-8';
    $headers[]= 'From: '.$sito.' <noreply@marioliguori.it>';
    mail($to,$subject,$msg,implode("\r\n",$headers));
    header("location:$grazie");
}else{
    header("location:$errore");
}

?>