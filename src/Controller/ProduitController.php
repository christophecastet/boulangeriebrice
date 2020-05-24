<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Allergene;

use App\Entity\Famille;
use App\Entity\Magasin;
use App\Entity\Produit;
use Symfony\Component\HttpFoundation\Request;

class ProduitController extends AbstractController
{
   
     /**
     * @Route("/NosPains", name="nos_produit_pain")
     */
    public function pain() 
    {
        
        $al = $this->getDoctrine()->getRepository(Allergene::class)->findAll();
        $prod = $this->getDoctrine()->getRepository(Produit::class)->findAll();
        $mag = $this->getDoctrine()->getRepository(Magasin::class)->findAll();
        $fam = $this->getDoctrine()->getRepository(Famille::class)->findAll();

        return $this->render('produit/pain.html.twig', [
            'allergenes' => $al,
            'produits' => $prod,
            'magasins'=>$mag,
            'familles'=> $fam
        ]);
    }
    

      /**
     * @Route("/NosViennoiseries", name="nos_produit_viennoiserie")
     */
    public function viennoiserie() 
    {
        
        $al = $this->getDoctrine()->getRepository(Allergene::class)->findAll();
        $prod = $this->getDoctrine()->getRepository(Produit::class)->findAll();
        $mag = $this->getDoctrine()->getRepository(Magasin::class)->findAll();
        $fam = $this->getDoctrine()->getRepository(Famille::class)->findAll();

        return $this->render('produit/viennoiserie.html.twig', [
            'allergenes' => $al,
            'produits' => $prod,
            'magasin'=>$mag,
            'famille'=> $fam
        ]);
    }

     /**
     * @Route("/NosCakes", name="nos_produit_cake")
     */
    public function cake() 
    {
        
        $al = $this->getDoctrine()->getRepository(Allergene::class)->findAll();
        $prod = $this->getDoctrine()->getRepository(Produit::class)->findAll();
        $mag = $this->getDoctrine()->getRepository(Magasin::class)->findAll();
        $fam = $this->getDoctrine()->getRepository(Famille::class)->findAll();

        return $this->render('produit/cake.html.twig', [
            'allergenes' => $al,
            'produits' => $prod,
            'magasin'=>$mag,
            'famille'=> $fam
        ]);
    }

     /**
     * @Route("/NosDivers", name="nos_produit_diver")
     */
    public function diver() 
    {
        
        $al = $this->getDoctrine()->getRepository(Allergene::class)->findAll();
        $prod = $this->getDoctrine()->getRepository(Produit::class)->findAll();
        $mag = $this->getDoctrine()->getRepository(Magasin::class)->findAll();
        $fam = $this->getDoctrine()->getRepository(Famille::class)->findAll();

        return $this->render('produit/diver.html.twig', [
            'allergenes' => $al,
            'produits' => $prod,
            'magasin'=>$mag,
            'famille'=> $fam
        ]);
    }
    
}


