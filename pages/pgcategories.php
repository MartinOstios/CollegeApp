<main class="container">
    <section class="row mt-5">
        <div class="col-md-8 offset-md-2 text-center">
            <h1 class="">Module Categories</h1>
            <img src="<?php echo $imgs; ?>icon-mod22.svg" class="mt-3">
            <br>
            <!--  -->
            <a href="categories/add.php" class="btn btn-cancel mt-3">
                <i class="fas fa-plus"></i> Add Category
            </a>
            <table class="table table-striped mt-4">
                <thead>
                    <tr class="letter-title">
                        <th>Name</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $catgs = listCategories($conn); ?>
                    <?php foreach ($catgs as $catg) : ?>
                        <tr class="letter">
                            <td><?php echo $catg['name']; ?></td>
                            <td><img src="<?php echo $public . $catg['image']; ?>" width="40px" class="img-thumbnail"></td>
                            <td>
                                <a href="categories/show.php?id=<?php echo $catg['id']; ?>" class="btn btn-sm btn-actions">
                                    <i class="fas fa-search"></i>
                                </a>
                                <a href="categories/edit.php?id=<?php echo $catg['id']; ?>" class="btn btn-sm btn-actions">
                                    <i class="fas fa-pen"></i>
                                </a>
                                <a href="javascript:;" class="btn btn-sm btn-actions btn-delete" data-id="<?php echo $catg['id']; ?>" data-dir="categories">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>

            <!--  -->
            <footer class="mt-2">
                <p class="mt-5 text-muted">
                    <small> &copy; All rights reserved 2020</small>
                </p>
            </footer>
        </div>
    </section>
</main>