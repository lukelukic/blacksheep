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
                    @component('components.product', $data)@endcomponent
            </div>
        </div>
        <!-- END SIMILAR PRODUCTS -->
    </div>
</div>
    @endsection