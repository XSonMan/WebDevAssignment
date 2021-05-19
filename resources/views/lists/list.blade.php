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
                            <!--<a href="{{ route('list.show', $event->id)}}" class="btn btn-primary">View Event</a>-->
                                <form method="post" action="{{ route('list.store', $event->id) }}">
                                    @csrf
                                    <input type="hidden" class="form-control" name="user_id" value={{ Auth::user()->id }} />
                                    <input type="hidden" class="form-control" name="name" value={{ Auth::user()->name }} />
                                    <input type="hidden" class="form-control" name="email" value={{ Auth::user()->email }} />
                                    <input type="hidden" class="form-control" name="event_id" value={{ $event->id }} />
                                    <button class="btn btn-primary" >Participate</button>
                                </form>
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
