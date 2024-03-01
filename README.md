# Bucket List EDWM3210

## Étapes d'installation

1. Cloner le projet

2. Installer les dépendances
```shell
composer install
php bin/console importmap:install
```

3. Créer la base de données
```shell
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
php bin/console doctrine:fixtures:load
```

En cas de problème avec les migrations, supprimer les fichiers de migrations puis exécuter les commandes suivantes :
```shell
php bin/console doctrine:database:drop --force
php bin/console doctrine:database:create
php bin/console make:migration
php bin/console doctrine:migrations:migrate
```

4. Démarrer le serveur de développement (si vous n'avez pas de serveur local (ex: Apache))
```shell
php -S localhost:8000 -t public
```
Ou avec le CLI de Symfony (obligatoire pour la gestion des assets avec importmap)
```shell
symfony serve
```

## Étapes de création du projet

1. Créer un nouveau projet Symfony
```shell
composer create-project symfony/skeleton bucket-list
cd bucket-list
composer require webapp # Optionnel (pour installer Doctrine, Twig, etc.)
```
Ou avec le CLI de Symfony
```shell
symfony new bucket-list # ou symfony new --webapp bucket-list
```

2. Créer un controller
```shell
php bin/console make:controller
```

3. Créer une entité
```shell
php bin/console make:entity
```

4. Créer une migration et exécuter les migrations
```shell
php bin/console make:migration
php bin/console doctrine:migrations:migrate
```

5. Créer des fixtures
```shell
composer require --dev orm-fixtures
php bin/console make:fixtures
php bin/console doctrine:fixtures:load
```