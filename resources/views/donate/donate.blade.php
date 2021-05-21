@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-sm-8 offset-sm-2" style="text-align:center;">
            <h3 style="font-family:'Britannic Bold';text-align: center;" class="display-3">Donate to an event</h3>
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
                <div style="padding:10px 20px 30px 20px">
                    <a style="margin: 4px 2px;padding: 10px 20px;background-color: #1b1e21;border:darkred;"  href="{{ route('donate.index')}}" class="btn btn-primary"> Back</a>
                </div>
                <form role="form" enctype="multipart/form-data" id="donateform" method="post" action="{{ route('donate.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="event_name" class="et1">Your Name:</label>
                        <div>
                            {{ Auth::user()->name }}
                            <input type="hidden" class="form-control" name="user_id" value="{{ Auth::user()->id }}"/>
                            <input type="hidden" class="form-control" name="name" value="{{ Auth::user()->name }}"/>
                            <input type="hidden" class="form-control" name="email" value="{{ Auth::user()->email }}"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="event_location" class="et1">Amount to Donate (RM):</label>
                        <input type="number" class="form-control" name="amount"/>
                    </div>

                    <div class="form-group">
                        <label for="event_description" class="et1">Proof of payment:</label>
                        <input type="file" class="form-control-file" {{ (!empty($events->event_image)) ? "disabled" : ''}} name="proof" id="proof" aria-describedby="fileHelp">
                    </div>

                    <div class="form-group">
                        <label for="event_image" class="et1">Donate To:</label>
                    </div>

                    <div class="form-group">
                        <select id="event_id" name="event_id" form="donateform">
                            @foreach($donates as $donate)
                                <option value={{$donate->id}}>{{$donate->event_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="crt-but">Send Donation</button>
                </form>
            </div>
        </div>
    </div>
    <div style="text-align: center;">
        <p>

        <h6>© 2021 Canadian Olympic Committee. All Rights Reserved.</h6>
        </p>
    </div>
    </div>
@endsection
