@extends('components.base')

@section('title', 'Contact Details')

@section('content')
    <section style="display: flex; flex-direction: column; align-items: center; justify-content: center; width: 50%">
        <fieldset style="width: 100%; display: flex; flex-direction: column; align-items: center;">
            <legend>Contact {{$contact->id}}</legend>
            <p>Name: {{$contact->name}}</p>
            <p>Contact: {{$contact->contact}}</p>
            <p>Email: {{$contact->email}}</p>

            <div style="width: 40%;display: flex;justify-content: center;column-gap: 15px;">
                <button style="text-decoration: none; font-size: 16px; background-color: #5858e7; color: white; padding: 17px; border-radius: 16px;"
                        type="submit">{{empty($contact->id) ? 'Save Contact' : 'Update Contact'}}</button>

                <a style="text-decoration: none; font-size: 16px; background-color: #e71313; color: white; padding: 17px; border-radius: 16px;"
                   href="{{route('contact.getall')}}"><-- Go back</a>
            </div>
        </fieldset>
    </section>
@endsection()
