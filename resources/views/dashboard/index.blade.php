@extends('layouts.app')


@section('content')

<h1>Welcome, {Username}!</h1>

<a href="{{ route('project.index') }}">View Project List</a>






@endsection