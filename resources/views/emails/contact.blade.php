@foreach($data as $key=>$value)
<strong>{{Str::of($key)->replace("_"," ")->title()}}:</strong> {{$value}} <br>
@endforeach