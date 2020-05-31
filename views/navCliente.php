<?php namespace views;
?>

</head>
<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-primary text-white">
        <a class="navbar-brand" href="<?php echo FRONT_ROOT ?>/home/viewHomeCliente">MoviePass</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <!-- ACA HAY UN ERROR. CUANDO VAS A VIEW CARTELERA Y QUERES VOLVER A HOME HAY ERRORES.-->
                    <a class="nav-link" href="<?php echo FRONT_ROOT ?>/home/viewHomeCliente">Inicio <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo FRONT_ROOT ?>/cartelera/verTodasLasPeliculas">Cartelera</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo FRONT_ROOT ?>/home/viewCompra">Mis entradas</a>
                </li>
                
            </ul>

            <form class="form-inline my-2 my-lg-0" action="<?php echo FRONT_ROOT ?>/user/logout?>">
                
                <button class="btn btn-outline-danger my-2 my-sm-0 text-white" type="submit">Cerrar Sesion</button>
            </form>
        </div>
    </nav>