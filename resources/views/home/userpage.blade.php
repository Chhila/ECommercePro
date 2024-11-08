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
</head>

<body>
    @include('sweetalert::alert')

    <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')
        <!-- end header section -->
        <!-- slider section -->
        @include('home.slider')
        <!-- end slider section -->
    </div>
    <!-- why section -->
    @include('home.why')
    <!-- end why section -->

    <!-- arrival section -->
    @include('home.new_arrival')
    <!-- end arrival section -->

    <!-- product section -->
    @include('home.product')
    <!-- end product section -->

    {{-- Comment and Reply system start here --}}
    <h1 style="font-size:30px; text-align:center;padding:20px 0;">Comments</h1>
    <form style="text-align: center;" action="{{ url('add_comment') }}" method="POST">
        @csrf
        <textarea style="width: 600px;height:150px;" placeholder="Comment something here" name="comment" id=""></textarea><br>
        <input type="submit" class="btn btn-primary" value="Comment">
    </form>
    <div style="padding-left:20%; padding-bottom:20px;">
        <h1 style="font-size:20px;padding-bottom:20px;">All Comment</h1>
        @foreach ($comment as $comment)
            <div style="margin:10px 0;">
                <b style="color:orange;font-size:18px;">{{ $comment->name }}</b>
                <p>{{ $comment->comment }}</p>
                <a style="color:blue;" href="javascript::void(0);" onclick="reply(this)"
                    data-Commentid="{{ $comment->id }}">Reply</a>
                @foreach ($reply as $replys)
                    @if ($rep->comment_id == $comment->id)
                        <div style="padding-left:3%;padding:10px 0;">
                            <b>{{ $replys->name }}</b>
                            <p>{{ $replys->reply }}</p>
                            <a style="color:blue;" href="javascript::void(0);" onclick="reply(this)"
                                data-Commentid="{{ $comment->id }}">Reply</a>
                        </div>
                    @endif
                @endforeach

            </div>
        @endforeach

        <div style="display: none;" class="replyDiv">
            <form action="{{ url('add_reply') }}" method="POST">
                @csrf
                <input style="width: 100px;display:inline;margin-bottom:10px;" type="text" name="commentId" id="commentId"><br>
                <textarea style="width: 500px;height:100px;margin-bottom:0;" placeholder="Write something here" name="reply" id=""></textarea><br>
                <button type="submit" class="btn btn-primary">Reply</button>
                <a href="javascript::void(0);" class="btn" onclick="reply_close(this)">Close</a>
            </form>

        </div>
    </div>

    <!-- subscribe section -->
    @include('home.subscribe')
    <!-- end subscribe section -->
    <!-- client section -->
    @include('home.client')
    <!-- end client section -->
    <!-- footer start -->
    @include('home.footer')
    <!-- footer end -->
    <div class="cpy_">
        <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

        </p>
    </div>

    <script type="text/javascript">
        function reply(caller) {
            document.getElementById('commentId').value = $(caller).attr('data-Commentid');
            $('.replyDiv').insertAfter($(caller));
            $('.replyDiv').show();
        }

        function reply_close(caller) {
            // $('.replyDiv').insertAfter($(caller));
            // $('.replyDiv').show();
            $('.replyDiv').hide();
        }
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });

        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };
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
