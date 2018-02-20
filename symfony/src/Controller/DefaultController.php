<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use FOS\RestBundle\Routing\ClassResourceInterface;
use FOS\RestBundle\Controller\Annotations as Rest;

class DefaultController extends Controller implements ClassResourceInterface
{
    /**
     * @Rest\Get("/")
     */
    public function getAction()
    {
        return [];
    }
}