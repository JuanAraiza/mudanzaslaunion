<?php

if(isset($_GET['eli'])){
    $query = "update inventario_gral set deshabilitado=1 where id=".$_GET['id'];
   $link->query($query);
 ?>
 <script type="text/javascript">
      location.href="tareas.php?bu=17&tip=<?php echo $_GET['tip']; ?>";
 </script>
 <?php
   }
 
if(isset($_POST['btn_inventario_guardar'])){

    $corr=0;
    $cade="";
    if($_POST['nombre']==''){
    $corr=1;
    $cade=$cade."Falta Nombre \\n";
    }
    
    
    
    $c1=$_POST['tipo'];
    $c2=$_POST['nombre'];
    $c3=$_POST['area'];
    $c4=$_POST['estado'];
    $c5=$_POST['serie'];
    $c6=$_POST['piezas'];

    $uploadPath = "fotosinventario/"; 
    
   $c7 = $c1.date('YmdHis').$_FILES['archivo']['name'];
   $patch='fotosinventario';
   $max_ancho = 800;
   $max_alto = 800;
   if($_FILES['archivo']['type']=='image/png' || $_FILES['archivo']['type']=='image/jpeg' || $_FILES['archivo']['type']=='image/gif'){
   $medidasimagen= getimagesize($_FILES['archivo']['tmp_name']);
   $nombrearchivo=$_FILES['archivo']['name'];
   $rtOriginal=$_FILES['archivo']['tmp_name'];
   if($_FILES['archivo']['type']=='image/jpeg'){
   $original = imagecreatefromjpeg($rtOriginal);
   }else if($_FILES['archivo']['type']=='image/png'){
   $original = imagecreatefrompng($rtOriginal);
   }else if($_FILES['archivo']['type']=='image/gif'){
   $original = imagecreatefromgif($rtOriginal);
   }
   list($ancho,$alto)=getimagesize($rtOriginal);
   $x_ratio = $max_ancho / $ancho;
   $y_ratio = $max_alto / $alto;
   if( ($ancho <= $max_ancho) && ($alto <= $max_alto) ){
       $ancho_final = $ancho;
       $alto_final = $alto;
   }elseif (($x_ratio * $alto) < $max_alto){
       $alto_final = ceil($x_ratio * $alto);
       $ancho_final = $max_ancho;
   }else{
       $ancho_final = ceil($y_ratio * $ancho);
       $alto_final = $max_alto;
   }
   $lienzo=imagecreatetruecolor($ancho_final,$alto_final); 
   imagecopyresampled($lienzo,$original,0,0,0,0,$ancho_final, $alto_final,$ancho,$alto);
   
   if($_FILES['archivo']['type']=='image/jpeg'){
   imagejpeg($lienzo,$patch."/".$c7);
   }
   else if($_FILES['archivo']['type']=='image/png'){
   imagepng($lienzo,$patch."/".$c7);
   }
   else if($_FILES['archivo']['type']=='image/gif'){
   imagegif($lienzo,$patch."/".$c7);
   }    
   
   }else{
     $c7 = 'N_A';
   }

    $c8=md5($c1.$c2.date('YmdHis'));
    $c9=date('Y-m-d H:i:s');
    
    $regre=0;
    
    if($corr!=1){
    
      $query = "insert into inventario_gral(tipo,nombre,area,estado,serie,piezas,foto,clave,fecha) values('".$c1."','".$c2."','".$c3."','".$c4."','".$c5."','".$c6."','".$c7."','".$c8."','".$c9."')";
      // echo $query;
      $link->query($query);
    ?>
    <script type="text/javascript">
      location.href="tareas.php?bu=17&tip=<?php echo $_GET['tip']; ?>";
    </script>
    <?php
    }else{
      $regre=1;
    ?>
    <script type="text/javascript">alert('<?php echo $cade; ?>');</script>
    <?php
      }
    }



    if(isset($_POST['btn_inventario_editar'])){

        $corr=0;
        $cade="";
        if($_POST['nombre']==''){
        $corr=1;
        $cade=$cade."Falta Nombre \\n";
        }
        
        
        
        $c1=$_POST['tipo'];
        $c2=$_POST['nombre'];
        $c3=$_POST['area'];
        $c4=$_POST['estado'];
        $c5=$_POST['serie'];
        $c6=$_POST['piezas'];
    
        $uploadPath = "fotosinventario/"; 
        
       $c7 = $c1.date('YmdHis').$_FILES['archivo']['name'];
       $patch='fotosinventario';
       $max_ancho = 800;
       $max_alto = 800;
       if($_FILES['archivo']['type']=='image/png' || $_FILES['archivo']['type']=='image/jpeg' || $_FILES['archivo']['type']=='image/gif'){
       $medidasimagen= getimagesize($_FILES['archivo']['tmp_name']);
       $nombrearchivo=$_FILES['archivo']['name'];
       $rtOriginal=$_FILES['archivo']['tmp_name'];
       if($_FILES['archivo']['type']=='image/jpeg'){
       $original = imagecreatefromjpeg($rtOriginal);
       }else if($_FILES['archivo']['type']=='image/png'){
       $original = imagecreatefrompng($rtOriginal);
       }else if($_FILES['archivo']['type']=='image/gif'){
       $original = imagecreatefromgif($rtOriginal);
       }
       list($ancho,$alto)=getimagesize($rtOriginal);
       $x_ratio = $max_ancho / $ancho;
       $y_ratio = $max_alto / $alto;
       if( ($ancho <= $max_ancho) && ($alto <= $max_alto) ){
           $ancho_final = $ancho;
           $alto_final = $alto;
       }elseif (($x_ratio * $alto) < $max_alto){
           $alto_final = ceil($x_ratio * $alto);
           $ancho_final = $max_ancho;
       }else{
           $ancho_final = ceil($y_ratio * $ancho);
           $alto_final = $max_alto;
       }
       $lienzo=imagecreatetruecolor($ancho_final,$alto_final); 
       imagecopyresampled($lienzo,$original,0,0,0,0,$ancho_final, $alto_final,$ancho,$alto);
       
       if($_FILES['archivo']['type']=='image/jpeg'){
       imagejpeg($lienzo,$patch."/".$c7);
       }
       else if($_FILES['archivo']['type']=='image/png'){
       imagepng($lienzo,$patch."/".$c7);
       }
       else if($_FILES['archivo']['type']=='image/gif'){
       imagegif($lienzo,$patch."/".$c7);
       }    
       
       }else{
         $c7 = 'N_A';
       }
   
        $c8=md5($c1.$c2.date('YmdHis'));
        $c9=date('Y-m-d H:i:s');
        
        $regre=0;
        
        if($corr!=1){
        
            if($c7 != 'N_A'){

                $queryf = "select * FROM inventario_gral where id=".$_POST['id'];
                $resultf = $link->query($queryf);
                $rowf = mysqli_fetch_row($resultf);
                unlink('fotosinventario/'.$rowf[7]);
                $cade=",foto='".$c7."'";
            }else{
                $cade='';
            }


          $query = "update inventario_gral set nombre='".$c2."',area='".$c3."',estado='".$c4."',serie='".$c5."',piezas='".$c6."'".$cade." where id=".$_POST['id'];
         //  echo $query;
          $link->query($query);
        ?>
        <script type="text/javascript">
          location.href="tareas.php?bu=17&tip=<?php echo $_GET['tip']; ?>";
        </script>
        <?php
        }else{
          $regre=1;
        ?>
        <script type="text/javascript">alert('<?php echo $cade; ?>');</script>
        <?php
          }
        }

    ?>
 
 <!-- Main content -->
 <div class="modal fade" id="modal-inspector">
  <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Nueva Cedula Personal</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form name="form" id="form" class="col-12" method="post" action="tareas.php?bu=18" enctype="multipart/form-data">
          
          <div class="modal-body">
