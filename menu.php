<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . "/locadora/index.php" ?>">Sys Loc Disco</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Cadastrar
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . "/locadora/add-cliente.php" ?>">Cliente</a>
                    <a class="dropdown-item" href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . "/locadora/add-disco.php" ?>">Disco</a>
                    <a class="dropdown-item" href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . "/locadora/add-usuario.php" ?>">Usuário</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Listar
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . "/locadora/list-cliente.php" ?>">Cliente</a>
                    <a class="dropdown-item" href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . "/locadora/list-disco.php" ?>">Disco</a>
                    <a class="dropdown-item" href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . "/locadora/list-usuario.php" ?>">Usuário</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Financeiro
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . "/locadora/add-fluxoCaixa.php" ?>">Adicionar Fluxo de Caixa</a>
                    <a class="dropdown-item" href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . "/locadora/list-fluxoCaixa.php" ?>">Listar Fluxo de Caixa</a>
                </div>
            </li>
        </ul>
    </div>
</nav>