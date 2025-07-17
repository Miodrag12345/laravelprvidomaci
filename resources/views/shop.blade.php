
@extends ("layoout")

@section("naslovStranice")
    Shop strana
@endsection
@section("Sadrzaj stranice")

@foreach($products as $Singleproduct)

<p>{{$Singleproduct->name}}</p>
<p>{{$Singleproduct->description}}</p>

@endforeach



@endsection