<div class=" col-md-12 row">
      <!-- SELECT2 EXAMPLE -->
         

<input name="tipo" id="tipo" value="<?php echo $_GET['tip']; ?>" type="hidden"/>
<div class=" col-md-12">
<h3>DATOS PERSONALES</h3>
      </div>
<div class="form-group col-md-4">
             <label>Apellido Paterno</label>
                <input name="paterno" id="paterno" class="form-control" type="text" <?php if(isset($_POST['paterno'])){ ?> value="<?php echo $_POST['paterno']; ?>" <?php } ?>>
    </div>
    <div class="form-group col-md-4">
             <label>Apellido Materno</label>
                <input name="materno" id="materno" class="form-control" type="text" <?php if(isset($_POST['materno'])){ ?> value="<?php echo $_POST['materno']; ?>" <?php } ?>>
    </div>
     <div class="form-group col-md-4">
             <label>Nombre</label>
                <input name="nombre" id="nombre" class="form-control" type="text" <?php if(isset($_POST['nombre'])){ ?> value="<?php echo $_POST['nombre']; ?>" <?php } ?>>
    </div>
    <div class="form-group col-md-1">
             <label>Edad</label>
                <input name="edad" id="edad" class="form-control"  onKeyPress="return valida(event)"  maxlength="2" type="text" <?php if(isset($_POST['edad'])){ ?> value="<?php echo $_POST['edad']; ?>" <?php } ?>>
    </div>
    <div class="form-group col-md-1">
             <label>Genero</label>
                <select name="genero" id="genero" class="form-control select2" style="width:100%;">
                  <option value="F">F</option>
                  <option value="M">M</option>
                </select>
    </div>
    <div class="form-group col-md-2">
             <label>Fecha Nac.</label>
                <input name="fecha_n" id="fecha_n" class="form-control" type="text" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask <?php if(isset($_POST['fecha_n'])){ ?> value="<?php echo $_POST['fecha_n']; ?>" <?php } ?>>
    </div>
    <div class="form-group col-md-4">
             <label>NSS</label>
                <input name="nss" id="nss" class="form-control" type="text" <?php if(isset($_POST['nss'])){ ?> value="<?php echo $_POST['nss']; ?>" <?php } ?>>
    </div>
    <div class="form-group col-md-4">
             <label>Teléfono</label>
                <input name="telefono" id="telefono" class="form-control" type="text" <?php if(isset($_POST['telefono'])){ ?> value="<?php echo $_POST['telefono']; ?>" <?php } ?>>
    </div>

    <div class="form-group col-md-4">
             <label>Domicilio</label>
                <input name="domicilio" id="domicilio" class="form-control" type="text" <?php if(isset($_POST['domicilio'])){ ?> value="<?php echo $_POST['domicilio']; ?>" <?php } ?>>
    </div>
    <div class="form-group col-md-2">
             <label>C.P.</label>
                <input name="cp" id="cp" class="form-control" type="text" <?php if(isset($_POST['cp'])){ ?> value="<?php echo $_POST['cp']; ?>" <?php } ?>>
    </div>
    <div class="form-group col-md-3">
             <label>Municipio</label>
                <input name="municipio" id="municipio" class="form-control" type="text" <?php if(isset($_POST['municipio'])){ ?> value="<?php echo $_POST['municipio']; ?>" <?php } ?>>
    </div>
    <div class="form-group col-md-3">
             <label>Estado</label>
                <input name="estado" id="estado" class="form-control" type="text" <?php if(isset($_POST['estado'])){ ?> value="<?php echo $_POST['estado']; ?>" <?php } ?>>
    </div>
    <div class="form-group col-md-1">
             <label>Est. Civil</label>
                <select name="genero" id="genero" class="form-control select2" style="width:100%;">
                  <option value="F">F</option>
                  <option value="M">M</option>
                </select>
    </div>
    <div class="form-group col-md-6">
             <label>Correo Electronico</label>
                <input name="correo" id="correo" class="form-control" type="text" <?php if(isset($_POST['correo'])){ ?> value="<?php echo $_POST['correo']; ?>" <?php } ?>>
    </div>
    <div class="form-group col-md-3">
             <label>CURP</label>
                <input name="curp" id="curp" class="form-control" type="text" <?php if(isset($_POST['curp'])){ ?> value="<?php echo $_POST['curp']; ?>" <?php } ?>>
    </div>
    <div class="form-group col-md-3">
             <label>RFC</label>
                <input name="rfc" id="rfc" class="form-control" type="text" <?php if(isset($_POST['rfc'])){ ?> value="<?php echo $_POST['rfc']; ?>" <?php } ?>>
    </div>

    <div class=" col-md-12">
