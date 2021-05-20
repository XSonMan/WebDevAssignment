@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div>
                        <a style="font-size:40px;color: black;font-family: 'Bold Italic Art';">{{ Auth::user()->name }} HOMEPAGE</a>
                    </div>
                    <div>
                        <a href="regrequest">Register Requests</a>
                    </div>
                    <div>
                        <a href="events">Event Management</a>
                    </div>
                    <div>
                        <a href="donatelist">Donate List(all)</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
