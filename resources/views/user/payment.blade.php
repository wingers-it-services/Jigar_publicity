<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <form id="checkout-form">
        @csrf
        <input type="text" id="totalprice" name="totalprice" value="1000"> <!-- Example value -->
        <input type="text" id="mobile" name="mobile" value="1234567890"> <!-- Example value -->
       <input type="text" id="name" name="name" value="anjali"> <!-- Example value -->
          <input type="text" id="email" name="email" value="jigar243@gmail.com"> <!-- Example value -->
          <input type="text" id="userId" name="userId" value="7"> <!-- Example value -->
          <button type="button" id="checkout-button">Checkout</button>
    </form>

    <script>
        $(document).ready(function() {
            $('#checkout-button').click(function() {
                // Retrieve form data
                var totalprice = $('#totalprice').val();
                var mobile = $('#mobile').val();
                var email = $('#email').val();
                
                var name = $('#name').val();

                $.ajax({
                    url: '{{ route('checkout') }}', // Use your actual route name
                    type: 'GET',
                    data: {
                        _token: $('input[name=_token]').val(),
                        totalprice: totalprice,
                        mobile: mobile,
                        email: email,
                        name: name
                    },
                    success: function(response) {
                        console.log('Response:', response);
                        window.location.replace(response); // Redirect to payment URL
                    },
                    error: function(xhr) {
                        console.error('Error:', xhr.responseText);
                        alert('An error occurred while processing your request.');
                    }
                });
            });
        });
    </script>
</body>

</html>
