<?php                                           


    $message_sent = false;

    if(isset($_POST['email']) && $_POST['email'] != '')
    {
        if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
        {
            $userName = $_POST['name'];
            $userEmail = $_POST['email'];
            $messageSubject = $_POST['subject'];
            $message = $_POST['message'];
    
            $to = "nellasoudunsaari@gmail.com";
            $body = "";
    
            $body .= "Lähettäjä: ". $userName. "\r\n";
            $body .= "Sposti: ". $userEmail. "\r\n";
            $body .= "Viesti: ". $message. "\r\n";
            
            mail($to, $messageSubject, $body);

            $message_sent = true;
        }
    }
?>