<?php
    // CONDITIONS NOM
    if ( (isset($_POST['name'])) && (strlen(trim($_POST['name'])) <> 0) ):
        $nom = stripslashes(strip_tags($_POST['name']));
    else:
        $nom = '';
    endif;
  
    // CONDITIONS EMAIL
    if ( (isset($_POST['email'])) && (strlen(trim($_POST['email'])) <> 0) && (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) ):
        $email = stripslashes(strip_tags($_POST['email']));
    elseif (empty($_POST['mail'])):
        $email = '';
    else:
        echo 'invalid mail :(<br />';
        $email = '';
    endif;
  
    // CONDITIONS MESSAGE
    if ( (isset($_POST['message'])) && (strlen(trim($_POST['message'])) <> 0) ):
        $message = stripslashes(strip_tags($_POST['message']));
    else:
        $message = '';
    endif;
  
    // Les messages d'erreurs ci-dessus s'afficheront si Javascript est désactivé
 
 
    // PREPARATION DES DONNEES
    $ip           = $_SERVER['REMOTE_ADDR'];
    $hostname     = gethostbyaddr($_SERVER['REMOTE_ADDR']);
    $destinataire = "adresse@gmail.com";
    $objet        = "[Steam Discover Contact]";
    $contenu      = "Nom de l'expéditeur : " . $nom . "\r";
    $contenu     .= "Email de l'expéditeur : " . $email . "\r\n\n";
    $contenu     .= $message."\r\n\n\n";
    $contenu     .= "Adresse IP de l'expéditeur : " . $ip . "\r\n";
    $contenu     .= "DLSAM : " . $hostname;
  
    $headers  = 'From: "'.$nom.'" <'.$email.'>'."\r\n"; // ici l'expediteur du mail
    $headers .= 'Content-Type: text/plain; charset="ISO-8859-1"; DelSp="Yes"; format=flowed'."\r\n";
    $headers .= 'Content-Disposition: inline'."\r\n";
    $headers .= 'Content-Transfer-Encoding: 7bit'."\r\n";
    $headers .= 'MIME-Version: 1.0';
     
 
 if(isset($_POST['name']) AND isset($_POST['email']) AND isset($_POST['message'])){

    // ENCAPSULATION DES DONNEES 
        @mail($destinataire,$objet,utf8_decode($contenu),$headers);
        $_SESSION['resultat'] = 'Sent Successfully !';
	}
?>