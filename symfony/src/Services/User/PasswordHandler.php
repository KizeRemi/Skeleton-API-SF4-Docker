<?php

namespace App\Services\User;

use App\Entity\User;
use App\Form\UserResetPasswordType;
use FOS\UserBundle\Model\UserInterface;
use FOS\UserBundle\Model\UserManagerInterface;
use FOS\UserBundle\Util\TokenGeneratorInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class PasswordHandler
{
    /**
     * @var UserManagerInterface
     */
    private $userManager;

    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * PasswordHandler constructor.
     *
     * @param UserManagerInterface $userManager
     * @param FormFactoryInterface $formFactory
     */
    public function __construct(TokenGeneratorInterface $tokenGenerator, $tokenTtl, UserManagerInterface $userManager, FormFactoryInterface $formFactory)
    {
        $this->tokenGenerator = $tokenGenerator;
        $this->tokenTtl = $tokenTtl;
        $this->userManager = $userManager;
        $this->formFactory = $formFactory;
    }

    /**
     * @param string $email
     */
    public function postForgot(string $email)
    {
        $user = $this->userManager->findUserByEmail($email);
        // Check that the email exists + if there is already a password request
        if (null === $user || $user->isPasswordRequestNonExpired($this->tokenTtl)) {
            return;
        }

        // Generate a confirmation token if there isn't already one
        if (null === $user->getConfirmationToken()) {
            $user->setConfirmationToken($this->tokenGenerator->generateToken());
        }

        $user->setPasswordRequestedAt(new \DateTime());

        $this->userManager->updateUser($user);

    }

    /**
     * @param string $token
     * @param array  $parameters
     *
     * @return UserInterface
     *
     * @throws AccessDeniedHttpException
     */
    public function postReset($token, array $parameters)
    {
        $user = $this->userManager->findUserByConfirmationToken($token);

        if (null === $user) {
            throw new AccessDeniedHttpException('Invalid token.');
        }

        return $this->processForm($user, $parameters, 'PATCH');
    }

    /**
     * @param UserInterface $astronaut
     * @param array         $parameters
     * @param string        $method
     *
     * @throws InvalidFormException
     * @throws \Exception
     */
    private function processForm(UserInterface $user, array $parameters, $method = 'PUT')
    {
        $form = $this->formFactory->create(UserResetPasswordType::class, $user, ['method' => $method]);
        $form->submit($parameters, 'PATCH' !== $method);

        if ($form->isValid()) {
            $user = $form->getData();
            $user->setConfirmationToken(null);
            $user->setPasswordRequestedAt(null);
            $this->userManager->updateUser($user);

            return;
        }

        return $form;
    }
}
