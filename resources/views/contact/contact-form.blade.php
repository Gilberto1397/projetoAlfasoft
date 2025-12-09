@extends('components.base')

@if(empty($contact->id))
    @section('title', 'Save contact')
@else
    @section('title', 'Update contact')
@endif

@section('content')

    <h1>{{$message ?? null}}</h1>

    <fieldset>
        @if(empty($contact->id))
            <legend>Create a new contact</legend>
            <span>{{ $errors->has('contactId') ? $errors->first('contactId') : '' }}</span>
            <form action="{{route('contact.create')}}" method="POST">
                @else
                    <legend>Update a contact</legend>
                    <form action="{{route('contact.create')}}" method="POST">
                        @method('PUT')
                        <input type="hidden" name="contactId" value="{{$contact->id}}">
                        @endif

                        <span>{{ $errors->has('contactId') ? $errors->first('contactId') : '' }}</span>

                        <br>
                        <br>

                        @csrf
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" value="{{$contact->name ?? old('name')}}" required>
                        <span>{{ $errors->has('name') ? $errors->first('name') : '' }}</span>

                        <label for="contact">Contact Number:</label>
                        <input type="text" id="contact" name="contact" value="{{$contact->contact ?? old('contact')}}" required>
                        <span>{{ $errors->has('contact') ? $errors->first('contact') : '' }}</span>

                        <br><br>
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" value="{{$contact->email ?? old('email')}}" required>
                        <span>{{ $errors->has('email') ? $errors->first('email') : '' }}</span>

                        <br><br>
                        <button type="submit">{{empty($contact->id) ? 'Save Contact' : 'Update Contact'}}</button>
                        <br>
                        <br>
                        <a href="{{route('contact.getall')}}">Go back</a>
                    </form>
    </fieldset>

@endsection()
