@extends('layouts.frontend')

@section('content')
<div class="container">
     @if(Session::has('success'))
    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('success') !!}</em></div>
@endif
    <div class="row justify-content-center">
        <div class="col-md-8">
        @if(Auth::user()->role==1)
          <a href="{{ route('games.create')}}" class=" mb-5 btn btn-success">Add Games</a>
        @endif
            <div class="card">
          
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __("You are logged in as " . Auth::user()->name) }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
