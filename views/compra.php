<?php namespace views;

?>

</head>
<body>
 <html class="bg-dark">
<div class="col-sm-12 ">
<!-- Columna de peliculas actuales-->
    <?php
        foreach($arrayCompra as $values){ 
            if($values->getUsuario() == $_SESSION['user']){?>
                <div class="row justify-content-md-center bg-dark">
                    <div class="col-sm-11 ">
                        <div class="card w-100 mt-3">
                            <div class="card-header bg-primary text-white"><strong><?php echo $values->getFuncion()->getPelicula()->getTitle(); ?></strong></div>
                        
                            <div class="card-body">
                                <div class="col-sm-5 float-left">
                                    <img src="https://image.tmdb.org/t/p/w185_and_h278_bestv2<?php echo $values->getFuncion()->getPelicula()->getImagen();?>" class="card-img-top w-50 mx-5" alt="">  
                                </div>
                             
                                   
                                <div class="col-sm-7 float-right">
                                <h6 class="card-subtitle mb-2 text-muted">Genero:</h6>
                                <p class="card-text">
                                        <?php   $generos = $values->getFuncion()->getPelicula()->getGenre_ids();
                                        //Busco del array de id cada genero en la base de datos y lo muestro
                                            foreach($generos as $value){
                                                $gen = $pelisController->getGeneroById($value);
                                                echo " " .$gen->getNombre();
                                            }
                                        ?>
                                    </p>
                                    <h6 class="card-subtitle mb-2 text-muted">Sinopsis:</h6>
                                        <p class="card-text"><?php echo $values->getFuncion()->getPelicula()->getOverview(); ?></p>
                                    <h6 class="card-subtitle mb-4 text-muted">Cine: <?php echo $values->getFuncion()->getSala()->getCine()->getNombre();?> </h6>
                                    <h6 class="card-subtitle mb-4 text-muted">Sala: <?php echo $values->getFuncion()->getSala()->getNombre();?> </h6>
                                    <h6 class="card-subtitle mb-4 text-muted">Fecha: <?php   echo $values->getFecha();?> </h6>
                                    <h6 class="card-subtitle mb-4 text-muted">Cantidad de entradas: <?php   echo $values->getCantidad_entradas();?> </h6>
                                    <h6 class="card-subtitle mb-4 text-muted">Precio: $<?php echo $values->getTotal();?> </h6>
                                  
      
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    <?php }} ?>  
</div>  
</div>


 </html>
