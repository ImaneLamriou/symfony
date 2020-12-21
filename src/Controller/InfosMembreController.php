<?php
namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Membres;

class InfosMembreController extends AbstractController {
    public function infosMembreParId($id) {
        $membre = $this->getDoctrine()
                        ->getRepository(Membres::class)
                        ->find($id);
        $html = '<html><body> Infos sur un membre : <br/> <ul>';
        $html .= '<li>'.$membre->getNom().'</li>';
        $html .= '</ul></body></html>';
        return new Response($html);
    }
        public function infosMembresParMail($mail) {
            $membres = $this->getDoctrine()
                            ->getRepository(Membres::class)
                            ->findBy(array('mail' => $mail));
            $html = '<html><body> Liste des membres : <br/> <ul>';
            foreach ($membres as $membre) {
                $html .= '<li>'.$membre->getNom().'</li>'; 
                }
                $html .= '</ul></body></html>';
                return new Response($html);
            }
        
            public function infosMembresParPrenom($prenom) {
                $membres = $this->getDoctrine()
                                ->getRepository(Membres::class)
                                ->findBy(array('prenom' => $prenom));
                $html = '<html><body> Liste des membres : <br/> <ul>';
                foreach ($membres as $membre) {
                    $html .= '<li>'.$membre->getNom().'</li>'; 
                    }
                    $html .= '</ul></body></html>';
                    return new Response($html);
                }








        }
?>