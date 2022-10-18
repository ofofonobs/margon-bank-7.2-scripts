<?php
class Database
{
     
    private $host = "localhost";
    private $db_name = "buyscriptsdemo_margon";
    private $username = "root";
    private $password = "";
    public $conn;
     
    public function dbConnection()
	{
     
	    $this->conn = null;
	    $DB_con = null;
        try
		{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
			
        }
		catch(PDOException $exception)
		{
            echo "Connection error: " . $exception->getMessage();
        }
         
        return $this->conn;
    }
}

$connection = mysqli_connect('localhost', 'root', '');
if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}
$select_db = mysqli_select_db($connection, 'buyscriptsdemo_margon');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($connection));
}



$DB_host = "localhost";
$DB_user = "root";
$DB_pass = "";
$DB_name = "buyscriptsdemo_margon";


     $host = "localhost";
    $database = "buyscriptsdemo_margon";
    $username = "root";
    $password = "";

try
{
	$DB_con = new PDO("mysql:host={$DB_host};dbname={$DB_name}",$DB_user,$DB_pass);
	$DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
	echo $e->getMessage();
}