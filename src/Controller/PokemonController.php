<?php

namespace App\Controller;

use App\Entity\Pokemon;
use App\Form\PokemonType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 *
 */
class PokemonController extends AbstractController
{

  #[Route('/pokemon/{id}')]

  /**
   *
   */
  public function showPokemon($id, EntityManagerInterface $doctrine)
  {

    $repository = $doctrine->getRepository(Pokemon::class);

    $pokemon = $repository->find($id);

    return $this->render('pokemons/showPokemon.html.twig', ['pokemon' => $pokemon]);
  }

  #[Route('/pokemons', name: 'listPokemons')]

  /**
   *
   */
  public function listPokemon(EntityManagerInterface $doctrine)
  {

    $repository = $doctrine->getRepository(Pokemon::class);

    $pokemons = $repository->findAll();

    return $this->render(
      'pokemons/listPokemons.html.twig',
      ['pokemons' => $pokemons]
    );
  }

  #[Route("/react/pokemons")]
  public function reactPokemons()
  {
    return $this->render("pokemons/reactPokemons.html.twig");
  }
  #[Route("/new/pokemon")]
  public function insertPokemons(EntityManagerInterface $doctrine)
  {
    $pokemon1 = new Pokemon();
    $pokemon1->setName("Wooloo");
    $pokemon1->setDecription("Su lana rizada es tan acolchada que no se hace daño ni aunque se caiga por un precipicio.");
    $pokemon1->setImage('https://assets.pokemon.com/assets/cms2/img/pokedex/full/831.png');
    $pokemon1->setCode("831");
    $pokemon2 = new Pokemon();
    $pokemon2->setName("Wooloo2");
    $pokemon2->setDecription("Su lana rizada es tan acolchada que no se hace daño ni aunque se caiga por un precipicio.");
    $pokemon2->setImage('https://assets.pokemon.com/assets/cms2/img/pokedex/full/832.png');
    $pokemon2->setCode("832");
    $pokemon3 = new Pokemon();
    $pokemon3->setName("Wooloo3");
    $pokemon3->setDecription("Su lana rizada es tan acolchada que no se hace daño ni aunque se caiga por un precipicio.");
    $pokemon3->setImage('https://assets.pokemon.com/assets/cms2/img/pokedex/full/833.png');
    $pokemon3->setCode("833");

    $doctrine->persist($pokemon1);
    $doctrine->persist($pokemon2);
    $doctrine->persist($pokemon3);
    $doctrine->flush();
  }


  #[Route("/insert/pokemon", name: "insertPokemon")]
  public function form(Request $request, EntityManagerInterface $doctrine)
  {
    $form = $this->createForm(PokemonType::class);
    $form -> handleRequest($request);
    if ($form-> isSubmitted() && $form-> isValid()) {
      $pokemon = $form->getData();

      $doctrine->persist($pokemon);
      $doctrine->flush();

      $this->addFlash(
        "success", "pokemon insertado correctamente"
      );
      return $this->redirectToRoute("listPokemons");
    }
    return $this->renderForm("pokemons/insertPokemon.html.twig", ["pokemonForm"=>$form]);
  }
}
