<?php

use App\Models\Project;
use Illuminate\Support\Facades\Route;




// //////////////
// INDEX ROUTE //
// //////////////

Route::get('/', function () {
    return redirect()->route('dashboard');
})->name('index');



// //////////////////
// DASHBOARD ROUTE //
// //////////////////

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->name('dashboard');


// /////////////////
// PROJECT ROUTES //
// /////////////////

// Project create
Route::get('/project/create', function () {
    return view('project.create');
})->name('project.create');

// Project list
Route::get('/project', function () {
    return view('project.index', ['project' => Project::latest()->get() ]);
})->name('project.index');

// Project show
Route::get('/project/{project}', function (Project $project) {
    return view('project.show', ['project' => $project ]);
})->name('project.show');

Route::get('/project/{project}/edit', function (Project $project) {
    return view('project.edit', ['project' => $project]);
})->name('project.edit');


// Project post db
// Route::post('/project', function (FishRequest $request) {
//     $fish = Fish::create( $request->validated());

//     return redirect()->route('project.show', ['fish' => $fish->id])
//     ->with('success','Fish recorded!');
// })->name('project.store');

// Project edit db
// Route::put('/project/{fish}', function (Fish $fish, FishRequest $request) {
//     $fish->update( $request->validated() );

//     return redirect()->route('project.show', ['fish' => $fish->id])
//     ->with('success','Fish updated!');
// })->name('project.update');

// Project delete db
// Route::delete('/project/{fish}', function (Fish $fish) {
//     $fish->delete();

//     return redirect()->route('project.index')
//         ->with('success','Fish record has been removed.');
// })->name('project.destroy');
