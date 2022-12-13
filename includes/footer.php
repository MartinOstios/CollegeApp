<script src="<?php echo $js; ?>jquery-3.5.1.min.js"></script>
<script src="<?php echo $js; ?>bootstrap.min.js"></script>
<script src="<?php echo $js; ?>owl.carousel.min.js"></script>
<script src="<?php echo $js; ?>sweetalert2@10.js"></script>
<script>
    $(document).ready(function() {
        /* - - - - - - - - - - - - - - - - - - - */
        $('.btn-delete').click(function() {
            $id = $(this).attr('data-id');
            $dir = $(this).attr('data-dir');
            Swal.fire({
                title: '¿Estás seguro?',
                text: "No podrás revertir esto...",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#0D2340',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Cancelar',
                confirmButtonText: '¡Sí!, eliminar'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.replace($dir + '/delete.php?id=' + $id);
                }
            });
        });
        /* - - - - - - - - - - - - - - - - - - - */
        $('.btn-inscrito').click(function() {
            Swal.fire({
                title: '¿Estás seguro que te quieres inscribir?',
                text: '',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: '<i class="fas fa-window-close"></i> Cancelar',
                confirmButtonText: '<i class="fas fa-pen"></i> Inscribirse'
            }).then((result) => {
                if (result.isConfirmed) {
                    //Envía el formulario
                    document.getElementById('form').submit();
                }
            })
        })
        /* - - - - - - - - - - - - - - - - - - - */
        $('.btn-upload').click(function() {
            $('#photo').click();
        });
        /* - - - - - - - - - - - - - - - - - - - */
        $('#photo').change(function(event) {
            let reader = new FileReader();
            reader.onload = function(event) {
                $('#preview').attr('src', event.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
        /* - - - - - - - - - - - - - - - - - - - */
        $('.boton-presionado').hide();
        /* - - - - - - - - - - - - - - - - - - - */
        <?php if (isset($_SESSION['presionado'])) : ?>
            $(".boton-presionado").click();
            <?php unset($_SESSION['presionado']) ?>
        <?php endif ?>
        /* - - - - - - - - - - - - - - - - - - - */
        <?php if (isset($_SESSION['message'])) : ?>
            Swal.fire(
                '¡Bien hecho!',
                '<?php echo $_SESSION['message']; ?>',
                'success'
            );
            <?php unset($_SESSION['message']); ?>
        <?php endif; ?>
        /* - - - - - - - - - - - - - - - - - - - */
        <?php if (isset($_SESSION['error'])) : ?>
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: 'Algo no está bien...',
                text: '<?php echo $_SESSION['error']; ?>',
                showConfirmButton: false,
                timer: 5000
            });
            <?php unset($_SESSION['error']); ?>
        <?php endif; ?>
        /* - - - - - - - - - - - - - - - - - - - */
        $("form").submit(function() {

            var this_master = $(this);

            this_master.find('input[type="checkbox"]').each(function() {
                var checkbox_this = $(this);


                if (checkbox_this.is(":checked") == true) {
                    checkbox_this.attr('value', 'on');
                } else {
                    checkbox_this.prop('checked', true);
                    //DONT' ITS JUST CHECK THE CHECKBOX TO SUBMIT FORM DATA    
                    checkbox_this.attr('value', 'off');
                }
            })
        })
        /* - - - - - - - - - - - - - - - - - - - */
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: false,
            dots: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        });
        /* - - - - - - - - - - - - - - - - - - - */
    });
</script>
</body>

</html>