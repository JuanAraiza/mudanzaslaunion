<section class="content">
                <div class="container-fluid">
                    <div class="row">

                    
                        <!-- /.col -->
                        <div class="col-md-12">
                            <div class="card card-primary">
                                <div class="card-body p-0">
                                    <!-- THE CALENDAR -->
                                    <div id="calendar"></div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>

            <!--------------------  Comentarios ----------------------->
<?php if(isset($_GET['vernot'])){ ?>



<div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">NOTA</h4>
              </div>
              <form name="form" id="form" method="post" action="tareas.php">
              <div class="modal-body">
               <?php
          $querycc2 = "SELECT * FROM notas_i where id=".$_GET['nt']; 
          $resultcc2 = $link->query($querycc2);
          $i=0;
          while($rowcc2=mysqli_fetch_row($resultcc2)){
          $i++;
          ?><h2><?php echo $rowcc2[1]; ?></h2><?
}
 

?>

              </div>
             
              </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <script type="text/javascript">
          $(function () {
            <?php if($i!=0){ ?>
          $('#modal-default').modal('show');
<?php } ?>
        })
        </script>



<?php }else{ ?>
<div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">NOTAS</h4>
              </div>
              <form name="form" id="form" method="post" action="tareas.php">
              <div class="modal-body">
               <?php
          $querycc2 = "SELECT * FROM notas_i where fecha='".date('Y-m-d')."'"; 
          $resultcc2 = $link->query($querycc2);
          $i=0;
          while($rowcc2=mysqli_fetch_row($resultcc2)){
          $i++;
          ?><H2><?php echo $rowcc2[1]; ?></H2><?
}
 

?>

              </div>
             
              </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <script type="text/javascript">
          $(function () {
            <?php if($i!=0){ ?>
          $('#modal-default').modal('show');
<?php } ?>
        })
        </script>

<?php } ?>
<!--------------------  Fin Comentarios ------------------>