@extends('base')

@section('main')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">{{Auth::user()->name}}'s Donations</h1>
            <a style="margin: 19px;" href="{{ route('home')}}" class="btn btn-primary">Home</a>
            <a style="margin: 19px;" href="{{ route('donate.create')}}" class="btn btn-primary">New Donation</a>
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Event Name</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Proof</th>
                    <th scope="col">Paid At</th>
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
@endsection
