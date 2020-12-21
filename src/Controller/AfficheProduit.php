<?php 
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Produits; 

class AfficheProduit extends AbstractController{
    
    public function listerProduits() {
        $produits = $this->
        getDoctrine()->getRepository(Produits::class)->findAll();
        foreach ($produits as $produit) {
            $produit->getIdproduit();
            $produit->getNomproduit();
            $produit->getPrixproduit();
            $produit->getDescriptionProduit();
            $produit->getImageProduit();  
        }
        return $this->render('/blog/AfficheProduit.html.twig', ['produits' => $produits]);


}

}

?>
