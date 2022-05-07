<?php
namespace App\Controller;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Form\UserType;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserController extends AbstractController {
    #[Route("/insert/user", name: "insertUser")]
  public function form(Request $request, EntityManagerInterface $doctrine, UserPasswordHasherInterface $hasher)
  {
    $form = $this->createForm(UserType::class);
    $form -> handleRequest($request);
    if ($form-> isSubmitted() && $form-> isValid()) {
            $user = $form->getData();
            $password=$hasher->hashPassword($user,$user->getPassword());
            $user->setPassword($password);
      $doctrine->persist($user);
      $doctrine->flush();

      $this->addFlash(
        "success", "user insertado correctamente"
      );
      
    }
    return $this->renderForm("users/insertUsers.html.twig", ["userForm"=>$form]);
  }

}