Skeleton Symfony4 API with Docker
==============

[![Build Status](https://secure.travis-ci.org/eko/docker-symfony.png?branch=master)](http://travis-ci.org/eko/docker-symfony)

Ce repo contient le code de base afin de créer une API Symfony sous Docker.

Images docker: 
* `db`: Container MySQL,
* `php`: Container PHP-FPM,
* `nginx`: Container NGinx server web,
* `elk`: Container ELK (ElasticSearch / Logstach / Kibana)

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
Vous pouvez le renommer le dossier comme vous le souhaitez. Puis

```bash
$ symfony/bin/app init
```

Cette commande va initialiser tout votre projet. Elle va lancer les container, créer votre base de données, installer les bundles et charger les fixtures. Cette commande est à utiliser une fois ou pour réinitialiser complètement votre projet.

Par la suite, utiliser cette commande pour lancer votre projet
```bash
$ symfony/bin/app start
```

Pour stopper tous les container:
```bash
$ symfony/bin/app destroy
```

D'autres commandes sont disponibles, voir le fichier *symfony/bin/app* pour en savoir plus.

Dans le cas où vous utilisez votre propre projet symfony:
```bash
$ docker-compose up -d
```
Mais c'est à vous de créer tout le process d'initialisation de votre projet.


# Read logs

You can access Nginx and Symfony application logs in the following directories on your host machine:

* `logs/nginx`
* `logs/symfony`

# Use Kibana!

You can also use Kibana to visualize Nginx & Symfony logs by visiting `http://symfony.dev:81`.

# Code license

You are free to use the code in this repository under the terms of the 0-clause BSD license. LICENSE contains a copy of this license.
