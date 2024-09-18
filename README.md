<p align="center"><img src="https://raw.githubusercontent.com/DoubleRiichi/cubepedia/main/resources/img/cubepedia.png?token=GHSAT0AAAAAACXV7ZLSBT3KYGICJTHGU6JGZXLAHFA" width="400" alt="Movieshelter"></p>

# Introduction
Cubepedia est un simple wiki clone capable de créer des article, de proposer un espace de discussion pour chacun d'entre eux et dispose de rôles utilisateurs régissant l'accès au contenu du site. 

Les articles sont composés d'une introduction et d'un nombre variable de sections, associés à un nombre variable d'image. Seul les rôles "editor" et "admin" peuvent avoir accès à la rédaction d'articles 
Le projet utilise les technologies suivantes :  

### Frontend : 

- Langage : HTML5, JS, CSS3 
- Librairie : bootstrap 

### Backend :  
- Langage : PHP-8.3  
- Framework : Laravel  

### Base de données :  
- Sqlite pendant le développement

# Installation 
*Dépendance: PHP-8.3, Composer, SQLite*
1. Cloner le répertoire [https://github.com/DoubleRiichi/cubepedia.git](https://github.com/DoubleRiichi/cubepedia.git)
2. ```console
   cd cubepedia
   ```
   
4. ```console
   composer install
   ```
5. créer fichier .env, paramétrer sa BDD
   
7. ```console
   php artisan key:generate
   ```
8. ```console
   php artisan migrate:fresh
   ```
10. ```console
    php artisan db:seed
    ``` 
11. ```console
    php artisan storage:link
    ```



Par défaut trois comptes sont créés, un compte utilisateur, un compte éditeur et un compte administrateur. Pour s'y connecter:

**Admininistrateur**
- username: admin
- password: adminadmin

**Utilisateur**
- username: user 
- password: useruser

**Editeur**
- username: editor
- password: editoreditor

# TODO:

- système d'édition d'article
- système de récupérations d'articles (table "edit_history")
- système de lien entre articles
- formulaire de promotion d'utilisateur (user -> editor) 

