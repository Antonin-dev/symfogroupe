<?php

namespace App\Controller;

use App\Entity\Attraction;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AttractionController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    /**
     * @Route("/attraction", name="attraction")
     */
    public function index(): Response
    {

        $attractions = $this->entityManager->getRepository(Attraction::class)->findAll();
        

        return $this->render('attraction/index.html.twig', [
            'attractions' => $attractions
        ]);
    }

    /**
     * @Route("/attraction/detail/{slug}", name="attraction_detail")
     */
    public function detail($slug): Response
    {

        $attraction = $this->entityManager->getRepository(Attraction::class)->findOneBy([
            'slug' => $slug
        ]);
        

        return $this->render('attraction/detail.html.twig', [
            'attraction' => $attraction
        ]);
    }
}
