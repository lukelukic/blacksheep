  @foreach($details as $type)
  <input type="checkbox" name="{{strtolower(trim($type['name'],' '))}}" value="{{$type['name']}}">{{$type['name']}}<br>
  @endforeach
