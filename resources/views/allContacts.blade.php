@foreach($allContacts as $contact )
    {{$contact->email}}

@endforeach

@extends ("layoout")
@section("Sadrzaj stranice")



    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Email</th>
            <th scope="col">Subject</th>
            <th scope="col">Message</th>
            <th>Actions</th>

        </tr>
        </thead>
        <tbody>
        @foreach($allContacts as $contact)
            <tr>
                <td>{{$contact->id}}</td>
                <td>{{$contact->email}}</td>
                <td>{{$contact->subject}}</td>
                <td>{{$contact->message}}</td>
                <td>
                    <a href="/admin/delete-contact/{{$contact->id}}" class="btn btn-danger">Obrisi</a>
                    <a class="btn btn-primary">Edituj</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
