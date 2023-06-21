<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Importazione modello Project
use App\Models\Admin\Project;

// Importazione file Request
use App\Http\Requests\StoreProjectRequest;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // assegniamo alla variabile $projects tutti i dati della tabella projects grazie al metodo statico ( Project::All() )
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
    public function store(StoreProjectRequest $request)
    {        
        
        $form_data = $request->validated();
        
        // associamo a una variabile i dati passati con il form        
        // $form_data = $request->all();

        // trasformazione da titolo a slug grazie al metodo statico del model Project creato da noi
        $slug = Project::toSlug($request->title);

        // assegnazione e creazione della nuova chiave slug
        $form_data['slug'] = $slug;

        /* l'alternativa shortcut al salvataggio delle informazioni
            $newProject = Project::create($form_data);
        */

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
    public function update(UpdateProjectRequest $request, Project $project)
    {

        $form_data = $request->validated();

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
