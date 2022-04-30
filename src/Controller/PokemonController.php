<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PokemonController extends AbstractController
{
    #[Route('/pokemon')]
    public function showPokemon(){
        $pokemon = [
            'name' => 'Wooloo',
            'description'=>'Su lana rizada es tan acolchada que no se hace daño ni aunque se caiga por un precipicio.',
            'image'=>'https://assets.pokemon.com/assets/cms2/img/pokedex/full/831.png',
            'code'=>'831',
        ];
        return $this->render('pokemons/showPokemon.html.twig',['pokemon' => $pokemon]);
    }

}