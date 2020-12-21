<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Produits
 *
 * @ORM\Table(name="produits")
 * @ORM\Entity
 */
class Produits
{
    /**
     * @var int
     *
     * @ORM\Column(name="idProduit", type="smallint", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idproduit;
    public function getIdproduit() { return $this->idproduit; }

    /**
     * @var string
     *
     * @ORM\Column(name="nomProduit", type="string", length=30, nullable=false)
     */
    private $nomproduit;
    public function getNomproduit() { return $this->nomproduit; }

    /**
     * @var int|null
     *
     * @ORM\Column(name="prixProduit", type="integer", nullable=true)
     */ 

    private $prixproduit;
    public function getPrixproduit() { return $this->prixproduit; }

    /**
     * @var string
     *
     * @ORM\Column(name="descriptionProduit", type="string", length=100, nullable=false)
     */
    private $descriptionproduit;
    public function getDescriptionproduit() { return $this->descriptionproduit; }

    /**
     * @var string|null
     *
     * @ORM\Column(name="imageProduit", type="string", length=255, nullable=true)
     */
    private $imageproduit;
    public function getImageproduit() { return $this->imageproduit; }

    


}