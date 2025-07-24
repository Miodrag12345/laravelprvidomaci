@extends ("layoout")
@section("naslovStranice")

Ovo je stranica za dodavanje


@endsection

@section("Sadrzaj stranice")
    <form  method="POST" action="/admin/add-product">
        @if($errors->any())
            <p>Greska :{{$errors->first()}}</p>
        @endif
        {{csrf_field()}}
        <input name="name" type="text"  placeholder="Unesite ime proizvoda">
        <textarea  name="description"></textarea>
        <input name="amount" type="number" placeholder="Upisi kolicinu">
        <input name="price" type="number"  placeholder="Upisi cenu proizvoda">
        <input name="image"  type="file" >
        <button>Dodaj proizvod</button>

    </form>
@endsection

