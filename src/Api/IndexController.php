<?php
namespace App\Api;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
class IndexController extends AbstractController
{
    public function index()
    {
		return $this->render('index.twig');
    }
}
?>