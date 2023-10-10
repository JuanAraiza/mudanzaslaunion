  <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <i class="nav-icon far fa-user"></i>
        </div>
        <div class="info">
          <a href="#" class="d-block"><b><?php echo $_SESSION['usuario'];  ?></b>&nbsp;|&nbsp;<i><?php echo $_SESSION['sucursal'];  ?></i></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
<!--
<li class="nav-item">
            <a href="tareas.php?bu=18" class="nav-link">
             <i class="fa fa-search" aria-hidden="true"></i>
              <p>&nbsp;&nbsp;&nbsp;
                Buscador
              </p>
            </a>
          </li>
-->

<?php if($_SESSION['tipo_usuario']=='mostrador' || $_SESSION['tipo_usuario']=='admin'){ ?>
<li class="nav-item">
            <a href="#" class="nav-link">
             <i class="fa-solid fa-envelopes-bulk" aria-hidden="true"></i>
              <p>&nbsp;&nbsp;&nbsp;
                Envios
              </p>
            </a>
                  <ul class="nav nav-treeview">
                      
                  <?php if($_SESSION['id_user']==1){ ?>

                    <li class="nav-item">
                        <a href="tareas.php?ncoti_flete=1&tr=1&tipoc=1" class="nav-link">
                         &nbsp;&nbsp;&nbsp;<i class="fa fa-file" aria-hidden="true"></i>
                          <p>&nbsp;&nbsp;&nbsp;
                            Cotización - Flete
                          </p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="tareas.php?ncoti_flete=1&tr=1&tipoc=2" class="nav-link">
                         &nbsp;&nbsp;&nbsp;<i class="fa fa-file" aria-hidden="true"></i>
                          <p>&nbsp;&nbsp;&nbsp;
                            Cotización - Autos
                          </p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="tareas.php?ncoti_flete=1&tr=1&tipoc=3" class="nav-link">
                         &nbsp;&nbsp;&nbsp;<i class="fa fa-file" aria-hidden="true"></i>
                          <p>&nbsp;&nbsp;&nbsp;
                            Cotización - Mudanza
                          </p>
                        </a>
                      </li>
                    <?php } ?>
                  
                  <li class="nav-item">
                        <a href="tareas.php?bu=8" class="nav-link">
                         &nbsp;&nbsp;&nbsp;<i class="fa fa-file" aria-hidden="true"></i>
                          <p>&nbsp;&nbsp;&nbsp;
                            Nuevo Cotización
                          </p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="tareas.php?bu=3" class="nav-link">
                         &nbsp;&nbsp;&nbsp;<i class="fa fa-paper-plane" aria-hidden="true"></i>
                          <p>&nbsp;&nbsp;&nbsp;
                            Nuevo Envio
                          </p>
                        </a>
                      </li>
                       <li class="nav-item">
                        <a href="tareas.php?bu=4" class="nav-link">
                         &nbsp;&nbsp;&nbsp;<i class="fa fa-list" aria-hidden="true"></i>
                          <p>&nbsp;&nbsp;&nbsp;
                          Centro de envios  
                          </p>
                        </a>
                      </li>
                </ul>

</li>




          <li class="nav-item">
            <a href="#" class="nav-link">
             <i class="fa-solid fa-bag-shopping" aria-hidden="true"></i>
              <p>&nbsp;&nbsp;&nbsp;
                Ventas
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="tareas.php?bu=14" class="nav-link">
                 &nbsp;&nbsp;&nbsp;<i class="fa-solid fa-tags" aria-hidden="true"></i>
                  <p>&nbsp;&nbsp;&nbsp;
                  Centro de Ventas  
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="tareas.php?bu=9" class="nav-link">
                 &nbsp;&nbsp;&nbsp;<i class="fa fa-hand-holding-usd" aria-hidden="true"></i>
                  <p>&nbsp;&nbsp;&nbsp;
                  Nuevo Ingreso  
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="tareas.php?bu=11" class="nav-link">
                 &nbsp;&nbsp;&nbsp;<i class="fa fa-list" aria-hidden="true"></i>
                  <p>&nbsp;&nbsp;&nbsp;
                  Movimientos  
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="tareas.php?bu=10" class="nav-link">
                 &nbsp;&nbsp;&nbsp;<i class="fa-solid fa-money-check-dollar" aria-hidden="true"></i>
                  <p>&nbsp;&nbsp;&nbsp;
                  Nuevo Egreso  
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="tareas.php?bu=15" class="nav-link">
                 &nbsp;&nbsp;&nbsp;<i class="fa-solid fa-money-check-dollar" aria-hidden="true"></i>
                  <p>&nbsp;&nbsp;&nbsp;
                  Corte por mes  
                  </p>
                </a>
              </li>


            </ul>
          </li>

          <!------------------   ----->



<li class="nav-item">
            <a href="#" class="nav-link">
             <i class="fa-solid fa-boxes-stacked" aria-hidden="true"></i>
              <p>&nbsp;&nbsp;&nbsp;
                Empaques
              </p>
            </a>
            <ul class="nav nav-treeview">


              <li class="nav-item">
                <a href="tareas.php?bu=17" class="nav-link">
                 &nbsp;&nbsp;&nbsp;<i class="fa-solid fa-box-open" aria-hidden="true"></i>
                  <p>&nbsp;&nbsp;&nbsp;
                  Nuevo Empaque 
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="tareas.php?bu=16" class="nav-link">
                 &nbsp;&nbsp;&nbsp;<i class="fa-solid fa-boxes-packing" aria-hidden="true"></i>
                  <p>&nbsp;&nbsp;&nbsp;
                  Empaques
                  </p>
                </a>
              </li>
              
             


            </ul>
          </li>

          <!------------------   ----->

          <li class="nav-item">
            <a href="tareas.php?bu=19" class="nav-link">
             <i class="fa-solid fa-chart-pie" aria-hidden="true"></i>
              <p>&nbsp;&nbsp;&nbsp;
              Reportes
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="tareas.php?bu=18" class="nav-link">
             <i class="fa-solid fa-people-group" aria-hidden="true"></i>
              <p>&nbsp;&nbsp;&nbsp;
              Clientes Frecuentes
              </p>
            </a>
          </li>
<?php } ?>



      <?php if($_SESSION['tipo_usuario']=='admin'){ ?>
          <li class="nav-item">
            <a href="tareas.php?bu=2" class="nav-link">
             <i class="fa fa-users" aria-hidden="true"></i>
              <p>&nbsp;&nbsp;&nbsp;
                Usuarios
              </p>
            </a>
          </li>
      <?php } ?>
         
         <li class="nav-item bg-red" style="border-radius: 5px;">
                <a href="index.php?c=1" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>CERRAR SESIÓN</p>
                </a>
              </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>