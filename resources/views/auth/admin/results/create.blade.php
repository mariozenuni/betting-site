@extends('layouts.frontend')

@section('content')


    <div class="container">  
    
<form method="POST" action="{{route('admin.results.store')}}">
@csrf
  <div class="mb-3 d-none">
      @foreach($games as $game)
       <input  type="text" class="form-control"  name = "game_id" value="{{ $game->id }}">
    @endforeach
    </div>
  <div class="mb-3">
  <select class="form-select" class="@error('team_id') is-invalid @enderror" aria-label="Default select example" name="team_id">
  @foreach($games as $game)
                  <option value="{{ $game->id }}" >{{ $game->name}}</option>
  @endforeach
</select>
       @error('team_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
</div>


<div class="mb-3">
  <select class="form-select" aria-label="Default select example" name="outcome_id[]">
  @foreach($outcomes as $outcome)
        <option value="{{  $outcome->id}}">{{$outcome->name}}</option>
  @endforeach

  
</select>
</div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>

    </div>



@endsection