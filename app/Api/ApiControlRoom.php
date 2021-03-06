<?php
namespace App\Api;
use Slim\Views\Twig as View;
class ApiControlRoom 
{
   protected $views;
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
   public function registerDivision($request, $response)
   {
   		$division = $_POST['division'];
		$sql = 'INSERT INTO division_list ' .
				'(division) ' .
				'VALUES (:division)';
		$stmt = $this->pdo->prepare($sql);
		$stmt->bindParam(':division', $division, \PDO::PARAM_STR);
		$result = $stmt->execute();
		// 接続を閉じる
	    $this->pdo = null;
	    $stmt = null;
	    return $sql;
   }
   public function registerDetail($request, $response)
   {
   		$postData = $_POST;
		$lawer_name = $postData['lawer_name'];
		$office = $postData['office'];
		$position = $postData['position'];
		$type = $postData['type'];
		$ph_1 = $postData['ph_1'];
		$ph_2 = $postData['ph_2'];
		$ph_3 = $postData['ph_3'];
		$ph_4 = $postData['ph_4'];
		$ph_5 = $postData['ph_5'];
		$division = $postData['division'];
		$township = $postData['township'];
		$town = $postData['town'];
		$sql = 'INSERT INTO lawer ' .
				'(lawer_name, office, position, type, ph_1, ph_2, ph_3, ph_4, ph_5, division, township, town) ' .
				'VALUES (:lawer_name, :office, :position, :type, :ph_1, :ph_2, :ph_3, :ph_4, :ph_5, :division, :township, :town)';
		$stmt = $this->pdo->prepare($sql);
		$stmt->bindParam(':lawer_name', $lawer_name, \PDO::PARAM_STR);
		$stmt->bindParam(':office', $office, \PDO::PARAM_STR);
		$stmt->bindParam(':position', $position, \PDO::PARAM_STR);
		$stmt->bindParam(':type', $type, \PDO::PARAM_STR);
		$stmt->bindParam(':ph_1', $ph_1, \PDO::PARAM_STR);
		$stmt->bindParam(':ph_2', $ph_2, \PDO::PARAM_STR);
		$stmt->bindParam(':ph_3', $ph_3, \PDO::PARAM_STR);
		$stmt->bindParam(':ph_4', $ph_4, \PDO::PARAM_STR);
		$stmt->bindParam(':ph_5', $ph_5, \PDO::PARAM_STR);
		$stmt->bindParam(':division', $division, \PDO::PARAM_STR);
		$stmt->bindParam(':township', $township, \PDO::PARAM_STR);
		$stmt->bindParam(':town', $town, \PDO::PARAM_STR);
		$result = $stmt->execute();
		// 接続を閉じる
	    $this->pdo = null;
	    $stmt = null;
	    return 'Finish';
   }
}
?>