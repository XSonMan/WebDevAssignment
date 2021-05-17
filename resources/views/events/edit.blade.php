@extends('base')
@section('main')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">Update an Event</h1>

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
            <form method="post" action="{{ route('events.update', $event->id) }}">
                @method('PATCH')
                @csrf
                <div class="form-group">

                    <label for="event_name">Event Name:</label>
                    <input type="text" class="form-control" name="event_name" value={{ $event->event_name }} />
                </div>

                <div class="form-group">
                    <label for="event_location">Event Location:</label>
                    <input type="text" class="form-control" name="event_location" value={{ $event->event_location }} />
                </div>

                <div class="form-group">
                    <label for="event_description">Event Description:</label>
                    <input type="text" class="form-control" name="event_description" value={{ $event->event_description }} />
                </div>

                <div class="form-group">
                    <label for="event_image">Image:</label>
                    <input type="text" class="form-control" name="event_image" value={{ $event->event_image }} />
                </div>

                <div class="form-group">
                    <label for="event_date">Event Date:</label>
                    <input type="date" class="form-control"  name="event_date" value={{ $event->event_date }} />
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
