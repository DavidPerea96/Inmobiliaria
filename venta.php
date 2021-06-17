<?php include('includes/header.php'); ?>
 <!--- Body --->
 
 <div class="container-fluid" style="margin-top:55px; height: 250px; background: linear-gradient(to bottom, pink, white);">
  
  <form action="venta.php" method="POST" class="form-inline justify-content-center" style="margin-top:85px">
    <div class="form-inline">
    <div class="col-auto">
        <input type="number" class="form-control" placeholder="Precio /€" name="precio">
      </div>
      <div class="col-auto">
        <input type="text" class="form-control" placeholder="Nº Habitaciones" name="habitacion">
      </div>
      <div class="col-auto">
        <input type="text" class="form-control" placeholder="Metros" name="metros">
      </div>
      <div class="col-auto">
        <input type="text" class="form-control" placeholder="Localidad" name="localidad">
      </div>
      <div class="col-auto">
        <button type="submit" name="buscar" class="btn btn-dark">Buscar</button>
      </div>
    </div>
  </form>
  </div>

  <?php

    if(isset($_POST['buscar'])){
 

      $precio = $_POST['precio'];
      $habitacion = $_POST['habitacion'];
      $localidad = $_POST['localidad'];
      $metros = $_POST['metros'];
      
      mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
      $query = "SELECT * FROM casa WHERE precio BETWEEN 0 AND '$precio' INTERSECT SELECT * FROM casa WHERE habitacion like '$habitacion%' AND metros like '$metros%' AND localidad like '$localidad%' ORDER BY id DESC";
      $result = mysqli_query($db, $query);
      $count = mysqli_num_rows($result);

      
      
      
      if(empty($precio)&&empty($habitacion)&&empty($localidad)&&empty($metros)) {

        debug_to_console("No campos");

        echo '<div class="container-fluid">
          <div class="row justify-content-center">
          <div class="col-auto>">
            <h2>Has de rellenar al menos un campo.</h2>
          </div><br>
          </div><br>
          </div><br>';


      }elseif($count != 0) {

        debug_to_console("Resultado");
        
        debug_to_console($GLOBALS['count']);

        for($i=0; $i<$count; $i++){ 

        $row = mysqli_fetch_array($result);
        
        debug_to_console($row);

        ?>

        <div class="row justify-content-center">
    
        <div class="card-group">
        <div class="card" style="width: device-width; max-width: 600px;">
          <img class="card-img-top" src="<?php echo $row['foto']; ?>" alt="Card image">
            <div class="card-body">
                <h4 class="card-title"><?php echo $row['direccion'] ?></h4>
                    <p class="card-text">
                        Metros: <?php echo $row['metros'] ?><br>
                        Habitaciones: <?php echo $row['habitacion'] ?><br>
                        Localidad: <?php echo $row['localidad'] ?><br>
                        Precio €: <?php echo $row['precio'] ?><br>
                    </p>
                        
            </div>
        </div>
        </div>

      </div><br>

    <?php }}else{ 

      debug_to_console("No resultado");

      echo '<div class="container-fluid">
      <div class="row justify-content-center">
      <div class="col-auto>">
        <h2>No hay resultados...</h2>
      </div><br>
      </div><br>
      </div><br>';
    
        
    }}else { ?>
    
    <div class="container-fluid">
    <div class="row justify-content-center">
    <div class="col-auto>">
      <h2>Quizas te interese...</h2>
    </div><br>
    </div><br>
    <?php
      $query = "SELECT * FROM casa ORDER BY RAND() LIMIT 1";
      $result = mysqli_query($db, $query);
      $house = mysqli_fetch_array($result);
    ?>
    <div class="row justify-content-center">
      <div class="card-group">
        <div class="card" style="width: device-width; max-width: 600px;">
          <img class="card-img-top" src="<?php echo $house['foto']; ?>" alt="Card image">
            <div class="card-body">
                <h4 class="card-title"><?php echo $house['direccion'] ?></h4>
                    <p class="card-text">
                        Metros: <?php echo $house['metros'] ?><br>
                        Habitaciones: <?php echo $house['habitacion'] ?><br>
                        Localidad: <?php echo $house['localidad'] ?><br>
                        Precio €: <?php echo $house['precio'] ?><br>
                    </p>
                        
            </div>
        </div>
        </div>
    </div>
    </div><br><br>

  <?php } ?>
 
<?php include('includes/footer.php'); ?>