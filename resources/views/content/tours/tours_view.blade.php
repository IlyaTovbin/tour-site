

@extends('main')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/style.default.css') }}" id="theme-stylesheet">
<style>
    .MultiCarousel {
        float: left;
        overflow: hidden;
        padding-top: 73.2px;
        width: 100%;
        position:relative; 
    }
    .MultiCarousel .MultiCarousel-inner {
        transition: 1s ease all;
        float: left; 
    }

    .MultiCarousel .MultiCarousel-inner .item {
        float: left;
    }
    .MultiCarousel .MultiCarousel-inner .item > div {
        text-align: center;
        padding:10px;
        margin:10px;
        background:#f1f1f1;
        color:#666;
    }
    .MultiCarousel .leftLst, .MultiCarousel .rightLst {
        position:absolute;
        border:none !important;
        top:calc(50% - 20px); 
    }

    .close{
        top:calc(50% - 10rem); 
    }
    .MultiCarousel .leftLst {
        left:3rem; 
    }
    .MultiCarousel .rightLst {
        right:3rem; 
    }
    
    .MultiCarousel .leftLst.over, .MultiCarousel .rightLst.over {
        pointer-events: none;
    }

    .img-carusel{
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 100%;
    }

    .btn:focus, .btn.focus {
        outline: none !important; 
        box-shadow: none !important;
    }
    .myImg {
        border-radius: 5px;
        cursor: pointer;
        transition: 0.3s;
    }

    .myImg:hover {
        opacity: 0.7;
    }

/* The Modal (background) */
    .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 99999; /* Sit on top */
        padding-top: 100px; /* Location of the box */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
    }

/* Modal Content (image) */
    .modal-content {
        margin: auto;
        display: block;
        width: 100%;
        max-width: calc(75%);
    }

/* Caption of Modal Image */
    #caption {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
        text-align: center;
        color: #ccc;
        padding: 10px 0;
        height: 150px;
    }

/* Add Animation */
    .modal-content, #caption {  
        animation-name: zoom;
        animation-duration: 0.6s;
    }

    @keyframes zoom {
    from {transform: scale(0.1)} 
    to {transform: scale(1)}
    }

/* The Close Button */
    .close {
        position: absolute;
        top: 1rem;
        right: 35px;
        color: #f1f1f1;
        font-size: 40px;
        font-weight: bold;
        transition: 0.3s;
    }

    .close:hover,
    .close:focus {
        color: #bbb;
        text-decoration: none;
        cursor: pointer;
    }

/* 100% Image Width on Smaller Screens */
    @media only screen and (max-width: 700px){
    .modal-content {
        width: 100%;
    }
    }

    .mt-my-h{
        margin-top: 3rem !important;
    }

</style>
@endsection

@section('content')

