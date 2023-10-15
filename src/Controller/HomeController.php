<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

// on cree la class avk meme nom du controller ki gere les request http et va returnerdes response
 class HomeController extends AbstractController
{
    /* . Cela indique que cette méthode doit être associée à la route / avec le nom de la route home.index et que la méthode
     accepte uniquement les requêtes HTTP de type GET.*/ 
    #[Route('/', name: 'home.index', methods:['GET'])]
     /*méthode index(). Cette méthode sera appelée lorsque quelqu'un accède à la route /. La méthode
      renvoie un objet Response, qui est utilisé pour envoyer une réponse HTTP au client.*/
  public function index(): Response{
     /*envoie une réponse générée à partir d'un modèle Twig. Le modèle Twig home.html.twig sera 
    utilisé pour générer la réponse HTML retournée au client. RENDEL prend en charge la gestion des vue */
    return $this->render('pages/home.html.twig');
  }   
}
