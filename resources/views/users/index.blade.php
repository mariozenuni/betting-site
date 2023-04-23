@extends('layouts.frontend')

@section('content')

<div class="container">
@if(Session::has('success'))
    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('success') !!}</em></div>
@endif

<table class="table">
  <thead>
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Points</th>
    </tr>
  </thead>
  <tbody>
   @foreach($users as $user)
    <tr>
        @if($user->role==0)
            <td>{{ $user->id}}</td> 
            <td>{{ $user->name }}</td>
            <td>to be created</td>
        @endif
    </tr>
    @endforeach
  </tbody>
</table>

</div>

@endsection