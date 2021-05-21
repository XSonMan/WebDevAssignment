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

            <h3 style="font-family:'Britannic Bold';text-align: center;" class="display-3">Event List</h3>
            <div>
                <a style="margin: 4px 2px;padding: 10px 20px;background-color: #1b1e21;border:darkred" href="{{ route('home')}}" class="btn btn-primary">Home</a>
            </div>

            <p>

            </p>
            <p>

            </p>

            <table class="table table-striped">
                <thead>
                <tr>
                    <td ></td>
                    <td style="font-family: 'Arial Black'">Event Name</td>
                    <td style="font-family: 'Arial Black'">Event Location</td>
                    <td style="font-family: 'Arial Black'">Event Description</td>
                    <td style="font-family: 'Arial Black'">Image</td>
                    <td style="font-family: 'Arial Black'">Event Date</td>
                </tr>
                </thead>
                <tbody>
                @foreach($events as $event)
                    <tr>
                        <td>
                        <!--<a href="{{ route('list.show', $event->id)}}" class="btn btn-primary">View Event</a>-->
                            <form method="post" action="{{ route('list.store', $event->id) }}">
                                @csrf
                                <input type="hidden" class="form-control" name="user_id" value={{ Auth::user()->id }} />
                                <input type="hidden" class="form-control" name="name" value={{ Auth::user()->name }} />
                                <input type="hidden" class="form-control" name="email" value={{ Auth::user()->email }} />
                                <input type="hidden" class="form-control" name="event_id" value={{ $event->id }} />
                                <button style="margin: 4px 2px;padding: 10px 20px;background-color: #1b1e21;border:darkred" class="btn btn-primary" >Participate</button>
                            </form>
                        </td>
                        <td>{{$event->event_name}}</td>
                        <td>{{$event->event_location}}</td>
                        <td>{{$event->event_description}}</td>
                        <td><img height="200" width="200" src="{{ asset("/storage/$event->event_image") }}"/></td>
                        <td>{{$event->event_date}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div>
            </div>
            <div style="text-align: center;">
                <p>

                <h6>© 2021 Canadian Olympic Committee. All Rights Reserved.</h6>
                </p>
            </div>
@endsection
