<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="images/favicon.png" type="">
    <title>Famms - Fashion HTML Template</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
    <!-- font awesome style -->
    <link href="home/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="home/css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="home/css/responsive.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style type="text/css">
        .center {
            margin: auto;
            width: 50%;
            text-align: center;
            padding: 30px;
        }

        table {
            width: 100%;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        .th_deg {
            font-size: 20px;
            padding: 20px;
        }

        .img_deg {
            width: 100px;
            height: 100px;
        }

        .total_deg {
            font-size: 20px;
            padding: 20px;
        }

        .td_deg {
            text-align: center;
        }

        .td_deg img {
            display: block;
            margin: 0 auto;
            /* Center align the image itself */
        }
    </style>
</head>

<body>
    @include('sweetalert::alert')
    <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')
        <!-- end header section -->
        <!-- slider section -->

        <!-- end slider section -->

        <!-- why section -->
        @if (session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{ session()->get('message') }}
            </div>
        @endif
        <div class="center">
            <table>
                <tr>
                    <th class="th_deg">Product Name</th>
                    <th class="th_deg">Product Quantity</th>
                    <th class="th_deg">Price</th>
                    <th class="th_deg">Image</th>
                    <th class="th_deg">Action</th>
                </tr>
                <?php $totalprice = 0; ?>
                @foreach ($cart as $cart)
                    <tr>
                        <td class="td_deg">{{ $cart->product_name }}</td>
                        <td class="td_deg">{{ $cart->quantity }}</td>
                        <td class="td_deg">${{ $cart->price }}</td>
                        <td class="td_deg"><img class="img_deg" src="/product/{{ $cart->image }}" alt=""></td>
                        <td class="td_deg">
                            <form id="remove-form-{{ $cart->id }}" action="{{ url('remove_cart', $cart->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('POST')
                                <button type="button" class="btn btn-danger" onclick="confirmation(event, {{ $cart->id }})">Remove</button>
                            </form>
                        </td>
                    </tr>
                    <?php $totalprice = $totalprice + $cart->price; ?>
                @endforeach

            </table>
            <div>
                <h1 class="total_deg">Total Price : ${{ $totalprice }}</h1>
            </div>

            <div>
                <h1 style="font-size: 25px; padding-bottom:15px">Proceed to Order</h1>
                <a href="{{ url('cash_order') }}" class="btn btn-danger">Cash on Delivery</a>
                <a href="{{ url('stripe', $totalprice) }}" class="btn btn-danger">Pay Using Card</a>
            </div>
        </div>
        <!-- footer start -->

        <!-- footer end -->
        <div class="cpy_">
            <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

                Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

            </p>
        </div>
        <script>
            function confirmation(ev, cartId) {
                ev.preventDefault();
                swal({
                        title: "Are you sure to cancel this product?",
                        text: "You will not be able to revert this!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willCancel) => {
                        if (willCancel) {
                            document.getElementById('remove-form-' + cartId).submit();
                        }
                    });
            }
        </script>
        <!-- jQery -->
        <script src="home/js/jquery-3.4.1.min.js"></script>
        <!-- popper js -->
        <script src="home/js/popper.min.js"></script>
        <!-- bootstrap js -->
        <script src="home/js/bootstrap.js"></script>
        <!-- custom js -->
        <script src="home/js/custom.js"></script>
</body>

</html>
