# Wiki Content Management System

Ce projet vise à créer un système de gestion de contenu Wiki avec une interface utilisateur conviviale et des fonctionnalités avancées tant du côté administrateur que du côté utilisateur.

## Fonctionnalités clés

### Partie Back Office

#### Gestion des Catégories

- L'administrateur peut créer, modifier et supprimer des catégories pour organiser le contenu.
- Possibilité d'associer plusieurs wikis à une catégorie.

#### Gestion des Tags

- L'administrateur peut créer, modifier et supprimer des tags pour faciliter la recherche et le regroupement du contenu.
- Les tags sont associés aux wikis pour une navigation plus précise.

#### Inscription des Auteurs

- Les auteurs peuvent s'inscrire sur la plateforme en fournissant des informations de base (nom, adresse e-mail, mot de passe).

#### Gestion des Wikis

- Les auteurs peuvent créer, modifier et supprimer leurs propres wikis.
- Les auteurs peuvent associer une seule catégorie et plusieurs tags à leurs wikis.
- Les administrateurs peuvent archiver les wikis inappropriés.

#### Tableau de Bord (Dashboard)

- Consultation des statistiques des entités via le tableau de bord.

### Partie Front Office

#### Login et Register

- Les utilisateurs peuvent créer un compte en fournissant des informations de base.
- Connexion des utilisateurs à leurs comptes existants.
- Redirection des administrateurs vers le tableau de bord et des autres utilisateurs vers la page d'accueil.

#### Barre de Recherche

- Barre de recherche AJAX pour rechercher des wikis, des catégories et des tags sans actualisation de la page.

#### Affichage des Derniers Wikis

- Affichage des derniers wikis ajoutés pour un accès rapide au contenu le plus récent.

#### Affichage des Dernières Catégories

- Présentation des dernières catégories créées ou mises à jour.

#### Redirection vers la Page Single des Wikis

- Redirection des utilisateurs vers une page unique dédiée à un wiki avec des détails complets.

## Technologies Requises

### Frontend

- HTML5, CSS Framework, JavaScript

### Backend

- PHP 8 avec une architecture MVC

### Database

- PDO driver

## Bonus

### Upload des Images en PHP

- Possibilité d'uploader des images sur la plateforme pour enrichir le contenu.
- Gestion des formats d'images courants, validation des types de fichiers, stockage sécurisé des images associées aux wikis.

### Architecture MVC

- Système de routage selon l'architecture Modèle-Vue-Contrôleur (MVC).
- Utilisation de namespace pour l'organisation des classes.


---


