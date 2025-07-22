@extends("layoout")
@section("Sadrzaj stranice")
 <form method="POST"  action="{{route("Snimanjeoglasa")}}">
     {{csrf_field()}}
     <div>
         <label>Name</label>
         <input type="text" name="name" placeholder="Unesite ime proizvoda">
     </div>
     <div>
         <label>Description</label>
         <input type="text" name="description" placeholder="Unesite opis proizvoda">
     </div>
     <div>
         <label>Amount</label>
         <input type="text" name="amount" placeholder="Unesite kolicinu proizvoda">

     </div>
     <div>
         <label>Price</label>
         <input type="text" name="price" placeholder="Unesite cenu proizvoda">
     </div>
     <div>
         <label>Image </label>
         <input type="text" name="image " placeholder="Unesite sliku">
     </div>
     <button>Kreiraj proizvod </button>
 </form>

@endsection

