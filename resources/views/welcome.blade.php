@extends ("layoout")
@section("naslovStranice")
    Ovo je glavna strana
@endsection
@section("Sadrzaj stranice")
    <p>Trenutno vreme je:{{date("h:i:s")}}</p>
@endsection
