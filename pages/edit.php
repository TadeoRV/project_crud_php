<?php include 'header.php';
if ($_GET) {
    if (isset($_GET['edit'])) {
        $id = $_GET['edit'];

        $_SESSION['project_id'] = $id;
        #vamos a consultar para llenar la tabla 
        $connection = new connection();
        $project = $connection->request("SELECT * FROM `projects` where id=" . $id);
    }
}
if ($_POST) {
    $id = $_SESSION['project_id'];                                                                  #debemos recuperar la imagen actual y borrarla del servidor para lugar pisar con la nueva imagen en el server y en la base de datos
    $image = $connection->request("select image FROM  `projects` where id=" . $id);                 #recuperamos la imagen de la base antes de borrar 
    $project_name = $_POST['project_name'];                     #levantamos los datos del formulario
    $description = $_POST['description'];
    $project_url = $_POST['project_url'];
    $github_url = $_POST['github_url'];                           
    if ($_FILES ['file']['name'] !== ""){
    unlink("../images/" . $image[0]['image']);                  
    $image = $_FILES['file']['name'];
    $temp_img = $_FILES['file']['tmp_name'];                    
    $date = new DateTime();                                     
    $image = $date->getTimestamp() . "_" . $image;
    move_uploaded_file($temp_img, "../images/" . $image);
    $connection = new connection();                             
    $sql = "UPDATE `projects` SET `name` = '$project_name' , `image` = '$image', `description` = '$description', `url` = '$project_url', `github` =  '$github_url' WHERE `projects`.`id` = '$id';";
    $id_proyecto = $connection->run($sql);
    header("location:index_admin.php");
    die();
    }else{
        $connection = new connection();
        $sql = "UPDATE `projects` SET `name` = '$project_name', `description` = '$description', `url` = '$project_url', `github` =  '$github_url'  WHERE `projects`.`id` = '$id';";
    $id_proyecto = $connection->run($sql);
    header("location:index_admin.php");
    die();

    }


}
?>
<?php #leemos proyectos 1 por 1
foreach ($project as $row) { ?>
    <div class="row d-flex justify-content-center mt-4 mb-5">
        <div class="col-md-10 col-sm-12">
            <div class="card bg-secondary">
                <div class="card-body">
                    <!--para recepcionar archivos uso enctype-->
                    <form action="#" method="post" enctype="multipart/form-data">
                        <div>
                            <label for="project_name">Project Name</label>
                            <input required class="form-control" type="text" name="project_name" id="project_name" value="<?php echo $row['name']; ?>">
                        </div>

                        <div>
                            <div class="d-flex flex-column justify-content-center align-items-center">
                                <p>Project Image</p>
                                <br>
                                <div class="d-flex justify-content-center align-item-center">
                                    <img class="old-img" src="../images/<?php echo $row['image']; ?>">
                                </div>
                            </div>
                            <label for="file">New Image - </label>
                            <input class="form-control" type="file" name="file" id="file" value="<?php echo $row['image']; ?>">
                        </div>
                        <div>
                            <label for="github_url">Github URL</label>
                            <input required class="form-control" type="text" name="github_url" id="github_url" value="<?php echo $row['github']; ?>">
                        </div>
                        <div>
                            <label for="project_url">Project URL</label>
                            <input required class="form-control" type="text" name="project_url" id="project_url" value="<?php echo $row['url']; ?>">
                        </div>
                        <div>
                            <label for="description">Description</label>
                            <textarea required class="form-control" name="description" id="description" cols="30" rows="4"><?php echo $row['description']; ?></textarea>
                        </div>
                        <div class="text-center">
                            <br>
                            <input class="btn btn-success" type="submit" value="Edit Project">
                        </div>

                    </form>
                </div> <!--cierra el body-->

            </div><!--cierra el card-->

        </div><!--cierra el col-->
    </div><!--cierra el row-->
<?php #cerramos la llave del foreach
} ?>

<?php include 'footer.php'; ?>