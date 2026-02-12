@extends("layoout")

@section("Sadrzaj stranice")

    @foreach($products as $product)

        @foreach($cart as $item )
            @if($item ['product_id'] == $product->id )
                <p>{{$product->name}}</p>
                <p>{{$item['amount']}}</p>
                <p>{{$product->price}}</p>
                <p>{{$item['amount']*$product->price}}</p>
            @endif
        @endforeach


    @endforeach
@endsection
