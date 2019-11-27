<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\TriangleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Triangle;

class TriangleController extends AbstractController
{
    private $entityManager;
    private $repository;

    public function __construct(TriangleRepository $repository, EntityManagerInterface $entityManager) {
        $this->repository = $repository;
        $this->entityManager = $entityManager;
    }
    /**
     * @Route("/triangle/{a}/{b}/{c}", methods={"POST"}, name="triangle", requirements={"a"="\d+","b"="\d+","c"="\d+"})
     */
    public function index(int $a, int $b, int $c)
    {
        $triangle = new Triangle();
        $triangle->setA($a);
        $triangle->setB($b);
        $triangle->setC($c);
        $this->entityManager->persist($triangle);
        $this->entityManager->flush();
        return new Response('Successfully saved to database!');
    }  
}
