@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="col-sm-12">

                @if(session()->get('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
            </div>

            <h3 style="font-family:'Britannic Bold';text-align: center;" class="display-3">Events</h3>
            <div class="crt-butdiv" >
                <a class="crt-but" href="{{ route('events.create')}}" class="btn btn-primary">Create Event</a>
            </div>
            <p>

            </p>
            <p>

            </p>
            <table class="table table-striped">
                <thead class="thead-light">
                <tr>
                    <td style="font-family: 'Arial Black'">Event Name</td>
                    <td style="font-family: 'Arial Black'">Event Location</td>
                    <td style="font-family: 'Arial Black'">Event Description</td>
                    <td style="font-family: 'Arial Black'">Image</td>
                    <td style="font-family: 'Arial Black'" colspan = 2>Event Date</td>
                    <td style="font-family: 'Arial Black'" colspan = 2>Actions</td>
                </tr>
                </thead>
                <tbody>
                @foreach($events as $event)
                    <tr>
                        <td>{{$event->event_name}}</td>
                        <td>{{$event->event_location}}</td>
                        <td>{{$event->event_description}}</td>
                    <!--<td>{{$event->event_image}}</td>-->
                        <td><img height="200" width="200" src="{{ asset("/storage/$event->event_image") }}"/></td>
                    <!--<td><img height="200" width="200" src=" {{ asset('/storage/'.$event->event_image) }}"/></td>-->
                        <td>{{$event->event_date}}</td>
                        <td>
                            <a href="{{ route('events.edit',$event->id)}}" class="btn btn-primary">Edit</a>
                        </td>
                        <td>
                            <a style="margin: 4px 2px;padding: 10px 20px;background-color: #1b1e21;border:darkred" href="{{ route('list.show', $event->id)}}" class="btn btn-primary">View Participants</a>
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
            <div>
                <div style="text-align: center;">
                    <p>

                    <h6>© 2021 Canadian Olympic Committee. All Rights Reserved.</h6>
                    </p>
                </div>
            </div>
@endsection
