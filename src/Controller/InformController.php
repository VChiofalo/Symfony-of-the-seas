<?php

namespace App\Controller;

use App\Repository\TestimonialsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InformController extends AbstractController
{
    #[Route('/inform', name: 'app_inform')]
    public function getAllTestimonies(TestimonialsRepository $testimonialsRepository): Response
    {
        // get all testimonies by id from DB
        $testimonials = $testimonialsRepository -> findAll();

        //dd($testimonials);

        return $this->render('inform/index.html.twig', [
            'controller_name' => 'InformController',
            'testimonials' => $testimonials
        ]);
    }

    #[Route('/inform/{testimony_id}', name: 'app_testimony')]
    public function getOneTestimony($testimonial_id, TestimonialsRepository $testimonialsRepository): Response
    {
        // get testimony by id
        $testimonial = $testimonialsRepository -> findOneById($testimonial_id);

        return $this->render('inform/testimony.html.twig', [
            'testimonial' => $testimonial
        ]);
    }
}
