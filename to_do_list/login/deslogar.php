<?php
    session_start();
    session_destroy();
    header('location:login.php');
    //echo 'deslogado com sucesso';
    
?>
