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

            <h1 class="display-3">Event List</h1>
            <div>
                <a style="margin: 19px;" href="{{ route('home')}}" class="btn btn-primary">Home</a>
            </div>

            <table class="table table-striped">
                <thead>
                <tr>
                    <td ></td>
                    <td>Event Name</td>
                    <td>Event Location</td>
                    <td>Event Description</td>
                    <td>Image</td>
                    <td>Event Date</td>
                </tr>
                </thead>
                <tbody>
                @foreach($events as $event)
                    <tr>
                        <td>
                            <a class="btn btn-primary">View Event</a>
                        </td>
                        <td>{{$event->event_name}}</td>
                        <td>{{$event->event_location}}</td>
                        <td>{{$event->event_description}}</td>
                        <td>{{$event->event_image}}</td>
                        <td>{{$event->event_date}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div>
            </div>
@endsection