<h3>DATOS FAMILIARES, COYUGES, HIJOS Y DEPENDIENTES</h3>
      </div>

      <div class="form-group col-md-4">
             <label>Nombre</label>
                <input name="nombre1" id="nombre1" class="form-control" type="text" <?php if(isset($_POST['nombre1'])){ ?> value="<?php echo $_POST['nombre1']; ?>" <?php } ?>>
                <input name="nombre2" id="nombre2" class="form-control" type="text" <?php if(isset($_POST['nombre2'])){ ?> value="<?php echo $_POST['nombre2']; ?>" <?php } ?>>
                <input name="nombre3" id="nombre3" class="form-control" type="text" <?php if(isset($_POST['nombre3'])){ ?> value="<?php echo $_POST['nombre3']; ?>" <?php } ?>>
                <input name="nombre4" id="nombre4" class="form-control" type="text" <?php if(isset($_POST['nombre4'])){ ?> value="<?php echo $_POST['nombre4']; ?>" <?php } ?>>
    </div>
    <div class="form-group col-md-3">
             <label>Parentesco</label>
                <input name="parentesco1" id="parentesco1" class="form-control" type="text" <?php if(isset($_POST['parentesco1'])){ ?> value="<?php echo $_POST['parentesco1']; ?>" <?php } ?>>
                <input name="parentesco2" id="parentesco2" class="form-control" type="text" <?php if(isset($_POST['parentesco2'])){ ?> value="<?php echo $_POST['parentesco2']; ?>" <?php } ?>>
                <input name="parentesco3" id="parentesco3" class="form-control" type="text" <?php if(isset($_POST['parentesco3'])){ ?> value="<?php echo $_POST['parentesco3']; ?>" <?php } ?>>
                <input name="parentesco4" id="parentesco4" class="form-control" type="text" <?php if(isset($_POST['parentesco4'])){ ?> value="<?php echo $_POST['parentesco4']; ?>" <?php } ?>>
    </div>
    <div class="form-group col-md-2">
             <label>Edad</label>
                <input name="edad1" id="edad1" class="form-control"  onKeyPress="return valida(event)"  maxlength="2" type="text" <?php if(isset($_POST['edad1'])){ ?> value="<?php echo $_POST['edad1']; ?>" <?php } ?>>
                <input name="edad2" id="edad2" class="form-control"  onKeyPress="return valida(event)"  maxlength="2" type="text" <?php if(isset($_POST['edad2'])){ ?> value="<?php echo $_POST['edad2']; ?>" <?php } ?>>
                <input name="edad3" id="edad3" class="form-control"  onKeyPress="return valida(event)"  maxlength="2" type="text" <?php if(isset($_POST['edad3'])){ ?> value="<?php echo $_POST['edad3']; ?>" <?php } ?>>
                <input name="edad4" id="edad4" class="form-control"  onKeyPress="return valida(event)"  maxlength="2" type="text" <?php if(isset($_POST['edad4'])){ ?> value="<?php echo $_POST['edad4']; ?>" <?php } ?>>
    </div>


    <div class="form-group col-md-3">
             <label>Fecha Nac.</label>
                <input name="fecha_n1" id="fecha_n1" class="form-control" type="text" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask <?php if(isset($_POST['fecha_n1'])){ ?> value="<?php echo $_POST['fecha_n1']; ?>" <?php } ?>>
                <input name="fecha_n2" id="fecha_n2" class="form-control" type="text" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask <?php if(isset($_POST['fecha_n2'])){ ?> value="<?php echo $_POST['fecha_n2']; ?>" <?php } ?>>
                <input name="fecha_n3" id="fecha_n3" class="form-control" type="text" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask <?php if(isset($_POST['fecha_n3'])){ ?> value="<?php echo $_POST['fecha_n3']; ?>" <?php } ?>>
                <input name="fecha_n4" id="fecha_n4" class="form-control" type="text" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask <?php if(isset($_POST['fecha_n4'])){ ?> value="<?php echo $_POST['fecha_n4']; ?>" <?php } ?>>

    </div>


    <div class=" col-md-12">
