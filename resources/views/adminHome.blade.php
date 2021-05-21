@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('') }}
                        <div>
                            <a style="color:black"><i> </i> Admin Homepage<i> </i> </a>
                        </div>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div>
                            <a style="font-size:30px;color: black;font-family: 'Bold Italic Art';">Hello {{ Auth::user()->name }}</a>
                        </div>
                        <div style="text-align: center;">
                            <img  src="/logo.png" alt="Logo">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div style="text-align: center;">
            <p>

            <h6>© 2021 Canadian Olympic Committee. All Rights Reserved.</h6>
            </p>
        </div>
    </div>
@endsection
