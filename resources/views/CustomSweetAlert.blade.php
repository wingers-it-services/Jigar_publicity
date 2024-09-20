<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var status = "{{ session('status') }}";
        var message = "{{ session('message') }}";
        var errors = @json($errors->all());

        if (status === 'success') {
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: message
            }).then(function() {

            });
        } else if (status === 'error') {
            if (errors.length > 0) {
                var errorMessage = 'Validation Errors:<br>';
                errors.forEach(function(error) {
                    errorMessage += error + '<br>';
                });

                Swal.fire({
                    icon: 'error',
                    title: 'Validation Error',
                    html: errorMessage
                });
            } else {
                // Adjust the message with <br> for new line
                var formattedMessage = message.replace(/\n/g, '<br>');

                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    html: formattedMessage
                });
            }
        }
    });
</script>
