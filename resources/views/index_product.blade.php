<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Product Name</th>
                <th scope="col">Category</th>
                <th scope="col">Image</th>
                <th scope="col">Add To Cart</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>

                        <button type="button" class="btn btn-link" data-bs-toggle="modal"
                            data-bs-target="#productModal{{ $product->id }}">
                            {{ $product->name }}
                        </button>

                    </td>
                    <td>{{ $product->category->name }}</td>
                    <td>{{ $product->image }}</td>
                    <td>
                        <button class="btn btn-primary add-to-cart" data-id="{{ $product->id }}">
                            Add to Cart
                        </button>
                    </td>
                </tr>
                <!-- Modal -->
                <div class="modal fade" id="productModal{{ $product->id }}" tabindex="-1"
                    aria-labelledby="productModalLabel{{ $product->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="productModalLabel{{ $product->id }}">{{ $product->name }}
                                </h5>
                            </div>
                            <div class="modal-body">
                                <p>{{ $product->description }}</p>
                                <img src="{{ $product->image }}" alt="{{ $product->name }}" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </tbody>
    </table>

    <button id="sendToWhatsApp" class="btn btn-success">
        Send To Whatsapp
    </button>


    <script>
        $(document).ready(function(){
            $('.add-to-cart').click(function(){
                let id = $(this).data('id');
                $.ajax({
                    url: '/add-to-cart/' + id,
                    method: 'POST',
                    data: {_token: '{{ csrf_token()}}'},
                    success: function(response){
                        alert('Product added to cart');
                    }
                });
            });

            $('#sendToWhatsApp').click(function() {
                $.ajax({
                    url: '/get-cart',
                    method: 'GET',
                    success: function(response) {
                        let cartItems = response.cartItems;
                        let message = 'Cart Items:\n';
                        cartItems.forEach(item => {
                            message += `Name: ${item.name}, ID: ${item.id}\n`;
                        });
                        let whatsappUrl = `https://wa.me/?text=${encodeURIComponent(message)}`;
                        window.open(whatsappUrl, '_blank');
                    }
                });
            });
        });
    </script>

</body>

</html>
