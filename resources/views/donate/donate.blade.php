@extends('base')

@section('main')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">Donate to an event</h1>
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
                <a style="margin: 19px;" href="{{ route('donate.index')}}" class="btn btn-primary">Home</a>
                <form role="form" enctype="multipart/form-data" id="donateform" method="post" action="{{ route('donate.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="event_name">Your Name:</label>
                        <div>
                            {{ Auth::user()->name }}
                            <input type="hidden" class="form-control" name="user_id" value="{{ Auth::user()->id }}"/>
                            <input type="hidden" class="form-control" name="name" value="{{ Auth::user()->name }}"/>
                            <input type="hidden" class="form-control" name="email" value="{{ Auth::user()->email }}"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="event_location">Amount to Donate (RM):</label>
                        <input type="number" class="form-control" name="amount"/>
                    </div>

                    <div class="form-group">
                        <label for="event_description">Proof of payment:</label>
                        <input type="file" class="form-control-file" {{ (!empty($events->event_image)) ? "disabled" : ''}} name="proof" id="proof" aria-describedby="fileHelp">
                    </div>

                    <div class="form-group">
                        <label for="event_image">Donate To:</label>
                        <select id="event_id" name="event_id" form="donateform">
                            @foreach($donates as $donate)
                                <option value={{$donate->id}}>{{$donate->event_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary-outline">Send Donation</button>
                </form>
            </div>
        </div>
    </div>
@endsection
