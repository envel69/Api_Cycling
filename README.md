# Symfony Docker PARTIE 1

A [Docker](https://www.docker.com/)-based installer and runtime for the [Symfony](https://symfony.com) web framework,
with [FrankenPHP](https://frankenphp.dev) and [Caddy](https://caddyserver.com/) inside!

![CI](https://github.com/dunglas/symfony-docker/workflows/CI/badge.svg)

## Getting Started

1. If not already done, [install Docker Compose](https://docs.docker.com/compose/install/) (v2.10+)
2. Run `docker compose build --no-cache` to build fresh images
3. Run `docker compose up --pull always -d --wait` to set up and start a fresh Symfony project
4. Open `https://localhost` in your favorite web browser and [accept the auto-generated TLS certificate](https://stackoverflow.com/a/15076602/1352334)
5. Run `docker compose down --remove-orphans` to stop the Docker containers.

## Features

* Production, development and CI ready
* Just 1 service by default
* Blazing-fast performance thanks to [the worker mode of FrankenPHP](https://github.com/dunglas/frankenphp/blob/main/docs/worker.md) (automatically enabled in prod mode)
* [Installation of extra Docker Compose services](docs/extra-services.md) with Symfony Flex
* Automatic HTTPS (in dev and prod)
* HTTP/3 and [Early Hints](https://symfony.com/blog/new-in-symfony-6-3-early-hints) support
* Real-time messaging thanks to a built-in [Mercure hub](https://symfony.com/doc/current/mercure.html)
* [Vulcain](https://vulcain.rocks) support
* Native [XDebug](docs/xdebug.md) integration
* Super-readable configuration

**Enjoy!**

## Docs

1. [Options available](docs/options.md)
2. [Using Symfony Docker with an existing project](docs/existing-project.md)
3. [Support for extra services](docs/extra-services.md)
4. [Deploying in production](docs/production.md)
5. [Debugging with Xdebug](docs/xdebug.md)
6. [TLS Certificates](docs/tls.md)
7. [Using MySQL instead of PostgreSQL](docs/mysql.md)
8. [Using Alpine Linux instead of Debian](docs/alpine.md)
9. [Using a Makefile](docs/makefile.md)
10. [Updating the template](docs/updating.md)
11. [Troubleshooting](docs/troubleshooting.md)

## License

Symfony Docker is available under the MIT License.

## Credits

Created by [Kévin Dunglas](https://dunglas.dev), co-maintained by [Maxime Helias](https://twitter.com/maxhelias) and sponsored by [Les-Tilleuls.coop](https://les-tilleuls.coop).

# API Cycling PARTIE 2

Cette API a été développée en PHP avec Symfony et Docker. Elle propose des endpoints REST pour gérer des entités liées au cyclisme et intègre plusieurs fonctionnalités complémentaires, notamment :

- Respect des 5 contraintes obligatoires d'une API REST (stateless, verbes HTTP corrects, uniformité des URI, cache, HATEOAS pour le niveau 4).
- Tests unitaires et tests de non-régression.
- Implémentation du cache.
- Middleware pour la gestion des erreurs (renvoi d'erreurs au format JSON).
- Système d'utilisateurs avec authentification JWT et gestion des rôles.
- Endpoint d'upload de fichier (protégé par rôle).
- Commande de scraping automatisé (simulée).
- Préparation pour l'historisation, l'anonymisation et la gestion de statistiques.
- Documentation complète pour l'installation et l'utilisation.

---

## Table des matières

- [Installation](#installation)
- [Configuration](#configuration)
- [Authentification et utilisation du Token](#authentification-et-utilisation-du-token)
- [Tests](#tests)
- [Documentation Technique et récapitulatif](#documentation-technique-et-récapitulatif)

---

## Installation

1. **Cloner le projet**

   ```
   git clone https://github.com/envel69/Api_Cycling.git
   cd Api_Cycling
2. **Lancer les conteneurs Docker**
    ```
    docker-compose up -d --build

3. **Installation des dépendances**
    ```
    docker-compose exec php composer install

## Configuration

**Variables d'environnement**

Pour l'environnement de développement, ton fichier .env doit inclure :

```
APP_ENV=dev
APP_SECRET=$ecretf0rt3st
DATABASE_URL="postgresql://app:!ChangeMe!@database:5432/app?serverVersion=15&charset=utf8"
```

Pour l'environnement de test, assure-toi que le fichier .env.test contient :

```
APP_ENV=test
DATABASE_URL="postgresql://app:!ChangeMe!@database:5432/app_test?serverVersion=15&charset=utf8"
KERNEL_CLASS='App\Kernel'
APP_SECRET='$ecretf0rt3st'
SYMFONY_DEPRECATIONS_HELPER=999999
PANTHER_APP_ENV=panther
PANTHER_ERROR_SCREENSHOT_DIR=./var/error-screenshots
```
## Authentification et utilisation du Token

L'authentification se fait via JWT grâce à LexikJWTAuthenticationBundle.

Faire une requête Post : 
```
http://localhost/api/login_check
```
et écrire dans le body : 
```
{
  "username": "test",
  "password": "test"
}

```
Utiliser le token pour pouvoir faire les différentes requêtes.

## Tests

Pour exécuter les tests unitaires et fonctionnels, lancez :

```
docker-compose exec php php bin/phpunit
```

## Documentation Technique et récapitulatif

Installation
Cloner le projet et lancer Docker Compose.

Installer les dépendances avec Composer.

Exécuter les migrations et charger les fixtures pour créer les tables et insérer les données de test.

Vérifier la configuration des variables d'environnement dans .env et .env.test.

Utilisation du Token
Envoyer une requête POST à /api/login_check avec les identifiants (exemple : "username": "test", "password": "test").

Copier le token retourné et l'inclure dans l'en-tête Authorization (format : Bearer <TON_TOKEN>) pour toutes les requêtes protégées.
