@extends('layouts.app')
@section('content')
    <div class="main">
        <div class="container">
        @component('components.sidebar', $data)@endcomponent
        <!-- <input type="submit" value="Submit"> -->
            <!-- BEGIN CONTENT -->
            <div class="col-md-9 col-sm-7">
                <div class="row list-view-sorting clearfix">
                    <div class="col-md-2 col-sm-2 list-view">
                        <a href="javascript:;"><i class="fa fa-th-large"></i></a>
                        <a href="javascript:;"><i class="fa fa-th-list"></i></a>
                    </div>
                    <div class="col-md-10 col-sm-10" id="position">
                        @component('components.show_and_sort')@endcomponent
                        @component('components.search_category')@endcomponent
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <ul class="pagination pull-right" class="pagination">
                            <li class="paginationStart"><a onclick="showPage(1)"  href="#position">&laquo;</a></li>
                        </ul>
                    </div>
                </div>
                    <div id="products" class="row">
                        @foreach($data['products'] as $product)
                                @component('components.product', ["product" => $product, "col" => "col-md-3"])@endcomponent
                        @endforeach
                    </div>
                </div>
            @component('components.pagination', $data)@endcomponent
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <ul class="pagination pull-right" class="pagination">
                        <li class="paginationStart"><a onclick="showPage(1)"  href="#position">&laquo;</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
