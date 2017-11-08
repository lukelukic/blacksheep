<div class="sidebar col-md-3 col-sm-4">
   @component('components.categories', ['categories' => $categories])@endcomponent
      Brend
  @component('components.checkbox_sidebar', ['categories' => $brands])@endcomponent
      {{--Tip--}}
  {{--@component('components.checkbox_sidebar',$data)@endcomponent--}}

</div>
