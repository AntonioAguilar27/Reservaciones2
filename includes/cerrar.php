<?php

session_start();

    if(isset($_SESSION['usuario'])){
        session_destroy();
        var_dump("hola");
    }

Header("Location: ../login.php");