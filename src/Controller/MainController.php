<?php
// src/Controller/MainController.php
namespace App\Controller;

use App\Entity\Categorie;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/', name: 'accueil')]
    public function index(): Response
    {
        // Récupérer les catégories avec leurs sous-catégories
        $categories = $this->entityManager->getRepository(Categorie::class)
            ->createQueryBuilder('c')
            ->leftJoin('c.sousCategories', 'sousCat')
            ->addSelect('sousCat')
            ->orderBy('c.id', 'ASC')
            ->getQuery()
            ->getResult();

        return $this->render('main/index.html.twig', [
            'categories' => $categories,
        ]);
    }

    #[Route('/dashboard', name: 'app_dashboard')]
    public function dashboard(): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        return $this->render('dashboard/index.html.twig');
    }

    #[Route('/profil', name: 'app_profil')]
    public function profil(): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');

        return $this->render('user/profil.html.twig');
    }
}
