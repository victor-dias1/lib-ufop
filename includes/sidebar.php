<?php

?>

<div class="d-flex" id="principal">
    <nav class="sidebar">
        <ul class="list-unstyled">
            <li>
                <a href="#submenu1" data-toggle="collapse">
                    <i class="fas fa-user"></i> Usuário
                </a>
                <ul id="submenu1" class="list-unstyled collapse">
                    <li><a href="listar.html"><i class="fas fa-users"></i> Usuários</a></li>
                    <li><a href="#"><i class="fas fa-key"></i> Nível de Acesso</a></li>
                </ul>
            </li>
            <li>
                <a href="#submenu2" data-toggle="collapse"> Gerência</a>
                <ul id="submenu2" class="list-unstyled collapse">
                    <li><a href="gerenciaUsuarios.php"><i class="fas fa-users"></i> Usuários</a></li>
                    <li><a href="gerenciaLivros.php"><i class="fab fa-book"></i> Livros</a></li>
                </ul>

            </li>
            <li><a href="gerenciaEmprestimos.php"> Empréstimos</a></li>
            <li><a href="gerenciaReservas.php"> Reservas</a></li>
            <li><a href="#"><i class="fas fa-sign-out-alt"></i> Sair</a></li>
        </ul>
    </nav>
</div>