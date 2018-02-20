Skeleton Symfony4 API with Docker
==============

Ce dépot contient le code de base afin de créer une API Symfony sous Docker. Il est encore en cours d'amélioration, vous pouvez également contribuer selon vos envies. :)
L'intêret est d'avoir en une seule commande, un API Symfony opérationnel avec tous les bundles quasi obligatoire d'un projet.

Images docker: 
* `db`: Container MySQL,
* `php`: Container PHP-FPM,
* `nginx`: Container NGinx server web,
* `elk`: Container ELK (ElasticSearch / Logstach / Kibana)
* `phpmyadmin`: Container Phpmyadmin

Bundle Symfony:
* FOSRestBundle
* JWT-Authentication
* FOSUserBundle

# Installation

Premièrement, cloner le dépot:

```bash
$ git clone git@github.com:KizeRemi/Skeleton-API-SF4-Docker.git
```

```bash
$ cd Skeleton-API-SF4-Docker
```
Vous pouvez le renommer le dossier comme vous le souhaitez. Avant de lancer la prochaine, veillez à configurer votre base de données MySQL correctement dans le docker-compose.yml


```bash
$ symfony/bin/app init
```

Cette commande va initialiser tout votre projet. Elle va lancer les container, créer votre base de données, installer les bundles et charger les fixtures. Cette commande est à utiliser une fois ou pour réinitialiser complètement votre projet. Vous pouvez désormais modifier votre .ENV afin de prendre en compte votre base de données ainsi que le PASSPHRASE de JWToken.

# Commandes 

Par la suite, utiliser cette commande pour lancer votre projet
```bash
$ symfony/bin/app start
```

Pour stopper tous les container:
```bash
$ symfony/bin/app destroy
```

Pour stopper les container:
```bash
$ symfony/bin/app stop
```

D'autres commandes sont disponibles, voir le fichier *symfony/bin/app* pour en savoir plus.

Dans le cas où vous utilisez votre propre projet symfony:
```bash
$ docker-compose up -d
```
Mais c'est à vous de créer tout le process d'initialisation de votre projet.


# Pour utiliser PhpMyAdmin!
L'interface phpmyadmin est disponible sur `http://localhost.dev:8080`.

# Pour utiliser Kibana!
Les logs de Nginx et symfony disponibles sur `http://localhost.dev:81`.
.
