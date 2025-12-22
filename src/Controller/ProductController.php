<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\ProductType;

class ProductController extends AbstractController
{
    #[Route('/product', name: 'product_show')]
    public function show(Request $request): Response
    {
        // Création du formulaire
        $form = $this->createForm(ProductType::class);

        // Gestion de la soumission
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            // Message de confirmation
            $this->addFlash('success', 'Produit ajouté au panier !');

            // Redirection pour éviter la resoumission du formulaire
            return $this->redirectToRoute('product_show');
        }

        return $this->render('product/show.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
