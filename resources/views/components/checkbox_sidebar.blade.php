<div class='filterBox'>
@foreach($categories as $category)
<input type="checkbox" name="{{strtolower(trim($category['name'],' '))}}" value="{{$category['id']}}">{{$category['name']}}<br>
@endforeach
</div>
