<?php namespace views;



include('header.php');
?>
</head>
<body>
<html class="bg-dark">

     <tr>
          <td>
               <img class="d-block w-100 mx-auto"src="../views/img/salaCine2.jpg">
               <div style="position: absolute; top: 100px; left: 100px;">
                    <div class="row">   
                         <div class="col-lg-4 col-md-5 col-sm-4 font-italic">
                              <main class="py-5">
                                   <section id="listado" class="mb-5">
                                        <div class="container text-white">
                                             <h2 class="mb-4">Cines</h2>
                                             <form action="../cine/create" method="post" class="form-inline" role="form" >
                                                  <div class="row">
                                                       <div class="col-lg-5">
                                                            <div class="form-group">
                                                                 <label for="" class="mt-1">Nombre del cine</label>
                                                                 <input type="Text" name="nombre" value="" class="form-control mt-1" required />
                                                                 <label for="" class="mt-3">Direccion</label>
                                                                 <input type="Text" name="direccion" value="" class="form-control mt-1" required />
                                                            </div>
                                                       </div> 
                                                  </div>
                                                  <button type="submit" name="button" id="butt" class="btn btn-primary ml-auto d-block mt-3">Agregar</button>
                                                               
                                             </form>
                                        </div>
                                   </section>
                              </main>
                         </div>

                         <div class="col-lg-8 col-md-7 col-md-offset-7 col-sm-4">
                              <main class="py-5">
                                   <section id="listado" class="mb-5">
                                        <div class="container text-center">
                                             <h2 class="mb-4 text-white font-italic text-left">Listado de Cine</h2>
                                             <table class="table bg-light-alpha text-white font-italic">
                                                  <thead>
                                                       <th class="border-0">Nombre</th>
                                                       <th class="border-0">Direccion</th>
                                                       <th class="border-0">Cantidad de Salas</th>
                                                    
                                                  
                                                  </thead>
                                                  <tbody>
                                                       
                                                       <?php
                                                            if($arrayCines){
                                                                 foreach($arrayCines as $cine){
                                                                      if($cine->getExist() == "1"){  
                                                                                   
                                                       ?>
                                                                           <tr>
                                                                                <td class="border-0"><?php echo $cine->getNombre(); ?></td>
                                                                                <td class="border-0"><?php echo $cine->getDireccion(); ?></td>
                                                                                <td class="border-0"><?php echo $cineController->getCantidadSalas($cine->getId()); ?></td>

                                                                                <form action="../cine/delete" method="POST">
                                                                                     <td class="border-0"> 
                                                                                          <button type="submit" name="btnRemove" class="btn btn-danger" value="<?php echo $cine->getNombre(); ?>"> Eliminar </button>
                                                                                     </td>
                                                                                </form>
                                                                                <form action="../home/viewModifyCine" method="POST">
                                                                                     <td class="border-0">
                                                                                          <button type="submit" name="btnModify" class="btn btn-danger" value="<?php echo $cine->getNombre(); ?>"> Modificar </button>
                                                                                     </td>
                                                                                </form>
                                                                                
                                                                           </tr>
                                                                      <?php
                                                                      }
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
          </td>
     </tr>
</html>

