<?php 

namespace views;

?>
</head>
<body>
<html class="bg-dark">
<img class="d-block w-100 mx-auto"src="../views/img/salaCine2.jpg">
     <div style="position: absolute; top: 100px; left: 100px;">
          <div class="row text-white">
               <div class="col-md-8 mt-2">
                    <main class="py-5">
                         <section id="listado" class="mb-5">
                              <div class="container">
                                   <h1 class="mb-4">Salas</h1>

                                   <form action="../sala/modify" method="post" class="form-inline" role="form">
                                   <?php
                                             if(isset($_POST["btnModify"])){
                                                       foreach($arraySalas as $salas){
                                                       if($_POST["btnModify"] == $salas->getNombre()){

                                   ?>
                                        <div class="row mt-2">
                                             <div class="col-lg-3">
                                                        <h3><?= $salas->getNombre();?></h3>
                                                  <div class="form-group mt-3">
                                                       
                                                       <label for="">Capacidad</label>
                                                       <input type="Text" name="capacidad" value="<?php echo $salas->getCapacidad() ?>" class="form-control mt-1" required />
                                                       <label for="">Precio</label>
                                                       <input type="Text" name="precio" value="<?php echo $salas->getPrecio() ?>" class="form-control mt-1" required />
                                                  </div>
                                             </div>
                                             <?php
                                             }
                                        }
                                   }
                                   else{
                                        echo "<script> alert('Volverá a la pagina principal');";  
                                        echo "window.location = '../home/viewAdminSala'; </script>";
                                   }
                                   ?>
                                        </div>
                                        <button type="submit" name="btnModify" value="<?php echo $_POST["btnModify"]; ?>" class="btn btn-dark ml-auto d-block mt-3">Modificar</button>
                                   </form>
                              </div>
                         </section>
                    </main>
               </div>
          </div>
     </div>
</html>

