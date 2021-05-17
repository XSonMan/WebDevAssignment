@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if(session('message'))
                    <div class="alert alert-success">
                        {{session('message')}}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table">
                            <thead>
                                <tr>
                                    <td>Name</td>
                                    <td>Email</td>
                                    <td>Status</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        @if($user->status == 0)
                                            <th>{{ $user->name }}</th>
                                            <th>{{ $user->email }}</th>
                                            <th>Inactive</th>
                                            <th><a href="{{route('status', ['id'=>$user->id]) }}">Activate</a></th>
                                        <!--<th><a href="{{route('status', ['id'=>$user->id]) }}">
                                                @if($user->status == 0)
                                            Activate
@else
                                            Deactivate
@endif
                                            </a></th>-->
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
