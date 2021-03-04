<?php

namespace App\Http\Controllers;

use App\Models\Contacter;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::with('contacters')->paginate(10)->items();
        return view('welcome')->with('projects', $projects);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $project = Project::updateOrCreate(
            ['name' => $request->name, 'description' => $request->description],
            ['status' => $request->status]
        );
        $contactername = $request->names;
        $contacteremail = $request->email;

        for ($i = 0; $i < count($contactername); $i++) {
            $contacter = new Contacter();
            $contacter->name = $contactername[$i];
            $contacter->email = $contacteremail[$i];
            $contacter->project_id = $project->id;
            $contacter->save();

        }

        return redirect(route('projects.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::find($id);
        $contacters = Contacter::where('project_id', $id)->get();
        return view('projects.edit')->with(compact('project','contacters'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $project = Project::updateOrCreate(
            ['id'=>$id],
            ['name' => $request->name, 'description' => $request->description],
            ['status' => $request->status]
        );
        return redirect(route('projects.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::find($id);
        $contacters = Contacter::where('project_id', $id);
        $contacters->delete();
        $project->delete();
    }
}
