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
<div class="row bg-primary">
  <div class="col-12 d-flex justify-content-between align-itens-center">
    <a href="{{route('project.index')}}" class="btn btn-primary">< Project List</a>
    <p class="text-white">#{{ $project->id }}</p>
  </div>
</div>

<div class="container">
    
  
  <h1>Edit Project </h1>

<form method="POST" action="{{ route('project.update', ['project' => $project->id]) }}">
    @csrf
    @method('PUT')

    <!-- Name Field -->
    <div class="form-group">
      <input type="text" name="name" id="name" value="{{ $project->name }}">
      <label for="name">Name</label>
    </div>
    @error('name')
      <p class="error-message">{{ $message }}</p>
    @enderror

    <!-- Description Field -->
    <div class="form-group">
      <textarea name="description" id="description" class="form-control">{{ old('description', $project->description) }}</textarea>
      <label for="description">Description</label>
    </div>
    @error('description')
      <p class="error-message">{{ $message }}</p>
    @enderror

    <!-- Steps Field -->
    <div class="form-group">
      <label for="steps">Steps</label>
      @foreach ($project->steps as $index => $step)
        <input type="text" name="steps[]" id="step{{ $index }}" value="{{ $step }}" placeholder="Enter step {{ $index + 1 }}">
      @endforeach
    </div>
    @error('steps')
      <p class="error-message">{{ $message }}</p>
    @enderror

    <!-- Add a new step input -->
    <div class="form-group">
      <button type="button" id="add-step">Add Step</button>
    </div>

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


  <form method="POST" action="{{ route('project.destroy', ['project' => $project->id]) }}">
    @csrf
    @method('delete')
    
  <div class="form-group">
      <button type="submit" class="btn btn-danger" id="delete">Delete Project</button>
    </div>
  </form>

</div>
@endsection