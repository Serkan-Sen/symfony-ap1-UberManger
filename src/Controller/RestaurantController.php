<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Restaurant;
use App\Repository\RestaurantRepository;
use Twig\Environment;


class RestaurantController extends AbstractController
{
    /*#[Route('/restaurant', name: 'app_restaurant')]
    public function index(Environment $twig, RestaurantRepository $RestaurantRepository): Response {
        return new Response($twig->render('index/restaurant.html.twig', [
            'restaurants' => $RestaurantRepository->findAll(),
        ]));
    }*/
    #[Route('/restaurant/{id}', name: 'app_restaurant')]
    public function show(Environment $twig, restaurant $restaurant, RestaurantRepository $RestaurantRepository): Response
    {
        return new Response($twig->render('index/restaurant.html.twig', [
            'restaurant' => $restaurant,
            'restaurants' => $RestaurantRepository->findById(['restaurants' => $restaurant]),
        ]));
    }
    /*public function index(): Response
    {
        return $this->render('restaurant/index.html.twig', [
            'controller_name' => 'RestaurantController',
        ]);

    }*/
}
