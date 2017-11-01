@extends('layouts.app')
@section('slider')
    <!-- BEGIN SLIDER -->
    <div class="page-slider margin-bottom-35">
        <div id="carousel-example-generic" class="carousel slide carousel-slider">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                <li data-target="#carousel-example-generic" data-slide-to="3"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <!-- First slide -->
                <div class="item carousel-item-four active">
                    <div class="container">
                        <div class="carousel-position-four text-center">
                            <h2 class="margin-bottom-20 animate-delay carousel-title-v3 border-bottom-title text-uppercase" data-animation="animated fadeInDown">
                                MASKE <br/><span class="color-red-v2">ZA SVE MODELE</span><br/> MOBILNIH TELEFONA
                            </h2>
                            <p class="carousel-subtitle-v2" data-animation="animated fadeInUp">Lorem ipsum dolor sit amet constectetuer diam <br/>
                                adipiscing elit euismod ut laoreet dolore.</p>
                        </div>
                    </div>
                </div>

                <!-- Second slide -->
                <div class="item carousel-item-five">
                    <div class="container">
                        <div class="carousel-position-four text-center">
                            <h2 class="animate-delay carousel-title-v4" data-animation="animated fadeInDown">
                                AKCIJA
                            </h2>
                            <p class="carousel-subtitle-v2" data-animation="animated fadeInDown">
                                Zaštitno staklo
                            </p>
                            <p class="carousel-subtitle-v3 margin-bottom-30" data-animation="animated fadeInUp">
                                Za Vaš mobilni
                            </p>
                            <a class="carousel-btn" href="#" data-animation="animated fadeInUp">KUPI</a>
                        </div>
                        <img class="carousel-position-five animate-delay hidden-sm hidden-xs" src="assets/pages/img/shop-slider/slide2/price.png" alt="Price" data-animation="animated zoomIn">
                    </div>
                </div>

                <!-- Third slide -->
                <div class="item carousel-item-six">
                    <div class="container">
                        <div class="carousel-position-four text-center">
                            <span class="carousel-subtitle-v3 margin-bottom-15" data-animation="animated fadeInDown">
                                USB kablovi
                            </span>
                            <p class="carousel-subtitle-v4" data-animation="animated fadeInDown">
                                samo kod nas
                            </p>
                            <p class="carousel-subtitle-v3" data-animation="animated fadeInDown">
                                350 RSD
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Fourth slide -->
                <div class="item carousel-item-seven">
                    <div class="center-block">
                        <div class="center-block-wrap">
                            <div class="center-block-body">
                                <h2 class="carousel-title-v1 margin-bottom-20" data-animation="animated fadeInDown">
                                    Najprodavaniji <br/>
                                    bežični zvučnik
                                </h2>
                                <a class="carousel-btn" href="#" data-animation="animated fadeInUp">Kupi odmah!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Controls -->
            <a class="left carousel-control carousel-control-shop" href="#carousel-example-generic" role="button" data-slide="prev">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
            </a>
            <a class="right carousel-control carousel-control-shop" href="#carousel-example-generic" role="button" data-slide="next">
                <i class="fa fa-angle-right" aria-hidden="true"></i>
            </a>
        </div>
    </div>
    <!-- END SLIDER -->
    @stop
