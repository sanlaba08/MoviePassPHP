<?php namespace views;


?>


<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Material Design Bootstrap</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="detallePeli/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="detallePeli/css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="detallePeli/css/style.min.css" rel="stylesheet">
</head>



<body>
  <main class="mt-5 pt-4">
    <div class="container dark-grey-text mt-2">
      <div class="row wow fadeIn">
        <div class="col-md-4 mb-6">
        <?php foreach($arrayFuncion as $funcion){ 
             if($funcion->getPelicula()->getTitle() == $title){?>
		<img src="https://image.tmdb.org/t/p/w185_and_h278_bestv2<?php echo $funcion->getPelicula()->getImagen();?>" width="300" height="300" class="img-fluid" alt="">
        </div>
        <div class="col-md-8 mb-2">
          <div class="p-4">
         
            <p class="lead font-weight-bold"> <?php echo $title; ?> </p>

			
            <p class="lead font-weight-bold">Sinopsis</p>

            <p><?php echo $funcion->getPelicula()->getOverview(); break;} }?></p>

              <div class="row">
                  <div class="col-sm-4">
                    <dl class="param param-inline">
                      <dt>Funciones disponibles: </dt>
                      <form action="../compra/create" method="post" class="d-flex justify-content-left">
                      <dd>
                        <select name="nombreCine" id="funcion" class="form-control form-control-sm" style="width:380px;">
                        <?php foreach($arrayFuncion as $funcion) {
                          if($funcion->getPelicula()->getTitle() == $title){?> 
                          <option value="<?php echo $funcion->getID() ?>"> <?php echo $funcion->getFecha(); echo " | ";  echo $funcion->getHora(); echo " hs "; echo " | ";  echo $funcion->getSala()->getCine()->getNombre(); echo " - "; echo $funcion->getSala()->getNombre(); echo " | "; echo "$"; echo $funcion->getSala()->getPrecio();  ?> </option>
					            <?php }} ?>
                        </select>
                      </dd>
                          </dl>  <!-- item-property .// -->
                      </div> <!-- col.// -->
                </div> <!-- row.// -->

                <dl class="param param-inline">
                      <dt>Cantidad de entradas: </dt>
                      <input type="number" min="1" name="valor_entrada" value="" class="form-control form-control-sm" style="width:50px;" required />
                      </dl>  <!-- item-property .// -->
              


           


              <!-- Default input -->
              
              <button class="btn btn-primary btn-md my-0 p" type="submit">Comprar
                <i class="fas fa-shopping-cart ml-1"></i>
              </button>


            </form>

          </div>
          <!--Content-->

        </div>
        <!--Grid column-->

      </div>
      <!--Grid row-->

      <hr>
    </div>
  </main>
  
</body>