<?php namespace views;





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
                                             <h2 class="mb-4">Salas</h2>
                                             <form action="../sala/create" method="post" class="form-inline" role="form" >
                                                  <div class="row">
                                                       <div class="col-lg-5">
                                                            <div class="form-group">
                                                                 <label for="">Nombre cine:</label>
                                                                 <select name="nombreCine" class="form-control mx-2" required >
                                                                 <?php foreach($arrayCines as $values ) {
                                                                    if($values->getExist() == true){ ?>
                                                                 <option value="<?php echo $values->getId() ?>"><?php echo $values->getNombre() ?></option>
                                                                 <?php } }?> 
                                                                 </select>
                                                                 <label for="">Nombre de la sala</label>
                                                                 <input type="Text" name="nombre_sala" value="" class="form-control" required />
                                                                 <label for="">Capacidad</label>
                                                                 <input type="number" name="capacidad" min="1" value="" class="form-control" required />
                                                                 <label for="">Valor de la entrada</label>
                                                                 <input type="number" name="valor_entrada" value="" class="form-control" required />
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
                                             <h2 class="mb-4 text-white font-italic text-left">Listado de Sala</h2>
                                             <table class="table bg-light-alpha text-white font-italic">
                                                  <thead>
                                                       <th class="border-0">Nombre Sala</th>
                                                       <th class="border-0">Nombre Cine</th>
                                                       <th class="border-0">Capacidad</th>
                                                       <th class="border-0">Valor Entrada</th>
                                                    
                                                  
                                                  </thead>
                                                  <tbody>
                                                       
                                                       <?php
                                                            if($arraySala){
                                                                 foreach($arraySala as $sala){
                                                                      if($sala->getExist() == "1"){  
                                                                                   
                                                       ?>
                                                                           <tr>
                                                                                <td class="border-0"><?php echo $sala->getNombre(); ?></td>
                                                                                <td class="border-0"><?php echo $sala->getCine()->getNombre(); ?></td>
                                                                                <td class="border-0"><?php echo $sala->getCapacidad(); ?></td>
                                                                                <td class="border-0"><?php echo $sala->getPrecio(); ?></td>
                                                                           

                                                                                <form action="../sala/delete" method="POST">
                                                                                     <td class="border-0"> 
                                                                                          <button type="submit" name="btnRemove" class="btn btn-danger" value="<?php echo $sala->getNombre(); ?>"> Eliminar </button>
                                                                                     </td>
                                                                                </form>
                                                                                <form action="../home/viewModifySala" method="POST">
                                                                                     <td class="border-0">
                                                                                          <button type="submit" name="btnModify" class="btn btn-danger" value="<?php echo $sala->getNombre(); ?>"> Modificar </button>
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

