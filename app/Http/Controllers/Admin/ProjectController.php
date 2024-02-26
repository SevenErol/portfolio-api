<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Language;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $auth_user = Auth::user()->id;
        $projects = DB::table('projects')->where('user_id', '=', $auth_user)->orderByDesc('id')->paginate(4);
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $auth_user = Auth::user()->id;
        $projects = DB::table('projects')->where('user_id', '=', $auth_user)->orderByDesc('id')->paginate(4);

        $languages = Language::all();
        return view('admin.projects.create', compact('projects', 'languages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $val_data = $request->validated();
        if ($request->hasFile('cover_image')) {
            $cover_image = Storage::disk('public')->put('uploads', $val_data['cover_image']);
            $val_data['cover_image'] = $cover_image;
        }
        $val_data['user_id'] = Auth::user()->id;
        $project = Project::create($val_data);

        //Many to many relationship
        if ($request->has('languages')) {
            $project->languages()->attach($val_data['languages']);
        }


        return to_route('admin.projects.index')->with('message', "Progetto aggiunto correttamente");
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $val_data = $request->validated();
        if ($request->hasFile('cover_image')) {
            if ($project->cover_image) {
                Storage::delete($project->cover_image);
            }
            $cover_image = Storage::disk('public')->put('uploads', $val_data['cover_image']);
            $val_data['cover_image'] = $cover_image;
        }


        $project->update($val_data);

        //Many to many relationship
        if ($request->has('languages')) {
            $project->languages()->sync($val_data['languages']);
        } else {
            $project->languages()->sync([]);
        }

        return to_route('admin.projects.index')->with('message', "Progetto aggiornato correttamente");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        if ($project->cover_image) {
            Storage::delete($project->cover_image);
        }


        $project->delete();


        return to_route('admin.projects.index')->with('message', "Progetto cancellato correttamente");
    }
}
