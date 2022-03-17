<?php
    session_start();
    if(isset($_POST['upload'])){

        $_SESSION['filename'] = $_FILES['img-file']['name'];
        //$fileType = $_FILES['img-file']['type'];
        $fileError = $_FILES['img-file']['error'];
        $fileTmpPath = $_FILES['img-file']['tmp_name'];

        if($fileError === 0){
            move_uploaded_file($fileTmpPath, 'assets/images/temp_storage/'.$_SESSION['filename']);
            header('Location: test2.php');
        } else{
            $_SESSION['file_error'] = "An error has occured";
        }
    }



    if(isset($_POST['submit'])){

        $get_ext = explode(".",$_SESSION['filename']);
        $foldername = strtolower(reset($get_ext));
        $path = "assets/images/admin-uploads/";
        if(!file_exists($path.$foldername) and !is_dir($path.$foldername)){
            mkdir($path.$foldername);
        } else{
            $_SESSION['err'] = "Folder already exists!";
        }

        $file = file_get_contents("assets/images/temp_storage/".$_SESSION['filename']);
        file_put_contents($path.$foldername."/".$_SESSION['filename'], $file);
        $tmp_path = "assets/images/temp_storage/";
        if(!unlink($tmp_path.$_SESSION['filename'])){
            $_SESSION['err'] = "An error has occured";
        }
        else{
            $_SESSION['err'] ="Deleted successfully.";
            header('Location: test.php');
            unset($_SESSION['filename']);
        }

        
    }
?>