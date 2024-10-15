@extends('layouts.app')

@section('content')

<div class="row bg-primary">
  <div class="col-12 d-flex justify-content-between">
    <a href="{{route('project.index')}}" class="btn btn-primary">< Project List</a>
    <a href="{{route('project.edit', ['project'=> $project])}}" class="text-white btn btn-primary">Edit This Project</a>
  </div>
</div>

<div class="container pt-4">
  <h1>{{$project->name}}</h1>
  <p>ID #{{$project->id}}</p>
  <p>{{ $project->description }}</p>

  @foreach($project->steps as $steps)
  <hr>
    <div class="py-4">
      <p>Step #{{ $steps->step_number }}</p>
      <p>{{$steps->title}}</p>
      <p>{{$steps->description}}</p>
      <ul>
        @foreach ($steps->info as $info)
          <li>{{$info}}</li>
        @endforeach
      </ul>
      <ul>
        @foreach ($steps->options as $options)
          <div class="input-group">
            <input type="radio" id="option_{{$steps->id}}_{{$loop->index}}" name="options_{{$steps->id}}" value="{{$options}}">
            <label for="option_{{$steps->id}}_{{$loop->index}}">{{$options}}</label>
          </div>
        @endforeach
      </ul>
    </div>
    <hr>
  @endforeach
</div>
@endsection
