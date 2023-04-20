@extends('layouts.frontend')

@section('content')

<div class="container">  
      <form  method="POST" action="{{ route('games.store') }}">
            @csrf
              <!--Start Team1-->  
             
<div class="mb-3">
  <select class="form-select" aria-label="Default select example" name="team_id[]">
  <option >Open this select menu</option>
  @foreach($teams as $team)
            <option value="{{ $team->id }}">{{ $team->name }}</option>
  @endforeach

</select>
</div>
  
        <div class="mb-3">
  <select class="form-select" aria-label="Default select example" name="team_id[]">
  <option >Open this select menu</option>
  @foreach($teams as $team)
            <option value="{{ $team->id }}">{{ $team->name }}</option>
  @endforeach

</select>
</div>
           <!--Start starting_date--> 
            <div class="mb-3">
              <label for="startDate">Start</label>
                 <input id="startDate" class="form-control" type="date" name="starting_date" class="@error('starting_date') is-invalid @enderror" value="{{ old('starting_date') }}" >
                 </div>
                  @error('starting_date')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
           <!--end starting_date--> 

             <!--Start starting_time--> 
                 <div class="mb-3">
                    <label for="starTime">Time</label>
                  <input class="form-control"
                         type="time" id="datetime"  name="starting_time"  class="@error('starting_time') is-invalid @enderror" value="{{ old('starting_time') }}">
                 </div>
                      @error('starting_time')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                  <!--end starting_time--> 

              <!--Start bettable--> 
                  <div class="mb-3 d-none">
                 <label for="bettable" class="form-label">Bettable</label>
                    <input  type="number" class="form-control " name="bettable"  class="@error('bettable') is-invalid @enderror"  value="{{ old('bettable')?old('bettable'):1}}">
                </div>  
                      @error('bettable')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                  <!--end bettable--> 

          <!--Start ended--> 
                  <div class="mb-3 d-none" >
                 <label for="ended" class="form-label">Ended</label>    
                    <input  type="number" class="form-control"  name="ended" class="@error('ended') is-invalid @enderror" value="{{ old('ended') ? old('ended'): 0}}">
                </div>  
                 @error('ended')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror  
            <!--end ended-->   

                 <button type="submit" class="btn btn-primary">Submit</button>
            
            </form>

</div>


@endsection

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>


<script>
flatpickr('#startDate', {
        
   enableTime: false,
    dateFormat: "Y-m-d"
    disable: [], 
    
     
});

flatpickr('#datetime'){
    enableTime: true,
    noCalendar: true,
    dateFormat: "H:i",
}

</script>