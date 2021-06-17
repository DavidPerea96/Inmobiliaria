<?php 
        
    include("server.php");

    if (isset($_POST['save_casa'])){
        $precio = $_POST['precio'];
        $habitacion = $_POST['habitacion'];
        $metros = $_POST['metros'];
        $localidad = $_POST['localidad'];
        $direccion = $_POST['direccion'];
        $foto = $_POST['foto'];

        $query = "INSERT INTO casa(precio, habitacion, metros, localidad, direccion, foto) VALUES ('$precio', '$habitacion', '$metros', '$localidad', '$direccion', '$foto')";
        $result = mysqli_query($db, $query);
        
        if (!$result){
            die("Query Failed");
        }
        
        
        $_SESSION["message"] = "Task Saved Successfully";
        $_SESSION["message_type"] = "success";
        

        header ('Location: edit.php');
        
    }
    

?>