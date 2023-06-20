<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin\Project;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::All();

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.projects.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validation
        $request->validate(
            [
                'title' => 'required|unique:projects|max:50',
                'description' => 'required',
                'customer' => 'required',
                'type_customer' => 'required|max:30',
                'price' => 'required|max:15',
                'created' => 'required|max:15',
            ],
            [
                'title.required' => 'Il campo Titolo è richiesto',
                'title.unique' => 'Il campo Titolo deve eseere univoco e quello che hai scelto è già presente',
                'title.max' => 'Il campo Titolo non deve superare i 50 caratteri',
                'description.required' => 'Il campo Descrizione è richiesto',
                'price.required' => 'Il campo Costo è richiesto',
                'customer.required' => 'Il campo Cliente è richiesto',
                'type_customer.required' => 'Il campo Settore è richiesto',
                'created.required' => 'Il campo Data è richiesto',
            ]
        );
        
        // associamo a una variabile i dati passati con il form        
        $form_data = $request->all();

        $newProject = new Project();

        $newProject->fill($form_data);
        $newProject->save();

        return redirect()->route('projects.index')->with('success', 'Creazione del fumetto completata con successo!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        // $project = Project::findOrFail($id);
        // dd($project);
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //  preso l'elemento intero come parametro, lo passo all'interno del file edit.blade.php
    public function edit(Project $project)
    {        
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        // validation
        $request->validate(
            [
                'title' => 'required|max:50|unique:projects,title,'.$project->id,
                'description' => 'required',
                'customer' => 'required',
                'type_customer' => 'required|max:30',
                'price' => 'required|max:15',
                'created' => 'required|date',
            ],
            [
                'title.required' => 'Il campo Titolo è richiesto',
                'title.unique' => 'Il campo Titolo deve eseere univoco e quello che hai scelto è già presente',
                'title.max' => 'Il campo Titolo non deve superare i 50 caratteri',
                'description.required' => 'Il campo Descrizione è richiesto',
                'price.required' => 'Il campo Costo è richiesto',
                'customer.required' => 'Il campo Cliente è richiesto',
                'type_customer.required' => 'Il campo Settore è richiesto',
                'created.required' => 'Il campo Data è richiesto',
            ]
        );

        // associamo a una variabile i dati passati con il form
        $form_data = $request->all();

        // aggiorniamo l'elemento passato con il form, usando il metodo update()
        $project->update($form_data);

        // facciamo un redirect verso la pagina contenente tutti i nostri comic dove possiamo avere una panoramica dei nostri elementi modificati
        return redirect()->route('projects.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        // cancelliamo l'elemento passato con il metodo destroy
        $project->delete();

        return redirect()->route('projects.index');
    }
}
