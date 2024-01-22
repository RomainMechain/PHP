# README

## Présentation : 

Dans ce projet nous mettons en place une application web en PHP, permettant à un utilisateur de répondre à un questionnaire, et de consulter les résultats, mis dans une base de données. 

## Lancement :

- Pour lancer le code, il suffit de se placer dans le repertoire PHP et d'executer la commande `php -S localhost:<port>` avec le port sur lequelle vous voulez le lancer. 

## Repartition des fichiers :

- Actions : Contient les pages de l'application 
    - CSS : Dossier contenant l'ensemble des fichiers CSS 
    - form.php : Affiche la page du formulaire avec l'ensemble des questions 
    - submit.php : Affiche la page de résultat avec le score obtenue 
    - bd.php : Permet l'enregistrement dans la base de données ainsi que l'affichage des résultats
- Classes : L'ensemble des fichiers représentant le model de l'application 
    - Autoloader.php : Permet de charger tout les requirements
    - Provider.php : Permet de lire les données depuis le JSon 
    - Factory.php : Permet de créer les classes à partir du Provider
    - Form : Ensemble des classes représentant les objets du questionnaire
- Data : contient le fichier JSon avec l'ensemble des questions du questionnaire 
- Index.php : Fichier principale, permettant l'execution de l'application 

## Groupe : 

- Antoine Debray
- Romain Mechain 
- Info21B