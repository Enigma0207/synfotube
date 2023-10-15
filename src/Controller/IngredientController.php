<?php

namespace App\Controller;

use App\Repository\IngredientRepository;
use Knp\Component\Pager\PaginatorInterface;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class IngredientController extends AbstractController
{
    #[Route('/ingredient', name: 'ingredient')]
    // injection de dependance cad injecter un service dans le parametre du controller (IngredientRepository $repository)
    public function index(IngredientRepository $repository,PaginatorInterface $paginator, Request $request): Response
    {
        $ingredients = $repository->findAll();//apl a la fonction findAll depuis ingredientRepository
        // dd($ingredients); si on veut voir ce quilya dans $ingredients 
        $ingredients = $paginator->paginate(
            $repository->findAll(), 
            $request->query->getInt('page', 1), // Page actuelle, pouvant être passé en paramètre d'URL
            10 // Nombre d'éléments par page
        );
        return $this->render('pages/ingredient/index.html.twig', [
            'ingredients'=> $ingredients
        ]);
    }
}
