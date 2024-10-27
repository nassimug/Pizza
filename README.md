# Site de Pizzeria

Ce site permet de commander des pizzas à emporter, avec trois types d'acteurs : les utilisateurs, le gérant (administrateur) du site et le pizzaiolo.

## Introduction

- **Les utilisateurs** : peuvent parcourir la liste des pizzas, les ajouter au panier, passer une commande et suivre le statut de celle-ci.
- **Le gérant (administrateur)** : peut ajouter/modifier des pizzas, voir l’état des commandes, et gérer la recette du jour.
- **Le pizzaiolo** : peut voir les commandes dans l’ordre d’arrivée et mettre à jour leur statut.

## Méthodes

### Administrateur

#### Gestion des pizzas :
- Ajouter une nouvelle pizza.
- Voir la liste des pizzas.
- Modifier le descriptif ou le nom d’une pizza.
- « Supprimer » une pizza (si elle a déjà été commandée, suppression avec **SoftDelete** uniquement).
- Mettre à jour l’image associée à la pizza (lors de l’ajout ou de la modification).

#### Gestion des commandes :
- Afficher les commandes pour une date donnée.
- Afficher les commandes du jour, triées par statut et date.
- Afficher toutes les commandes (avec pagination).
- Afficher la recette du jour.
- Voir le détail d’une commande (pizzas commandées et prix total).

#### Gestion des utilisateurs :
- Changer son mot de passe.
- Créer un administrateur ou un pizzaiolo.
- Changer le mot de passe du pizzaiolo.
- Supprimer un utilisateur (admin ou pizzaiolo).

### Pizzaiolo

- Voir la liste des commandes non traitées (triées par heure d’arrivée).
- Voir le détail des commandes non traitées.
- Mettre à jour le statut de la commande (en traitement, prête, récupérée).
- Changer son mot de passe.

### Utilisateurs

#### Gestion du compte :
- Création de compte.
- Changement de mot de passe.

#### Commande de pizzas :
- Parcourir la liste des pizzas (avec pagination).
- Ajouter des pizzas dans le panier.
- Modifier la quantité des pizzas dans le panier.
- Supprimer des pizzas du panier.
- Afficher le prix total et passer la commande.

#### Gestion des commandes :
- Voir la liste des commandes passées, triées par date (avec pagination).
- Voir le détail de chaque commande (pizzas et prix total).
- Voir les commandes non récupérées (statuts : envoyé, en traitement, prête).

## Base de Données

- **users** : (id, nom, prenom, login, mdp, type)
- **pizzas** : (id, nom, description, prix, created_at, updated_at, deleted_at)
- **commandes** : (id, user_id, statut, created_at, updated_at)
- **commande_pizza** : (commande_id, pizza_id, qte)

## Outils Utilisés

- **Framework** : Laravel
- **Langages** : PHP, HTML, CSS
- **Base de données** : SQLite

## Utilisation

1. **Clonez le dépôt :** `git clone https://github.com/nassimug/Pizza`

2. **Naviguez dans le répertoire du projet :** `cd Pizza`

3. **Installez les dépendances :** `composer install`

4. **Configuration de l'environnement :** - Copiez le fichier d'exemple d'environnement : `cp .env.example .env` - Générez la clé de l'application : `php artisan key:generate` - Mettez à jour le fichier `.env` avec les informations de votre base de données.

5. **Migration de la base de données :** `php artisan migrate`

6. **Lancez l'application :** `php artisan serve`

7. **Accédez à l'application :** - Ouvrez votre navigateur et allez à : [http://localhost:8000](http://localhost:8000)


