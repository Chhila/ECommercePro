<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <base href="/public">
    @include('admin.css')
    <style type="text/css">
        label {

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
                <h1 style="text-align:center; font-size:25px;">Send Email to {{ $order->email }}</h1>
                <form style="margin:0 auto;width:400px;" action="{{ url('send_user_email',$order->id) }}" method="POST">
                    @csrf
                    <div style="display:flex; justify-content:space-between; align-items:center;margin-top:20px;">
                        <label  for="greeting">Email Greeting : </label>
                        <input style="color:black;" style="" type="text" name="greeting">
                    </div>
                    <div style="display:flex; justify-content:space-between; align-items:center;margin-top:20px;">
                        <label  for="firstname">Email First Line : </label>
                        <input style="color:black;" style="" type="text" name="firstline">
                    </div>
                    <div style="display:flex; justify-content:space-between; align-items:center;margin-top:20px;">
                        <label  for="body">Email Body : </label>
                        <input style="color:black;" style="" type="text" name="body">
                    </div>
                    <div style="display:flex; justify-content:space-between; align-items:center;margin-top:20px;">
                        <label  for="button">Email Button Name : </label>
                        <input style="color:black;" style="" type="text" name="button">
                    </div>
                    <div style="display:flex; justify-content:space-between; align-items:center;margin-top:20px;">
                        <label  for="url">Email URL : </label>
                        <input style="color:black;" style="" type="text" name="url">
                    </div>
                    <div style="display:flex; justify-content:space-between; align-items:center;margin-top:20px;">
                        <label  for="lastline">Email Last Line : </label>
                        <input style="color:black;" style="" type="text" name="lastline">
                    </div>
                    <div style="text-align:center; margin-top:20px;">
                        <input style="" type="submit" name="" value="Send Email" class="btn btn-primary">
                    </div>
                </form>
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
