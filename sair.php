<?php
    session_start();

    unset(
        $_SESSION['cpf'],
        $_SESSION['nome'],
        $_SESSION['email'],
    );

    header("Location: index.php");
