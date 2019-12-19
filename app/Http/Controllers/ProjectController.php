<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Http\Requests\ProjectFormRequest;
use Illuminate\Http\Request;
use App\Project;
use App\Status;
use App\User;

class ProjectController extends Controller
{
    //
    public function index()
    {
        $projects = Project::all();
        return view('index', ['projects'=>$projects]);

    }

    public function store(ProjectFormRequest $request)
    {
        $user =  auth()->user();
       
        $validate = $request->validate(
           [
            'name'=>'required'
           ]
        );

        if($validate) {
          $created =  $user->project()->create([
            'name' => $request->name
           ]);
        }else{
        return redirect()->back()->withErrors('errors', 'Erro ao Criar Projeto, verifique as informações e tente novamente!');
        }
        return redirect()->route('admin.index')->with('success', 'Projeto Adicionado com sucesso!');
    }
    public function addActivities($id)
    {
        $projects = Project::all(); //Obter Projetos
        $project = $projects->find($id);//Obter Informações de projeto específico
        $users =  User::all(); //Obter Users

        $collection = collect($users);
        $filtered = $collection->where('isAdmin', 0); //Retirar o User Admin da Collect
        $user = $filtered->all();

        $status = Status::all(); //Pegar Status Válidos no BD
        //Enviar Para View
       return view('activities',['users'=>$user, 'status'=>$status, 'project'=>$project]);
    }
    public function storeActivity(Request $request)
    {
        $newActivity = new Activity();
        $newActivity->create([
            'name'=>$request->activity,
            'description'=>$request->description,
            'project_id'=>$request->projects_id,
            'user_id'=>$request->user_id,
            'status_id'=>$request->status_id,
            'deadline'=>$request->deadline,
        ]);
       if($newActivity){
            return redirect()->route('admin.link-activities',['id'=>$request->projects_id])->with('success', 'Nova Atividade Adicionada ao Projeto com sucesso!');
       }
    }
    public function showActivities($id){
       
        $projects = new Project();
        $project = $projects->where('id', $id)->with(['activity.status','activity.users'])->get();
        return view('show', ['projects'=>$project]);

    }

    public function deleteProject($id)
    {
        $projects = Project::all(); //Obter Projetos
        $project = $projects->find($id);//Obter Informações de projeto específico
        $delete = $project->delete();
        if ($delete) 
            return redirect()->back()->with('success', 'Projeto Excluído com Sucesso');
    }
}
