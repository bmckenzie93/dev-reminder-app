@extends('layouts.app')

@section('content')
  <a href="{{route('project.index')}}">< Project List</a>
  <a href="{{route('project.edit', ['project'=> $project])}}">Edit This Project</a>

  <h1>Project #{{$project->id}}</h1>
  <h2>{{$project->name}}</h2>
  <p>{{ $project->description }}</p>

  @foreach($project->steps as $steps)
  <hr>
    <div>
      <p>Step #{{ $steps->stepNum }}</p>
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
@endsection
