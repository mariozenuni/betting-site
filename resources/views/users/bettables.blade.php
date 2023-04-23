@extends('layouts.frontend')

@section('content')

<div class="container">

<div class="row">
@if(!empty($games))
@foreach($games as $game)
  <div class="col-sm-6">
    <div class="card mt-3">
      <div class="card-body">
      @foreach($game->teams as $team)
        <p class="card-text">{{  $team->name  }}</p>
        @endforeach
          @if($game->bettable==0)
          <p>Not bettable</p>
          @else
             <a href="{{ route('users.bettable-create',$game->id)}}" class="btn btn-primary">Add a Bet</a>
      @endif
      </div>
    </div>
  </div>
  @endforeach
    @else
            <p>No games added</p>
  @endif
</div>



   

</div>

@endsection