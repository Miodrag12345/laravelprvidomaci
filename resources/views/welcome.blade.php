
@extends ("layoout")
@section("naslovStranice")
    Ovo je glavna strana
@endsection
@section("Sadrzaj stranice")
     @if($sat >=0 && $sat <= 12)
         <p>Dobro jutro </p>
     @endif

     @if($sat >=12 && $sat <= 24)
         <p>Dobar dan </p>
     @endif

     @foreach($products as $singleProduct)
     <p>{{$singleProduct->name}}</p>
     <p>{{$singleProduct->description }}</p>
     <p>{{$singleProduct->amount}}   </p>
     <p>{{$singleProduct->price}}</p>
     <p>{{$singleProduct->image}}</p>

 @endforeach



     <form method="POST" action={{route("sendContact")}} >
         @if($errors->any())
             <p>Greska :{{$errors->first()}}</p>
         @endif
         {{csrf_field()}}
             <input name="email" type="text" placeholder="Unesite email "/>
         <input name="subject" type="text" placeholder="Unesite naslov poruke"/>
         <textarea name="description" ></textarea>
         <button>Posalji poruku</button>
     </form>

     <p>Trenutno sati je:{{$sat}}</p>
     <p>Trenutno vreme je:{{$trenutnoVreme}}</p>



@endsection




