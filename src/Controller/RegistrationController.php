<?php

namespace App\Controller;


use App\Entity\User;
use App\Event\UserEvent;
use App\Form\EditProfileFormType;

use App\Form\RegistrationFormType;


use App\Security\GoHomeUser;
use App\Security\LoginFormAuthenticator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Guard\GuardAuthenticatorHandler;


class RegistrationController extends AbstractController
{
//    use ResetPasswordControllerTrait;
//
//    private $resetPasswordHelper;
//
//    public function __construct(ResetPasswordHelperInterface $resetPasswordHelper)
//    {
//        $this->resetPasswordHelper = $resetPasswordHelper;
//    }

    #[Route('/register', name: 'app_register')]
    public function register(Request $request,
                             UserPasswordEncoderInterface $passwordEncoder,
                             GuardAuthenticatorHandler $guardHandler,
                             EntityManagerInterface $entityManager,
                             LoginFormAuthenticator $authenticator,
                             EventDispatcherInterface $dispatcher,
                             GoHomeUser $goHomeUser,
                             Session $session): Response
    {
        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $user->setEnabled(true);
                // encode the plain password
            $user->setPassword(
                $passwordEncoder->encodePassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );
            try{
                $entityManager->persist($user);
                $entityManager->flush();
                $session->getFlashBag()->add('notice', 'El usuario se agregó correctamente!');
//                $event = new UserEvent($user,[]);
//                $dispatcher->dispatch($event, UserEvent::REGISTER_SUCCESS);
                // do anything else you need here, like send an email
                return $goHomeUser->redirectToHome();
            } catch (\Doctrine\DBAL\DBALException $DBalEx) {
                $session->getFlashBag()->add('error', 'Se ha producido un error en la base de datos!!. '. $DBalEx->getMessage() );
            }catch (\Doctrine\DBAL\Exception\UniqueConstraintViolationException $DBalEx) {
                $session->getFlashBag()->add('error', 'NO pueden agregarse valores duplicados!!.  '. $DBalEx->getMessage() );
            }
            catch (\Exception $ex) {
                $session->getFlashBag()->add('error', 'Upss! - '.$ex->getMessage());
            }

        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }

    #[Route("/{id}/edit_profile", name : "edit_profile")]
    public function editProfile(Request $request, User $user): Response
    {


//        $user = new User();
        $form = $this->createForm(EditProfileFormType::class, $user);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {


            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

        }

        return $this->render('registration/editProfile.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }
}
