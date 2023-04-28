<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Restaurant;
use App\Repository\RestaurantRepository;
use Twig\Environment;
use Symfony\Component\HttpFoundation\Request;

class IndexController extends AbstractController
{
    #[Route('/', name: 'app_index')]
    public function show(Request $request, Environment $twig, RestaurantRepository $RestaurantRepository): Response
    {

        $offset = max(0, $request->query->getInt('offset', 0));
        $paginator = $RestaurantRepository->getRestaurantPaginator( $offset);

        return new Response($twig->render('index/index.html.twig', [
            //'restaurants' => $RestaurantRepository->findAll(),
            //'restaurant' => $RestaurantRepository->findById(['restaurant' => $restaurant]),
            'restaurants' => $paginator,
            'previous' => $offset - RestaurantRepository::PAGINATOR_PER_PAGE,
            'next' => min(count($paginator), $offset + RestaurantRepository::PAGINATOR_PER_PAGE),
        ]));
    }

    //#[Route('/index', name: 'app_index')]
    //public function index(): Response
    //{
        //return $this->render('index/index.html.twig', [
            //'controller_name' => 'IndexController',
        //]);
    public function index(Environment $twig, RestaurantRepository $RestaurantRepository): Response {
        return new Response($twig->render('index/index.html.twig', [
            
        ]));
    }
    
   

}
    
   
//}
