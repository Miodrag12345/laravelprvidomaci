
@extends ("layoout")
@section("Sadrzaj stranice")
    <form method="POST"  action="admin/save-product">
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
                <a href="/admin/delete-product/{{$product->id}}" class="btn btn-danger">Obrisi</>
                <a class="btn btn-primary">Edituj</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
