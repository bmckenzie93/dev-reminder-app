@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row py-4">
            <div class="col-12">
                <h1 class="text-center">Project List</h1>
            </div>
            <div class="col-6 mx-auto">
                <form method="GET" action="{{route('project.index')}}" class="">
                    <div class="form-group mb-0">
                        <input 
                            type="text" 
                            name="name" 
                            id="name" 
                            class="form-control text-center" 
                            placeholder="Search by name.." 
                            value="{{request('name')}}">
                    </div>
                    <div class="form-group d-flex justify-content-between w-100">
                        <button type="submit" class="btn-link btn text-info mr-0 pr-0">Search</button>
                        <a href="{{ route('project.index') }}" class="btn-link btn text-warning pl-0">clear filter</a>
                    </div>
                </form>
            </div>
        </div>

        <div class="row pb-4">
            <div class="col text-center">
                <a class="btn-link btn-warning" href="{{ route('dashboard') }}">Back to Dashboard</a>
            </div>
        </div>

        <div class="row">
            @forelse ($project as $aProject)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $aProject->name }}</h5>
                            <p class="card-text">{{ Str::limit($aProject->description, 100) }}</p>
                            <a href="{{ route('project.show', ['project' => $aProject->id]) }}" class="btn btn-primary">View Project</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title"><p class="text-center">No projects available...</p></div>
                            <div class="card-text">
                                <p class="text-center"><a href="{{ route('project.index')}}">Reset filter</a></p>
                            </div>
                        </div>
                    </div>
                    </p>
                </div>
            @endforelse
        </div>
    </div>
@endsection
