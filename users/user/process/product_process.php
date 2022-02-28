<?php
    session_start();
    //$database = new Connection();
    //$db = $database->open();
    //try{
        //make use of prepared statement to prevent sql injection
        //$sql = $db->prepare("SELECT id, product_name FROM product");
        //$sql->execute();
        //while($row=$sql->->fetch(PDO::FETCH_ASSOC)){

            if(isset($_POST['anime_btn'])){
                $_SESSION['product_name'] = "Anime Art";
                header('Location: ../userview-anime.php');
            }
            elseif(isset($_POST['cartoon_btn'])){
                $_SESSION['product_name'] = "Cartoon Art";
                header('Location: ../userview-cartoon.php');
            }
            elseif(isset($_POST['vector_btn'])){
                $_SESSION['product_name'] = "Vector Art";
                header('Location: ../userview-vector.php');
            }
            //else{
                //$_SESSION['message'] = "Something wrong happened";
            //}    
        //}                    	
    //}
    //catch(PDOException $e){
        //$_SESSION['message'] = $e->getMessage();
    //}
    //close connection
    //$database->close();

?>