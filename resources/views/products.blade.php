@extends('layouts.app')
@section('content')


<div class="main">
    <div class="container">
        <!-- BEGIN SIDEBAR -->
        <div class="sidebar col-md-3 col-sm-4">
            <ul class="list-group margin-bottom-25 sidebar-menu">
                <?php
                $fifi = [
                    'artikli' => [
                        'oprema za mobilni'=>[
                            'maske' => [
                                'maske za iphone' => [
                                    'iphone7',
                                    'iphone8'],
                                'maske za lg' => [
                                    'lg nexus',
                                    'lg zvecka'],
                                'univerzalne'=>[]
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
                @component('components.categories',$fifi)@endcomponent

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
        <!-- BEGIN CONTENT -->
        <div class="col-md-9 col-sm-7">
            <div class="row list-view-sorting clearfix">
                <div class="col-md-2 col-sm-2 list-view">
                    <a href="javascript:;"><i class="fa fa-th-large"></i></a>
                    <a href="javascript:;"><i class="fa fa-th-list"></i></a>
                </div>
                @component('components.show_and_sort', $data)@endcomponent
            </div>

        @component('components.product',$data)@endcomponent

                <!-- PRODUCT ITEM END -->
            </div>
            <!-- END PRODUCT LIST -->
            <!-- BEGIN PAGINATOR -->

            @component('components.pagination', $data)@endcomponent
            <!-- END PAGINATOR -->
        </div>
        <!-- END CONTENT -->
    </div>
    <!-- END SIDEBAR & CONTENT -->
</div>
</div>

    @stop