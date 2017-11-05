<div class='filterBox'>
@foreach($details as $brand)
<input type="checkbox" name="{{strtolower(trim($brand['name'],' '))}}" value="{{$brand['id']}}">{{$brand['name']}}<br>
@endforeach
</div>
