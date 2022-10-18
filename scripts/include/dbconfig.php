<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password)
INPUT UR SQL DETAILS HERE  */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'buyscriptsdemo_margon');



//ONLINE BANKING DATA SETTINGS
$site_title = 'Margon Banking Script 7.2+ PHP Version';
$site_address = 'NRG Wodland Ave Austine #72222 TX USA';
$site_initial = 'Margon';
$site_email = 'margonbank@buyscriptsdemo.work'; 
$live_chat_id = ''; 




class Database
{
   /* Do not set or touch any thing here */  
    private $host = "DB_SERVER";
    private $db_name = "DB_NAME";
    private $username = "DB_USERNAME";
    private $password = "DB_PASSWORD";
    public $conn;
     
    public function dbConnection()
	{
     
	    $this->conn = null;    
        try
		{
            $this->conn = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
        }
		catch(PDOException $exception)
		{
            echo "Connection error: " . $exception->getMessage();
        }
         
        return $this->conn;
    }
}
/* Attempt to connect to MySQL database */
$connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($connection === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}



?>