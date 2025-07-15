
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


    <p>Trenutno sati je:{{$sat}}</p>
    <p>Trenutno vreme je:{{$trenutnoVreme}}</p>
@endsection
