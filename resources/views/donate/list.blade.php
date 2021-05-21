@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">

            <h4 style="font-family:'Britannic Bold';text-align: center;" class="display-3">{{Auth::user()->name}}'s Donations</h4>
            <p>

            </p>
            <p>

            </p>
            <a style="margin: 4px 2px;padding: 10px 20px;background-color: #1b1e21;border:darkred"  href="{{ route('home')}}" class="btn btn-primary">Home</a>
            <a style="margin: 4px 2px;padding: 10px 20px;background-color: #1b1e21;border:darkred"  href="{{ route('donate.create')}}" class="btn btn-primary">New Donation</a>
            <p>

            </p>
            <p>

            </p>

            <table class="table">
                <thead class="thead-light">
                <tr>
                    <th style="font-family: 'Arial Black'" scope="col">Event Name</th>
                    <th style="font-family: 'Arial Black'" scope="col">Amount</th>
                    <th style="font-family: 'Arial Black'" scope="col">Proof</th>
                    <th style="font-family: 'Arial Black'" scope="col">Paid At</th>
                </tr>
                </thead>
                <tbody>
                @foreach($donates as $donate)
                    @if( Auth::user()->id == $donate->user_id)
                        <tr>
                            <th scope="row">{{$donate->event_name}}</th>
                            <th scope="row">RM {{$donate->amount}}</th>
                            <th><img height="200" width="200" src="{{ asset("/storage/$donate->proof") }}"/></th>
                            <th scope="row">{{$donate->created_at}}</th>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div style="text-align: center;">
        <p>

        <h6>© 2021 Canadian Olympic Committee. All Rights Reserved.</h6>
        </p>
    </div>
@endsection
