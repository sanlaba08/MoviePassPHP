<?php


?>
</head>
<body>
 <html class="bg-dark">
 <div class="container-fluid bg-dark border-dark">
    <div class="col bg-dark text-white text-center">
        <div class="bg-dark d-inline-flex">
            <form action="../cartelera/filterByDate" method="post" class="form-inline mx-5 col-sm-5" role="form">
                <div class="row bg-dark text-white border-dark">  
                    <p class="mt-3">Fecha</p>
                    <input type="date" name="fecha" value="" class="form-control mx-2 mt-2" required />
                    <button type="submit" class="btn btn-primary ml-auto d-block mt-auto" style="margin: auto">Filtrar</button>
                </div>
            </form>        
            <form action="../cartelera/filterByCategory" method="post" class="form-inline mx-5 col-sm-5" role="form">    
                 <div class="row bg-dark text-white border-dark"> 
                 <p class="mt-3">Categoria</p> 
                    <select name="generos" class="form-control mx-2 mt-2">
                            <option class="form-control bg-dark text-white"> Todos los generos</option>
                            <?php for($i=0; $i< count($allGenres);$i++){ ?>
                                <option value="<?php echo $allGenres[$i]->getNombre(); ?>"  class="form-control bg-dark text-white"><?php echo $allGenres[$i]->getNombre(); ?> </option>
                                <?php
                                }
                                ?>
                    </select>
                    <button type="submit" class="btn btn-primary ml-auto d-block mt-auto" style="margin: auto">Filtrar</button>
                </div>                
               
            </form>
        </div>
    </div>
</div>


<div class="col-sm-12">
<!-- Columna de peliculas actuales-->
    <?php
    for($i=0; $i< count($peliculas);$i++){ 
        foreach($arrayFuncion as $values){
            if($peliculas[$i]->getTitle() == $values->getPelicula()->getTitle()){?>
                <div class="row justify-content-md-center bg-dark">
                    <div class="col-sm-11">
                        <div class="card w-100 mt-3">
                            <div class="card-header bg-primary text-white"><strong><?php echo $peliculas[$i]->getTitle(); ?></strong></div>
                        
                            <div class="card-body">
                                <div class="col-sm-4 float-left">
                                    <img src="https://image.tmdb.org/t/p/w185_and_h278_bestv2<?php echo $peliculas[$i]->getImagen();?>" class="card-img-top w-50 mx-5" alt="">  
                                </div>
                                <div class="col-sm-8 float-right">
                                    <h6 class="card-subtitle mb-2 text-muted">Sinopsis:</h6>
                                        <p class="card-text"><?php echo $peliculas[$i]->getOverview(); ?></p>
                                    <h6 class="card-subtitle mb-2 text-muted">Genero:</h6>
                                    <p class="card-text">
                                        <?php   $generos = $peliculas[$i]->getGenre_ids();
                                        //Busco del array de id cada genero en la base de datos y lo muestro
                                            foreach($generos as $value){
                                                $gen = $pelisController->getGeneroById($value);
                                                echo " " .$gen->getNombre();
                                            }
                                        ?>
                                    </p>
                                </div>
                            </div>

                            <form action="../cartelera/ViewDetallePelicula" method="post">
                                <div class="card-footer text-center">
                                    <button type="submit" name="btnDetalle" class="btn btn-danger" value="<?php echo $peliculas[$i]->getTitle(); ?>" ?> Detalle </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
    <?php break;}}} ?>  
</div>  
</div>


 </html>
