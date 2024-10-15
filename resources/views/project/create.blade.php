@extends('layouts.app')


@section('styles')
  <style>
    .error-message {
      color: red;
      font-size: 12px;
      margin-top: 0;
    }
  </style>
@endsection


@section('content')
  <a href="{{ route('dashboard') }}">Back to dashboard</a>
  
  <h1>Create a project</h1>

<form method="POST" action="{{ route('project.store') }}">
    @csrf

    <!-- Name Field -->
    <div class="form-group">
      <input type="text" name="name" id="name" value="{{old('name')}}">
      <label for="name">Name</label>
    </div>
    @error('name')
      <p class="error-message">{{ $message }}</p>
    @enderror

    <!-- Description Field -->
    <div class="form-group">
      <input type="text" name="description" id="description" value="{{old('description')}}">
      <label for="description">Description</label>
    </div>
    @error('description')
      <p class="error-message">{{ $message }}</p>
    @enderror

    <!-- STEPS -->
    <!-- STEPS NEED TO GO HERE -->
    <!-- STEPS -->
    <!-- STEPS -->
    <!-- STEPS -->



    <!-- Submit Field -->
    <div class="form-group">
      <input type="submit" id="submit" value="Submit">
    </div>
  </form>

<!-- Script to dynamically add new steps -->
<script>
  document.getElementById('add-step').addEventListener('click', function() {
      let formGroup = document.createElement('div');
      formGroup.className = 'form-group';
      let index = document.querySelectorAll('input[name="steps[]"]').length;
      formGroup.innerHTML = `<input type="text" name="steps[]" id="step${index}" placeholder="Enter step ${index + 1}">`;
      this.parentNode.insertBefore(formGroup, this);
  });
</script>


@endsection