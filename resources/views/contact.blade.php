@extends ("layoout")
@section("Sadrzaj stranice")
    <form>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control"  aria-describedby="emailHelp">

        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Subject</label>
            <input type="text"  email="subject "class="form-control" >
        </div>
        <div class="mb-3 ">
            <input type="checkbox" name="message" class="form-check-input" >
            <label class="form-check-label" for="exampleCheck1">Poruka</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5663.140722996704!2d20.458970348407753!3d44.78956368428348!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475a706caa02b55f%3A0x5ca197ebb70c0041!2z0JDRg9GC0L7QutC-0LzQsNC90LTQsCwg0JHQtdC-0LPRgNCw0LQ!5e0!3m2!1ssr!2srs!4v1752534364132!5m2!1ssr!2srs" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
@endsection

