<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Restaurant;
use App\Repository\RestaurantRepository;
use Twig\Environment;
use Symfony\Component\HttpFoundation\Request;

class RestoViewAllController extends AbstractController
{
    #[Route('/resto/view/all', name: 'app_resto_view_all')]
    public function show(Request $request, Environment $twig, RestaurantRepository $RestaurantRepository): Response
    {

        $offset = max(0, $request->query->getInt('offset', 0));
        $paginator = $RestaurantRepository->getRestaurantPaginator( $offset);

        return new Response($twig->render('resto_view_all/index.html.twig', [
            //'restaurants' => $RestaurantRepository->findAll(),
            //'restaurant' => $RestaurantRepository->findById(['restaurant' => $restaurant]),
            'restaurants' => $paginator,
            'previous' => $offset - RestaurantRepository::PAGINATOR_PER_PAGE,
            'next' => min(count($paginator), $offset + RestaurantRepository::PAGINATOR_PER_PAGE),
        ]));
    }

}
