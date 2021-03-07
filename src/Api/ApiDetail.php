<?php
namespace App\Api;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route; 
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
class ApiDetail 
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
   public function getDivisionList()
   {
		$sql = 'SELECT division ' .
				'FROM division_list';
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute();
  		$row = $stmt->fetchAll();
		// 接続を閉じる
	    $this->pdo = null;
	    $stmt = null;
	    return new Response(json_encode($row, JSON_UNESCAPED_UNICODE));
   }
   public function quantityLoad($request, $response)
   {
		$division = $_GET['division'];
		$sql = 'SELECT lawer_id,' .
				'lawer_name,' .
				'office,' .
				'position,' .
				'type,' .
				'ph_1,' .
				'ph_2,' .
				'ph_3,' .
				'ph_4,' .
				'ph_5,' .
				'division,' .
				'township,' .
				'town ' .
				'FROM lawer ' .
				'WHERE division=?';
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute([$division]);
  		$row = $stmt->fetchAll();
		// 接続を閉じる
	    $this->pdo = null;
	    $stmt = null;
	    return json_encode($row, JSON_UNESCAPED_UNICODE);
   }
}
?>