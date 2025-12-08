@extends('components.base')

@section('title', 'Contact Details')

@section('content')
    <fieldset>
        <legend>Contact {{$contact->id}}</legend>
        <p>Name: {{$contact->name}}</p>
        <p>Contact: {{$contact->contact}}</p>
        <p>Email: {{$contact->email}}</p>
    </fieldset>
@endsection()
