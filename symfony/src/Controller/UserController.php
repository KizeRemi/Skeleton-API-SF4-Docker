<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use FOS\RestBundle\Routing\ClassResourceInterface;
use App\Services\User\UserHandler;
use FOS\RestBundle\Controller\Annotations as Rest;

class UserController extends Controller implements ClassResourceInterface
{
    /**
     * @Rest\Get("/users")
     */
    public function sssAction(UserRepository $userRepository)
    {
        $users = $userRepository->findAll();

        return $users;
    }

    /**
     * @ParamConverter("user", class="App:User")
     */
    public function getAction(User $user, UserHandler $userHandler)
    {
        return $user;
    }

    /**
     */
    public function postAction(Request $request)
    {
        return $this->get('app.user.user_handler')->post($request->request->all());
    }
}