<h3>DATOS MEDICOS</h3>
      </div>
      <div class="form-group col-md-3">
             <label>Tipo Sanguineo</label>
                <input name="tipo_s" id="tipo_s" class="form-control" type="text" <?php if(isset($_POST['tipo_s'])){ ?> value="<?php echo $_POST['tipo_s']; ?>" <?php } ?>>
    </div>
    <div class="form-group col-md-3">
             <label>Alergico a</label>
                <input name="alergico_a" id="alergico_a" class="form-control" type="text" <?php if(isset($_POST['alergico_a'])){ ?> value="<?php echo $_POST['alergico_a']; ?>" <?php } ?>>
    </div>
    <div class="form-group col-md-3">
             <label>Como concideras tu estado</label>
             <select name="estado_s" id="estado_s" class="form-control select2" style="width:100%;">
                  <option value="BUENO"  <?php if(isset($_POST['estado_s']) and $_POST['estado_s']=='BUENO' ){ ?> selected <?php } ?> >BUENO</option>
                  <option value="MALO" <?php if(isset($_POST['estado_s']) and $_POST['estado_s']=='MALO' ){ ?> selected <?php } ?>>MALO</option>
                  <option value="REGULAR" <?php if(isset($_POST['estado_s']) and $_POST['estado_s']=='REGULAR' ){ ?> selected <?php } ?>>REGULAR</option>
                </select>
    </div>

    <div class="form-group col-md-3">
             <label>Tratamiento Medico</label>
             <select name="tratamiento_m" id="tratamiento_m" class="form-control select2" style="width:100%;">
                  <option value="SI"  <?php if(isset($_POST['tratamiento_m']) and $_POST['tratamiento_m']=='SI' ){ ?> selected <?php } ?> >SI</option>
                  <option value="NO" <?php if(isset($_POST['tratamiento_m']) and $_POST['tratamiento_m']=='NO' ){ ?> selected <?php } ?>>NO</option>
            </select>
    </div>

    <div class="form-group col-md-6">
             <label>Medicamento que estas tomando</label>
                <input name="medicamento_t" id="medicamento_t" class="form-control" type="text" <?php if(isset($_POST['medicamento_t'])){ ?> value="<?php echo $_POST['medicamento_t']; ?>" <?php } ?>>
    </div>
    <div class="form-group col-md-6">
             <label>Diagnostico</label>
                <input name="diagnostico" id="diagnostico" class="form-control" type="text" <?php if(isset($_POST['diagnostico'])){ ?> value="<?php echo $_POST['diagnostico']; ?>" <?php } ?>>
    </div>
    <div class="form-group col-md-12">
             <label>Indicacion especial en caso de algun episodio por la enfermedad</label>
                <input name="episodio" id="episodio" class="form-control" type="text" <?php if(isset($_POST['episodio'])){ ?> value="<?php echo $_POST['episodio']; ?>" <?php } ?>>
    </div>

    <div class=" col-md-12">
<h3>Antecedentes Familiares</h3>
      </div>

      <div class=" col-md-12">
<h4>PAPA</h4>
      </div>

      <div class="col-md-12">
      <label style="width: 90px;"> 
      <input type="checkbox" class="minimal" name="anp_diabetes" />
    Diabetes  
    </label>
    <label style="width: 80px;"> 
      <input type="checkbox" class="minimal" name="anp_cancer" />
    Cancer  
    </label>
    <label style="width: 130px;"> 
      <input type="checkbox" class="minimal" name="anp_hipertension" />
    Hipertension  
    </label>
    <label style="width: 230px;"> 
      <input type="checkbox" class="minimal" name="anp_cardiovascular" />
    Enfermedad Cardiovascular  
    </label>
    <label> 
      <input type="text" class="minimal" name="anp_otro" placeholder="Otro" /> 
    </label>
      </div>


      <div class=" col-md-12">
<h4>MAMA</h4>
      </div>

      <div class="col-md-12">
      <label style="width: 90px;"> 
      <input type="checkbox" class="minimal" name="anm_diabetes" />
    Diabetes  
    </label>
    <label style="width: 80px;"> 
      <input type="checkbox" class="minimal" name="anm_cancer" />
    Cancer  
    </label>
    <label style="width: 130px;"> 
      <input type="checkbox" class="minimal" name="anm_hipertension" />
    Hipertension  
    </label>
    <label style="width: 230px;"> 
      <input type="checkbox" class="minimal" name="anm_cardiovascular" />
    Enfermedad Cardiovascular  
    </label>
    <label> 
      <input type="text" class="minimal" name="anm_otro" placeholder="Otro" /> 
    </label>
      </div>



      <div class=" col-md-12">
