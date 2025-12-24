
# TP3 - Formulaires Symfony 2025/2026

## Étudiante
Yousra Essakili - Groupe A 

## But du TP  

Le but de ce TP est de construire un formulaire  en Symfony. 

## Objectif
Créer une page produit avec Symfony et un formulaire pour ajouter un produit au panier. Afficher un message de confirmation après la soumission.

## Mon parcours pour ce TP 
1. Création du projet Symfony
- J’ai créé le projet Symfony vide pour démarrer le TP.
  
2. Création du contrôleur
- Fichier : src/Controller/ProductController.php
- Méthode show() qui rend le template product/show.html.twig.
- Contrôleur créé avant la route YAML pour tester la logique PHP.
  
3. Création du template HTML
-Import de Bootstrap 5.3** :
     ```html
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
     ```
- Fichier : templates/product/show.html.twig
- Contenu initial :
  - Image du produit
  - Nom, prix, description, caractéristiques
  - Bouton « Add to Cart »
  - Test de rendu pour s’assurer que la page s’affiche correctement.
    
4. Définition de la route
- Fichier : config/routes/product.yaml product_show: path: /product controller: App\Controller\ProductController::show
- Après ça, la route /product fonctionne.

5. Création du formulaire Symfony
- Fichier : src/Form/ProductType.php
- Champs : - quantity (nombre) - color (sélection couleur)
- Ajout du formulaire dans le contrôleur avec : \$form = \$this->createForm(ProductType::class); \$form->handleRequest(\$request);

6. Test initial du formulaire
- Utilisation de dd(\$data) pour vérifier la soumission :
 array:2 [ "quantity" => 2 "color" => "white" ] 

7. Gestion finale du formulaire et message flash
- Remplacement de dd(\$data) par :
  if (\$form->isSubmitted() && \$form->isValid()) { \$data = \$form->getData(); \$this->addFlash('success', 'Produit ajouté au panier !'); return \$this->redirectToRoute('product_show'); } - Dans Twig, avant le formulaire, j’affiche les messages flash : {% for label, messages in app.flashes %} {% for message in messages %} <div class="alert alert-success">{{ message }}</div> {% endfor %} {% endfor %}

## Résultat final
- Page produit complète avec image et détails.
- Formulaire Symfony fonctionnel.
- Champs réinitialisés après soumission et message de confirmation affiché sur la même page.

## Remarques 
- Annotations #[Route(...)] non utilisées à cause de la version de Symfony.
- Route définie via YAML. 
-path: /product
-controller: App\Controller\ProductController::show
