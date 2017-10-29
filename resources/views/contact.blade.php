@extends('layouts.app')
@section('content')
    <div class="main">
        <div class="container">
            <!-- BEGIN SIDEBAR & CONTENT -->
            <div class="row margin-bottom-40">
                <!-- BEGIN SIDEBAR -->

                <!-- END SIDEBAR -->

                <!-- BEGIN CONTENT -->
                <div class="col-md-12 col-sm-12">
                    <h1>Kontakt</h1>
                    <div class="content-page">
                        <div id="map" class="gmaps margin-bottom-40" style="height:400px;"></div>

                        <h2>Kontakt forma</h2>
                        <p>Na raspolaganju smo Vam za svaku vrstu nedoumice. Odgovorićemo u najkraćem mogućem roku!</p>

                        <!-- BEGIN FORM-->
                        <form action="#" class="default-form" role="form">
                            <div class="form-group">
                                <label for="name">Ime</label>
                                <input type="text" class="form-control" id="name">
                            </div>
                            <div class="form-group">
                                <label for="email">Email <span class="require">*</span></label>
                                <input type="text" class="form-control" id="email">
                            </div>
                            <div class="form-group">
                                <label for="message">Poruka</label>
                                <textarea class="form-control" rows="8" id="message"></textarea>
                            </div>
                            <div class="padding-top-20">
                                <button type="submit" class="btn btn-primary">Posalji</button>
                            </div>
                        </form>
                        <!-- END FORM-->
                    </div>
                </div>
                <!-- END CONTENT -->
            </div>
            <!-- END SIDEBAR & CONTENT -->
        </div>
    </div>
    @stop