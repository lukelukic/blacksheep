@extends('layouts.app')
@section('content')
<div class="main">
    <div class="container">
        <!-- BEGIN SIDEBAR & CONTENT -->

        <!-- END SIDEBAR & CONTENT -->

        <!-- BEGIN SIMILAR PRODUCTS -->
        <div class="row margin-bottom-40">
            <div class="col-md-12 col-sm-12">
                <h2>Proizvodi na akciji</h2>
                <div class="owl-carousel owl-carousel4">
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
                            ],
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
                <div class="owl-carousel owl-carousel4">
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
                            ],
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
        </div>
        <!-- END SIMILAR PRODUCTS -->
    </div>
</div>
    @stop