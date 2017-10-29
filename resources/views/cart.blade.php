@extends('layouts.app')
@section('content')
<div class="main">
    <div class="container">
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
            <!-- BEGIN CONTENT -->
            <div class="col-md-12 col-sm-12">
                <h1>Vaša korpa</h1>
                <div class="goods-page">
                    <div class="goods-data clearfix">
                        <div class="table-wrapper-responsive">

                                <?php
        $data = [
            'article'=> [
                [
                    'imgPath' => 'assets/pages/img/products/model3.jpg',
                    'name' => 'name test',
                    'color' => 'color test',
                    'description' => 'desc test',
                    'code' => 'code test',
                    'quantity' => '3',
                    'pricePerArticle' => '500',
                    'totalPrice' => '1500'
                ],
                [
                    'imgPath' => 'assets/pages/img/products/model3.jpg',
                    'name' => 'name test',
                    'color' => 'color test',
                    'description' => 'desc test',
                    'code' => 'code test',
                    'quantity' => '2',
                    'pricePerArticle' => '200',
                    'totalPrice' => '400'
                ]

            ],
            'info'=>
                [
                    'cost' => '2222',
                    'deliveryCost' => '555',
                    'totalCost' => '2777'
                ]
        ]
        ?>
                                @component('components.cart_article', $data)@endcomponent


                    </div>
                    <button class="btn btn-default" type="submit">Nastavite kupovinu <i class="fa fa-shopping-cart"></i></button>
                    <button class="btn btn-primary" type="submit">Završite kupovinu <i class="fa fa-check"></i></button>
                </div>
            </div>
            <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->

        <!-- BEGIN SIMILAR PRODUCTS -->
        <div class="row margin-bottom-40">
            <div class="col-md-12 col-sm-12">
                <h2>Najpopularniji proizvodi</h2>
                <div class="owl-carousel owl-carousel4">
                    <?php
                    $data = [
                        'popularProduct' => [
                            [
                                'popularImgPath' => 'assets/pages/img/products/k1.jpg',
                                'popularImgAlt' => 'Slicica',
                                'popularProductName' => 'Hehe',
                                'popularProductPrice' => '333',
                                'flag'=>'new'
                            ],
                            [
                                'popularImgPath' => 'assets/pages/img/products/k1.jpg',
                                'popularImgAlt' => 'Slicica',
                                'popularProductName' => 'Hehe',
                                'popularProductPrice' => '333',
                                'flag'=>'s'
                            ],
                            [
                                'popularImgPath' => 'assets/pages/img/products/k1.jpg',
                                'popularImgAlt' => 'Slicica',
                                'popularProductName' => 'Hehe',
                                'popularProductPrice' => '333',
                                'flag'=>'s'
                            ],
                            [
                                'popularImgPath' => 'assets/pages/img/products/k1.jpg',
                                'popularImgAlt' => 'Slicica',
                                'popularProductName' => 'Hehe',
                                'popularProductPrice' => '333',
                                'flag'=>'sale'
                            ]
                        ]
                    ]
                    ?>
                    @component('layouts.components.popular_product',$data)@endcomponent
                </div>
            </div>
        </div>
        <!-- END SIMILAR PRODUCTS -->
    </div>
</div>
    @stop