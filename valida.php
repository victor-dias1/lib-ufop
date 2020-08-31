<?php
    session_start();
    include_once("conexao.php");

    $btnLogin = filter_input(INPUT_POST, 'btnLogin', FILTER_SANITIZE_STRING);
    if($btnLogin)
    {
        $usuario = filter_input(INPUT_POST, 'loginUsername', FILTER_SANITIZE_STRING);
        $senha = filter_input(INPUT_POST, 'loginPassword', FILTER_SANITIZE_STRING);
        
        if((!empty($usuario)) AND (!empty($senha))){          
            //pesquisar usuário no BD
            $result_usuario = "SELECT * FROM usuarios WHERE email='$usuario'";
            $resultado_usuario = pg_query($conexao, $result_usuario);
            
            if($resultado_usuario){
                $row_usuario = pg_fetch_assoc($resultado_usuario);
                if($senha == $row_usuario['senha']){
                    header("Location: index.php");

                    $_SESSION['cpf'] = $row_usuario['cpf'];
                    $_SESSION['pnome'] = $row_usuario['pnome'];
                    $_SESSION['email'] = $row_usuario['email'];
                }else{
                    $_SESSION['msg'] = "Senha incorreta!";
                    header("Location: login.php");
                }  
            }
        }else{
            $_SESSION['msg'] = "Digite um usuário e uma senha!";
            header("Location: login.php");
        }
    }else{
        $_SESSION['msg'] = "Página não encontrada";
        header("Location: login.php");
    }


?>

