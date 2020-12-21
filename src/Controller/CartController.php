<?php

namespace App\Controller;

use App\Entity\Produits; 
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CartController extends AbstractController
{
    /**
     * @Route("/panier", name="cart")
     */
    public function index(SessionInterface $session): Response
    {
        $panier = $session->get('panier',[]);

        $panierWithData = [];

        foreach($panier as $idproduit => $quantity){
            $produits = $this->getDoctrine()->getRepository(Produits::class)->find($idproduit);
            $panierWithData[] = [
                'produit' => $produits ,
                'quantity' => $quantity
            ];

        }

        $total = 0;

        foreach ($panierWithData as $item){
            $totalItem = $item['produit']->getPrixproduit() * $item['quantity'];
            $total += $totalItem;
            
        }


        return $this->render('cart/index.html.twig', [
            'items' => $panierWithData ,
            'total' => $total
            ]);
        }
    
    /**
     * @Route("/panier/add/{idproduit}", name="cart_add")
     */
    public function add($idproduit, SessionInterface $session){

    $panier = $session->get('panier', []);

    if(!empty($panier[$idproduit])){

        $panier[$idproduit]++;
    } else {

    $panier[$idproduit] = 1;
     }

    $session->set('panier', $panier);
    
    return $this->redirectToRoute("cart");
    
    
    }
    

     /**
     * @Route("/panier/remove{idproduit}", name="cart_remove")
     */
    public function remove($idproduit, SessionInterface $session){
        
        $panier = $session->get('panier', []);

        if(!empty($panier[$idproduit])){
            unset($panier[$idproduit]);
        }
        $session->set('panier', $panier);

        return $this->redirectToRoute("cart");
    }
}