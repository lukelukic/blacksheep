<!DOCTYPE html>
<!--[if IE 8]>
<html lang="en" class="ie8 no-js">
<![endif]-->
<!--[if IE 9]>
<html lang="en" class="ie9 no-js">
<![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- Head BEGIN -->
<head>
    <meta charset="utf-8">
    <title>Black Sheep MobileStore | {{$title ?? "Home"}}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta content="BlackSheep MobileStore je internet prodavnica koja će zadovoljiti sve potrebe Vašeg mobilnog telefona. Da bi bili neodoljivi, blejite sa nama!" name="description">
    <meta content="oprema za mobilne telefone, usb kabal, staklo za telefon, maska za telefon, baterija za telefon" name="keywords">
    <meta content="keenthemes" name="author">

    <link rel="shortcut icon" href="favicon.ico">
    <!-- Fonts START -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|PT+Sans+Narrow|Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css">
    <!--- fonts for slider on the index page -->
    <!-- Fonts END -->
    <!-- Global styles START -->
    <link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Global styles END -->
    <!-- Page level plugin styles START -->
    <link href="assets/pages/css/animate.css" rel="stylesheet">
    <link href="assets/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet">
    <link href="assets/plugins/owl.carousel/assets/owl.carousel.css" rel="stylesheet">
    <!-- Page level plugin styles END -->
    <!-- Theme styles START -->
    <link href="assets/pages/css/components.css" rel="stylesheet">
    <link href="assets/pages/css/slider.css" rel="stylesheet">
    <link href="assets/pages/css/style-shop.css" rel="stylesheet" type="text/css">
    <link href="assets/corporate/css/style.css" rel="stylesheet">
    <link href="assets/corporate/css/style-responsive.css" rel="stylesheet">
    <link href="assets/corporate/css/themes/red.css" rel="stylesheet" id="style-color">
    <link href="assets/corporate/css/custom.css" rel="stylesheet">
    <!-- Theme styles END -->
</head>
<!-- Head END -->
<!-- Body BEGIN -->
<body class="ecommerce">
<!-- BEGIN STYLE CUSTOMIZER -->
<!--<div class="color-panel hidden-sm">
   <div class="color-mode-icons icon-color"></div>
   <div class="color-mode-icons icon-color-close"></div>
   <div class="color-mode">
     <p>THEME COLOR</p>
     <ul class="inline">
       <li class="color-red current color-default" data-style="red"></li>
       <li class="color-blue" data-style="blue"></li>
       <li class="color-green" data-style="green"></li>
       <li class="color-orange" data-style="orange"></li>
       <li class="color-gray" data-style="gray"></li>
       <li class="color-turquoise" data-style="turquoise"></li>
     </ul>
   </div>
   </div>-->
<!-- END BEGIN STYLE CUSTOMIZER -->
<!-- BEGIN TOP BAR -->
<div class="pre-header">
    <div class="container">
        <div class="row">
            <!-- BEGIN TOP BAR LEFT PART -->
            <div class="col-md-6 col-sm-6 additional-shop-info">
                <ul class="list-unstyled list-inline">
                    <li><i class="fa fa-phone"></i><span>+381 65 63 14 535</span></li>
                    <li><i class="fa fa-envelope"></i><span>info@blacksheepmobstore.com</span></li>
                </ul>
            </div>
            <!-- END TOP BAR LEFT PART -->
            <!-- BEGIN TOP BAR MENU -->
            <!--<div class="col-md-6 col-sm-6 additional-nav">
               <ul class="list-unstyled list-inline pull-right">
                   <li>BlackSheep Token:</li>
                   <li><input type="text"/></li>
                   <li><input type="submit" value="Potvrdi"/></li>
               </ul>
               </div>-->
            <!-- END TOP BAR MENU -->
        </div>
    </div>
</div>
<!-- END TOP BAR -->
<!-- BEGIN HEADER -->
<div class="header">
    <div class="container">
        <a class="site-logo" href="/"><img src="assets/corporate/img/logos/logo-shop-red.png" alt="Metronic Shop UI"></a>
        <a href="javascript:void(0);" class="mobi-toggler"><i class="fa fa-bars"></i></a>
        <!-- BEGIN CART -->
        <div class="top-cart-block">
            <?php
            $data = [
                'products' => [
                    [
                        "cartImgPath"=>"assets/pages/img/cart-img.jpg",
                        "cartImgAlt" => "Alt slike",
                        "cartProductMultiplier" => "1",
                        "cartProductName" => "Naziv proizvoda",
                        "cartProductPrice" => "990"
                    ],
                    [
                        "cartImgPath"=>"assets/pages/img/cart-img.jpg",
                        "cartImgAlt" => "Alt slike",
                        "cartProductMultiplier" => "1",
                        "cartProductName" => "Naziv proizvoda",
                        "cartProductPrice" => "990"
                    ]
                ],
                'info'=>
                    [
                        'cartProductCount' => '3',
                        'cartTotal' => '5500',
                        'cartImgPath' => 'assets/pages/img/cart-img.jpg',
                        'cartImgAlt' => 'Ovo je proizvod',
                        'cartProductMultiplier' => '1'
                    ]


            ];
            ?>
            @component('layouts.components.index_cart', $data)@endcomponent
        </div>
        <!--END CART -->
        <!-- BEGIN NAVIGATION -->
        <div class="header-navigation">
            <ul>
                <li class="dropdown">
                <li><a href="/">Početna</a></li>
                <li><a href="products">Proizvodi</a></li>
                <li><a href="clearance">Akcija!</a></li>
                <li><a href="delivery">Isporuka</a></li>
                <li><a href="contact">Kontakt</a></li>
                <!-- END DROPDOWN MENU -->
                </li>
                <li class="dropdown dropdown100 nav-catalogue">
                    <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:;">
                        Novo
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="header-navigation-content">
                                <div class="row">
                                <?php
                                    $data = [
                                        'new' => [
                                            [
                                                'newImgPath' => 'assets/pages/img/products/model4.jpg',
                                                'newImgAlt' => 'Novi proizvod',
                                                'newProductName' => 'Naziv novog',
                                                'newPrice' => '999'
                                            ],
                                            [
                                                'newImgPath' => 'assets/pages/img/products/model4.jpg',
                                                'newImgAlt' => 'Novi proizvod',
                                                'newProductName' => 'Naziv novog',
                                                'newPrice' => '999'
                                            ],
                                            [
                                                'newImgPath' => 'assets/pages/img/products/model4.jpg',
                                                'newImgAlt' => 'Novi proizvod',
                                                'newProductName' => 'Naziv novog',
                                                'newPrice' => '999'
                                            ],
                                            [
                                                'newImgPath' => 'assets/pages/img/products/model4.jpg',
                                                'newImgAlt' => 'Novi proizvod',
                                                'newProductName' => 'Naziv novog',
                                                'newPrice' => '999'
                                            ]
                                        ]
                                    ]

                                    ?>
                                    @component('layouts.components.new',$data)@endcomponent
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- BEGIN TOP SEARCH -->
                <li class="menu-search">
                    <span class="sep"></span>
                    <i class="fa fa-search search-btn"></i>
                    <div class="search-box">
                        <form action="#">
                            <div class="input-group">
                                @component('components.search')@endcomponent
                            </div>
                        </form>
                    </div>
                </li>
                <!-- END TOP SEARCH -->
            </ul>
        </div>
        <!-- END NAVIGATION -->
    </div>
</div>
<!-- Header END -->
@yield('slider')
@yield('content')
<!-- BEGIN STEPS -->
<!-- BEGIN BRANDS -->
<div class="brands">
    <div class="container">
        <div class="owl-carousel owl-carousel6-brands">
            <a href=""><img src="assets/pages/img/brands/apple.jpg" alt="apple" title="apple"></a>
            <a href=""><img src="assets/pages/img/brands/samsung.jpg" alt="samsung" title="samsung"></a>
            <a href=""><img src="assets/pages/img/brands/lg.jpg" alt="lg" title="lg"></a>
            <a href=""><img src="assets/pages/img/brands/huawei.jpg" alt="huawei" title="huawei"></a>
            <a href=""><img src="assets/pages/img/brands/lenovo.jpg" alt="lenovo" title="lenovo"></a>
            <a href=""><img src="assets/pages/img/brands/nokia.jpg" alt="nokia" title="nokia"></a>

        </div>
    </div>
</div>
<!-- END BRANDS -->
<div class="steps-block steps-block-red">
    <div class="container">
        <div class="row">
            <div class="col-md-4 steps-block-col">
                <i class="fa fa-truck"></i>
                <div>
                    <h2>BESPLATNA DOSTAVA</h2>
                    <em>Za 3 ili više poručenih proizvoda</em>
                    <em>ili za kupovinu preko 1500 RSD</em>
                </div>
                <span>&nbsp;</span>
            </div>
            <div class="col-md-4 steps-block-col">
                <i class="fa fa-gift"></i>
                <div>
                    <h2>POKLONI</h2>
                    <em>3 poklona nedeljno za srećne kupce</em>
                </div>
                <span>&nbsp;</span>
            </div>
            <div class="col-md-4 steps-block-col">
                <i class="fa fa-phone"></i>
                <div>
                    <h2>+ 381 65 63 14 535</h2>
                    <em>Naručite pozivom ili porukom!</em>
                    <em>Radno vreme call centra: 08-20h</em>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END STEPS -->
<!-- BEGIN PRE-FOOTER -->
<div class="pre-footer">
    <div class="container">
        <div class="row">
            <!-- BEGIN BOTTOM ABOUT BLOCK -->
            <div class="col-md-3 col-sm-6 pre-footer-col">
                <h2>O nama</h2>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam sit nonummy nibh euismod tincidunt ut laoreet dolore magna aliquarm erat sit volutpat. Nostrud exerci tation ullamcorper suscipit lobortis nisl aliquip  commodo consequat. </p>
                <p>Duis autem vel eum iriure dolor vulputate velit esse molestie at dolore.</p>
            </div>
            <!-- END BOTTOM ABOUT BLOCK -->
            <!-- BEGIN BOTTOM INFO BLOCK -->
            <div class="col-md-3 col-sm-6 pre-footer-col">
                <h2>Informacije</h2>
                <ul class="list-unstyled">
                    {{--<li><i class="fa fa-angle-right"></i> <a href="about">O nama</a></li>--}}
                    <li><i class="fa fa-angle-right"></i> <a href="cart">Korpa</a></li>
                    <li><i class="fa fa-angle-right"></i> <a href="contact">Kontakt</a></li>
                    <li><i class="fa fa-angle-right"></i> <a href="custom-case">Custom Case</a></li>
                    <li><i class="fa fa-angle-right"></i> <a href="faq">FAQ</a></li>
                    <li><i class="fa fa-angle-right"></i> <a href="privacy-policy">Politika poslovanja</a></li>
                    <li><i class="fa fa-angle-right"></i> <a href="products">Proizvodi</a></li>
                </ul>
            </div>
            <!-- END INFO BLOCK -->
            <!-- BEGIN BOTTOM CONTACTS -->
            <div class="col-md-3 col-sm-6 pre-footer-col">
                <h2>Kontaktirajte nas</h2>
                <address class="margin-bottom-40">
                    Ulica, broj<br>
                    Beograd, RS<br>
                    Telefon: 065 63 14 535<br>
                    Email: <a href="mailto:info@metronic.com">info@blacksheepmobstore.com</a><br>
                    WhatsApp/Viber: 065 63 14 535
                </address>
            </div>
            <!-- END BOTTOM CONTACTS -->
            <!-- BEGIN BOTTOM ABOUT BLOCK -->
            <div class="col-md-3 col-sm-6 pre-footer-col">
                <h2>Kolona 4</h2>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam sit nonummy nibh euismod tincidunt ut laoreet dolore magna aliquarm erat sit volutpat. Nostrud exerci tation ullamcorper suscipit lobortis nisl aliquip  commodo consequat. </p>
                <p>Duis autem vel eum iriure dolor vulputate velit esse molestie at dolore.</p>
            </div>
            <!-- END BOTTOM ABOUT BLOCK -->
        </div>
        <hr>
        <div class="row">
            <!-- BEGIN SOCIAL ICONS -->
            <div class="col-md-6 col-sm-6">
                <ul class="social-icons">
                    <li><a class="instagram" data-original-title="instagram" href="http://www.instagram.com/blacksheepmobstore" target="_blank"></a></li>
                    <li><a class="facebook" data-original-title="facebook" href="http://www.fb.com/blacksheepmobstore" target="_blank"></a></li>
                </ul>
            </div>
            <!-- END SOCIAL ICONS -->
            <!-- BEGIN NEWLETTER -->
            <div class="col-md-6 col-sm-6">
                <div class="pre-footer-subscribe-box pull-right">
                    <h2>PRONAĐITE NAS NA DRUŠTVENIM MREŽAMA</h2>
                </div>
            </div>
            <!-- END NEWLETTER -->
        </div>
    </div>
</div>
<!-- END PRE-FOOTER -->
<!-- BEGIN FOOTER -->
<div class="footer">
    <div class="container">
        <div class="row">
            <!-- BEGIN COPYRIGHT -->
            <div class="col-md-6 col-sm-6 padding-top-10">
                2017 © BlackSheep MobileStore. Sva prava zadržana.
            </div>
            <!-- END COPYRIGHT -->
            <!-- BEGIN PAYMENTS -->
            <!--<div class="col-md-4 col-sm-4">
               <ul class="list-unstyled list-inline pull-right">
                 <li><img src="assets/corporate/img/payments/western-union.jpg" alt="We accept Western Union" title="We accept Western Union"></li>
                 <li><img src="assets/corporate/img/payments/american-express.jpg" alt="We accept American Express" title="We accept American Express"></li>
                 <li><img src="assets/corporate/img/payments/MasterCard.jpg" alt="We accept MasterCard" title="We accept MasterCard"></li>
                 <li><img src="assets/corporate/img/payments/PayPal.jpg" alt="We accept PayPal" title="We accept PayPal"></li>
                 <li><img src="assets/corporate/img/payments/visa.jpg" alt="We accept Visa" title="We accept Visa"></li>
               </ul>
               </div> -->
            <!-- END PAYMENTS -->
            <!-- BEGIN POWERED -->
            <div class="col-md-6 col-sm-6 text-right">
                <p class="powered">Powered by: ML</a></p>
            </div>
            <!-- END POWERED -->
        </div>
    </div>
</div>
<!-- END FOOTER -->
<!-- BEGIN fast view of a product -->
<div id="product-pop-up" style="display: none; width: 700px;">
    <div class="product-page product-pop-up">
        <div class="row">
    <?php
        $data = [
            'details' => [
                [
                    'productDetailImgPath' => 'assets/pages/img/products/model3.jpg',
                    'productDetailImgAlt' => 'proizvod test',
                    'productDetailName' => 'naziv',
                    'productDetailNewPrice' => '399',
                    'productDetailOldPrice' => '990',
                    'productDetailDescription' => 'Iha sine moj ide opis odje',
                    'flag'=>'sale'

                ]
            ]
        ];
        ?>
            @component('layouts.components.product_details',$data)@endcomponent
        </div>
    </div>
</div>
<!-- END fast view of a product -->
<!-- Load javascripts at bottom, this will reduce page load time -->
<!-- BEGIN CORE PLUGINS (REQUIRED FOR ALL PAGES) -->
<!--[if lt IE 9]>
<script src="assets/plugins/respond.min.js"></script>
<![endif]-->
<script src="assets/plugins/jquery.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/corporate/scripts/back-to-top.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL JAVASCRIPTS (REQUIRED ONLY FOR CURRENT PAGE) -->
<script src="assets/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script><!-- pop up -->
<script src="assets/plugins/owl.carousel/owl.carousel.min.js" type="text/javascript"></script><!-- slider for products -->
<script src='assets/plugins/zoom/jquery.zoom.min.js' type="text/javascript"></script><!-- product zoom -->
<script src="assets/plugins/bootstrap-touchspin/bootstrap.touchspin.js" type="text/javascript"></script><!-- Quantity -->
<script src="assets/corporate/scripts/layout.js" type="text/javascript"></script>
<script src="assets/pages/scripts/bs-carousel.js" type="text/javascript"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        Layout.init();
        Layout.initOWL();
        Layout.initImageZoom();
        Layout.initTouchspin();
        Layout.initTwitter();
    });
</script>
<!-- END PAGE LEVEL JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>

