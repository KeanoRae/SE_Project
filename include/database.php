
<?php

Class Connection{
 
	private $server = "mysql:host=localhost;dbname=njdatabasev1";
	private $username = "root";
	private $password = "";
	private $options  = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,);
	protected $conn;
 	
	public function open(){
 		try{
 			$this->conn = new PDO($this->server, $this->username, $this->password, $this->options);
 			return $this->conn;
 		}
 		catch (PDOException $e){
 			echo "There is some problem in connection: " . $e->getMessage();
 		}
    }
 
	public function close(){
   		$this->conn = null;
 	}
}
//$server_name = "localhost";
//$db_username = "root";
//$db_password = "";
//$db_name = "njdatabasev1";
	
	//$connection = mysqli_connect($server_name,$db_username,$db_password,$db_name);
	
	//if(!$connection)
	//{
		//die("Connection failed: " . mysqli_connect_error());
		//echo '
			//<div class="container">
				//<div class="row">
					//<div class="col-md-8 mr-auto ml-auto text-center py-5 mt-5">
						//<div class="card">
							//<div class="card-body">
								//<h1 class="card-title bg-danger text-white"> Database Connection Failed </h1>
								//<h2 class="card-title"> Database Failure</h2>
								//<p class="card-text"> Please Check Your Database Connection.</p>
								//<a href="#" class="btn btn-primary">:( </a>
							//</div>
						//</div>
					//</div>
				//</div>
			//</div>
		//';
	//}
?>