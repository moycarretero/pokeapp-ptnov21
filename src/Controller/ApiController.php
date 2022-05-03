<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

#[Route("/api")]
class ApiController
{
    #[Route("/pokemons")]
    public function getPokemons()
    {
        $pokemons = [
            [
                'name' => 'Wooloo1',
                'description' => 'Su lana rizada es tan acolchada que no se hace daño ni aunque se caiga por un precipicio.',
                'image' => 'https://assets.pokemon.com/assets/cms2/img/pokedex/full/831.png',
                'code' => '831',
            ], [
                'name' => 'Wooloo2',
                'description' => 'Su lana rizada es tan acolchada que no se hace daño ni aunque se caiga por un precipicio.',
                'image' => 'https://assets.pokemon.com/assets/cms2/img/pokedex/full/832.png',
                'code' => '831',
            ], [
                'name' => 'Wooloo3',
                'description' => 'Su lana rizada es tan acolchada que no se hace daño ni aunque se caiga por un precipicio.',
                'image' => 'https://assets.pokemon.com/assets/cms2/img/pokedex/full/833.png',
                'code' => '831',
            ],
        ];

        return new JsonResponse($pokemons);
    }
}
