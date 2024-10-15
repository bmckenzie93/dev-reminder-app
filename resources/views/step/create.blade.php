@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add Custom Step for {{ $project->name }}</h1>
        <form method="POST" action="{{ route('step.store', $project->id) }}">
            @csrf

            <div class="form-group">
                <label for="step_number">Step Number</label>
                <input type="number" name="step_number" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" name="description" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="data">Data</label>
                <textarea name="data" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label for="options">Options</label>
                <textarea name="options" class="form-control"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Add Step</button>
        </form>
    </div>
@endsection
