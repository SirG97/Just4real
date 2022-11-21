@extends('layout.home')
@section('content')
    <div class="slider-area">
        <div class="zigzag-bottom"></div>
        <div id="slide-list" class="carousel carousel-fade slide" data-ride="carousel">

            <div class="slide-bulletz">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <ol class="carousel-indicators slide-indicators">
                                <li data-target="#slide-list" data-slide-to="0" class="active"></li>
                                <li data-target="#slide-list" data-slide-to="1"></li>
                                <li data-target="#slide-list" data-slide-to="2"></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <div class="single-slide">
                        <div class="slide-bg slide-one"></div>
                        <div class="slide-text-wrapper">
                            <div class="slide-text">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6 col-md-offset-6">
                                            <div class="slide-content">
                                                <h2>We are Reliable</h2>
                                                <p>Just4real International Limited imports all types of gym equipments,
                                                    sports equipments, vehicle engines & spare parts and wines from USA, Europe and China!</p>
                                                <p>We are 100% reliable, tested and trusted.</p>
                                                <a href="/contact" class="readmore">Learn more</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div> <!-- End slider area -->

    <div class="promo-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo">
                        <i class="fa fa-dumbell"></i>
                        <p>Gym Equipment</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo">
                        <i class="fa fa-ball"></i>
                        <p>Sports Equipments</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo">
                        <i class="fa fa-ball"></i>
                        <p>Car Engine Parts</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo">
                        <i class="fa fa-ball"></i>
                        <p>Wines</p>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End promo area -->

    <div class="maincontent-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="latest-product">
                        <h2 class="section-title">Latest Gym Equipments</h2>
                        <div class="product-carousel">

                            <div class="single-product">
                                <div class="product-f-image">
                                    <img src="img/benchweight.jpg" alt="">

                                </div>

                                <h2><a href="#">Benchweights</a></h2>

                            </div>
                            <div class="single-product">
                                <div class="product-f-image">
                                    <img src="img/benchweight2.jpg" alt="">

                                </div>

                                <h2><a href="#">Benchweight</a></h2>


                            </div>
                            <div class="single-product">
                                <div class="product-f-image">
                                    <img src="img/dumbell.jpg" alt="">

                                </div>

                                <h2><a href="#">Dumbells</a></h2>

                            </div>
                            <div class="single-product">
                                <div class="product-f-image">
                                    <img src="img/Sit-Up-Benches.jpg" alt="">

                                </div>

                                <h2><a href="#">Sit-up Benchs</a></h2>

                            </div>
                            <div class="single-product">
                                <div class="product-f-image">
                                    <img src="img/Multipurposebench.jpg" alt="">

                                </div>

                                <h2><a href="#">Multipurpose Benchpress</a></h2>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="latest-product">
                        <h2 class="section-title">Latest Sports Equipments</h2>
                        <div class="product-carousel">
                            <div class="single-product">
                                <div class="product-f-image">
                                    <img src="img/tabletennis.jpg" alt="">

                                </div>

                                <h2><a href="#">Table Tennis board</a></h2>


                            </div>
                            <div class="single-product">
                                <div class="product-f-image">
                                    <img src="img/jersey.jpg" alt="">

                                </div>

                                <h2><a href="#">Customized jersey</a></h2>


                            </div>
                            <div class="single-product">
                                <div class="product-f-image">
                                    <img src="img/goalkeeper.jpg" alt="">

                                </div>

                                <h2><a href="#">Goalkeeping gloves</a></h2>

                            </div>
                            <div class="single-product">
                                <div class="product-f-image">
                                    <img src="img/footballboots.jpg" alt="">

                                </div>

                                <h2><a href="#">Football boots</a></h2>


                            </div>

                            <div class="single-product">
                                <div class="product-f-image">
                                    <img src="img/shinguard.webp" alt="">

                                </div>

                                <h2><a href="#">Shin guards</a></h2>


                            </div>
                            <div class="single-product">
                                <div class="product-f-image">
                                    <img src="img/soccer.jpg" alt="">

                                </div>

                                <h2><a href="#">Soccer boots</a></h2>


                            </div>
                            <div class="single-product">
                                <div class="product-f-image">
                                    <img src="img/socks.jpg" alt="">

                                </div>

                                <h2><a href="#">Soccer socks</a></h2>

                            </div>

                        </div>
                    </div>
                    <div class="text-center ">
                        <a href="#" class="view-details-link btn btn-primary text-center btn-large">See more</a>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="latest-product">
                        <h2 class="section-title">Engine spare parts</h2>
                        <div class="product-carousel">
                            <div class="single-product">
                                <div class="product-f-image">
                                    <img src="img/spareparts/toyota-motor.jpg" alt="">

                                </div>

                                <h2><a href="#">Vehicle Engines</a></h2>


                            </div>
                            <div class="single-product">
                                <div class="product-f-image">
                                    <img src="img/spareparts/bumper.webp" alt="">

                                </div>

                                <h2><a href="#">Car Bumper</a></h2>

                            </div>
                            <div class="single-product">
                                <div class="product-f-image">
                                    <img src="img/spareparts/radiator.jpg" alt="">

                                </div>

                                <h2><a href="#">Vehicle radiator</a></h2>


                            </div>
                            <div class="single-product">
                                <div class="product-f-image">
                                    <img src="img/spareparts/shockabsorbers.jpg" alt="">

                                </div>

                                <h2><a href="#">Shock Absorber</a></h2>

                            </div>
                            <div class="single-product">
                                <div class="product-f-image">
                                    <img src="img/spareparts/steeringrack.jpg" alt="">

                                </div>

                                <h2><a href="#">Steering rack</a></h2>

                            </div>
                            <div class="single-product">
                                <div class="product-f-image">
                                    <img src="img/spareparts/H9ae2168363b74ba0bc7e43e776929669h.jpg" alt="">

                                </div>

                                <h2><a href="#">Rear light</a></h2>

                            </div>

                            <div class="single-product">
                                <div class="product-f-image">
                                    <img src="img/battery.jpg" alt="">

                                </div>

                                <h2><a href="#">Car battery</a></h2>

                            </div>

                            <div class="single-product">
                                <div class="product-f-image">
                                    <img src="img/tyres.jpg" alt="">

                                </div>

                                <h2><a href="#">Car Tyre</a></h2>


                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="latest-product">
                        <h2 class="section-title">Wines</h2>
                        <div class="product-carousel">
                            <div class="single-product">
                                <div class="product-f-image">
                                    <img src="img/boxwine.jpg" alt="">

                                </div>

                                <h2><a href="#">Box wine</a></h2>
                            </div>
                            <div class="single-product">
                                <div class="product-f-image">
                                    <img src="img/downloadrose.jpg" alt="">

                                </div>

                                <h2><a href="#">Rose Wine</a></h2>
                                <!-- <div class="product-carousel-price">
                                    <ins>$899.00</ins> <del>$999.00</del>
                                </div>  -->
                            </div>
                            <div class="single-product">
                                <div class="product-f-image">
                                    <img src="img/redwine.webp" alt="">

                                </div>

                                <h2><a href="#">Redwine</a></h2>


                            </div>
                            <div class="single-product">
                                <div class="product-f-image">
                                    <img src="img/white-wine.jpg" alt="">

                                </div>

                                <h2><a href="">White wine</a></h2>

                            </div>

                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End main content area -->
@endsection
