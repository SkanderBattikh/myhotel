<?php

namespace App\Controller;

use App\Entity\Commande;
use App\Repository\SliderRepository;
use App\Form\CommandeFormControllerType;
use App\Repository\ChambreRepository;
use App\Repository\CommandeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/chambre', name: 'chambre')]
    public function chambre(): Response
    {
        return $this->render('home/chambre.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/restaurant', name: 'restaurant')]
    public function restaurant(): Response
    {
        return $this->render('home/restaurant.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/spa', name: 'spa')]
    public function spa(): Response
    {
        return $this->render('home/spa.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/avis', name: 'avis')]
    public function avis(): Response
    {
        return $this->render('home/avis.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/hotel', name: 'hotel')]
    public function hotel(): Response
    {
        return $this->render('home/hotel.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/actualites', name: 'actualites')]
    public function actualites(): Response
    {
        return $this->render('home/actualites.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    // #[Route('/contact', name: 'contact')]
    // public function contact(): Response
    // {
    //     return $this->render('home/contact.html.twig', [
    //         'controller_name' => 'HomeController',
    //     ]);
    // }


    #[Route("/reservation", name:"reservation")]
    public function reservation(): Response
    {
        return $this->render('home/reservation.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }


}
