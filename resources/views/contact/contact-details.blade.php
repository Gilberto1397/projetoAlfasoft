@extends('components.base')

@section('title', 'Contact Details')

@section('content')
    <fieldset>
        <legend>Contact {{$contact->id}}</legend>
        <p>Name: {{$contact->name}}</p>
        <p>Contact: {{$contact->contact}}</p>
        <p>Email: {{$contact->email}}</p>

        <br>
        <br>

        <a href="{{route('contact.return-form', [$contact->id])}}">Update contact</a>
        <br>
        <br>
        <a href="{{route('contact.getall')}}">Go back</a>
    </fieldset>
@endsection()
