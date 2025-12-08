@extends('components.base')

@section('title', 'List of contacts')

@section('content')

    <span>{{$message ?? null}}</span>

    <h1>Contacts List</h1>

    @if(empty($contacts))
        <h1>You don't have any contacts yet.</h1>
        <a href="{{route('contact.return-form')}}">Would you like to add one?</a>
    @endif

    @foreach($contacts as $contact)
        <fieldset>
            <legend>Contact {{$contact->id}}</legend>
            <a href="{{route('contact.details', [$contact->id])}}">Name: {{$contact->name}}</a>
        </fieldset>
    @endforeach

@endsection()
