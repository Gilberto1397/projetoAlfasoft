@extends('components.base')

@section('title', 'List of contacts')

@section('content')
    <section style="display: flex; flex-direction: column; align-items: center; justify-content: center; width: 50%">
        <span>{{$message ?? null}}</span>

        <h1>Contacts List</h1>

        @if(empty($contacts))
            <h1>You don't have any contacts yet.</h1>
            <a style="text-decoration: none; font-size: 16px; background-color: #5858e7; color: white; padding: 17px; border-radius: 16px;"
               href="{{route('contact.return-form')}}">Would you like to add one?</a>
        @else
            <a style="text-decoration: none; background-color: #5858e7; color: white; padding: 17px; border-radius: 16px;"
               href="{{route('contact.return-form')}}">New Contact +</a>
        @endif

        <br>
        <br>

        @foreach($contacts as $contact)
            <fieldset style="width: 50%; display: flex; flex-direction: column; align-items: center; row-gap: 10px; margin-bottom: 20px;">
                <legend>Contact {{$contact->id}}</legend>
                <span style="margin-bottom: 10px;">Name: <a href="{{route('contact.details', [$contact->id])}}">{{$contact->name}}</a></span>

                <div style="width: 100%; display: flex; column-gap: 30px; justify-content: center; align-items: center;">
                    <a style="text-decoration: none; font-size: 16px; background-color: #5858e7; color: white; padding: 17px; border-radius: 16px;" href="{{route('contact.return-form', [$contact->id])}}">Update contact &#9998;</a>
                    <form method="post" action="{{route('contact.delete', [$contact->id])}}">
                        @csrf
                        @method('DELETE')
                        <input style="text-decoration: none; font-size: 16px; background-color: #e71313; color: white; padding: 17px; border-radius: 16px;" type="submit" value="Delete contact &#128465;">
                    </form>
                </div>
            </fieldset>
        @endforeach
    </section>
@endsection()