<h4>CONTACTO EN CASO DE EMERGENCIA</h4>
      </div>
      <div class="form-group col-md-6">
             <label>Nombre</label>
                <input name="nombre1e" id="nombre1e" class="form-control" type="text" <?php if(isset($_POST['nombre1e'])){ ?> value="<?php echo $_POST['nombre1e']; ?>" <?php } ?>>
                <input name="nombre2e" id="nombre2e" class="form-control" type="text" <?php if(isset($_POST['nombre2e'])){ ?> value="<?php echo $_POST['nombre2e']; ?>" <?php } ?>>
    </div>
    <div class="form-group col-md-3">
             <label>Tel. Fijo</label>
                <input name="tel_fijo1e" id="tel_fijo1e" class="form-control" type="text" <?php if(isset($_POST['tel_fijo1e'])){ ?> value="<?php echo $_POST['tel_fijo1e']; ?>" <?php } ?>>
                <input name="tel_fijo2e" id="tel_fijo2e" class="form-control" type="text" <?php if(isset($_POST['tel_fijo2e'])){ ?> value="<?php echo $_POST['tel_fijo2e']; ?>" <?php } ?>>
    </div>
    <div class="form-group col-md-3">
             <label>Tel. Celular</label>
                <input name="tel_cel1e" id="tel_cel1e" class="form-control" type="text" <?php if(isset($_POST['tel_cel1e'])){ ?> value="<?php echo $_POST['tel_cel1e']; ?>" <?php } ?>>
                <input name="tel_cel2e" id="tel_cel2e" class="form-control" type="text" <?php if(isset($_POST['tel_cel2e'])){ ?> value="<?php echo $_POST['tel_cel2e']; ?>" <?php } ?>>
    </div>

    <div class=" col-md-12">
&nbsp;
      </div>

    <div class="form-group col-md-4">
             <label>Fecha de Ingreso</label>
                <input name="fecha_in" id="fecha_in" class="form-control" type="text" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask <?php if(isset($_POST['fecha_in'])){ ?> value="<?php echo $_POST['fecha_in']; ?>" <?php } ?>>
    </div>
    <div class="form-group col-md-4">
             <label>Puesto que Desempeña</label>
                <input name="puesto" id="puesto" class="form-control" type="text" <?php if(isset($_POST['puesto'])){ ?> value="<?php echo $_POST['puesto']; ?>" <?php } ?>>
    </div>
    <div class="form-group col-md-4">
             <label>Foto</label>
                <input name="archivo" id="archivo" class="form-control" type="file">
    </div>

  
   

    </div>

        </div>
<div class="modal-footer justify-content-right">
  <input type="submit" class="btn btn-primary"  name="btn_inventario_guardar" value="Guardar">
</div>

</form>

</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->



<section class="content">

<!-- SELECT2 EXAMPLE -->
<div class="box box-default">
  <div class="box-header with-border">
    <div class="row">
  
    <div class="col-md-3">
        <a class="btn btn-info form-control" data-toggle="modal" data-target="#modal-inspector" ><i class="fa-solid fa-person-chalkboard"></i> &nbsp; Ingresar Inventario</a>
    </div>
    
</div>  

</div>
  <!-- /.box-header -->
  <div class="box-body">
    <div class="row">
      <div class="col-md-12">

      <table class="table">
  <tr>
 
    <td><strong>Foto</strong></td>
    <td><strong>Nombre</strong></td>
    <td><strong>Edad</strong></td>
    <td><strong>Fecha Nacimiento</strong></td>
    <td><strong>NSS</strong></td>
    <td><strong>Telefono</strong></td>
    <td></td>
    <td></td>
  </tr>
<?php
 $query = "select * FROM cedula_per where deshabilitado=0 order by id";
 $result = $link->query($query);
 $r=0;
while ($row = mysqli_fetch_row($result)){
  if($r==1){
      $r=2;
      $c='#c8c8c6';
    }else{
      $r=1;
      $c='#dbdbdb';
    }
    ?>
  <tr>
  <td style="padding: 5px;"> <a class="btn btn-default" data-toggle="modal" data-target="#modal-imginv<?php echo $row[0]; ?>" ><img src="fotoscedulas/<?php echo $row[18]; ?>" style="width:120px;"></a>


  <div class="modal fade" id="modal-imginv<?php echo $row[0]; ?>">
  <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-body">

<img src="fotoscedulas/<?php echo $row[18]; ?>" >
 
</div>

</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->

</td>
  
    <td style="padding: 5px;"><?php echo $row[3].' '.$row[2].' '.$row[1]; ?></td>
    <td style="padding: 5px;"><?php echo $row[4]; ?></td>
    <td style="padding: 5px;"><?php echo $row[5]; ?></td>
    <td style="padding: 5px;"><?php echo $row[6]; ?></td>
    <td style="padding: 5px;"><?php echo $row[7]; ?></td>
    <td style="padding: 5px;"><?php echo $row[8]; ?></td>
    <td><a class="btn btn-success" data-toggle="modal" data-target="#modal-router<?php echo $row[0]; ?>"><i class="fa fa-fw fa-edit"></i></a></td>
    <td><a class="btn btn-danger" onClick="eliminarUsuario('<?php echo $row[0]; ?>')"><i class="fa fa-fw fa-trash"></i></a></td>
  </tr>
<?php } ?>

