<?php include 'header.php';

 if ($_POST) { #si hay envio de datos, los inserto en la base de datos  

    $project_name = $_POST['project_name'];
    $description = $_POST['description'];
    $github_url = $_POST['github_url'];
    $project_url = $_POST['project_url'];
    $image = $_FILES['file']['name'];            //nombre de la imagen
    $temp_img = $_FILES['file']['tmp_name'];       //guardamos la imagen en una carpeta
    $date = new DateTime();
    $image = $date->getTimestamp() . "_" . $image;       //se concatena una variable Date a la imagen para crear un codigo unico a cada una
    move_uploaded_file($temp_img, "../images/" . $image);


    #creo una instancia(objeto) de la clase de conexion
    $connection = new connection();
    $sql = "INSERT INTO `projects` (`id`, `name`, `image`, `description`, `github`, `url`) VALUES (NULL, '$project_name' , '$image', '$description', '$github_url', '$project_url')";
    $proyect_id = $connection->run($sql);   //devuelve el id del proyecto insertado y se guarda en una variable
    header("Location:index_admin.php");
    die();
}

if ($_GET) {

    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];
        $connection = new connection();
        $image = $connection->request("SELECT `image` FROM  `projects` where `id`=" . $id);
        unlink("../images/" . $image[0]['image']);

        $sql = "DELETE FROM `projects` WHERE `projects`.`id` =" . $id;
        $project_id = $connection->run($sql);
        header("Location:index_admin.php");
        die();
    }
    
    if (isset($_GET['edit'])) {
        $id = $_GET['edit'];
        header("Location:edit.php?edit=" . $id);
        die();
    }
}?>


<?php $connection = new connection();# es un objeto de tipo conexion,
      $projects= $connection->request("SELECT * FROM `projects`"); ?>

<div class ="container-fluid p-3">
    <div class="d-flex justify-content-between">
        <p class="lead mx-4"><b>Projects in DataBase</b></p>
        <button id="newProject" ><i class="fa-solid fa-square-plus fa-lg"></i> - New Project</button>
    </div>
    
    <div class="row justify-content-center mb-5 newproject-container ">
    <div class="col-md-10 col-sm-12">
        <div class="card bg-secondary">
            <div class="card-body">
                <!--para recepcionar archivos uso enctype-->
                <form action="index_admin.php" method="post" enctype="multipart/form-data">
                    <div>
                        <label for="project_name">Project Name</label>
                        <input required class="form-control" type="text" name="project_name" id="project_name">
                    </div>

                    <div>
                        <label for="file">Project Image</label>
                        <input required class="form-control" type="file" name="file" id="file">
                    </div>
                    <div>
                        <label for="github_url">Github URL</label>
                        <input required class="form-control" type="text" name="github_url" id="github_url">
                    </div>
                    <div>
                        <label for="project_url">Project URL</label>
                        <input required class="form-control" type="text" name="project_url" id="project_url">
                    </div>
                    <br>
                    <div>
                        <label for="description">Project Description</label>
                        <textarea required class="form-control" name="description" id="description" cols="30" rows="4"></textarea>
                    </div>
                    <div class="text-center">
                        <br>
                        <input class="btn btn-success" type="submit" value="Send Project">
                    </div>

                </form>
            </div> <!--cierra el body-->

        </div><!--cierra el card-->

    </div><!--cierra el col-->
</div><!--cierra el row-->
    <div class="table-display">
        <table class="table">
            <thead class="text-center">
                <th Valign="middle">Project Image</th>
                <th Valign="middle">Project Name</th>
                <th Valign="middle">Description</th>
                <th Valign="middle">Links</th>
                <th Valign="middle">Actions</th>
            </thead>
            <tbody>
                <?php foreach ($projects as $project){ ?>
                    <tr>
                        <td class="img-td" Valign="middle"><img class="table-img" src="../images/<?php echo $project['image'];?>" alt="project image"></td>
                        <td Valign="middle"><?php echo $project['name'];?></td>
                        <td Valign="middle"><?php echo $project['description'];?></td>
                        <td align="center"Valign="middle">
                            <a class="mx-2" href="<?php echo $project['github']; ?>"><i class="fa-brands fa-github fa-lg fa-icon"></i></a> <hr>
                            <a class="mx-2" href="<?php echo $project['url']; ?>"><i class="fa-solid fa-link fa-lg fa-icon"></i></a>
                        <td align="center" Valign="middle">
                            <a class="fa-icon" href="?edit=<?php echo $project['id'];?>"><i class="fa-solid fa-pen-to-square fa-lg"></i>Edit</a><hr>
                            <a class="fa-icon" href="?delete=<?php echo $project['id'];?>"><i class="fa-solid fa-trash-can fa-lg"></i>Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
            </tbody>
        </table>
    </div>

    <div class="container row row-cols-1 row-cols-md-3 g-4 card-display">
        <?php foreach($projects as $project){ ?>
            <div class="col">
                <div class="card shadow">
                    <img class="card-img-top" src="../images/<?php echo $project['image'];?>" alt="Project Image">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $project['name'];?></h5>
                        <p class="card-text"><?php echo $project['description'];?></p>
                        <div class="d-flex justify-content-between">
                            <a class="card-icon" href="<?php echo $project['github']; ?>"><i class="fa-brands fa-github fa-lg"></i></a>
                            <a class="card-icon" href="<?php echo $project['url']; ?>"><i class="fa-solid fa-link fa-lg"></i></a>
                            <a class="card-icon" href="?edit=<?php echo $project['id'];?>"><i class="fa-solid fa-pen-to-square fa-lg"></i>Edit</a>
                            <a class="card-icon" href="?delete=<?php echo $project['id'];?>"><i class="fa-solid fa-trash-can fa-lg"></i>Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<?php include 'footer.php' ?>