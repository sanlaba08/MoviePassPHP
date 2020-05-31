<?php namespace views;

?>

</head>
<body class="bg-dark">
 <html class="bg-dark">
 <div class="col bg-dark text-white text-center">
 <div class="bg-dark d-inline-flex">
            <form action="../compra/filterByPelicula" method="post" class="form-inline mx-5 col-sm-5" role="form">
            <div class="row bg-dark text-white border-dark"> 
                 
                    <select name="generos" class="form-control mx-2 mt-2">
                    <option class="form-control bg-dark text-white" value="" selected disabled>Seleccione una pelicula</option>
                            <option class="form-control bg-dark text-white"> Todos las peliculas</option>
                            <?php for($i=0; $i< count($pelis);$i++){ ?>
                                <option value="<?php echo $pelis[$i]->getTitle(); ?>"  class="form-control bg-dark text-white"><?php echo $pelis[$i]->getTitle(); ?> </option>
                                <?php
                                }
                                ?>
                    </select>
                    <button type="submit" class="btn btn-primary ml-auto d-block mt-3" style="margin: auto">Filtrar</button>
                </div>                
            </form>        
  </div>  
  </div>   

<div style="text-align:center;">
<!-- Columna de peliculas actuales-->
                <div class="row justify-content-md-center bg-dark my-5">
                    <div class="col-sm-6 ">
                        <div class="card w-100 mt-2">
                            <div class="card-header bg-primary text-white"><strong>Estadisticas</strong></div>
                            <h6 class="card-subtitle mb-4 text-muted"></h6>
                            
                           <?php foreach($recaudacion as $values){    ?>
                                <div class="float-right">
                                <h6 class="card-subtitle mb-2 text-muted">Cantidad de entradas vendidas en total:</h6>
                                <p class="card-text">
                                        <?php  echo $values->getCantidad_entradas(); ?>
                                    </p>
                                    <h6 class="card-subtitle mb-2 text-muted">Cantidad en $ recaudadas en total:</h6>
                                        <p class="card-text"><?php echo "$"; echo $values->getTotalFinal(); ?></p>

                                        <h6 class="card-subtitle mb-4 text-muted"></h6>
                           <?php } ?>
                                   
     
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
</div>  
</div>



 </html>
