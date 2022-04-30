<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route("/upgrade")]
class DefaultController
{
    public function saludo()
    {
        return new Response("Hola Mundo");
    }

    #[Route("/user/{name}/{surname}/edad/{age}", methods: ["GET"])]
    public function user($name, $surname, $age)
    {
        return new Response("Soy $name $surname y tengo $age años");
    }

    #[Route("/user", methods: ["GET", "POST"])]
    public function getUser()
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
