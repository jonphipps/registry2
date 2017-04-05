<?php

namespace App\Http\Controllers\Api\V1;

use App\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectsRequest;
use App\Http\Requests\UpdateProjectsRequest;
use Yajra\Datatables\Datatables;

class ProjectsController extends Controller
{
    public function index()
    {
        return Project::all();
    }

    public function show($id)
    {
        return Project::findOrFail($id);
    }

    public function update(UpdateProjectsRequest $request, $id)
    {
        $project = Project::findOrFail($id);
        $project->update($request->all());

        return $project;
    }

    public function store(StoreProjectsRequest $request)
    {
        $project = Project::create($request->all());

        return $project;
    }

    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();
        return '';
    }
}
