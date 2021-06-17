<?php
    include ('includes/header.php');
    $precio = '';
    $direccion = '';
    $habitacion = '';
    $metros = '';
    $localidad = '';
    
    if  (isset($_GET['id'])) {
      $id = $_GET['id'];
      $query = "SELECT * FROM casa WHERE id=$id";
      $result = mysqli_query($db, $query);
      if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $precio = $row['precio'];
        $direccion = $row['direccion'];
        $habitacion = $row['habitacion'];
        $metros = $row['metros'];
        $localidad = $row['localidad'];
      }
    }
    
    if (isset($_POST['update'])) {
      $id = $_GET['id'];
      $precio= $_POST['precio'];
      $direccion= $_POST['direccion'];
      $habitacion = $_POST['habitacion'];
      $metros = $_POST['metros'];
      $localidad = $_POST['localidad'];
    
      $query = "UPDATE casa set precio = '$precio', direccion = '$direccion', habitacion = '$habitacion', metros = '$metros', localidad = '$localidad' WHERE id=$id";
      mysqli_query($db, $query);
      $_SESSION['message'] = 'Task Updated Successfully';
      $_SESSION['message_type'] = 'warning';
      header('Location: edit.php');
    }
?> 
    
    <div class="container p-4" style="margin-top: 60px">
    <div class="row">
    <div class="col-md-4 mx-auto">
    <div class="card card-body">
    <form action="edit_casa.php?id=<?php echo $_GET['id']; ?>" method="POST">
      <div class="form-group">
        <input name="precio" type="text" class="form-control" value="<?php echo $precio; ?>" placeholder="Update Precio"><br>
      </div>
      <div class="form-group">
        <input name="direccion" type="text" class="form-control" value="<?php echo $direccion; ?>" placeholder="Update Direccion"><br>
      </div>
      <div class="form-group">
        <input name="habitacion" type="number" class="form-control" value="<?php echo $habitacion; ?>" placeholder="Update Habitacion"><br>
      </div>
      <div class="form-group">
        <input name="metros" type="text" class="form-control" value="<?php echo $metros; ?>" placeholder="Update fecha"><br>
      </div>
      <div class="form-group">
        <input name="localidad" type="text" class="form-control" value="<?php echo $localidad; ?>" placeholder="Update Localidad"><br>
      </div>
      <button class="btn btn-success" type="submit"name="update">Update</button>
    </form>
    </div>
    </div>
    </div>
    </div>

<?php include('includes/footer.php'); ?>
