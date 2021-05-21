@extends('layouts.app')


@section('content')
    <div class="row" style="text-align:center;">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3" style="font-family:cursive;padding-bottom:25px;">Event Details</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <br />
            @endif
            <div class="form-group">

                <label for="event_name" class="eh1">Event Name: </label>
                <div class="et1">
                    {{ $event->event_name }}
                </div>
            </div>

            <div class="form-group">
                <label for="event_location" class="eh1">Event Location:</label>
                <div class="et1">
                    {{ $event->event_location }}
                </div>
            </div>

            <div class="form-group">
                <label for="event_description" class="eh1">Event Description:</label>
                <div class="et1">
                    {{ $event->event_description }}
                </div>
            </div>

            <div class="form-group">
                <label for="event_image" class="eh1">Image:</label>
                <div>
                    <img height="200" width="200" src="{{ asset("/storage/$event->event_image") }}"/>
                </div>
            </div>

            <div class="form-group">
                <label for="event_date" class="eh1">Event Date:</label>
                <div class="et1">
                    {{ $event->event_date }}
                </div>
            </div>
            <div class="form-group">
                <label for="event_date" class="eh1">Participants : </label>
                @foreach($participants as $participant)
                    <div class="et1">
                        {{ $participant->name }}
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
