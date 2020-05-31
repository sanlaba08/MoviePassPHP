<?php 
namespace views;
?>


   <!-- Required meta tags -->
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="views/css/bootstrap.min.css">

    
</head>
<body class="bg-dark">
<div id="carouselExampleIndicators" class="carousel slide mt-3 align-content-stretch " data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <?php /*
    for($i=0; $i< count($peliculas);$i++){ 
        foreach($arrayFuncion as $values){
            if($peliculas[$i]->getTitle() == $values->getPelicula()){?>
                <div class="row justify-content-md-center ">
                    <div class="col-sm-11">
                        <div class="card w-100 mt-3">
                            <div class="card-header"><strong><?php echo $peliculas[$i]->getTitle(); ?></strong></div>
                        
                            <div class="card-body">
                                <div class="col-sm-4 float-left">
                                    <img src="https://image.tmdb.org/t/p/w185_and_h278_bestv2<?php echo $peliculas[$i]->getImagen();?>" class="card-img-top w-50 mx-5" alt="">  
                                </div>
                                <div class="col-sm-8 float-right">
                                    <h6 class="card-subtitle mb-2 text-muted">Sinopsis:</h6>
                                        <p class="card-text"><?php echo $peliculas[$i]->getOverview(); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        <?php break;}}} */ ?>
        
    <div class="carousel-inner bg-dark">
      <div class="carousel-item active">
          <img class="d-block w-75 mx-auto" src="../views/img/joker.jpg" alt="First slide">
          <div class="carousel-caption d-none d-md-block">
              <h5>Joker</h5>
              <p>La pasión de Arthur Fleck, un hombre ignorado por la sociedad, es hacer reír a la gente. Sin embargo, una serie de trágicos sucesos harán que su visión del mundo se distorsione considerablemente convirtiéndolo en un brillante criminal.</p>
          </div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-75 mx-auto" src="../views/img/endgame.jpg" alt="Second slide">
        <div class="carousel-caption d-none d-md-block">
          <h5>Avengers Endgame</h5>
          <p>Los Vengadores restantes deben encontrar una manera de recuperar a sus aliados para un enfrentamiento épico con Thanos, el malvado que diezmó el planeta y el universo.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-75 mx-auto" src="../views/img/adastra.jpg" alt="Third slide">
        <div class="carousel-caption d-none d-md-block">
          <h5>Ad Astra</h5>
          <p>Roy McBride es un ingeniero que perdió a su padre en una misión sin retorno a Neptuno para encontrar signos de inteligencia extraterrestre. 20 años después, emprenderá su propio viaje a través del sistema solar para tratar de encontrarlo de nuevo y resolver los misterios del porqué esa primera misión fracasó.</p>
        </div>
      </div>
      
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="views/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
           $(".card").mouseenter(function(){
                $(this).addClass("bg-primary text-white");
            });
            $(".card").mouseout(function(){
                $(this).removeClass("bg-primary text-white");
            });
        });
    </script>

