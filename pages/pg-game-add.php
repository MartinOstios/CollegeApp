<main class="container">
    <section class="row mt-5">
        <div class="col-md-6 offset-md-3 text-center">
            <h1 class="">Agregar curso</h1>
            
            <br>
            <!--  -->
            <form action="" method="post" class="mt-5" enctype="multipart/form-data">
                <div class="form-group mt-3">
                    <input type="hidden" name="user_id" value="<?php echo $_SESSION['ss-id']; ?>">
                    <input type="text" class="form-control" name="name" placeholder="NOMBRE" required>
                </div>

                <div class="form-group mt-3">
                    <figure>
                        <img src="<?php echo $imgs; ?>noimage.png" width="80px" id="preview" class="img-thumbnail">
                    </figure>
                    <input type="file" id="photo" class="form-control d-none" name="photo" accept="image/*" required>
                    <button class="btn btn-actions btn-upload" type="button">
                        <i class="fas fa-upload"></i>
                        SELECT IMAGE
                    </button>
                </div>
                <div class="form-group mt-3">
                    <textarea name="description" cols="30" rows="4" class="form-control" placeholder="DESCRIPCIÓN" required></textarea>
                </div>
                <div class="form-group mt-3">
                    <input type="text" class="form-control" name="price" placeholder="PRECIO" required>
                </div>
                <div class="form-group mt-3">
                    <input type="text" class="form-control" name="period" placeholder="DURACIÓN" required>
                </div>

                <div class="form-group mt-3">
                    <button class="btn btn-register btn-block text-uppercase">
                        <i class="fas fa-plus"></i>
                        Agregar
                    </button>
                    <a class="btn btn-cancel btn-block text-uppercase mt-2" href="../course.php">
                        <i class="fas fa-times"></i>
                        Cancelar
                    </a>
                </div>
            </form>
            <?php
            if ($_POST) {
                var_dump($_FILES);
                $name        = $_POST['name'];
                $description = $_POST['description'];
                $path        = "imgs/";
                $image       = $path . time() . "." . pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
                $price       = $_POST['price'];
                $user_id     = $_POST['user_id'];
                $period      = $_POST['period'];

                move_uploaded_file($_FILES['photo']['tmp_name'], '../public/' . $image);

                if (addGame($name, $image, $description, $price, $user_id, $period, $conn)) {
                    $_SESSION['message'] = '¡El curso: ' . $name . ' fue agregado satisfactoriamente!';
                    echo "<script>
                            setTimeout(function() {
                                window.location.replace('../course.php');
                            }, 4000);
                          </script>";
                } else {
                    $_SESSION['error'] = '¡Ese curso existe actualmete!';
                }
            }
            ?>
            <!--  -->
        </div>
    </section>
</main>