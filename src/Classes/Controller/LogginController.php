<?php

namespace Mika\App\Classes\Controller;

use Mika\App\Classes\CleanInput;
use Mika\App\Classes\DB;
use Mika\App\Classes\Model\Manager\UsersManager;
use Mika\App\Classes\RenderController;
use Mika\App\Classes\Controller\ErrorController;

class LogginController extends RenderController
{
    /**
     * display a form loggin to connect a user
     */
    public function displayFormLoggin(){
        $this->render('FormLoggin');
    }

    public function checkLog()
    {
        $clean = new CleanInput(); //appel de la fonction pour clean
        $userManager = new UsersManager();  // cree un nouveaux manager
        $errorMessage = new ErrorController(); //nouveaux controller pour afficher les message d'erreur

        if($clean->issetPostParams('mail', 'pass')) { //clean les input de mon formulaire de connection
            $mail = $clean->verifInput($_POST['mail']);
            $pass = $clean->verifInput($_POST['pass']);
            $user = $userManager->getUserByMail($mail); // recupere l'utilisateur par son mail

            if($user) { // si un utilisateur existe verification du password
                if(password_verify($pass, $user->getPass())) {
                    // alors il est connecté
                    $_SESSION['user'] = $user; // enregistrement de l'utilisateur en session
                    // message ok ou affichage de la vue homelinks.
                    (new HomeController())->displayHome();
                }
                else {
                    // erreur, l'utilisatreur n'a pas donné le bon password
                    $errorMessage->showError('erreur de password');
                }
            }
            else {
                // pas d'utilisateur
                $errorMessage->showError("erreur il n'y as pas d'utilisateur avec ce mail");
            }
        }
        else {
            // pas de post mail ou de post pass
            $errorMessage->showError("Vous devez renseigner tout les champs");
        }
    }
}