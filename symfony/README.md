API-Gaming
========

**Réalisé par Mavillaz Rémi**

Github KizeRemi: https://github.com/KizeRemi  

Projet Symfony regroupant les bundles et configs afin de créer une API Restful 

## Installation

Pré-requis : Composer

Ouvrez un terminal, allez dans le dossier d'installation du projet et cloner le dépot

```
git clone https://github.com/KizeRemi/API-Gaming.git

```

Il faut ensuite créer une clé SSL.

```
cd base-api
mkdir -p app/var/jwt
openssl genrsa -out app/var/jwt/private.pem -aes256 4096
openssl rsa -pubout -in app/var/jwt/private.pem -out app/var/jwt/public.pem

```
Puis 
```
composer install

```

## Connexion utilisateur

Pour créer un utilisateur, aller sur la route /user en POST avec en paramètre:
- username
- password
- password_confirmation
- email

Puis pour se log, aller sur le route /login_check en POST avec en paramètre:
- _username
- _password

L'api renvoit un token de connexion, nécessaire pour accéder à toutes les URL de l'api.
Il faut donc envoyer dans le header:
Authorization => Bearer montokenutilisateur



