@extends('base')

@section('main')
    <div class="row">
        <div class="col-sm-12">
            <div class="col-sm-12">

                @if(session()->get('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
            </div>

            <h1 class="display-3">Events</h1>
            <div>
                <a style="margin: 19px;" href="{{ route('events.create')}}" class="btn btn-primary">Create Event</a>
            </div>

            <table class="table table-striped">
                <thead>
                <tr>
                    <td>Event Name</td>
                    <td>Event Description</td>
                    <td>Participants</td>
                    <td colspan = 2>Actions</td>
                </tr>
                </thead>
                <tbody>
                @foreach($events as $event)
                    <tr>
                        <td>{{$event->event_name}}</td>
                        <td>{{$event->event_description}}</td>
                        <td>{{$event->participants}}</td>
                        <td>
                            <a href="{{ route('events.edit',$event->id)}}" class="btn btn-primary">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('events.destroy', $event->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" onclick="return confirm('Confirm Delete Event?')" type="submit">Cancel Event</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div>
            </div>
@endsection