</table>



<?php 
$consultavistas=$query;
$result = $link->query($consultavistas);
while ($row = mysqli_fetch_row($result)){
?>

<div class="modal fade" id="modal-router<?php echo $row[0]; ?>">
    <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title">Editar Cedula Personal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <form name="form" id="form" class="col-12" method="post" action="tareas.php?bu=18" enctype="multipart/form-data">
          
          <div class="modal-body">
<div class="row">

<input name="id" id="id" value="<?php echo $row[0]; ?>" type="hidden"/>


      <div class=" col-md-12">
<h3>DATOS PERSONALES</h3>
      </div>
<div class="form-group col-md-4">
             <label>Apellido Paterno</label>
                <input name="paterno" id="paterno" class="form-control" type="text" value="<?php echo $row[1]; ?>">
    </div>
    <div class="form-group col-md-4">
             <label>Apellido Materno</label>
                <input name="materno" id="materno" class="form-control" type="text" value="<?php echo $row[2]; ?>">
    </div>
     <div class="form-group col-md-4">
             <label>Nombre</label>
                <input name="nombre" id="nombre" class="form-control" type="text" value="<?php echo $row[3]; ?>">
    </div>
    <div class="form-group col-md-1">
             <label>Edad</label>
                <input name="edad" id="edad" class="form-control"  onKeyPress="return valida(event)"  maxlength="2" type="text" value="<?php echo $row[4]; ?>">
    </div>
    <div class="form-group col-md-1">
             <label>Genero</label>
                <select name="genero" id="genero" class="form-control select2" style="width:100%;">
                  <option value="F" <?php if($row[5]=='F'){ ?> selected <?php } ?>>F</option>
                  <option value="M" <?php if($row[5]=='M'){ ?> selected <?php } ?>>M</option>
                </select>
    </div>
    <div class="form-group col-md-2">
             <label>Fecha Nac.</label>
                <input name="fecha_n" id="fecha_n" class="form-control" type="text" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask value="<?php echo $row[6]; ?>">
    </div>
    <div class="form-group col-md-4">
             <label>NSS</label>
                <input name="nss" id="nss" class="form-control" type="text" value="<?php echo $row[7]; ?>">
    </div>
    <div class="form-group col-md-4">
             <label>Teléfono</label>
                <input name="telefono" id="telefono" class="form-control" type="text" value="<?php echo $row[8]; ?>">
    </div>

    <div class="form-group col-md-4">
             <label>Domicilio</label>
                <input name="domicilio" id="domicilio" class="form-control" type="text" value="<?php echo $row[9]; ?>">
    </div>
    <div class="form-group col-md-2">
             <label>C.P.</label>
                <input name="cp" id="cp" class="form-control" type="text" value="<?php echo $row[10]; ?>">
    </div>
    <div class="form-group col-md-3">
             <label>Municipio</label>
                <input name="municipio" id="municipio" class="form-control" type="text" value="<?php echo $row[11]; ?>">
    </div>
    <div class="form-group col-md-3">
             <label>Estado</label>
                <input name="estado" id="estado" class="form-control" type="text" value="<?php echo $row[4]; ?>">
    </div>

    <div class="form-group col-md-6">
             <label>Correo Electronico</label>
                <input name="correo" id="correo" class="form-control" type="text" <?php if(isset($_POST['correo'])){ ?> value="<?php echo $_POST['correo']; ?>" <?php } ?>>
    </div>
    <div class="form-group col-md-3">
             <label>CURP</label>
                <input name="curp" id="curp" class="form-control" type="text" <?php if(isset($_POST['curp'])){ ?> value="<?php echo $_POST['curp']; ?>" <?php } ?>>
    </div>
    <div class="form-group col-md-3">
             <label>RFC</label>
                <input name="rfc" id="rfc" class="form-control" type="text" <?php if(isset($_POST['rfc'])){ ?> value="<?php echo $_POST['rfc']; ?>" <?php } ?>>
    </div>

    <div class=" col-md-12">
<h3>DATOS FAMILIARES, COYUGES, HIJOS Y DEPENDIENTES</h3>
      </div>

      <div class="form-group col-md-4">
             <label>Nombre</label>
                <input name="nombre1" id="nombre1" class="form-control" type="text" <?php if(isset($_POST['nombre1'])){ ?> value="<?php echo $_POST['nombre1']; ?>" <?php } ?>>
                <input name="nombre2" id="nombre2" class="form-control" type="text" <?php if(isset($_POST['nombre2'])){ ?> value="<?php echo $_POST['nombre2']; ?>" <?php } ?>>
                <input name="nombre3" id="nombre3" class="form-control" type="text" <?php if(isset($_POST['nombre3'])){ ?> value="<?php echo $_POST['nombre3']; ?>" <?php } ?>>
                <input name="nombre4" id="nombre4" class="form-control" type="text" <?php if(isset($_POST['nombre4'])){ ?> value="<?php echo $_POST['nombre4']; ?>" <?php } ?>>
    </div>
    <div class="form-group col-md-3">
             <label>Parentesco</label>
                <input name="parentesco1" id="parentesco1" class="form-control" type="text" <?php if(isset($_POST['parentesco1'])){ ?> value="<?php echo $_POST['parentesco1']; ?>" <?php } ?>>
                <input name="parentesco2" id="parentesco2" class="form-control" type="text" <?php if(isset($_POST['parentesco2'])){ ?> value="<?php echo $_POST['parentesco2']; ?>" <?php } ?>>
                <input name="parentesco3" id="parentesco3" class="form-control" type="text" <?php if(isset($_POST['parentesco3'])){ ?> value="<?php echo $_POST['parentesco3']; ?>" <?php } ?>>
                <input name="parentesco4" id="parentesco4" class="form-control" type="text" <?php if(isset($_POST['parentesco4'])){ ?> value="<?php echo $_POST['parentesco4']; ?>" <?php } ?>>
    </div>
    <div class="form-group col-md-2">
             <label>Edad</label>
                <input name="edad1" id="edad1" class="form-control"  onKeyPress="return valida(event)"  maxlength="2" type="text" <?php if(isset($_POST['edad1'])){ ?> value="<?php echo $_POST['edad1']; ?>" <?php } ?>>
                <input name="edad2" id="edad2" class="form-control"  onKeyPress="return valida(event)"  maxlength="2" type="text" <?php if(isset($_POST['edad2'])){ ?> value="<?php echo $_POST['edad2']; ?>" <?php } ?>>
                <input name="edad3" id="edad3" class="form-control"  onKeyPress="return valida(event)"  maxlength="2" type="text" <?php if(isset($_POST['edad3'])){ ?> value="<?php echo $_POST['edad3']; ?>" <?php } ?>>
                <input name="edad4" id="edad4" class="form-control"  onKeyPress="return valida(event)"  maxlength="2" type="text" <?php if(isset($_POST['edad4'])){ ?> value="<?php echo $_POST['edad4']; ?>" <?php } ?>>
    </div>


    <div class="form-group col-md-3">
             <label>Fecha Nac.</label>
                <input name="fecha_n1" id="fecha_n1" class="form-control" type="text" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask <?php if(isset($_POST['fecha_n1'])){ ?> value="<?php echo $_POST['fecha_n1']; ?>" <?php } ?>>
                <input name="fecha_n2" id="fecha_n2" class="form-control" type="text" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask <?php if(isset($_POST['fecha_n2'])){ ?> value="<?php echo $_POST['fecha_n2']; ?>" <?php } ?>>
                <input name="fecha_n3" id="fecha_n3" class="form-control" type="text" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask <?php if(isset($_POST['fecha_n3'])){ ?> value="<?php echo $_POST['fecha_n3']; ?>" <?php } ?>>
                <input name="fecha_n4" id="fecha_n4" class="form-control" type="text" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask <?php if(isset($_POST['fecha_n4'])){ ?> value="<?php echo $_POST['fecha_n4']; ?>" <?php } ?>>

    </div>


    <div class=" col-md-12">
<h3>DATOS MEDICOS</h3>
      </div>
      <div class="form-group col-md-3">
             <label>Tipo Sanguineo</label>
                <input name="tipo_s" id="tipo_s" class="form-control" type="text" <?php if(isset($_POST['tipo_s'])){ ?> value="<?php echo $_POST['tipo_s']; ?>" <?php } ?>>
    </div>
    <div class="form-group col-md-3">
             <label>Alergico a</label>
                <input name="alergico_a" id="alergico_a" class="form-control" type="text" <?php if(isset($_POST['alergico_a'])){ ?> value="<?php echo $_POST['alergico_a']; ?>" <?php } ?>>
    </div>
    <div class="form-group col-md-3">
             <label>Como concideras tu estado</label>
             <select name="estado_s" id="estado_s" class="form-control select2" style="width:100%;">
                  <option value="BUENO"  <?php if(isset($_POST['estado_s']) and $_POST['estado_s']=='BUENO' ){ ?> selected <?php } ?> >BUENO</option>
                  <option value="MALO" <?php if(isset($_POST['estado_s']) and $_POST['estado_s']=='MALO' ){ ?> selected <?php } ?>>MALO</option>
                  <option value="REGULAR" <?php if(isset($_POST['estado_s']) and $_POST['estado_s']=='REGULAR' ){ ?> selected <?php } ?>>REGULAR</option>
                </select>
    </div>

    <div class="form-group col-md-3">
             <label>Tratamiento Medico</label>
             <select name="tratamiento_m" id="tratamiento_m" class="form-control select2" style="width:100%;">
                  <option value="SI"  <?php if(isset($_POST['tratamiento_m']) and $_POST['tratamiento_m']=='SI' ){ ?> selected <?php } ?> >SI</option>
                  <option value="NO" <?php if(isset($_POST['tratamiento_m']) and $_POST['tratamiento_m']=='NO' ){ ?> selected <?php } ?>>NO</option>
            </select>
    </div>

    <div class="form-group col-md-6">
             <label>Medicamento que estas tomando</label>
                <input name="medicamento_t" id="medicamento_t" class="form-control" type="text" <?php if(isset($_POST['medicamento_t'])){ ?> value="<?php echo $_POST['medicamento_t']; ?>" <?php } ?>>
    </div>
    <div class="form-group col-md-6">
             <label>Diagnostico</label>
                <input name="diagnostico" id="diagnostico" class="form-control" type="text" <?php if(isset($_POST['diagnostico'])){ ?> value="<?php echo $_POST['diagnostico']; ?>" <?php } ?>>
    </div>
    <div class="form-group col-md-12">
             <label>Indicacion especial en caso de algun episodio por la enfermedad</label>
                <input name="episodio" id="episodio" class="form-control" type="text" <?php if(isset($_POST['episodio'])){ ?> value="<?php echo $_POST['episodio']; ?>" <?php } ?>>
    </div>

    <div class=" col-md-12">
<h3>Antecedentes Familiares</h3>
      </div>

      <div class=" col-md-12">
<h4>PAPA</h4>
      </div>

      <div class="col-md-12">
      <label style="width: 90px;"> 
      <input type="checkbox" class="minimal" name="anp_diabetes" />
    Diabetes  
    </label>
    <label style="width: 80px;"> 
      <input type="checkbox" class="minimal" name="anp_cancer" />
    Cancer  
    </label>
    <label style="width: 130px;"> 
      <input type="checkbox" class="minimal" name="anp_hipertension" />
    Hipertension  
    </label>
    <label style="width: 230px;"> 
      <input type="checkbox" class="minimal" name="anp_cardiovascular" />
    Enfermedad Cardiovascular  
    </label>
    <label> 
      <input type="text" class="minimal" name="anp_otro" placeholder="Otro" /> 
    </label>
      </div>


      <div class=" col-md-12">
<h4>MAMA</h4>
      </div>

      <div class="col-md-12">
      <label style="width: 90px;"> 
      <input type="checkbox" class="minimal" name="anm_diabetes" />
    Diabetes  
    </label>
    <label style="width: 80px;"> 
      <input type="checkbox" class="minimal" name="anm_cancer" />
    Cancer  
    </label>
    <label style="width: 130px;"> 
      <input type="checkbox" class="minimal" name="anm_hipertension" />
    Hipertension  
    </label>
    <label style="width: 230px;"> 
      <input type="checkbox" class="minimal" name="anm_cardiovascular" />
    Enfermedad Cardiovascular  
    </label>
    <label> 
      <input type="text" class="minimal" name="anm_otro" placeholder="Otro" /> 
    </label>
      </div>



      <div class=" col-md-12">
<h4>CONTACTO EN CASO DE EMERGENCIA</h4>
      </div>
      <div class="form-group col-md-6">
             <label>Nombre</label>
                <input name="nombre1e" id="nombre1e" class="form-control" type="text" <?php if(isset($_POST['nombre1e'])){ ?> value="<?php echo $_POST['nombre1e']; ?>" <?php } ?>>
                <input name="nombre2e" id="nombre2e" class="form-control" type="text" <?php if(isset($_POST['nombre2e'])){ ?> value="<?php echo $_POST['nombre2e']; ?>" <?php } ?>>
    </div>
    <div class="form-group col-md-3">
             <label>Tel. Fijo</label>
                <input name="tel_fijo1e" id="tel_fijo1e" class="form-control" type="text" <?php if(isset($_POST['tel_fijo1e'])){ ?> value="<?php echo $_POST['tel_fijo1e']; ?>" <?php } ?>>
                <input name="tel_fijo2e" id="tel_fijo2e" class="form-control" type="text" <?php if(isset($_POST['tel_fijo2e'])){ ?> value="<?php echo $_POST['tel_fijo2e']; ?>" <?php } ?>>
    </div>
    <div class="form-group col-md-3">
             <label>Tel. Celular</label>
                <input name="tel_cel1e" id="tel_cel1e" class="form-control" type="text" <?php if(isset($_POST['tel_cel1e'])){ ?> value="<?php echo $_POST['tel_cel1e']; ?>" <?php } ?>>
                <input name="tel_cel2e" id="tel_cel2e" class="form-control" type="text" <?php if(isset($_POST['tel_cel2e'])){ ?> value="<?php echo $_POST['tel_cel2e']; ?>" <?php } ?>>
    </div>

    <div class=" col-md-12">
&nbsp;
      </div>

    <div class="form-group col-md-4">
             <label>Fecha de Ingreso</label>
                <input name="fecha_in" id="fecha_in" class="form-control" type="text" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask <?php if(isset($_POST['fecha_in'])){ ?> value="<?php echo $_POST['fecha_in']; ?>" <?php } ?>>
    </div>
    <div class="form-group col-md-4">
             <label>Puesto que Desempeña</label>
                <input name="puesto" id="puesto" class="form-control" type="text" <?php if(isset($_POST['puesto'])){ ?> value="<?php echo $_POST['puesto']; ?>" <?php } ?>>
    </div>








    <div class="form-group col-md-4">
             <label>Foto</label>
             <img src="fotosinventario/<?php echo $row[7]; ?>" style="width:120px;">
                <input name="archivo" id="archivo" class="form-control" type="file">
    </div>

      </div>

</div>
<div class="modal-footer justify-content-right">
  <input type="submit" class="btn btn-primary"  name="btn_inventario_editar"  value="Guardar">
</div>



</form>

</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>

<?php } ?>

</div>
</div>
</div>

</div>
</section>

<script>
function eliminarUsuario(d){
//tareas.php?bu=20&eli=1
var opcion = confirm("¿Seguro que quieres eliminar este Inventario?");
    if (opcion == true) {
      location.href='tareas.php?bu=17&tip=<?php echo $_GET['tip']; ?>&eli=1&id='+d;
  } 

}

</script>