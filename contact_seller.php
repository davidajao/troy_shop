<?php
include('session.php');

if (isset($_GET['productID'])){

    echo $user_check;

    $productID = $_GET['productID'];

    $sql = "SELECT * FROM products WHERE productID=$productID";
    $result = mysqli_query($db,$sql);

    while($row = mysqli_fetch_array($result)){
        $productname = $row['product_name'];
        $sellerID = $row['sellerID'];
        echo "Seller ID is ".$row['sellerID'];

        $sql = "SELECT * FROM customers WHERE userID=$sellerID";
        $result = mysqli_query($db,$sql);

        while($row = mysqli_fetch_array($result)){
            $seller_email = $row['email'];
            $seller_phone = $row['phone'];
            $seller_carrier = $row['carrier'];
            

            require 'PHPMailerAutoload.php'; 
            require 'credential.php';
            $mail = new PHPMailer;

            $mail->SMTPDebug = 4;                               // Enable verbose debug output

            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = EMAIL;                 // SMTP username
            $mail->Password = PASS;                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to

            $mail->setFrom($user_check, 'TROY MARKETPLACE');
            $mail->addAddress($seller_email);     // Add a recipient

            if($seller_carrier == 'V'){ $phone_attach = '@vtext.com';}
            elseif($seller_carrier == 'T'){ $phone_attach = '@tmomail.net';}
            elseif($seller_carrier == 'AT'){ $phone_attach = '@txt.att.net';}
            elseif($seller_carrier == 'S'){ $phone_attach = '@messaging.sprintpcs.com';}
            elseif($seller_carrier == 'N'){ $phone_attach = '@messaging.nextel.com';}


            $mail->addAddress($seller_phone.$phone_attach);               // Name is optional
            $mail->addReplyTo($user_check);
            //$mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
            $mail->isHTML(true);                                  // Set email format to HTML

            $mail->Subject = 'Someone wants your item!';
            $mail->Body    = '<div style="border:2px solid blue;"> '.$user_check.' is interested in <b>'.$productname.'</b> </div>';
            $mail->AltBody = $user_check.' is interested in '.$productname;


            $mail->send();
            /*
            if(!$mail->send()) {
                //echo 'Message could not be sent.';
                //echo 'Mailer Error: ' . $mail->ErrorInfo;
            } else {
                //echo 'Message has been sent';
            }
            */



            //confirmation email and text to buyer

            $mail2 = new PHPMailer;

            $mail2->SMTPDebug = 4;                               // Enable verbose debug output

            $mail2->isSMTP();                                      // Set mailer to use SMTP
            $mail2->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail2->SMTPAuth = true;                               // Enable SMTP authentication
            $mail2->Username = EMAIL;                 // SMTP username
            $mail2->Password = PASS;                           // SMTP password
            $mail2->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail2->Port = 587;                                    // TCP port to connect to

            $mail2->setFrom($seller_email, 'TROY MARKETPLACE');
            $mail2->addAddress($user_check);     // Add a recipient

            if($buyer_carrier == 'V'){ $phone_attach = '@vtext.com';}
            elseif($buyer_carrier == 'T'){ $phone_attach = '@tmomail.net';}
            elseif($buyer_carrier == 'AT'){ $phone_attach = '@txt.att.net';}
            elseif($buyer_carrier == 'S'){ $phone_attach = '@messaging.sprintpcs.com';}
            elseif($buyer_carrier == 'N'){ $phone_attach = '@messaging.nextel.com';}

            $mail->addAddress($buyer_phone.$phone_attach);               // Name is optional

            $mail2->addReplyTo($seller_email);
            
            $mail2->isHTML(true);                                  // Set email format to HTML

            $mail2->Subject = 'Seller has been notified!';
            $mail2->Body    = '<div style="border:2px solid blue;"> The seller of '.$productname.' has been notified of your interest, you can email the seller here '.$seller_email.' or contact at:'.$seller_phone.' </div>';
            $mail2->AltBody = $productname.' has been notified of your interest, you can email the seller here '.$seller_email;

            if(!$mail2->send()) {
                //echo 'Message could not be sent.';
                //echo 'Mailer Error: ' . $mail->ErrorInfo;
                echo "<script>window.location.assign('email_not_sent.php')</script>";
            } else {
                echo "<script>window.location.assign('email_sent.php')</script>";
                //echo 'Message has been sent';
            }
        }

    }

}



?>