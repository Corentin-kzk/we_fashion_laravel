
# Projet 2 : We Fashion

Kozka Corentin


## Installation

1. Cloner le projet

   ```
   git clone https://github.com/Corentin-kzk/we_fashion_laravel
   ```

2. Installer les dépendances : Placez-vous dans le répertoire du projet et exécutez la commande suivante pour installer les dépendances :

   ```
   composer install
   npm install
   ```

3. Configurer l'environnement : Créez un fichier `.env` en copiant le fichier `.env.example`. Modifiez les valeurs de ce fichier pour qu'elles correspondent à votre environnement (par exemple, la base de données).

   ```
   cp .env.example .env
   ```

4. Exécuter les migrations et Seeders

   ```
   php artisan migrate:fresh --seed
   ```


**Base de données :**

Nom de la base de donnée : we_fashion

Encodage : UTF8_general_Ci

## Lancement du projet

 Lancer le serveur : Vous pouvez lancer le serveur de développement Laravel en exécutant la commande suivante :

   ```
   php artisan serve
   npm run dev
   ```
Accéder à l'application : Ouvrez votre navigateur et accédez à l'adresse http://localhost:8000 (ou autre adresse si vous avez spécifié un autre port) pour voir l'application en cours d'exécution.

##attention le Compte administrateur

Le compte admin :

EMAIL :  Edouard@admin.com

MDP : admin

acces au compte : localhost:[port]/admin

## Informations complémentaires

Le cahier des charges concerne le développement des pages publiques d'une boutique en ligne, ainsi que la partie administration des produits.

Les contraintes de développement incluent l'utilisation de l'anglais pour les champs et variables,
le nommage en camelCase pour les fonctions/variables et PascalCase pour les classes, la documentation des méthodes et propriétés, l'utilisation du contrôleur de ressource de Laravel pour le CRUD, le service de validation de Laravel pour la gestion des formulaires, l'ORM Eloquent de Laravel pour le traitement des données, et la mise en place d'un github pour versionner le code.

 Les données à gérer comprennent des produits vendus avec un nom, une description, un prix, des tailles, une image, un état (publié ou non publié) et une référence, ainsi que des catégories (homme ou femme).

Le diagramme des tables MySQL doit être élaboré avant les migrations, avec les relations représentées par des flèches. Les pages client comprennent une page d'accueil affichant tous les produits, une page solde affichant les produits en solde, une page homme affichant les produits de la catégorie homme, une page femme affichant les produits de la catégorie femme, et une page produit affichant les détails d'un produit sélectionné.

 Les pages client comprennent également une barre de navigation et un footer communs avec des liens vers des informations légales, le service client et les réseaux sociaux.

  La partie administration est réservée à l'administrateur du site et permet de gérer les produits et les catégories, avec un système d'authentification pour l'administrateur.


##Bonus

Mise en place d'un systeme de gestion de categorie dynamic (client) avec la possibilté de creer une categorie et qu'elle soit directement disponible coté client comme un page a part entiere

Mise en place d'un system login/ register pour un utilisateur et d'acces a la partie admin via le menu deroulant (seulment pour l'admin).

## Auteur Kozka Corentin

- [@we_fashion_laravel](https://github.com/Corentin-kzk/we_fashion_laravel)

