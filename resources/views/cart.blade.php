@extends("layoout")

@section("Sadrzaj stranice")

    @foreach($products as $product)
        <p>{{$product->name}}</p>

    @endforeach
@endsection
