<?php

namespace App\Controller\Backend;

use App\Entity\Allergene;
use App\Entity\Famille;
use App\Entity\Magasin;
use App\Entity\Produit;
use App\Form\AllergeneType;
use App\Form\FamilleType;
use App\Form\MagasinType;
use App\Form\ProduitType;
use App\Repository\AllergeneRepository;
use App\Repository\FamilleRepository;
use App\Repository\MagasinRepository;
use App\Repository\ProduitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BackEndController extends AbstractController
{
    /**
     * @Route("/admin", name="admin_index")
     */
    public function index()
    {
        
        return $this->render('admin/admin.index.html.twig', [
            'controller_name' => 'BackEndController',
            

        ]);
    }

/*ALLERGENE*/

     /**
     * @Route("/allergene", name="allergene_index",  methods={"GET"})
     */
    public function indexAllergene(AllergeneRepository $allergeneRepository)
    {
      
        return $this->render('admin/allergene/allergene.index.html.twig', [
            
            'allergenes' => $allergeneRepository->findAll()
        ]);
    }

    /**
     * @route("/allergene/new", name="allergene_new")
     */
    public function newAllergene(Request $request) 
    { 
        $allergene = new Allergene();

        $form= $this->createForm(AllergeneType::class, $allergene);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($allergene);
            $em->flush();
            $this->addFlash('success', 'Allergene crée avec succes!');
            return $this->redirectToRoute('allergene_index');
        }
        return $this->render("admin/allergene/allergene.new.html.twig", [
            'allergenes'=> $allergene,
            'form'=> $form->createview()
    
        ]);
    }

     /**
     * @Route("allergene/{id}", name="allergene_delete", methods={"DELETE"})
     */
    public function deleteAllergene(Allergene $allergene,  Request $request)
    {
            if ($this -> isCsrfTokenValid('delete'.$allergene->getId(), $request->get('_token'))) {
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->remove($allergene);
                $entityManager->flush();
                $this->addFlash('success', 'Allergene supprimé avec succes!');
                return $this->redirectToRoute('allergene_index');

            }
                 
    }


     /**
     * @route("/allergene/{id}", name="allergene_edit", methods={"GET","POST"})
     */
    public function editAllergene(Allergene $allergene, Request $request) :Response
    {
         
        $form= $this->createForm(AllergeneType::class, $allergene);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', 'Allergene modifié avec succes!');
            return $this->redirectToRoute('allergene_index');
        }
        return $this->render("admin/allergene/allergene.edit.html.twig", [
            'allergenes'=> $allergene,
            'form'=> $form->createview()
    
        ]);
    }

/*FAMILLE*/

     /**
     * @Route("/famille", name="famille_index",  methods={"GET"})
     */
    public function indexFamille(FamilleRepository $familleRepository)
    {
      
        return $this->render('admin/famille/famille.index.html.twig', [
            
            'familles' => $familleRepository->findAll()
        ]);
    }

    /**
     * @route("/famille/new", name="famille_new")
     */
    public function newFamille(Request $request) 
    { 
        $famille = new Famille();

        $form= $this->createForm(FamilleType::class, $famille);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($famille);
            $em->flush();
            $this->addFlash('success', 'Famille crée avec succes!');
            return $this->redirectToRoute('famille_index');
        }
        return $this->render("admin/famille/famille.new.html.twig", [
            'familles'=> $famille,
            'form'=> $form->createview()
    
        ]);
    }

    
     /**
     * @Route("famille/{id}", name="famille_delete", methods={"DELETE"})
     */
    public function deleteFamille(Famille $famille,  Request $request)
    {
            if ($this -> isCsrfTokenValid('delete'.$famille->getId(), $request->get('_token'))) {
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->remove($famille);
                $entityManager->flush();
                $this->addFlash('success', 'Famille supprimé avec succes!');
                return $this->redirectToRoute('famille_index');

            }
                 
    }

       /**
     * @route("/famille/{id}", name="famille_edit", methods={"GET","POST"})
     */
    public function editFamille(Famille $famille, Request $request) :Response
    {
         
        $form= $this->createForm(FamilleType::class, $famille);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', 'Famille modifié avec succes!');
            return $this->redirectToRoute('famille_index');
        }
        return $this->render("admin/famille/famille.edit.html.twig", [
            'familles'=> $famille,
            'form'=> $form->createview()
    
        ]);
    }

