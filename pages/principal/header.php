<?php

$uri = $_SERVER['SERVER_NAME'] . '/' . $_SERVER['REQUEST_URI'];
if($uri=='localhost//TCCPHP/pages/principal/home.php'){
    session_start();
    $Imagem = "home.php";
    $Familia = "responsavelFamilia/responsavelfamilia.php";
    $Cestas = 'cestas/cestas.php';
    $Perfil = 'conta/conta.php';
    $Sair = '../../login/sair.php';
    $_SESSION['home'] = $Imagem;
    $_SESSION['familia'] = $Familia;
}
        

?>



<header>
    <nav class="navbar navbar-expand-lg" style=" background-color: white;">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php $Imagem;?>"><img src='../../imgs/logo2.png' width="60"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link " href="<?echo $_SESSION['familia'] ?>" linkBar">FAMILIAS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php $Cestas?>" id="linkBar">CESTAS</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false" style="color:green">
                            CONTA
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="<?php echo $Perfil?>" id="linkBar">VER PERFIL</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="<?php echo $Sair?>" id="linkBar">SAIR</a>
                            </li>
                        </ul>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
</header>