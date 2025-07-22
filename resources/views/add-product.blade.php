

@extends("layoout")
@section("Sadrzaj stranice")
    <form method="POST"  action{{route("Snimanjeoglasa")}}>
        {{csrf_field()}}
        <div>
        @if($errors->any())
            @foreach($errors->all() as $error)
                  <p class="text-danger">{{$error}}</p>
            @endforeach
        @endif
        </div>
    <form>
        <div>

            <label>Name</label>
            <input type="text" name="name" placeholder="Unesite ime proizvoda" value="{{old("name")}}">
        </div>
        <div>
            <label>Description</label>
            <input type="text" name="description" placeholder="Unesite opis proizvoda" value="{{old("description")}}">
        </div>
        <div>
            <label>Amount</label>
            <input type="text" name="amount" placeholder="Unesite kolicinu proizvoda" value="{{old("amount")}}">

        </div>
        <div>
            <label>Price</label>
            <input type="text" name="price" placeholder="Unesite cenu proizvoda" value="{{old("price")}}" >
        </div>
        <div>
            <label>Image </label>
            <input type="text" name="image" placeholder="Unesite sliku" value="{{old("image")}}">
        </div>
        <button>Kreiraj proizvod </button>
    </form>

@endsection
