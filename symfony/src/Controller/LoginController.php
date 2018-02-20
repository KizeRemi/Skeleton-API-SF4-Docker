<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use FOS\RestBundle\Routing\ClassResourceInterface;
use FOS\RestBundle\Controller\Annotations as Rest;
use Nelmio\ApiDocBundle\Annotation\Model;
use Swagger\Annotations as SWG;
use App\Entity\User;

class LoginController extends Controller implements ClassResourceInterface
{
    /**
     * Return the token authentication for the user.
     *
     * @SWG\Response(
     *     response=200,
     *     description="The token authentication for the user.",
     *     @SWG\Schema(
     *         type="array",
     *         @Model(type=User::class)
     *     )
     * )
     * @SWG\Parameter(name="username", in="formData", type="string", description="The field used for the username", required=true)
     * @SWG\Parameter(name="password", in="formData", type="string", description="The field used for the user password", required=true)
     * @SWG\Tag(name="Login")
     * 
     * @Rest\Post("/api/v1/login_check")
     */
    public function loginCheck(){}
}