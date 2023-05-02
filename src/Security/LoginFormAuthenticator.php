<?php

namespace App\Security;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Authentication\Token\AnonymousToken;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAuthenticationException;
use Symfony\Component\Security\Core\Exception\InvalidCsrfTokenException;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Csrf\CsrfToken;
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface;
use Symfony\Component\Security\Http\Authenticator\AbstractAuthenticator;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\CsrfTokenBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\RememberMeBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Credentials\PasswordCredentials;
use Symfony\Component\Security\Http\Authenticator\Passport\Passport;
use Symfony\Component\Security\Http\Util\TargetPathTrait;

class LoginFormAuthenticator extends AbstractAuthenticator
{
    use TargetPathTrait;

    public const LOGIN_ROUTE = 'app_login';

    private $entityManager;
    private $urlGenerator;
    private $csrfTokenManager;
    private $passwordEncoder;
    private $user;
    private $homeUser;
    private $userRepository;

    public function __construct(EntityManagerInterface $entityManager,
                                UserRepository $userRepository,
                                UrlGeneratorInterface $urlGenerator,
                                CsrfTokenManagerInterface $csrfTokenManager,
                                UserPasswordEncoderInterface $passwordEncoder,
                                Security $seguridad,
                                GoHomeUser $homeUser
    )
    {
        $this->entityManager = $entityManager;
        $this->userRepository = $userRepository;
        $this->urlGenerator = $urlGenerator;
        $this->csrfTokenManager = $csrfTokenManager;
        $this->passwordEncoder = $passwordEncoder;
        $this->user = $seguridad;
        $this->homeUser = $homeUser;
    }

    public function supports(Request $request): ?bool
    {
        return self::LOGIN_ROUTE === $request->attributes->get('_route')
            && $request->isMethod('POST');
    }

    public function getCredentials(Request $request)
    {
        $credentials = [
            'username' => $request->request->get('username'),
            'password' => $request->request->get('password'),
            'csrf_token' => $request->request->get('_csrf_token'),
        ];
        $request->getSession()->set(
            Security::LAST_USERNAME,
            $credentials['username']
        );

        return $credentials;
    }

    public function getUser($credentials, UserProviderInterface $userProvider)
    {
        $token = new CsrfToken('authenticate', $credentials['csrf_token']);
        if (!$this->csrfTokenManager->isTokenValid($token)) {
            throw new InvalidCsrfTokenException();
        }
        $user = $this->entityManager->getRepository(
            User::class)->findOneBy(['username' => $credentials['username']]);
        if (!$user) {
            // fail authentication with a custom error
            throw new CustomUserMessageAuthenticationException('Username could not be found.');
        }
        return $user;
    }

    public function authenticate(Request $request): Passport
    {
        $password = $request->request->get('password');
        $username = $request->request->get('username');
        $csrfToken = $request->request->get('_csrf_token');
        $passport= new Passport(
            new UserBadge($username),
            new PasswordCredentials($password),
            [
                new CsrfTokenBadge('authenticate', $csrfToken),
                new RememberMeBadge()
            ]
        );
        return $passport;
    }
//
//    public function checkCredentials($credentials, UserInterface $user)
//    {
//        return $this->passwordEncoder->isPasswordValid($user, $credentials['password']);
//    }

    /**
     * Used to upgrade (rehash) the user's password automatically over time.
     */
    public function getPassword($credentials): ?string
    {
        return $credentials['password'];
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, $providerKey) :? Response
    {

        if ($targetPath = $this->getTargetPath($request->getSession(), $providerKey)) {
            return new RedirectResponse($targetPath);
        }

        $user = $token->getUser();
        if($user instanceof User){
//            if($user->getPasswordRequestedAt() ){
//                $now = new \DateTime( "now" );
//                if($user->getPasswordRequestedAt()->getTimestamp() <= $now->getTimestamp()){
//                    $request->getSession()->clear();
//                    $request->getSession()->getFlashBag()->add('error',
//                        "Su clave a expirado! Debe continuar con los pasos indicados para restablecerla.");
//                    return new RedirectResponse($this->urlGenerator->generate('app_forgot_password_request',['email'=>$user->getEmail()]));
//                }
//            }
            if($this->user->isGranted('ROLE_ADMIN')){


            }elseif($this->user->isGranted('ROLE_PROPIETARIO_PLAYA') ||
                    $this->user->isGranted('ROLE_ENCARGADO_PLAYA') ||
                    $this->user->isGranted('ROLE_TRABAJADOR_PLAYA')
                    )
                {
                    if(count($user->getSucursalesUsuario())==1){
                        $request->getSession()->set('sucursal',$user->getSucursalesUsuario()[0]);
                        $request->getSession()->set('idSucursal',$user->getSucursalesUsuario()[0]->getId());
                    }elseif(count($user->getSucursalesUsuario())>1){
                        ///--aqui es necesario enviar a una pantalla de seleccion de sucursal.
                        /// Puede agregarse información para recuperar la ultima.
                        $request->getSession()->set('sucursal',$user->getSucursalesUsuario()[0]);
                        $request->getSession()->set('idSucursal',$user->getSucursalesUsuario()[0]->getId());
                    }else{
                        $request->getSession()->set('sucursal',"");
                        $request->getSession()->set('idSucursal',"");
                    }
            }elseif($this->user->isGranted('ROLE_CLIENTE_PLAYA')){

            }
        }else{
            return new RedirectResponse($this->urlGenerator->generate('app_logout'));
        }

        return $this->homeUser->redirectToHome();
    }

    protected function getLoginUrl()
    {
        return $this->urlGenerator->generate(self::LOGIN_ROUTE);
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception): ?Response
    {
        $data = [
            // you may want to customize or obfuscate the message first
            'message' => strtr($exception->getMessageKey(), $exception->getMessageData())

            // or to translate this message
            // $this->translator->trans($exception->getMessageKey(), $exception->getMessageData())
        ];
        $request->getSession()->getFlashBag()->add('error', $exception->getMessage());
        return new RedirectResponse($this->urlGenerator->generate(self::LOGIN_ROUTE));
    }
}
