<?php

include_once 'DAO.php';
$action = isset($_REQUEST['action'])?$_REQUEST['action']:"";

if (!isset($_SESSION)) {
    session_start();
}

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        switch ($action) {
            case 'logout':
                if ($_SESSION['korisnik']!="") {
                    session_unset();
                    session_destroy();
                }
                break;
        }
        break;
    
    case 'POST':
        switch ($action) {
            case 'Insert':
                $id = isset($_POST['id'])?$_POST['id']:"";
                $brRadnika = isset($_POST['brRadnika'])?$_POST['brRadnika']:"";
                $trajanjePrisustva = isset($_POST['trajanjePrisustva'])?$_POST['trajanjePrisustva']:"";

                if (!empty($id) && !empty($brRadnika) && !empty($trajanjePrisustva)) {
                   $dao = new DAO();
                   $postoji = $dao->getRadnici($id);
                   if ($postoji == false) {
                    $dao->unesi($id, $brRadnika, $trajanjePrisustva);
                    $msgInsert = "Korisnik je uspesno unesen";
                    $_SESSION['id'] = $id;
                    // Redirekcija na prikaz.php
                    header("Location: prikaz.php");
                    exit();

                   }else{
                    $msgInsert = "Korisnik vec postoji";
                    include 'index.php';
                   }
                }else{
                    $msgInsert = "Nisu sva polja unesena";
                    include 'index.php';
                }
                
                break;
        }
        break;
}

?>
