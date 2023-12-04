<?php
    include_once '../../Model/Utilisateur.php';
    include_once '../../Controller/UtilisateurC.php';


        $utilisateurC = new UtilisateurC();

        if (
            isset($_POST["nom_user"]) &&
            isset($_POST["prenom_user"]) && 
            isset($_POST["email_user"]) && 
            isset($_POST["tel_user"]) && 
            isset($_POST["adresse_user"]) &&
            isset($_POST["username"]) && 
            isset($_POST["password_user"]) 
        ) {

            if (
                !empty($_POST["nom_user"]) && 
                !empty($_POST["prenom_user"]) && 
                !empty($_POST["email_user"]) && 
                !empty($_POST["tel_user"]) && 
                !empty($_POST["adresse_user"]) && 
                !empty($_POST["username"]) && 
                !empty($_POST["password_user"]) 
            ){
                $nom_user = $_POST['nom_user'] ; 
                $prenom_user = $_POST['prenom_user'] ; 
                $email_user = $_POST['email_user'] ; 
                $tel_user = $_POST['tel_user'] ;  
                $adresse_user = $_POST['adresse_user'] ; 
                $username = $_POST['username'] ; 
                $password_user = md5($_POST['password_user']) ; 
                $role_user = 'USER_ROLE' ;  

                $utilisateur = new Utilisateur($nom_user,
                                $prenom_user,
                                $email_user,
                                $tel_user,
                                $adresse_user,
                                $username,
                                $password_user,
                                $role_user
                );
                
                $utilisateurC->ajouter_Utilisateur($utilisateur);

                include 'sendmail.php';
                
                echo '<script> alert("Votre compte a été crée avec succès. Vérifiez vos mails pour l\'activer");</script>';
                sleep(5);

                header('Location: sign-in.php');
            }
                
            else
                $error = "Missing information";
                header('Location: sign-in.php');
        }
    
        

    
?>