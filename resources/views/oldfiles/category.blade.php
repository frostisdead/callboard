<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
   @csrf
   <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        Callboard
    </title>
<style>
.container {
   display: grid;
   grid-template-columns: repeat(3, 250px);
   grid-auto-rows: auto;
   grid-gap: 1rem;
}

.card {
   border: 2px solid #e7e7e7;
   border-radius: 4px;
   padding: .5rem;
}
</style>
</head>
<body class="container-fluid">
@foreach ($categories as $cats)
<div class="row">
   
<div class="card-deck">

<div class="card mb-4" style="min-width: 18rem; max-width: 18rem;">

      <div class="card-body">
         <h5 class="card-title">{{$cats->category_name}}</h5>
         <p class="card-text">{{$cats->description}}</p>
      </div>
      @foreach ($subcategories as $subcats)
      <div class="card-footer">
         <a href="{{ route('show.subcats', ['id' => $subcats->id]) }}"><button>Go in</button></a>
      </div>
      @endforeach
   </div>
   </div>
   </div>
   @endforeach
</body>
<div class="container-fluid">
<button onclick="location.href='{{ route('home') }}'" type="button">Go to Home</button>
</div>