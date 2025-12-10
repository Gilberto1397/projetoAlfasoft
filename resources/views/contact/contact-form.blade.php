@extends('components.base')

@if(empty($contact->id))
    @section('title', 'Save contact')
@else
    @section('title', 'Update contact')
@endif

@section('content')
<section style="display: flex; flex-direction: column; align-items: center; justify-content: center; width: 50%">
    <h1 style="font-weight: bold; color: blue; text-transform: uppercase;">{{$message ?? null}}</h1>

    <fieldset style="width: 100%; display: flex; flex-direction: column; align-items: center;">
        @if(empty($contact->id))
            <legend>Create a new contact</legend>
            <span>{{ $errors->has('contactId') ? $errors->first('contactId') : '' }}</span>
            <form action="{{route('contact.create')}}" method="POST" style="width: 100%; display: flex; flex-direction: column; align-items: center; row-gap: 8px">
                @else
                    <legend>Update a contact</legend>
                    <form action="{{route('contact.create')}}" method="POST" style="width: 100%; display: flex; flex-direction: column; align-items: center; row-gap: 8px">
                        @method('PUT')
                        <input style="width: 60%" type="hidden" name="contactId" value="{{$contact->id}}">
                        @endif

                        <span style="font-weight: bold; color: red; text-transform: uppercase;">{{ $errors->has('contactId') ? $errors->first('contactId') : '' }}</span>

                        @csrf
                        <label for="name">Name:</label>
                        <input style="width: 60%" type="text" id="name" name="name" value="{{$contact->name ?? old('name')}}" required>
                        <span style="font-weight: bold; color: red; text-transform: uppercase;">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>

                        <label for="contact">Contact Number:</label>
                        <input style="width: 60%" type="text" id="contact" name="contact" value="{{$contact->contact ?? old('contact')}}" required>
                        <span style="font-weight: bold; color: red; text-transform: uppercase;">{{ $errors->has('contact') ? $errors->first('contact') : '' }}</span>

                        <label for="email">Email:</label>
                        <input style="width: 60%" type="email" id="email" name="email" value="{{$contact->email ?? old('email')}}" required>
                        <span style="font-weight: bold; color: red; text-transform: uppercase;">{{ $errors->has('email') ? $errors->first('email') : '' }}</span>

                        <div style="width: 40%;display: flex;justify-content: center;column-gap: 15px;">
                            <button style="text-decoration: none; font-size: 16px; background-color: #5858e7; color: white; padding: 17px; border-radius: 16px;"
                                    type="submit">{{empty($contact->id) ? 'Save Contact' : 'Update Contact'}}</button>

                            <a style="text-decoration: none; font-size: 16px; background-color: #e71313; color: white; padding: 17px; border-radius: 16px;"
                               href="{{route('contact.getall')}}"><-- Go back</a>
                        </div>
                    </form>
    </fieldset>
</section>
@endsection()
