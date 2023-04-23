@extends('layouts.frontend')

@section('content')

<div class="container">
@if(Session::has('success'))
    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('success') !!}</em></div>
@endif
  <a href="{{ route('games.create')}}" class=" mb-5 btn btn-success">Add Games</a>
      <table class="table">
  <thead>
    <tr>
      <th>Id</th>
      <th>Team1</th>
      <th>Team2</th>
      <th>Starting Date</th>
       <th>Starting Time</th>
      <th>Bettable</th>
      <th>Ended</th>
    </tr>
  </thead>
  <tbody>
 @if(!empty($games))
   @foreach($games as $game)
    <tr>
         <td>{{ $game->id}}</td> 
         @foreach($game->teams  as $team)
           <td>{{ $team->name}}</td>
         @endforeach
        <td>{{ $game->starting_date }}</td>
        <td>{{ $game->starting_time }}</td>
        
        @if( $game->bettable==1)
           <td>Yes</td>
           @else
           <td>No</td>
       @endif
       @if( $game->ended==1)
           <td>Yes</td>
             <td><a href="{{ route('admin.results.create',$game->id)}}" class="btn btn-success btn-sm">Add result<a/></td>
           @else
             <td>No</td>
                 <td>Awaiting Game to finish <a/></td>
       @endif
      
    </tr>
       @endforeach
        @else
            <td><p>No game found</p></td>
      @endif
  </tbody>
</table>

</div>

@endsection