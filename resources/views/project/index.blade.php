@extends('layouts.app')

@section('content')
<h1>Project Page</h1>
<a href="{{ route('dashboard') }}">Back to dashboard</a>

<ul>
    @forelse ($project as $aProject)
        <li>
            <a href="{{ route('project.show', ['project' => $aProject->id]) }}">#{{$aProject->id}} - {{$aProject->name}}</a>
        </li>
    @empty
        <li>no projects...</li>
    @endforelse
</ul>
@endsection
