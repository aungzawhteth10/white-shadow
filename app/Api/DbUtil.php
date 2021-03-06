<?php
namespace App\Api;
class DbUtil 
{
   protected $pdo;
   public function __construct()
   {
    	$dsn = 'mysql:dbname=white_shadow;host=34.85.118.6';
		$servername = 'root';
		$password = '#tooradmin';
       	try {
		    $this->pdo = new \PDO($dsn, $servername, $password);
		} catch (\PDOException $e) {
		    echo 'Connection failed: ' . $e->getMessage();
		}
   }
   public function getDivDetail($request, $response)
   {
      return "success";
   }
}
?>