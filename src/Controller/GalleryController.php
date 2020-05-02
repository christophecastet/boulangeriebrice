<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class GalleryController extends AbstractController
{
    /**
     * @Route("gallery", name="gallery_produit")
     */
    public function gallery()
    {
        $texte = [
            0 => "Nos pains",
            1 => "Nos Viennoiseries",
            2 => "Nos Cakes"
        ];

 
        $gallery_1 = [

            [
                'source' => "/img/produits/boulangerieBriceProduit1.jpeg",
                'texte' =>  $texte[0],
            ],
            [
                'source' => "/img/produits/boulangerieBriceProduit2.jpeg",
                'texte' =>  $texte[0],
            ],
            [
                'source' => "/img/produits/boulangerieBriceProduit3.jpeg",
                'texte' =>  $texte[0],
            ],
        ];
        
        $gallery_2 = [
            [   
                'source' => "/img/produits/boulangerieBriceProduit4.jpeg",
                'texte' =>  $texte[1],
            ],
            [
                'source' => "/img/produits/boulangerieBriceProduit5.jpeg",
                'texte' =>  $texte[1],
            ],
            [
                'source' => "/img/produits/boulangerieBriceProduit6.jpeg",
                'texte' =>  $texte[1],
            ],
        ];
           
        $gallery_3 = [
            [
                'source' => "/img/produits/boulangerieBriceProduit7.jpeg",
                'texte' =>  $texte[2],
            ],
            [
                'source' => "/img/produits/boulangerieBriceProduit8.jpeg",
                'texte' =>  $texte[2],
            ],
            [
                'source' => "/img/produits/boulangerieBriceProduit9.jpeg",
                'texte' =>  $texte[2],
            ]
            ];
       
       
        return $this->render('gallery/index.html.twig', [
            'fragment' => 'produit',
            'gallery_1' => $gallery_1,
            'gallery_2' => $gallery_2,
            'gallery_3' => $gallery_3
        ]);
    }
    
}
