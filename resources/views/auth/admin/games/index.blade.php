@extends('layouts.frontend')

@section('content')

<div class="container">

            <table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Team 1</th>
      <th scope="col">Team 2</th>
      <th scope="col">Bettable</th>
      <th scope="col">Ended</th>
    </tr>
  </thead>
  <tbody>
    <tr>
     
      @foreach($games as $game)
         <td>{{ $game->id }}</td> 
       <td>{{ $game->team1 }}</td>
       <td>{{ $game->team2 }}</td
       <td>{{ $game->bettable }}</td
       <td>{{ $game->ended }}</td
      @endforeach
    </tr>
    
  </tbody>
</table>

</div>

@endsection