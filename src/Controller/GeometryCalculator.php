<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\TriangleRepository;
use App\Entity\Triangle;

class GeometryCalculator extends AbstractController
{
    /**
     * @Route("/triangles", name="triangles")
     */
    public function index()
    {   
        $number_of_triangles = 0;
        $total_circumference = 0;
        $total_surface = 0;
                
        $repository = $this->getDoctrine()->getRepository(Triangle::class);
        $triangles = $repository->findAll();
        if (!$triangles) {
            throw $this->createNotFoundException(
            'No product found for id '.$id
        );
        }
        foreach($triangles as $triangle){
        $number_of_triangles++;
        $total_circumference += $triangle->calculateCircumference();
        $total_surface += $triangle->calculateArea();
        }
        return $this->json([
            'number_of_triangles' => $number_of_triangles,
            'total_surface' => $total_surface,
            'total_circumference' => $total_circumference,
        ]);
    
    }
}