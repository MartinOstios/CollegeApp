<main class="container">
    <section class="row mt-5">
        <div class="col-md-6 offset-md-3 text-center">
            <h1 class="">Editar curso</h1>
            <br>
            <!--  -->
            <?php if ($_GET) : ?>
                <?php
                $id   = $_GET['id'];
                $game = showGame($id, $conn);
                ?>
                <?php foreach ($game as $gm) : ?>
                    <form action="" method="post" class="mt-5" enctype="multipart/form-data">

                        <input type="hidden" name="user_id" value="<?php echo $_SESSION['ss-id']; ?>">
                        <div class="form-group">
                            <input type="hidden" name="id" value="<?php echo $gm['id_curso']; ?>">
                            <input type="text" class="form-control" name="name" placeholder="NOMBRE" value="<?php echo $gm['nombre']; ?>" required>
                        </div>
                        <div class="form-group mt-3">
                            <figure>
                                <img src="<?php echo $public . $gm['imagen']; ?>" width="80px" id="preview" class=" img-thumbnail">
                            </figure>
                            <input type="file" id="photo" class="form-control-file d-none" name="photo" accept="image/*">
                            <button class="btn btn-actions btn-upload mt-3" type="button">
                                <i class="fas fa-upload"></i>
                                SELECT IMAGE
                            </button>
                        </div>
                        <div class="form-group mt-3">
                            <textarea name="description" cols="30" rows="4" class="form-control" placeholder="DESCRIPCIÓN" required><?php echo $gm['descripcion'] ?></textarea>
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" name="price" placeholder="PRECIO" value="<?php echo $gm['precio']; ?>" required>
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" name="period" placeholder="DURACIÓN" value="<?php echo $gm['duracion']; ?>" required>
                        </div>
                        <div class="form-group mt-3">
                            <button class="btn btn-register btn-block text-uppercase">
                                <i class="fas fa-user-edit"></i>
                                Editar
                            </button>
                            <a class="btn btn-cancel btn-block text-uppercase mt-2" href="../course.php">
                                <i class="fas fa-times"></i>
                                Cancelar
                            </a>
                        </div>
                    </form>
                <?php endforeach ?>
            <?php endif ?>
            <?php
            if ($_POST) {
                $id          = $_POST['id'];
                $name        = $_POST['name'];
                $description = $_POST['description'];
                $price       = $_POST['price'];
                $user_id     = $_POST['user_id'];
                $period      = $_POST['period'];
                $path        = "imgs/";
                if (!empty($_FILES['photo']['name'])) {
                    $image    = $path . time() . "." . pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
                    move_uploaded_file($_FILES['photo']['tmp_name'], '../public/' . $image);
                } else {
                    $image = null;
                }

                if (editGame($id, $name, $description, $price, $user_id, $period, $image, $conn)) {
                    $_SESSION['message'] = '¡El curso: ' . $name . ' fue editado satisfactoriamente!';
                    echo "<script>
                            setTimeout(function() {
                                window.location.replace('../course.php');
                            }, 4000);
                          </script>";
                } else {
                    $_SESSION['error'] = '¡Ese curso ya existe!';
                }
            }
            ?>
            <!--  -->
        </div>
    </section>
</main>