<?php
session_start();
        include('include/header.php');
        include('include/navbar.php');

        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;
        
        require 'include/vendor/autoload.php';
        
        
        
        try {
            $mail = new PHPMailer(true);
            $mail->isSMTP();                      // Set mailer to use SMTP 
            $mail->Host = 'smtp.gmail.com';       // Specify main and backup SMTP servers 
            $mail->SMTPAuth = true;               // Enable SMTP authentication 
            $mail->Username = 'renewalmaster4@gmail.com';   // SMTP username 
            $mail->Password = 'fikshun4';   // SMTP password 
            $mail->SMTPSecure = 'tls';            // Enable TLS encryption, `ssl` also accepted 
            $mail->Port = 587;                    // TCP port to connect to 
            
            // Sender info 
            $mail->setFrom('renewalmaster4@gmail.com', 'NJ Glass Painting'); 
            
            // Add a recipient 
            $mail->addAddress('lc201700269@wmsu.edu.ph'); 
            
            //$mail->addCC('cc@example.com'); 
            //$mail->addBCC('bcc@example.com'); 
            
            // Set email format to HTML 
            $mail->isHTML(true); 
            
            // Mail subject 
            $mail->Subject = 'Verification for account registration'; 
            
            // Mail body content 
            $bodyContent = 'Thanks for signing up for NJ Customized Glass Painting!'."<br><br>";
            $bodyContent .= 'To verify your email address please click the link below.'."<br><br>";
            $bodyContent .= '
                            <div style="margin: 10px 0;">
                                <a style="background-color:#FFF1E6;padding:10px 10px;text-decoration:none;color:#000;" 
                                href="http://localhost/SE_project/verify.php">VERIFY EMAIL ADDRESS<a>
                            </div>
                            '."<br>";
            $bodyContent .= 'Please note that this link will expire in 24 hours.';
            $mail->Body    = $bodyContent; 
            
            //Send email 
            //if(!$mail->send()) { 
                //echo 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo; 
            //} else { 
               // echo 'Message has been sent.'; 
            //} 
        } 
        catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

include('include/footer.php');

?>