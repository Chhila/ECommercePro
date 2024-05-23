<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style>
        .center{
            margin: auto; border: 2px solid white;text-align: center; margin-top: 40px;
        }
        .font_size{
            text-align: center;padding-top: 20px; font-size: 40px; 
        }
        .img_size{
            width: 100px;height: 100px; margin: auto;
        }
        .th_color{
            background: red;
        }
        .th_deg{
            padding: 10px;
        }
        .td_deg{
            padding:0 10px;
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
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        {{ session()->get('message') }}
                    </div>
                @endif
                <h2 class="font_size">All Products</h2>
                <table class="center">
                    <tr class="th_color">
                        <th class="th_deg">Product Name</th>
                        <th class="th_deg">Description</th>
                        <th class="th_deg">Quantity</th>
                        <th class="th_deg">Category</th>
                        <th class="th_deg">Price</th>
                        <th class="th_deg">Discount Price</th>
                        <th class="th_deg">Image</th>
                        <th class="th_deg">Edit</th>
                        <th class="th_deg">Delete</th>
                    </tr>
                    @foreach ($product as $product)
                        <tr>
                            <td class="td_deg">{{ $product->name }}</td>
                            <td class="td_deg">{{ $product->description }}</td>
                            <td class="td_deg">{{ $product->quantity }}</td>
                            <td class="td_deg">{{ $product->category }}</td>
                            <td class="td_deg">{{ $product->price }}</td>
                            <td class="td_deg">{{ $product->discount_price }}</td>
                            <td class="td_deg">
                                <img class="img_size" src="/product/{{ $product->image }}" alt="">
                            </td>
                            <td class="td_deg">
                                <a class="btn btn-success" href="{{ url('update_product',$product->id) }}">Edit</a>
                            </td>
                            <td class="td_deg">
                                <a onclick="return confirm('Are you sure you want to delete this product?')" class="btn btn-danger" href="{{ url('delete_product',$product->id) }}">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    
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