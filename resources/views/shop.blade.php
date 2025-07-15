
@extends ("layoout")
@include("navigation")
@section("naslovStranice")
    Shop strana
@endsection
@section("Sadrzaj stranice")

    @foreach($products as $singleProduct)



    @if($singleProduct == "Iphone 14" || $singleProduct == "Iphone 13 pro" )
        <p>{{$singleProduct}} -SUPER SNIZENJE </p>
    @else
        <p>{{$singleProduct}}</p>
    @endif



  @endforeach




@endsection
