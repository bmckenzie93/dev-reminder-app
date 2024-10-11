@extends('layouts.app')


@section('content')
<div class="container py-4">
  <div class="row">
    <div class="col">
      <h1>Welcome, {Username}!</h1>
    </div>
  </div>
  
  <div class="row">
    <div class="col">
      <a href="{{ route('project.index') }}" class="btn-link">View Project List</a>
    </div>
  </div>
</div>








@endsection