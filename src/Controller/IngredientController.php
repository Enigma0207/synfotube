<?php

namespace App\Controller;

use App\Repository\IngredientRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class IngredientController extends AbstractController
{
    #[Route('/ingredient', name: 'ingredient')]
    // injection de dependance cad injecter un service dans le parametre du controller (IngredientRepository $repository)
    public function index(IngredientRepository $repository): Response
    {
        $ingredients = $repository->findAll();//apl a la fonction findAll depuis ingredientRepository
        // dd($ingredients); si on veut voir ce quilya dans $ingredients 
        return $this->render('pages/ingredient/index.html.twig', [
            
            'ingredients'=> $ingredients
            // ou bien on supprime la ligne 16, et la lige 20 devient  'ingredients'=>$repository->findAll()
        ]);
    }
}
