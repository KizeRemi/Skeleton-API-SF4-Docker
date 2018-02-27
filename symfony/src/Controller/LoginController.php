<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
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

    /**
     * @param UserInterface $astronaut
     * @param array         $parameters
     * @param string        $method
     *
     * @throws InvalidFormException
     * @throws \Exception
     * 
     * @SWG\Response(
     *     response=200,
     *     description="The token authentication for the user.",
     *     @SWG\Schema(
     *         type="array",
     *         @Model(type=User::class)
     *     )
     * )
     * @SWG\Parameter(name="user", in="body", description="The field used for the user email",
     *     @SWG\Schema(type="object",
     *          @SWG\Property(type="string", property="email", type="string", example="johndoe@email.fr", description="User's email" )
     *     )
     * )
     * 
     * @Rest\Post("/password/forgot")
     */
    public function postForgotAction(Request $request)
    {
        return $this->get('app.user.password_handler')->postForgot($request->request->get('email'));
    }

    /**
     * @param Request $request
     * @param $token
     *
     * @return mixed
     * 
     * @SWG\Response(
     *     response=200,
     *     description="Change the user password.",
     *     @SWG\Schema(
     *         type="array",
     *         @Model(type=User::class)
     *     )
     * )
     * @SWG\Parameter(name="user", in="body", description="The field used for the user email",
     *     @SWG\Schema(type="object",
     *          @SWG\Property(type="object", property="plainPassword",
     *               @SWG\Property(type="string", property="first", type="string", example="12345"),
     *               @SWG\Property(type="string", property="second", type="string", example="12345")
     *          )
     *     )
     * )
     * 
     * @Rest\Post("/password/reset/{token}")
     * 
     */
    public function postResetAction(Request $request, $token)
    {
        return $this->get('app.user.password_handler')->postReset(
            $token,
            $request->request->all()
        );
    }

}