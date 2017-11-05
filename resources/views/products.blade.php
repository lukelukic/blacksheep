@extends('layouts.app')
@section('content')


<div class="main">
    <div class="container">
        <!-- BEGIN SIDEBAR -->
        <div class="sidebar col-md-3 col-sm-4">
          <?php
          $data2 = [
            'details' =>
              [
                [
                  'name' => 'Maske'
                ],
                [
                  'name' => 'Punjaci'
                ]
              ]
          ]
           ?>
           @component('components.categories',$data2)@endcomponent
          Tip
          <?php
          $data3 = [
            'details' => [
              [
                'name' => 'Juliette'
              ],
              [
                'name' => 'Pierre Cardin'
              ]
            ]
          ];
          $data4 = [
            'details' => [
              [
                'name' => 'LG'
              ],
              [
                'name' => 'Samsung'
              ]
            ]
          ]
          ?>
          Tip
          <div class='filterBox'>
          @component('components.type',$data3)@endcomponent
        </div>
        Brend
        <div class='filterBox'>
          @component('components.brand',$data4)@endcomponent
        </div>
<!-- <input type="submit" value="Submit"> -->
        </div>

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
                @component('components.search_category', $data2)@endcomponent
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
