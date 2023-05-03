<?php
    include_once('include/database.php');
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require 'include/vendor/autoload.php';

    $errors=array("fname" => "", 
                    "lname" => "", 
                    "username" => "",  
                    "email" => "", 
                    "phonenum" => "",
                    "pw" => ""
            );
    $var=array("fname" => "",
                "lname" => "",
                "username" => "", 
                "email" => "",
                "phonenum" => "",
                "pw" => ""
        );
    
    if(isset($_POST['signup_btn'])){
        $database = new Connection();
        $db = $database->open();
        $role = 'customer';
        $vkey = bin2hex(random_bytes(20));

        // strips unnecessary characters and backslashes
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        
        //validation for first name
        if(empty($_POST['firstname'])){
            $errors['fname'] = "First Name field is Required";
        }
        else{
            $var['fname'] = test_input($_POST['firstname']);
            if (!preg_match("/^[a-zA-Z-' ]*$/",$var['fname'])){
                $errors['fname'] = "Only letters and spaces are allowed";
            }
        }

        //validation for last name
        if(empty($_POST['lastname'])){
            $errors['lname'] = "Last Name field is Required";
        }
        else{
            $var['lname'] = test_input($_POST['lastname']);
            if (!preg_match("/^[a-zA-Z-' ]*$/",$var['lname'])){
                $errors['lname'] = "Only letters and spaces are allowed";
            }
        }

        //validation for username
        if(empty($_POST['username'])){
            $errors['username'] = "Username field is Required";
        }
        else{
            $var['username'] = test_input($_POST['username']);
            $username_check =$db->prepare("SELECT * FROM user WHERE username=:username");
            $username_check->bindParam(':username', $var['username']);
            $username_check->execute();
            $count=$username_check->rowCount();
            if($count == 1){
                $errors['username'] = "Username Already Taken. Please Try Another one.";
            }
        }

        //validation for email
        if(empty($_POST['email'])){
            $errors['email'] = "Email field is Required";
        }
        else{
            $var['email'] = test_input($_POST['email']);
            if (!filter_var($var['email'], FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = "Please enter a valid email address";
            }
            else{
                $email_check =$db->prepare("SELECT * FROM user WHERE email=:email");
                $email_check->bindParam(':email', $var['email']);
                $email_check->execute();
                $count=$email_check->rowCount();
                if($count == 1){
                    $errors['email'] = "Email Already Taken. Please Try Another one.";
                }
            }
        }
        
        //validation for mobile number
        if(empty($_POST['number'])){
            $errors['phonenum'] = "Mobile number field is Required";
        }
        else{
            $var['phonenum'] = test_input($_POST['number']);
            if (strlen($var['phonenum']) != 11){
                $errors['phonenum'] = "Please enter a valid mobile number";
            }
        }

        //validation for password
        if(empty($_POST['password'])){
            $errors['pw'] = "Password field is Required";
        }
        else{
            $var['pw'] = test_input($_POST['password']);
        }

        if(!in_array("",$var)){
            try{
                //make use of prepared statement to prevent sql injection
                $insertsql = $db->prepare("INSERT INTO user (username, password, first_name, last_name, email, phone_number, role, verify_key)
                VALUES (:username, :password, :firstname, :lastname, :email, :phone_number, :role, :vkey)");

                $pw_hash = password_hash($var['pw'], PASSWORD_DEFAULT);
    
                //bind
                $insertsql->bindParam(':username', $var['username']);
                $insertsql->bindParam(':password', $pw_hash);
                $insertsql->bindParam(':firstname', $var['fname']);
                $insertsql->bindParam(':lastname', $var['lname']);
                $insertsql->bindParam(':email', $var['email']);
                $insertsql->bindParam(':phone_number', $var['phonenum']);
                $insertsql->bindParam(':role', $role);
                $insertsql->bindParam(':vkey', $vkey);
    
                if($insertsql->execute()){
                    try {
                        $mail = new PHPMailer(true);
                        $mail->isSMTP();                    
                        $mail->Host = 'smtp.gmail.com';     
                        $mail->SMTPAuth = true;             
                        $mail->Username = 'njglasspainting4@gmail.com'; 
                        $mail->Password = 'kcnmixbbwnkkexux';
                        $mail->SMTPSecure = 'ssl';          
                        $mail->Port = 465;                  
                        
                        // Sender info 
                        $mail->setFrom('njglasspainting4@gmail.com', 'NJ Glass Painting'); 
                        
                        // Add a recipient 
                        $mail->addAddress($var['email']); 
                        
                        // Set email format to HTML 
                        $mail->isHTML(true); 
                        
                        // Mail subject 
                        $mail->Subject = 'Email verification for account registration FROM NJ Customized Glass Painting'; 
                        
                        // Mail body content 
                        $bodyContent = 'Thanks for signing up tp NJ Customized Glass Painting website!'."<br><br>";
                        $bodyContent .= 'To verify your email address please click the link below.'."<br><br>";
                        $bodyContent .= "
                                        <div style='margin: 10px 0;'>
                                            <a style='background-color:#FFF1E6;padding:10px 10px;text-decoration:none;color:#000;' 
                                            href='http://localhost/SE_project/verify.php?key=$vkey'>VERIFY EMAIL ADDRESS</a>
                                        </div>
                                        "."<br>";
                        $bodyContent .= 'Please note that this link will expire in 24 hours.';
                        $mail->Body    = $bodyContent; 
                        $mail->AltBody = strip_tags($bodyContent);
                        
                        //Send email 
                        if(!$mail->send()) { 
                            echo 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo; 
                        } else { 
                            echo 'Message has been sent.'; 
                        } 
                    } 
                    catch (Exception $e) {
                        $_SESSION['mail_err'] = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                    }
                    $_SESSION['ver_email'] = $var['email'];
                    header('Location: signup_msg.php');
                }                        	
            }
            catch(PDOException $e){
                $_SESSION['message'] = $e->getMessage();
            }
        }  
        //close connection
        $database->close();
    }
?>