<!-- Navbar-->
      <nav class="navbar navbar-expand-lg fixed-top shadow navbar-light bg-white">
        <div class="container-fluid">
          <div class="d-flex align-items-center"><a class="navbar-brand py-1" href="index.html">
            <img src="{{ url('images/favicon.png') }}" style="width: 15%;" alt="Directory logo">
            <span style="font-weight: bold;">Dima Guide</span></a>
            <form class="form-inline d-none d-sm-flex" action="#" id="search">
              <div class="input-label-absolute input-label-absolute-left input-reset input-expand ml-lg-2 ml-xl-3"> 
                <label class="label-absolute" for="search_search"><i class="fa fa-search"></i><span class="sr-only">What are you looking for?</span></label>
                <input class="form-control form-control-sm border-0 shadow-0 bg-gray-200" id="search_search" placeholder="Search" aria-label="Search">
                <button class="btn btn-reset btn-sm" type="reset"><i class="fa-times fas"></i></button>
              </div>
            </form>
          </div>
          <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
          <!-- Navbar Collapse -->
          <div class="collapse navbar-collapse" id="navbarCollapse">
            <form class="form-inline mt-4 mb-2 d-sm-none" action="#" id="searchcollapsed">
              <div class="input-label-absolute input-label-absolute-left input-reset w-100">
                <label class="label-absolute" for="searchcollapsed_search"><i class="fa fa-search"></i><span class="sr-only">What are you looking for?</span></label>
                <input class="form-control form-control-sm border-0 shadow-0 bg-gray-200" id="searchcollapsed_search" placeholder="Search" aria-label="Search">
                <button class="btn btn-reset btn-sm" type="reset"><i class="fa-times fas">           </i></button>
              </div>
            </form>
            <ul class="navbar-nav ml-auto">
              <li class="nav-item dropdown"><a class="nav-link dropdown-toggle " id="homeDropdownMenuLink" href="index.html" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   Home</a>
              </li>
              <li class="nav-item"><a class="nav-link" href="#">Contact</a>
              </li>
              <li class="nav-item dropdown"><a class="nav-link dropdown-toggle " id="docsDropdownMenuLink" href="index.html" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   Docs</a>
              </li>
              <li class="nav-item"><a class="nav-link" href="#">Sign in</a></li>
              <li class="nav-item"><a class="nav-link" href="#">Sign up</a></li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- /Navbar -->
    </header>

    <div class="row" style="margin-right: 0px; margin-left: 0px;">
        <div class="MultiCarousel" data-items="1,1,3,3" data-slide="1" id="MultiCarousel"  data-interval="1000">
            <div class="MultiCarousel-inner" style="height: 300px">
                @foreach($tour->images as $image)
                <div class="item">
                    <img class="img-fluid img-carusel" src="{{ asset('images/tours/' . $image) }}" alt="First slide">
                </div>
                @endforeach
            </div>
            <button style="border: none; color: #FFFFFF; font-size: 2rem;" class="leftLst btn"><i class="fas fa-chevron-left"></i></button>
            <button style="border: none; color: #FFFFFF; font-size: 2rem;" class="rightLst btn"><i class="fas fa-chevron-right"></i></button>
        </div>
    </div>

    <div class="container pb-5">
        <div class="row">
            <div class="col-lg-8 col-12 mt-my-h"> 
                <div class="text-block">
                    <p class="text-primary"><i class="fa-map-marker-alt fa mr-1"></i> {{ $tour->location }}</p>
                    <h1>{{ $tour->title }}</h1>
                    {!! $tour->body !!}  
                </div>
                <div class="text-block">
                    <h5 class="mb-4">Локация</h5>
                    <div class="map-wrapper-300 row mb-3">
                        <div class="h-100 col-12" id="detailMap">
                            {!! $tour->google_maps !!}
                        </div>
                    </div>
                </div>
                <div class="text-block">
                    <h5 class="mb-4">Галерея</h5>
                    <div class="row gallery mb-3 ml-n1 mr-n1">
                    @if($tour->images)
                        @foreach($tour->images as $image)
                            <div class="col-lg-4 col-12 px-1 mb-2"><img class="img-fluid myImg" src="{{ asset('images/tours/' . $image) }}" alt="..."></div>
                        @endforeach
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer-->
    <footer class="position-relative z-index-10 d-print-none">
      <!-- Main block - menus, subscribe form-->
      <div class="py-6 bg-gray-200 text-muted"> 
        <div class="container">
          <div class="row">
            <div class="col-lg-4 mb-5 mb-lg-0">
              <div class="font-weight-bold text-uppercase text-dark mb-3">Dima Guide</div>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
            </div>
            <div class="col-lg-4">
              <h6 class="text-uppercase text-dark mb-3">Daily Offers & Discounts</h6>
              <p class="mb-3"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. At itaque temporibus.</p>
              <form action="#" id="newsletter-form">
                <div class="input-group mb-3">
                  <input class="form-control bg-transparent border-dark border-right-0" type="email" placeholder="Your Email Address" aria-label="Your Email Address">
                  <div class="input-group-append">
                    <button class="btn btn-outline-dark border-left-0" type="submit"> <i class="fa fa-paper-plane text-lg"></i></button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Copyright section of the footer-->
      <div class="py-4 font-weight-light bg-gray-800 text-gray-300">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-6 text-center text-md-left">
              <p class="text-sm mb-md-0">&copy; 2020, Dima Guide.  All rights reserved.</p>
            </div>
          </div>
        </div>
      </div>
    </footer>

    <div id="myModal" class="modal">
        <img class="modal-content" id="img01">
        <span class="close"><i class="fas fa-times"></i></span>
    </div>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script>
    var modal = document.getElementById('myModal');
    $('.myImg').on('click', function(){
        modal.style.display = "block";
        modalImg.src = this.src;
    })
    var modalImg = document.getElementById("img01");
    var span = document.getElementsByClassName("close")[0];
    span.onclick = function() { 
    modal.style.display = "none";
    }

    $(document).ready(function () {
        let screenSize = $(window).width();
        if(screenSize < 985){
            let mapSize = $('#detailMap').find('iframe');
            iframeSize = screenSize - screenSize/10;
            if(iframeSize < mapSize.attr('width'))
                mapSize.attr('style', `width: ${iframeSize}px;`);
        }
        var itemsMainDiv = ('.MultiCarousel');
        var itemsDiv = ('.MultiCarousel-inner');
        var itemWidth = "";

        $('.leftLst, .rightLst').click(function () {
            var condition = $(this).hasClass("leftLst");
            if (condition)
                click(0, this);
            else
                click(1, this)
        });

        ResCarouselSize();

        $(window).resize(function () {
            ResCarouselSize();
        });

        function ResCarouselSize() {
            var incno = 0;
            var dataItems = ("data-items");
            var itemClass = ('.item');
            var id = 0;
            var btnParentSb = '';
            var itemsSplit = '';
            var sampwidth = $(itemsMainDiv).width();
            var bodyWidth = $('body').width();
            $(itemsDiv).each(function () {
                id = id + 1;
                var itemNumbers = $(this).find(itemClass).length;
                btnParentSb = $(this).parent().attr(dataItems);
                itemsSplit = btnParentSb.split(',');
                $(this).parent().attr("id", "MultiCarousel" + id);


                if (bodyWidth >= 1200) {
                    incno = itemsSplit[3];
                    itemWidth = sampwidth / incno;
                }
                else if (bodyWidth >= 992) {
                    incno = itemsSplit[2];
                    itemWidth = sampwidth / incno;
                }
                else if (bodyWidth >= 768) {
                    incno = itemsSplit[1];
                    itemWidth = sampwidth / incno;
                }
                else {
                    incno = itemsSplit[0];
                    itemWidth = sampwidth / incno;
                }
                $(this).css({ 'transform': 'translateX(0px)', 'width': itemWidth * itemNumbers });
                $(this).find(itemClass).each(function () {
                    $(this).outerWidth(itemWidth);
                });

                $(".leftLst").addClass("over");
                $(".rightLst").removeClass("over");

            });
        }

        function ResCarousel(e, el, s) {
            var leftBtn = ('.leftLst');
            var rightBtn = ('.rightLst');
            var translateXval = '';
            var divStyle = $(el + ' ' + itemsDiv).css('transform');
            var values = divStyle.match(/-?[\d\.]+/g);
            var xds = Math.abs(values[4]);
            if (e == 0) {
                translateXval = parseInt(xds) - parseInt(itemWidth * s);
                $(el + ' ' + rightBtn).removeClass("over");

                if (translateXval <= itemWidth / 2) {
                    translateXval = 0;
                    $(el + ' ' + leftBtn).addClass("over");
                }
            }
            else if (e == 1) {
                var itemsCondition = $(el).find(itemsDiv).width() - $(el).width();
                translateXval = parseInt(xds) + parseInt(itemWidth * s);
                $(el + ' ' + leftBtn).removeClass("over");

                if (translateXval >= itemsCondition - itemWidth / 2) {
                    translateXval = itemsCondition;
                    $(el + ' ' + rightBtn).addClass("over");
                }
            }
            $(el + ' ' + itemsDiv).css('transform', 'translateX(' + -translateXval + 'px)');
        }

        function click(ell, ee) {
            var Parent = "#" + $(ee).parent().attr("id");
            var slide = $(Parent).attr("data-slide");
            ResCarousel(ell, Parent, slide);
        }
    });

</script>
@stop




