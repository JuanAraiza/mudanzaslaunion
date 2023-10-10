

<div class="row">
    <div class="col-md-12"> 
<div  style="border-radius:8px;">
        
            <form method="POST" action="tareas.php?med=1" enctype="multipart/form-data">
                <fieldset>
                    <legend>Nueva Medida de mueble</legend>
                 
                      </fieldset>
                      
                      <fieldset>
                      <? if(isset($_GET['edi'])){


    $queryre = "SELECT * from medidas where id=".$_GET['id'];
$resultpre = $link->query($queryre);
    $rowpre=mysqli_fetch_row($resultpre);
                      } ?>
                      <div class="form-group" >
            <label>NUEBLE</label>
               <input name="mueble" id="mueble"  autocomplete="off" style="text-transform: uppercase;" class="form-control" type="text"  <? if(isset($regre)){ ?> value="<? echo $_POST['mueble']; ?>" <? } ?> placeholder="MESA" <? if(isset($_GET['edi'])){ ?> value="<? echo $rowpre[1]; ?>" <? } ?>  >
              </div>
                <div class="form-group" >
            <label>ALTO</label>
               <input name="alto" id="alto"  autocomplete="off" style="text-transform: uppercase;" class="form-control" type="text"  <? if(isset($regre)){ ?> value="<? echo $_POST['alto']; ?>" <? } ?> placeholder="10" <? if(isset($_GET['edi'])){ ?> value="<? echo $rowpre[2]; ?>" <? } ?>   > 
              </div>
                <div class="form-group" >
            <label>ANCHO</label>
               <input name="ancho" id="ancho"  autocomplete="off" style="text-transform: uppercase;" class="form-control" type="text"  <? if(isset($regre)){ ?> value="<? echo $_POST['ancho']; ?>" <? } ?> placeholder="15"  <? if(isset($_GET['edi'])){ ?> value="<? echo $rowpre[3]; ?>" <? } ?>  >
              </div>
                <div class="form-group" >
            <label>PROFUNDIDAD</label>
               <input name="profundidad" id="profundidad"  autocomplete="off" style="text-transform: uppercase;" class="form-control" type="text"  <? if(isset($regre)){ ?> value="<? echo $_POST['profundidad']; ?>" <? } ?> placeholder="5"  <? if(isset($_GET['edi'])){ ?> value="<? echo $rowpre[4]; ?>" <? } ?>  >
              </div>
                     <div class="form-actions">
                         <? if(isset($_GET['edi'])){ ?>
                            <input type="hidden" name="id" id="id" value="<? echo $rowpre[0]; ?>">
<button type="submit" value="Guardar" name="editar" id="editar">Guardar</button>
                         <? }else{ ?>
<button type="submit" value="Guardar" name="guardar" id="guardar">Guardar</button>
                         <? } ?>
                    
                   <!-- <button type="button">Cancel</button>-->
                </div>
               
                </fieldset>
                
               
               
            </form>


    </div>
</div>
<div class="row">
    <div class="col-md-12"> 
 <table style="width: 950px; margin-right: auto; margin-left: auto;">
    <tr style="background-color: #ccc">
    <td align="center"><strong>Nombre</strong></td>
    <td align="center"><strong>Alto</strong></td>
    <td align="center"><strong>Ancho</strong></td>
    <td align="center"><strong>Profundidad</strong></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
	<?
	
	
	$queryre = "SELECT * from medidas";
    $f=0;
    $resultpr = $link->query($queryre);
	while($rowpr=mysqli_fetch_row($resultpr)){
	  if($f==0){

$f=1;
$c='#dadada;';
  }else{
$f=0;
$c='#ededeb;';
  }

  ?>
       <tr style="background-color: <? echo $c; ?>">
    <td><? echo utf8_encode($rowpr[1]); ?> </td>
    <td><? echo $rowpr[2]; ?> cm</td>
    <td><? echo $rowpr[3]; ?> cm</td>
    <td><? echo $rowpr[4]; ?> cm</td>
    <td><a href="tareas.php?med=1&edi=1&id=<? echo $rowpr[0]; ?>" class="btn btn-primary">Editar</a></td>
    <td><a href="tareas.php?med=1&eli=1&id=<? echo $rowpr[0]; ?>" class="btn bg-red">Eliminar</a></td>
    </tr> 
        <?
	}
	?></table>

    </div></div>