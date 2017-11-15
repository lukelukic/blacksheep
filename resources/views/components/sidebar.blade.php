
<div class="sidebar col-md-3 col-sm-4">
   @isset($categories)
    @component('components.categories', ['categories' => $categories])@endcomponent
   @endisset
  @isset($brands)
    Brend
    @component('components.checkbox_sidebar', ['categories' => $brands])@endcomponent
  @endisset
  @isset($types)
      Tip
    @component('components.types_sidebar', ['categories' => $types])@endcomponent
  @endisset
      {{--Tip--}}
  {{--@component('components.checkbox_sidebar',$data)@endcomponent--}}

</div>
