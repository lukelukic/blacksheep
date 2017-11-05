@extends('layouts.app')
@section('content')


<div class="main">
    <div class="container">
        <!-- BEGIN SIDEBAR -->
        @component('components.sidebar')@endcomponent

<!-- <input type="submit" value="Submit"> -->


        <!-- BEGIN CONTENT -->
        <div class="col-md-9 col-sm-7">
            <div class="row list-view-sorting clearfix">
                <div class="col-md-2 col-sm-2 list-view">
                    <a href="javascript:;"><i class="fa fa-th-large"></i></a>
                    <a href="javascript:;"><i class="fa fa-th-list"></i></a>
                </div>
                <div class="col-md-10 col-sm-10">
                @component('components.show_and_sort', $data)@endcomponent
                @component('components.search_category')@endcomponent
              </div>
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
