@extends('base')
@section('main')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">Event Details</h1>

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
            <div>
                <a style="margin: 19px;" href="{{ route('events.index')}}" class="btn btn-primary">Home</a>
            </div>
            <div class="form-group">

                <label for="event_name">Event Name: </label>
                <div>
                    {{ $event->event_name }}
                </div>
            </div>

            <div class="form-group">
                <label for="event_location">Event Location:</label>
                <div>
                    {{ $event->event_location }}
                </div>
            </div>

            <div class="form-group">
                <label for="event_description">Event Description:</label>
                <div>
                    {{ $event->event_description }}
                </div>
            </div>

            <div class="form-group">
                <label for="event_image">Image:</label>
                <div>
                    <img height="200" width="200" src="{{ asset("/storage/$event->event_image") }}"/>
                </div>
            </div>

            <div class="form-group">
                <label for="event_date">Event Date:</label>
                <div>
                    {{ $event->event_date }}
                </div>
            </div>
            <div class="form-group">
                <label for="event_date">Participants : </label>
                @foreach($participants as $participant)
                    <div>
                        {{ $participant->email }}
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
