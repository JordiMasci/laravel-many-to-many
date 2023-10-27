<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProjectRequest;
use Illuminate\Support\Str;

use App\Models\Project;
use App\Models\Type;
use App\Models\Technology;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $projects = Project::orderByDesc('id')->paginate(10);
        return view("admin.projects.index", compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.projects.create', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(StoreProjectRequest $request)
    {
        $data = $request->validated();

        $project = new Project();
        $project->title = $data['title'];
        $project->content = $data['content'];
        $project->slug = Str::slug($project->title);
        $project->type_id = $data['type_id'];
        $project->save();

        $project->technologies()->attach($data['technologies']);
        
        return redirect()->route('admin.projects.show', compact('project'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     */
    public function show(Project $project)
    {
        return view("admin.projects.show", compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     */
    public function edit(Project $project)
    {
        $types = Type::all();
        return view('admin.projects.edit', compact('project', 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     */
    public function update(Request $request, Project $project)
    {
       $data = $request->all();
       $project->title = $data['title'];
       $project->content = $data['content'];
       $project->slug = Str::slug($project->title);
       $project->type_id = $data['type_id'];
       $project->save();
       return redirect()->route('admin.projects.show', compact('project'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('admin.projects.index');
    }
}
