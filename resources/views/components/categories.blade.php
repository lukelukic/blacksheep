<ul class="list-group margin-bottom-25 sidebar-menu">
  @foreach($details as $category)
  <li class="list-group-item clearfix dropdown">
    <a href="shop-product-list.html">
      <i class="fa fa-angle-right"></i>
      {{$category['name']}}
    </a>
  </li>
  @endforeach
</ul>
