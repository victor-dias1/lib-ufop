<?php
    $servidor = "ec2-34-236-215-156.compute-1.amazonaws.com";
    $porta = 5432;
    $bancoDeDados = "d1t5mmnc4idlmu";
    $usuario = "axroruviokavnt";
    $senha = "bcf94125d7fa163aca1bbf577a92baf9921566a8fce44c9bf9156b82e1507500";

    $con_string = "host=$servidor port=$porta dbname=$bancoDeDados " +
    "user=$usuario password=$senha";
    
    $conexao = pg_connect($con_string);
    if(!$conexao) 
    {
        die("Não foi possível se conectar ao banco de dados.");
    }
    
    $query = $conexao("INSERT INTO usuarios VALUES (123, 1, .victor., .dias., 123, .exemplo@gmail.com., .1234.)");
?>