@extends('layouts.frontend')

@section('content')

<div class="container">

            <form  method="POST" action="{{ route('games.store') }}">
            @csrf
                 <div class="mb-3">
                 <label for="team1" class="form-label">Team 1</label>
                 <input type="text" class="form-control" name="team1">
                </div>
                  <div class="mb-3">
                 <label for="team2" class="form-label">Team 2</label>
                 <input type="text" class="form-control"  name="team2">
                </div>
                  <div class="mb-3">
                 <label for="bettable" class="form-label">Bettable</label>
                    <input  type="number" class="form-control" name="bettable">
                </div>  
                  <div class="mb-3">
                 <label for="ended" class="form-label">Ended</label>    
                    <input  type="number" class="form-control" name="ended">
                </div>  
              
                
                 <button type="submit" class="btn btn-primary">Submit</button>
            
            </form>

</div>

@endsection