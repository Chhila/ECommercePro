<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style type="text/css">
        .div_center{
            text-align: center;padding-top: 40px;
        }
        .font_size{
            font-size: 40px;padding-bottom: 40px;
        }
        .text_color{
            color: black;
        }
        label{
            display: inline-block; width: 200px; text-align: left;
        }
        .div_design{
            padding-bottom: 15px;
        }
        select{
            width: 200px; color: black;
        }
        #image{
            width: 200px;
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
                <div class="div_center">
                    <h1 class="font_size">Update Product</h1>

                    <form action="{{ url('/update_product_confirm',$product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="div_design">
                            <label for="name">Product Name :</label>
                            <input class="text_color" type="text" name="name" placeholder="Name" required="" value="{{ $product->name }}">
                        </div>

                        <div class="div_design">
                            <label for="name">Product Description :</label>
                            <input class="text_color" type="text" name="description" id="name" placeholder="Description" required="" value="{{ $product->description }}">
                        </div>

                        <div class="div_design">
                            <label for="quantity">Product Quantity :</label>
                            <input class="text_color" type="number" name="quantity" id="quantity" min="0"  placeholder="Quantity" required="" value="{{ $product->quantity }}">
                        </div>

                        <div class="div_design">
                            <label for="price">Product Price :</label>
                            <input class="text_color" type="number" name="price" id="price" placeholder="Price" required="" value="{{ $product->price }}">
                        </div>

                        <div class="div_design">
                            <label for="dis_price">Discount Price :</label>
                            <input class="text_color" type="number" name="dis_price" id="dis_price" placeholder="Discount Price" value="{{ $product->discount_price }}">
                        </div>

                        <div class="div_design">
                            <label for="category">Product Category :</label>
                            <select class="text_color" name="category" id="category" class="" required="">
                                <option value="{{ $product->category }}" selected="">{{ $product->category }}</option>
                                @foreach ($category as $category)
                                    <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div style="display: flex;align-items: center;justify-content: center;" class="div_design">
                            <label for="image">Current Product Image :</label>
                            <img height="100" width="100" src="/product/{{ $product->image }}" alt="">
                        </div>

                        <div class="div_design">
                            <label for="image">Change Product Image :</label>
                            <input type="file" name="image" id="image">
                        </div>

                        <div class="div_design">
                            <input class="btn btn-primary" type="submit" name="submit" id="submit" value="Update Product">
                        </div>
                    </form>
                </div>
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