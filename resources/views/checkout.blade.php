@extends('layouts.app')
@section('content')
    <div class="main">
        <div class="container">
            <!-- BEGIN SIDEBAR & CONTENT -->
            <div class="row margin-bottom-40">
                <!-- BEGIN CONTENT -->
                <div class="col-md-12 col-sm-12">
                    <h1>NARUDŽBINA</h1>
                    <!-- BEGIN CHECKOUT PAGE -->
                    <div class="panel-group checkout-page accordion scrollable" id="checkout-page">

                        <!-- BEGIN CHECKOUT -->
                        <div id="checkout" class="panel panel-default">
                            <div class="panel-heading">
                                <h2 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#checkout-page" href="#checkout-content" class="accordion-toggle">
                                        Korak 1: Opcije
                                    </a>
                                </h2>
                            </div>
                            <div id="checkout-content" class="panel-collapse collapse in">
                                <div class="panel-body row">
                                    <div class="col-md-6 col-sm-6">
                                        <h3>PRVI PUT KUPUJEM OVDE</h3>
                                        <p>Obaveštenje:</p>
                                        <p>Nakon prve kupovine, dobićete petocifreni kod koji ćete u budućnosti moći da koristite kako biste pregledali istoriju kupovine i iskoristili potencijalne popuste.</p>
                                        <button class="btn btn-primary" type="submit" data-toggle="collapse" data-parent="#checkout-page" data-target="#payment-address-content">Nastavite</button>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <h3>VEĆ SAM BLACK SHEEP KORISNIK</h3>
                                        <p>Unesite petocifreni kod:</p>
                                        <form role="form" action="#">
                                            <div class="form-group">
                                                <input type="text" id="token" class="form-control">
                                            </div>

                                            <button class="btn btn-primary" type="submit" data-toggle="collapse" data-parent="#checkout-page" data-target="#payment-address-content" >Potvrdi</button>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END CHECKOUT -->

                        <!-- BEGIN PAYMENT ADDRESS -->
                        <div id="payment-address" class="panel panel-default">
                            <div class="panel-heading">
                                <h2 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#checkout-page" href="#payment-address-content" class="accordion-toggle">
                                        Korak 2: Detalji za isporuku
                                    </a>
                                </h2>
                            </div>
                            <?php
            $data = [
                'details' => [
                    [
                        'name' => 'pera',
                        'surname' => 'peric',
                        'email' => 'email@email.com',
                        'tel' => '0645555',
                        'address' => 'prva',
                        'address2' => 'druga',
                        'town' => '3513',
                        'zip' => '11000'
                    ]
                ]
                            ];
                            ?>
                                @component('components.delivery_details',$data)@endcomponent

                        </div>
                        <!-- END PAYMENT ADDRESS -->



                        <!-- BEGIN SHIPPING METHOD -->
                        <div id="shipping-method" class="panel panel-default">
                            <div class="panel-heading">
                                <h2 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#checkout-page" href="#shipping-method-content" class="accordion-toggle">
                                        Korak 3: Način dostave
                                    </a>
                                </h2>
                            </div>
                            <div id="shipping-method-content" class="panel-collapse collapse">
                                <div class="panel-body row">
                                    <div class="col-md-12">
                                        <p>Dostavu vrši CityExpress svakog radnog dana od 09 do 20h i subotom od 09 do 14h.</p>
                                        <p>Plaćanje se vrši pouzećem u dinarskoj protivvrednosti</p>
                                        <div class="form-group">
                                            <label for="delivery-comments">Ako postoji zahtev vezano za dostavu, tu smo da izadjemo u susret:</label>
                                            <textarea id="delivery-comments" rows="8" class="form-control"></textarea>
                                        </div>
                                        <button class="btn btn-primary  pull-right" type="submit" id="button-shipping-method" data-toggle="collapse" data-parent="#checkout-page" data-target="#confirm-content">Nastavite</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END SHIPPING METHOD -->

                        <!-- BEGIN PAYMENT METHOD -->


                        <!-- BEGIN CONFIRM -->
                        <div id="confirm" class="panel panel-default">
                            <div class="panel-heading">
                                <h2 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#checkout-page" href="#confirm-content" class="accordion-toggle">
                                        Korak 4: Potvrdi narudžbinu
                                    </a>
                                </h2>
                            </div>
                            <div id="confirm-content" class="panel-collapse collapse">
                                <div class="panel-body row">
                                    <div class="col-md-12 clearfix">
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


                                        <div class="clearfix"></div>
                                        <button class="btn btn-primary pull-right" type="submit" id="button-confirm">Naruči</button>
                                        <button type="button" class="btn btn-default pull-right margin-right-20">Odustani</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END CONFIRM -->
                    </div>
                    <!-- END CHECKOUT PAGE -->
                </div>
                <!-- END CONTENT -->
            </div>
            <!-- END SIDEBAR & CONTENT -->
        </div>
    </div>
    @stop