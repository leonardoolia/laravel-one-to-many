<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $project = Project::whereSlug($slug)->first();

        if (!$project) abort(404);

        return view('guest.projects.show', compact('project'));
    }
}
