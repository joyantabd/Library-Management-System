<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="shortcut icon" href="images/star.png" type="favicon/ico" /> -->

    <title>Joy's Kitchen</title>

    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.theme.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/flexslider.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/pricing.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/datatables.min.css') }}">


    <style>
        @foreach($sliders as $key=>$slider)
            .owl-carousel .owl-wrapper, .owl-carousel .owl-item:nth-child({{ $key + 1 }}) .item
        {
            background: url({{ asset('uploads/sliders/'.$slider->image) }});
            background-size: cover;
        }
        @endforeach

        #back2Top {
            width: 40px;
            line-height: 40px;
            overflow: hidden;
            z-index: 999;
            display: none;
            cursor: pointer;
            -moz-transform: rotate(270deg);
            -webkit-transform: rotate(270deg);
            -o-transform: rotate(270deg);
            -ms-transform: rotate(270deg);
            transform: rotate(270deg);
            position: fixed;
            bottom: 50px;
            right: 0;
            background-color: #DDD;
            color: #555;
            text-align: center;
            font-size: 30px;
            text-decoration: none;
        }
        #back2Top:hover {
            background-color: #DDF;
            color: #000;
        }


    </style>

    <script src="{{ asset('frontend/js/jquery-1.11.2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/jquery.flexslider.min.js') }}"></script>
    <script type="text/javascript">
        $(window).load(function() {
            $('.flexslider').flexslider({
                animation: "slide",
                controlsContainer: ".flexslider-container"
            });
        });
    </script>



</head>
<body data-spy="scroll" data-target="#template-navbar">

<!--== 4. Navigation ==-->
<nav id="template-navbar" class="navbar navbar-default custom-navbar-default navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#Food-fair-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="Food-fair-toggle">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#book-list">book list</a></li>
                <li><a href="#booksearch">booksearch</a></li>
                <li><a href="#booklocation">booklocation</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.row -->
</nav>


<!--== 5. Header ==-->
<section id="header-slider" class="owl-carousel">
    @foreach($sliders as $key=>$slider)
        <div class="item">
            <div class="container">
                <div class="header-content">
                    <button class="btn-success" route="{{ $slider->button_link }}" >{{ $slider->button_text }}</button>

                </div> <!-- /.header-content -->
            </div>
        </div>
    @endforeach
</section>





<!--==  7. Afordable Pricing  ==-->
<section id="book-list" class="book-list">
    <div id="w">


        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <ul id="menu-pricing" class="menu-price">

                        @foreach($books as $book)
                            <li class="item" id="{{ $book->title }}">

                                <a href="#">
                                    <img src="{{ asset('uploads/book/'.$book->image) }}" class="img-responsive" alt="Item" style="height: 300px;width: 369px;">
                                    <div class="menu-desc text-center">
                                            <span>
                                                <h3>{{$book->writer}}</h3>
                                                {{$book->edition}}
                                            </span>
                                    </div>
                                </a>

                                <h2 class="white">{{$book->publication}}</h2>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>





        <section id="booksearch" class="booksearch">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header card-header-primary">
                                        <h4 class="card-title ">Book Search Table</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="dataTable" class="table">
                                                <thead class=" text-primary">
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Writer</th>
                                                <th>Photo</th>
                                                <th>Edition</th>
                                                <th>ISBN</th>
                                                <th>Publication</th>
                                                <th>Added in Library</th>

                                                </thead>
                                                <tbody>
                                                @foreach($books as $key=>$book)
                                                    <tr>
                                                        <td>{{ $key + 1 }}</td>
                                                        <td>{{ $book->name }}</td>
                                                        <td>{{ $book->writer }}</td>
                                                        <td><img src="{!! asset('uploads/book/'.$book->image) !!}" class="img rounded-circle" style="width:100px"></td>
                                                        <td>{{ $book->edition }}</td>
                                                        <td>{{ $book->isbn }}</td>
                                                        <td>{{ $book->publication }}</td>
                                                        <td>{{ $book->created_at }}</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                                <tfoot>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Writer</th>
                                                <th>Photo</th>
                                                <th>Edition</th>
                                                <th>ISBN</th>
                                                <th>Publication</th>
                                                <th>Created At</th>

                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                        </div>
                            </div>
                        </div>
        </section>




        <section id="booklocation" class="booklocation">
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h4 class="card-title ">Location Table</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="dataTable1" class="table">
                                            <thead class=" text-primary">
                                            <th>ID</th>
                                            <th>Book Name</th>
                                            <th>Room Number</th>
                                            <th>Self Number</th>
                                            <th>Column Number</th>
                                            <th>Row Number</th>
                                            </thead>
                                            <tbody>
                                            @foreach($locations as $key=>$location)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $location->book->name }}</td>
                                                    <td>{{ $location->room_no }}</td>
                                                    <td>{{ $location->self_no }}</td>
                                                    <td>{{ $location->column_no }}</td>
                                                    <td>{{ $location->row_no }}</td>

                                                </tr>
                                            @endforeach
                                            </tbody>
                                            <tfoot>
                                            <th>ID</th>
                                            <th>Book Name</th>
                                            <th>Room Number</th>
                                            <th>Self Number</th>
                                            <th>Column Number</th>
                                            <th>Row Number</th>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>









        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="copyright text-center">
                            <p>
                                &copy; Copyright, 2019 <a href="#">Joy's Kitchen.</a> Developed by <a href="https://joyantabd.github.io/">Joyanta Kumar Sarker</a> Theme by <a href="http://themewagon.com/"  target="_blank">ThemeWagon</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <a id="back2Top" title="Back to top" href="#">&#10148;</a>

        <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('frontend/js/jquery.mixitup.min.js') }}" ></script>
        <script src="{{ asset('frontend/js/wow.min.js') }}"></script>
        <script src="{{ asset('frontend/js/jquery.validate.js') }}"></script>
        <script type="text/javascript" src="{{ asset('frontend/js/jquery.hoverdir.js') }}"></script>
        <script type="text/javascript" src="{{ asset('frontend/js/jQuery.scrollSpeed.js') }}"></script>
        <script src="{{ asset('frontend/js/script.js') }}"></script>
        <script type="text/javascript" src="{{asset('frontend/js/datatables.min.js')}}"></script>


        <script>
            $(document).ready(function() {
                $('#dataTable').DataTable();
            } );
        </script>

        <script>
            $(document).ready(function() {
                $('#dataTable1').DataTable();
            } );
        </script>


        <script>
            /*Scroll to top when arrow up clicked BEGIN*/
            $(window).scroll(function() {
                var height = $(window).scrollTop();
                if (height > 100) {
                    $('#back2Top').fadeIn();
                } else {
                    $('#back2Top').fadeOut();
                }
            });
            $(document).ready(function() {
                $("#back2Top").click(function(event) {
                    event.preventDefault();
                    $("html, body").animate({ scrollTop: 0 }, "slow");
                    return false;
                });

            });
            /*Scroll to top when arrow up clicked END*/
        </script>


</body>
</html>