@extends("layouts.app")

@section("Sadrzaj stranice")

    @foreach($cart as $product => $amount)
          {{$product." ".$amount}}
    @endforeach
@endsection
