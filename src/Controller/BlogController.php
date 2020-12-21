<?php

namespace App\Controller;

use App\Entity\Produits; 
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



class BlogController extends AbstractController
{
    /**
     * @Route("/blog", name="blog")
     */
    public function index()
    {

        $produits = $this->
        getDoctrine()->
        getRepository(Produits::class)->findAll();

        //pour verifier si il y'a une interaction avec la base de données 
       //dd($produits);

        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
        ]);
    }
    

    /**
     * @Route("/" , name="home")
     */
    //faire une fonction qui fera notre blog page d'acceuil
    public function home(){
        return $this->render('blog/home.html.twig');
        
    }
}
