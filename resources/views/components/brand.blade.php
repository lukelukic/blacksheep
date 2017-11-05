@foreach($details as $brand)
<input type="checkbox" name="{{strtolower(trim($brand['name'],' '))}}" value="{{$brand['name']}}">{{$brand['name']}}<br>
@endforeach
