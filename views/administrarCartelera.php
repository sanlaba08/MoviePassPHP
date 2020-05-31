<?php namespace views;



?>

</head>
<body>

<html class="bg-dark" img class="d-block w-100" src="../views/img/fondo.jpg" style="background-repeat">

<img class="d-block w-100" src="../views/img/fondo.jpg" style="background-repeat">
    <div style="position: absolute; top: 100px; left: 100px;">
          <div class="col-m-12 float-center">
                <div class="row justify-content-md-center ">
                    <div class="col-sm-12">
                         <div class="card-transparent w-100 mt-3 text-white">
                         <div class="card-header">
                              
                              
                                             <form action="../funcion/create" method="post" class="form-inline" role="form">
                                             
                                                  <div class="row mx-2">
                                                       <div class="col-m-7">
                                                            <div class="form-group mx-5">
                                                            <label for="">Cine | Sala:</label>

                                                       <select name="nombreCine" class="form-control mx-2" required >
                                                       <?php foreach($arraySala as $values ) {
                                                            if($values->getExist() == true){ ?>
                                                            <option value="<?php echo $values->getID() ?>"><?php  echo $values->getCine()->getNombre(); echo " | "; echo $values->getNombre()  ?></option>
                                                       <?php } }?> 
                                                       </select>
                                                       
                                                       <label for="">Pelicula:</label>
                                                       <select name="nombrePelicula" class="form-control mx-2" required >
                                                       <?php foreach($pelis as $values ) { ?>
                                                            <option value="<?php echo $values->getTitle() ?>"><?php echo $values->getTitle() ?></option>
                                                       <?php }?> 
                                                       </select class="mx-2">
                                                            
                                                                 <label for="">Fecha:</label>
                                                            <input type="date" name="fecha" value="" min="<?php echo $fecha=strftime( "%Y-%m-%d", time());?>" class="form-control mx-2" required />
                                                                 <label for="">Hora:</label>
                                                                 <input type="time" name="hora" value="" class="form-control mx-2" required />
                                                            </div>
                                                       </div>
                                                       <?php
                                                  
                                             
                                                       ?>
                                                       </div>
                                                       <button type="submit" name="button" class="btn btn-primary ml-auto d-block">Agregar</button>
                                             </form>
                                             
                                             <div class="card-footer text-center text-white">
                                             <main class="py-5">
                                   <section id="listado" class="mb-5">
                                        <div class="container">
                                             <h2 class="mb-4">Listado de Funciones</h2>
                                             <table class="table bg-light-alpha text-white" >
                                                  <thead>
                                                       <th class= "border-0">Sala | Cine</th>
                                                       <th class= "border-0">Pelicula</th>
                                                       <th class= "border-0">Fecha</th>
                                                       <th class= "border-0">Hora</th>
                                                  
                                                  </thead>
                                                  <tbody>
                                                       
                                                       <?php
                                                            if($arrayFuncion){
                                                                 foreach($arrayFuncion as $funcion){
                                                                 
                                                                      ?>
                                                                           <tr>
                                                                                <td class="border-0"><?php echo $funcion->getSala()->getNombre(); echo " | "; echo $funcion->getSala()->getCine()->getNombre() ?></td>
                                                                                <td class="border-0"><?php echo $funcion->getPelicula()->getTitle(); ?></td>
                                                                                <td class="border-0"><?php echo $funcion->getFecha(); ?></td>
                                                                                <td class="border-0"><?php echo $funcion->getHora(); ?></td>
                                                                           </tr>
                                                                      <?php
                                                                      
                                                                 }
                                                            }
                                                       ?>
                                                       
                                                  </tbody>
                                             </table>
                                        </div>
                                   </section>
                              </main>
                                             </div>
                              
               
               </div>
               </div>
          </div>
     </div>
     </div>

</html>
