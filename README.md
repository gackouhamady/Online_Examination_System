# Online Examination System

[![PHP](https://img.shields.io/badge/PHP-7.4%2B-blue.svg)](https://www.php.net/)
[![MySQL](https://img.shields.io/badge/MySQL-8.0%2B-blue.svg)](https://www.mysql.com/)
[![HTML5](https://img.shields.io/badge/HTML5-orange.svg)](https://developer.mozilla.org/en-US/docs/Web/HTML)
[![CSS3](https://img.shields.io/badge/CSS3-blue.svg)](https://developer.mozilla.org/en-US/docs/Web/CSS)
[![JavaScript](https://img.shields.io/badge/JavaScript-yellow.svg)](https://developer.mozilla.org/en-US/docs/Web/JavaScript)
[![Bootstrap](https://img.shields.io/badge/Bootstrap-5-green.svg)](https://getbootstrap.com/)
[![Ajax](https://img.shields.io/badge/Ajax-supported-brightgreen.svg)](https://developer.mozilla.org/en-US/docs/Web/Guide/AJAX)
[![XAMPP](https://img.shields.io/badge/XAMPP-supported-lightgrey.svg)](https://www.apachefriends.org/index.html)
[![License: Open](https://img.shields.io/badge/license-Open-lightgrey.svg)](#)

- [Online Examination System](#online-examination-system)
  - [Contexte du projet](#contexte-du-projet)
  - [Objectifs](#objectifs)
  - [Architecture du système](#architecture-du-système)
  - [Technologies utilisées](#technologies-utilisées)
  - [Fonctionnalités principales](#fonctionnalités-principales)
  - [Modélisation du système](#modélisation-du-système)
  - [Interfaces principales](#interfaces-principales)
  - [Outils de développement](#outils-de-développement)
  - [Implémentation](#implémentation)
  - [Difficultés rencontrées](#difficultés-rencontrées)
  - [Conclusion](#conclusion)
  - [Bibliographie & Webographie](#bibliographie--webographie)

## Contexte du projet
Projet réalisé en binôme dans le cadre du **Projet Tutoré Informatique** à l'ENI-ABT. L'objectif était de concevoir un système d'examen en ligne permettant aux apprenants de passer des tests à distance via des questionnaires à choix multiples.

**Membres du projet** :
- Hamady Gackou
- Fatoumata Binta Keita

**Encadrant** :
- Abdoulaye Sidibé, Ph.D


---

## Objectifs
- Permettre aux apprenants de passer des examens à distance.
- Offrir aux enseignants un outil de planification et d'évaluation.
- Fournir à l’administrateur la gestion des utilisateurs et enseignants.


## Architecture du système
Le système comporte trois espaces distincts :
- **Administrateur** : Gestion des utilisateurs et enseignants.
- **Enseignant** : Gestion des examens et questions.
- **Utilisateur (Apprenant)** : Passation des tests.


## Technologies utilisées
- **Front-end** : HTML, CSS, JavaScript, Bootstrap, Ajax
- **Back-end** : PHP, MySQL
- **Serveur** : XAMPP (Apache + MySQL)


## Fonctionnalités principales
- Création de comptes utilisateur et enseignant.
- Authentification sécurisée.
- Planification d'examens par les enseignants.
- Système de questions à choix multiples avec correction automatique.
- Attribution de scores en fonction des réponses.
- Interface administrateur pour gérer les accès.


## Modélisation du système
- **Diagrammes de cas d'utilisation**
- **Diagrammes de séquence**
- **Diagramme de classes**
- **Diagramme d'objets**


## Interfaces principales
- Page d'accueil avec navigation vers les espaces (Admin, Enseignant, Utilisateur).
- Interfaces d'inscription et de connexion.
- Interface d'administration (gestion utilisateurs/enseignants).
- Interface d'accueil pour utilisateurs et enseignants.
- Interface d’examination (avec compteur de temps).


## Outils de développement
- **XAMPP** : Serveur Apache, PHP, MySQL, PhpMyAdmin
- **Bootstrap** : Framework pour un design réactif et adaptatif.
- **PhpMyAdmin** : Gestion des bases de données.


## Implémentation
L’implémentation repose sur :
- Interaction client-serveur via Ajax.
- Sessions PHP pour la gestion de la connexion et du passage d'examen.
- Base de données relationnelle pour stocker utilisateurs, examens, questions et réponses.


## Difficultés rencontrées
- Adaptation aux nouveaux besoins durant le projet.
- Gestion des sessions et sécurité des données.


## Conclusion
Ce projet nous a permis de mettre en pratique nos compétences en développement web, modélisation UML, et gestion de projet informatique. Il nous a aussi appris à gérer l'évolution des besoins et à travailler efficacement en équipe.


---

## Bibliographie & Webographie
- OpenClassrooms, WayToLearnX, Journal du Net, Developpez.com
- GitHub - Projets similaires sur l’upload d'images et QCM interactifs
- Tutoriels YouTube pour la gestion de bases de données et PHP avancé

