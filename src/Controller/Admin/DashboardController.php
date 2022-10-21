<?php

namespace App\Controller\Admin;

use App\Entity\Membre;
use App\Entity\Slider;
use App\Entity\Chambre;
use App\Entity\Commande;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('SbHotel');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Membres', 'fas fa-list', Membre::class);
        yield MenuItem::linkToCrud('Chambres', 'fas fa-list', Chambre::class);
        yield MenuItem::linkToCrud('Commandes', 'fas fa-list', Commande::class);
        yield MenuItem::linkToCrud('Sliders', 'fas fa-list', Slider::class);
        
    }
}
