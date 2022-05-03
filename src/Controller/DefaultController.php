<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class DefaultController extends AbstractController
{
    public function saludo()
    {
        return new Response("Hola Mundo");
    }

    #[Route("/user/{name}/{surname}/edad/{age}", methods: ["GET"])]
    public function user($name, $surname, $age)
    {
        return $this->render("user.html.twig");
    }

    #[Route("/user", methods: ["GET", "POST"])]
    public function getUserr()
    {
        $user = [
            "nombre" => "Moises",
            "apellidos"=> "Carretero",
            "edad"=>22
        ];

        return new JsonResponse($user);
    }

    #[Route("/user", methods: ["PUT"])]
    public function updateUser()
    {
        return new Response("Voy por método PUT");
    }

    #[Route("/user", methods: ["DELETE"])]
    public function deleteUser()
    {
        return new Response("Voy por método DELETE");
    }
}