/*MAGASIN*/

     /**
     * @Route("/magasin", name="magasin_index",  methods={"GET"})
     */
    public function indexMagasin(MagasinRepository $magasinRepository)
    {
      
        return $this->render('admin/magasin/magasin.index.html.twig', [
            
            'magasins' => $magasinRepository->findAll()
        ]);
    }

    /**
     * @route("/magasin/new", name="magasin_new")
     */
    public function newMagasin(Request $request) 
    { 
        $magasin = new Magasin();

        $form= $this->createForm(MagasinType::class, $magasin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($magasin);
            $em->flush();
            $this->addFlash('success', 'Magasin crée avec succes!');
            return $this->redirectToRoute('magasin_index');
        }
        return $this->render("admin/magasin/magasin.new.html.twig", [
            'magasins'=> $magasin,
            'form'=> $form->createview()
    
        ]);
    }

    /**
     * @Route("magasin/{id}", name="magasin_delete", methods={"DELETE"})
     */
    public function deleteMagasin(Magasin $magasin,  Request $request)
    {
            if ($this -> isCsrfTokenValid('delete'.$magasin->getId(), $request->get('_token'))) {
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->remove($magasin);
                $entityManager->flush();
                $this->addFlash('success', 'Magasin supprimé avec succes!');
                return $this->redirectToRoute('magasin_index');

            }
                 
    }

    /**
     * @route("/magasin/{id}", name="magasin_edit", methods={"GET","POST"})
     */
    public function editMagasin(Magasin $magasin, Request $request) :Response
    {
         
        $form= $this->createForm(MagasinType::class, $magasin);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', 'Magasin modifié avec succes!');
            return $this->redirectToRoute('magasin_index');
        }
        return $this->render("admin/magasin/magasin.edit.html.twig", [
            'magasins'=> $magasin,
            'form'=> $form->createview()
    
        ]);
    }

/*PRODUIT*/

     /**
     * @Route("/produit", name="produit_index",  methods={"GET"})
     */
    public function indexProduit(ProduitRepository $produitRepository)
    {
      
        return $this->render('admin/produit/produit.index.html.twig', [
            
            'produits' => $produitRepository->findAll()
        ]);
    }

    /**
     * @route("/produit/new", name="produit_new")
     */
    public function newProduit(Request $request) 
    { 
        $produit = new Produit();

        $form= $this->createForm(ProduitType::class, $produit);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($produit);
            
            $em->flush();
            $this->addFlash('success', 'Produit crée avec succes!');
           
            return $this->redirectToRoute('produit_index');
        }
        return $this->render("admin/produit/produit.new.html.twig", [
            'produits'=> $produit,
            'form'=> $form->createview()
    
        ]);
    }

    /**
     * @Route("produit/{id}", name="produit_delete", methods={"DELETE"} )
     * 
     */
    public function deleteProduit(Produit $produit,  Request $request)
    {
            if ($this -> isCsrfTokenValid('delete'.$produit->getId(), $request->get('_token'))) {
                $entityManager = $this->getDoctrine()->getManager();
                dump($produit);
                $entityManager->remove($produit);
                $entityManager->flush();
                $this->addFlash('success', 'Produit supprimé avec succes!');
                return $this->redirectToRoute('produit_index');

            }
                 
    }

    /**
     * @route("/produit/{id}", name="produit_edit", methods={"GET","POST"})
     */
    public function editProduit(Produit $produit, Request $request) :Response
    {
         
        $form= $this->createForm(ProduitType::class, $produit);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', 'Produit modifié avec succes!');
            return $this->redirectToRoute('produit_index');
        }
        return $this->render("admin/produit/produit.edit.html.twig", [
            'produits'=> $produit,
            'form'=> $form->createview()
    
        ]);
    }

}
