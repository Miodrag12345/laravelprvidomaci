
@extends ("layoout")
@section("Sadrzaj stranice")
    <form method="POST"  action{{route("Snimanjeoglasa")}}>
        {{csrf_field()}}


    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Price</th>
            <th>Actions</th>

        </tr>
        </thead>
        <tbody>
        @foreach($allProducts as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->description}}</td>
                <td>{{$product->price}}</td>
                <td>
                <a href="{{route('Obrisi proizvod' , ['product'=>$product->id])}}" class="btn btn-danger">Obrisi</a>
                <a href="{{route('product.single',['product'=>$product->id])}}"   class="btn btn-primary">Edituj</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
