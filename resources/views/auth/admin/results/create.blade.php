@extends('layouts.frontend')

@section('content')


    <div class="container">  
    
<form method="POST" action="{{route('results.store')}}">
@csrf
  <div class="mb-3 d-none">
      @foreach($games as $game)
       <input  type="text" class="form-control"  name = "game_id" value="{{ $game->id }}">
    @endforeach
    </div>
  <div class="mb-3">

  <select class="form-select" aria-label="Default select example" name="team[]">
  <option  >Open this select menu</option>
  @foreach($games as $game)
  
    @foreach($game->teams as $team)
                  <option value="{{ $team->id }}" >{{ $team->name}}</option>
            @endforeach
  @endforeach

</select>
</div>


<div class="mb-3">
  <select class="form-select" aria-label="Default select example" name="outcome_1">
  <option >Open this select menu</option>

  @foreach($outcomes as $outcome)
        <option value="{{  $outcome->id}}">{{$outcome->name}}</option>
  @endforeach

  
</select>
</div>
  <div class="mb-3 ">
  <select class="form-select" aria-label="Default select example" name="team[]">
  <option>Open this select menu</option>
  @foreach($games as $game)
            @foreach($game->teams as $team)
                  <option value="{{ $team->id }}" >{{ $team->name}}</option>
            @endforeach
          
  @endforeach

</select>
</div>
<div class="mb-3">
  <select class="form-select" aria-label="Default select example" name="outcome_2">
  <option >Open this select menu</option>
  @foreach($outcomes as $outcome)
        <option value="{{  $outcome->id}}">{{$outcome->name}}</option>
  @endforeach

  
</select>
</div>

 

  <button type="submit" class="btn btn-primary">Submit</button>
</form>

    </div>



@endsection