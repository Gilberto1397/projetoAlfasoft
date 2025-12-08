@extends('components.base')

@section('title', 'Save contact')

@section('content')

    <h1>{{$message ?? null}}</h1>

    <fieldset>
        <legend>Create a new contact</legend>

        <form action="{{route('contact.create')}}" method="POST">
            @csrf
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{old('name')}}" required>
            <span>{{ $errors->has('name') ? $errors->first('name') : '' }}</span>

            <label for="contact">Contact Number:</label>
            <input type="text" id="contact" name="contact" value="{{old('contact')}}" required>
            <span>{{ $errors->has('contact') ? $errors->first('contact') : '' }}</span>

            <br><br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{old('email')}}" required>
            <span>{{ $errors->has('email') ? $errors->first('email') : '' }}</span>

            <br><br>
            <button type="submit">Save Contact</button>
        </form>
    </fieldset>

@endsection()
