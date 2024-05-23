<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Order Details</h1>
    Customer ID   : <h3>{{ $order->id }}</h3>
    Customer Name   : <h3>{{ $order->name }}</h3>
    Email           : <h3>{{ $order->email }}</h3>
    Phone Number    : <h3>{{ $order->phone }}</h3>
    Address         : <h3>{{ $order->address }}</h3>

    Product ID      : <h3>{{ $order->product_id }}</h3>
    Product Name    : <h3>{{ $order->product_name }}</h3>
    Price           : <h3>{{ $order->price }}</h3>
    Quantity        : <h3>{{ $order->quantity }}</h3>
    Status          : <h3>{{ $order->payment_status }}</h3>

    <img src="product/{{ $order->image }}" width="100px" height="100px" alt="">
</body>
</html>