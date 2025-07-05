// Mostrar mensaje de sesión (éxito)
document.addEventListener('DOMContentLoaded', function () {
    const mensaje = document.querySelector('meta[name="mensaje-sistema"]');
    if (mensaje) {
        Swal.fire({
            icon: 'success',
            title: 'Éxito',
            text: mensaje.content,
            confirmButtonText: 'Aceptar',
            timer: 2500,
            timerProgressBar: true
        });
    }

    // Confirmación para eliminar
    const eliminarBtns = document.querySelectorAll('.btn-eliminar');
    eliminarBtns.forEach(btn => {
        btn.addEventListener('click', function () {
            const form = this.closest('form');
            const nombreProducto = this.getAttribute('data-nombre');

            Swal.fire({
                title: '¿Estás seguro?',
                text: `Estás a punto de eliminar "${nombreProducto}". Esta acción no se puede deshacer.`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
});