@section('content')
    <div class="main">
        <div class="container">
            <!-- BEGIN SALE PRODUCT & NEW ARRIVALS -->
            <div class="row margin-bottom-40">
                <!-- BEGIN SALE PRODUCT -->

                <div class="col-md-12 sale-product">
                    <h2>Najnoviji proizvodi</h2>
                    <div class="owl-carousel owl-carousel5">
                @component('components.latest_product',$data)@endcomponent
                    </div>
                </div>
                <!-- END SALE PRODUCT -->
            </div>
            <!-- END SALE PRODUCT & NEW ARRIVALS -->

            <!-- BEGIN SIDEBAR & CONTENT -->
            <div class="row margin-bottom-40 ">
                <!-- BEGIN SIDEBAR -->
                <div class="sidebar col-md-3 col-sm-4">
                    <ul class="list-group margin-bottom-25 sidebar-menu">
                <?php
                $picka = [
                    'artikli' => [
                        'oprema za mobilni'=>[
                    'maske' => [
                        'maske za iphone' => [
                            'iphone7',
                            'iphone8'],
                        'maske za lg' => [
                            'lg nexus',
                            'lg zvecka'],
                        'maske za asus' => [
                            'lg nexus',
                            'lg zvecka']
                    ],
                            'picke materine' => [
                                'maske za iphone' => [
                                    'iphone7',
                                    'iphone8'],
                                'maske za lg' => [
                                    'lg nexus',
                                    'lg zvecka'],
                                'maske za asus' => [
                                    'lg nexus',
                                    'lg zvecka']
                            ]
                        ],
                        'oprema za mobilni2'=>[
                            'maske2' => [
                                'maske za iphone2' => [
                                    'iphone72',
                                    'iphone82'],
                                'maske za lg2' => [
                                    'lg nexus2',
                                    'lg zvecka2'],
                                'univerzalne2'=>[]
                            ]
                        ]

                    ]
                ];
                        ?>
                @component('components.categories',$picka)@endcomponent

                        {{--<li class="list-group-item clearfix"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Oprema za laptop</a></li>--}}
                        {{--<li class="list-group-item clearfix"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Oprema za racunar</a></li>--}}
                        {{--<li class="list-group-item clearfix"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Video nadzor</a></li>--}}
                        {{--<li class="list-group-item clearfix"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Auto oprema</a></li>--}}
                        {{--<li class="list-group-item clearfix"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Kategorija X</a></li>--}}
                        {{--<li class="list-group-item clearfix"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Kategorija Y</a></li>--}}
                        {{--<li class="list-group-item clearfix"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Kategorija Z</a></li>--}}
                        {{--<li class="list-group-item clearfix"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Kategorija M</a></li>--}}
                        {{--<li class="list-group-item clearfix"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Kategorija N</a></li>--}}
                    </ul>
                </div>
                <!-- END SIDEBAR -->
                <!-- BEGIN CONTENT -->
                <div class="col-md-9 col-sm-8">
                    <h2>Najtrazenije!</h2>
                    <div class="owl-carousel owl-carousel3">
                        @component('layouts.components.popular_product', $data)@endcomponent
                    </div>
                </div>
                <!-- END CONTENT -->
            </div>
            <!-- END SIDEBAR & CONTENT -->

            <!-- BEGIN TWO PRODUCTS & PROMO -->
            <div class="row margin-bottom-35 ">
                <!-- BEGIN TWO PRODUCTS -->
                <div class="col-md-6 two-items-bottom-items">
                    <h2>Izdvajamo</h2>
                    <div class="owl-carousel owl-carousel2">
                        <?php
                        $data = [
                            'featuredProduct' => [
                                [
                                    'productImgPath' => 'assets/pages/img/products/k4.jpg',
                                    'productImgAlt' => 'Slicica',
                                    'productPrice' => '333',
                                    'productName' => 'Latest naziv',
                                    'flag'=>'sale'
                                ],
                                [
                                    'productImgPath' => 'assets/pages/img/products/k4.jpg',
                                    'productImgAlt' => 'Slicica',
                                    'productPrice' => '333',
                                    'productName' => 'Latest naziv',
                                    'flag'=>'sale'
                                ]
                            ]
                        ]
                        ?>
                        @component('components.featured_product',$data)@endcomponent





                    </div>
                </div>
                <!-- END TWO PRODUCTS -->
                <!-- BEGIN PROMO -->
                <div class="col-md-6 shop-index-carousel">
                    <div class="content-slider">
                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                <li data-target="#myCarousel" data-slide-to="1"></li>
                                <li data-target="#myCarousel" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                               <?php
            $data = [
                'anotherSlider' => [
                    [
                        'sliderImgPath' => 'assets/pages/img/index-sliders/slide2.jpg',
                        'sliderImgAlt' => 'slajder'
                    ],
                    [
                        'sliderImgPath' => 'assets/pages/img/index-sliders/slide3.jpg',
                        'sliderImgAlt' => 'slajder'
                    ]

                ]
            ];
            ?>
            @component('components.another_slider',$data)@endcomponent

                            </div>
                        </div>
                    </div>
                </div>
                <!-- END PROMO -->
            </div>
            <!-- END TWO PRODUCTS & PROMO -->
        </div>
    </div>


    @stop