<?php 
namespace App\Controller;

use App\Entity\Membres;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType; //type pour le controle du formulaire 
use Symfony\Component\Form\Extension\Core\Type\SubmitType; //type pour le controle du formulaire 

class NouveauMembreController extends AbstractController{

    public function nouveauMembre(Request $request){
        
        //utilisé pour l'insertion dans la base (c'est une entité qui correspond a la table membre)
        $membre = new Membres();

        $form = $this->createFormBuilder($membre) //(objet fomulaire)premet de cree le fomulaire d'nscription
            ->add('mail', TextType::class, array('label' => 'Adresse email')) //zone de texte comme des input=typeText
            ->add('password', TextType::class, array('label' => 'Password'))
            ->add('nom', TextType::class, array('label' => 'Nom'))
            ->add('prenom', TextType::class, array('label' => 'Prenom'))
            ->add('save', SubmitType::class, array('label' => 'Nouveau membre'))
            ->getForm();
        $form->handleRequest($request); //la prise en compte de la soumission du fomulaire lors du clique
        
        //c'est cette partie du code qui fait que les informations sont renvoyé sur une autre page sous la forme d'un tableau associatif 
        if ($form->isSubmitted() && $form->isValid()) {
            $membre = $form->getData();
            
            //pour qu'on rentre le nouveau membre dans la base 
            $entityManager = $this->getDoctrine()->getManager(); //methode qui permet de manipuler la table via Doctrine
            $entityManager->persist($membre); //persite : prepare pour mettre l'element de la table  
            $entityManager->flush(); //realsation effective de l'action d'insertion

            /*
            $html = '<html><body> Nouveau membre : <br/> <ul>';
            foreach ($membre as $attribut) {
                $html .= '<li>'.$attribut.'</li>'; 
            } //pour l'insertion d'un nouveau membre 

            $html .= '</ul></body></html>';
            return new Response($html); */ //ce bout de code a servis juste pour tester si le formulaire marché on le remplace par une redirection vers une route 
            return $this->redirectToRoute('app_membres');
        }
        //affichage du formulaire via twig 
        return $this->render('nouveauMembre.html.twig', array('form' => $form->createView() //dans ce cas on demande a twig d'afficher le template
    )); 
    }
}
?>