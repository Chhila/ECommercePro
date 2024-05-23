<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style type="text/css">
        .title_deg {
            text-align: center;
            font-size: 25px;
            font-weight: bold;
            padding-bottom: 30px;
        }

        .table_deg {
            border: 2px solid white;
            width: auto;
            margin: auto;
            text-align: center;
        }

        .img_deg {
            width: 100px;
            height: 100px;
            margin: auto;
        }

        .th_deg {
            padding: 10px;
            border-bottom: 1px solid white;
        }

        .td_deg {
            padding: 0 10px;
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        <!-- partial:partials/_navbar.html -->
        @include('admin.header')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <h1 class="title_deg">All Order</h1>

                <div style="text-align:center;padding-bottom:30px;">
                    <form action="{{ url('search') }}" method="GET">
                        @csrf
                        <input type="text" name="search" id="" placeholder="Search" style="color: black;">
                        <input type="submit" value="Search" class="btn btn-outline-primary">
                    </form>
                </div>

                <table class="table_deg">
                    <tr>
                        <th class="th_deg">Name</th>
                        <th class="th_deg">Email</th>
                        <th class="th_deg">Address</th>
                        <th class="th_deg">Phone</th>
                        <th class="th_deg">Product Name</th>
                        <th class="th_deg">Quantity</th>
                        <th class="th_deg">Price</th>
                        <th class="th_deg">Payment Status</th>
                        <th class="th_deg">Delivery Status</th>
                        <th class="th_deg">Image</th>
                        <th class="th_deg">Delivery </th>
                        <th class="th_deg">Print PDF</th>
                        <th class="th_deg">Send Email</th>
                    </tr>
                    @forelse ($order as $order)
                        <tr>
                            <td class="td_deg">{{ $order->name }}</td>
                            <td class="td_deg">{{ $order->email }}</td>
                            <td class="td_deg">{{ $order->address }}</td>
                            <td class="td_deg">{{ $order->phone }}</td>
                            <td class="td_deg">{{ $order->product_name }}</td>
                            <td class="td_deg">{{ $order->quantity }}</td>
                            <td class="td_deg">{{ $order->price }}</td>
                            <td class="td_deg">{{ $order->payment_status }}</td>
                            <td class="td_deg">{{ $order->delivery_status }}</td>
                            <td class="td_deg">
                                <img class="img_deg" src="/product/{{ $order->image }}" alt="">
                            </td>

                            <td class="td_deg">
                                @if ($order->delivery_status == 'processing')
                                    <a href="{{ url('delivered', $order->id) }}"
                                        onclick="return confirm('Are you sure this product is delivered?')"
                                        class="btn btn-primary">Delivery</a>
                                @else
                                    <p>Delivered</p>
                                @endif

                            </td>
                            <td class="td_deg">
                                <a href="{{ url('print_pdf', $order->id) }}" class="btn btn-secondary">Print</a>
                            </td>
                            <td class="td_deg">
                                <a href="{{ url('send_email', $order->id) }}" class="btn btn-info">Send Email</a>
                            </td>
                        </tr>

                    @empty
                        <tr>
                            <td class="th_deg" colspan="16">No Data Found</td>
                        </tr>
                    @endforelse
                </table>
            </div>
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
</body>

</html>
