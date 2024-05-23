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
      <link rel="stylesheet" type="text/css" href="{{ asset('home/css/bootstrap.css') }}" />
      <!-- font awesome style -->
      <link href="{{ asset('home/css/font-awesome.min.css') }}" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="{{ asset('home/css/style.css') }}" rel="stylesheet" />
      <!-- responsive style -->
      <link href="{{ asset('home/css/responsive.css') }}" rel="stylesheet" />
    <style type="text/css">
        .center {
            margin: auto;
            width: 60%;
            padding: 30px;
            text-align: center;
            display: block;
        }
        table{
            width: 100%;
        }
        table,
        th,
        td {
            border: 1px solid black !important;
        }

        .th_deg {
            padding: 10px;
            background-color: skyblue !important;
            font-size: 20px;
            font-weight: bold;
        }
        .td_deg{
            text-align: center;
        }
        .td_deg img {
            display: block;
            margin: 0 auto; /* Center align the image itself */
        }
    </style>
</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')
        <!-- end header section -->
        <!-- slider section -->

        <!-- footer end -->
        <div class="center">
            <table>
                <tr>
                    <th class="th_deg">Product Name</th>
                    <th class="th_deg">Quantity</th>
                    <th class="th_deg">Price</th>
                    <th class="th_deg">Payment Status</th>
                    <th class="th_deg">Delivery Status</th>
                    <th class="th_deg">Image</th>
                    <th class="th_deg">Cancel Order</th>
                </tr>

                @foreach ($order as $order)
                    <tr>
                        <td class="td_deg">{{ $order->product_name }}</td>
                        <td class="td_deg">{{ $order->quantity }}</td>
                        <td class="td_deg">{{ $order->price }}</td>
                        <td class="td_deg">{{ $order->payment_status }}</td>
                        <td class="td_deg">{{ $order->delivery_status }}</td>
                        <td class="td_deg">
                            <img height="100" width="100" src="product/{{ $order->image }}" alt="">
                        </td>
                        <td>
                            @if ($order->delivery_status = 'processing')
                                <a onclick="confirm('Are you sure you want to cancel this order?')"
                                    class="btn btn-danger" href="{{ url('cancel_order', $order->id) }}">Cancel Order</a>
                            @else
                                <p style="color:blue;">Not Available</p>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>

    </div>
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
