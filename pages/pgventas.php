<main class="container">
    <section class="row mt-5">
        <div class="col-md-8 offset-md-2 text-center">
            <h1>Ventas</h1>
            <div class="row g-0 centrar">
                <table class="table table-striped mt-4">
                    <thead>
                        <tr class="letter-title">
                            <th>ID</th>
                            <th>Nombre inscrito</th>
                            <th>Nombre curso</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $bill = listBills($conn); ?>
                        <?php foreach ($bill as $bl) : ?>
                            <?php $users = showUser($bl['id_usuario'], $conn) ?>
                            <?php foreach ($users as $user) : ?>
                                <?php $game = showGame($bl['id_curso'], $conn) ?>
                                <?php foreach ($game as $gm) : ?>
                                    <tr class="letter2">
                                        <td>
                                            <?php echo $bl['id_factura'] ?>
                                        </td>
                                        <td>

                                            <?php echo $user['nombre'] ?>

                                        </td>
                                        <td>

                                            <?php echo $gm['nombre'] ?>

                                        </td>
                                        <td>
                                            <?php echo $bl['fecha'] ?>
                                        </td>
                                    </tr>
                    </tbody>

                <?php endforeach; ?>
            <?php endforeach; ?>
        <?php endforeach ?>
                </table>
                <a href="dashboard.php" class="btn btn-cancel mt-3 mb-3">
                    <i class="fas fa-arrow-left"></i> Atrás
                </a>
            </div>
        </div>
    </section>
</main>