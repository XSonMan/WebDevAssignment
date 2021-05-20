@extends('base')

@section('main')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">Create an Event</h1>
            <div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br />
                @endif
                <a style="margin: 19px;" href="{{ route('events.index')}}" class="btn btn-primary">Home</a>
                <form role="form" method="post" action="{{ route('events.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="event_name">Event Name:</label>
                        <input type="text" class="form-control" name="event_name"/>
                    </div>

                    <div class="form-group">
                        <label for="event_location">Event Location:</label>
                        <input type="text" class="form-control" name="event_location"/>
                    </div>

                    <div class="form-group">
                        <label for="event_description">Event Description:</label>
                        <input type="text" class="form-control" name="event_description"/>
                    </div>

                    <div class="form-group">
                        <label for="event_image">Event Image(not done):</label>
                        <!--<input type="text" class="form-control" name="event_image"/>-->
                        <input type="file" class="form-control-file" {{ (!empty($events->event_image)) ? "disabled" : ''}} name="event_image" id="event_image" aria-describedby="fileHelp">
                    </div>

                    <div class="form-group">
                        <label for="event_date">Event Date(not done):</label>
                        <input type="date" class="form-control"  name="event_date"/>
                    </div>
                    <button type="submit" class="btn btn-primary-outline">Add Event</button>
                </form>
            </div>
        </div>
    </div>
@endsection
