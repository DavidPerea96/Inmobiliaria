<?php include("includes/header.php") ?>

<!--- Pagina --->
<div class="container p-4">

    <div class="row">
    
        <div class="col-md-4">

            <?php if(isset($_SESSION["message"])){ ?>
                
                <div class="container-fluid justify-content-left" style="margin-top: 60px">
                <div class="alert alert-<?= $_SESSION["message_type"]; ?> alert-dismissible fade show" role="alert">
                <?= $_SESSION["message"] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                </div>

            <?php session_unset(); } ?>

            <div class="form form-inline justify-content-center" style="margin-top: 60px">
                <form action="save_casa.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="precio" class="form-control" placeholder="Precio Casa" autofocus>
                    </div><br>
                    <div class="form-group">
                        <input type="text" name="direccion" class="form-control" placeholder="Direccion" autofocus>
                    </div><br>
                    <div class="form-group">
                        <input type="number" name="habitacion" class="form-control" placeholder="N Habitaciones">
                    </div><br>
                    <div class="form-group">
                        <input type="text" name="metros" class="form-control" placeholder="Metros" autofocus>
                    </div><br>
                    <div class="form-group">
                        <input type="text" name="localidad" class="form-control" placeholder="Localidad" autofocus>
                    </div><br>
                    <div class="form-group">
                        <input type="text" name="foto" class="form-control" placeholder="URL Foto" autofocus>
                    </div><br>
                    <input type="submit" class="btn btn-info btn-block" name="save_casa" value="Guardar Casa">
                </form>
            </div>   

        </div>

        <div class="col-md-8 container-fluid" style="margin-top: 60px">

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Precio</th>
                            <th>Direccion</th>
                            <th>Nº Habitaciones</th>
                            <th>Metros</th>
                            <th>Localidad</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        
                        $query = "SELECT * FROM casa";
                        $result_task = mysqli_query($db, $query);

                        while($row = mysqli_fetch_array($result_task)){ ?>

                        <tr>
                            <td><?php echo $row['precio'] ?></td>
                            <td><?php echo $row['direccion'] ?></td>
                            <td><?php echo $row['habitacion'] ?></td>
                            <td><?php echo $row['metros'] ?></td>
                            <td><?php echo $row['localidad'] ?></td>
                            <td>
                                <a href="edit_casa.php?id=<?php echo $row['id'] ?>" class="btn btn-secondary">
                                    Edit
                                </a>
                                <a href="delete_casa.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">
                                    Delete
                                </a>
                            </td>
                        </tr>

                        <?php } ?>

                    </tbody>
                
                </table>

        </div>

    </div>

</div>


<?php include("includes/footer.php") ?>