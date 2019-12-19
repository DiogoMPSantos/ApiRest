@extends('template.template')

@section('content')

<div class="container" style="margin-top: 5%;">

    <div class="card">
        <div class="card-body">
            <div class="col-md-8">
                <h5 class="card-title">Detalhes</h5>
            <div class="table-responsible">
                <table class="table table-striped">
                    <thead class="table table- table-success">
                        <tr class="col">
                            <th>#</th>
                            <th>Projeto</th>
                            <th>Atividade</th>
                            <th>Responsavel</th>
                            <th>Status</th>
                            <th>Data deadline</th>
                        </tr>
                        <tbody>
                            @foreach ($projects as $project)
                                @foreach ($project->activity as $activitys)
                                    
                                
                                <tr>
                                    <td>{{$project->id}} </td>
                                    <td>{{$project->name}} </td>
                                    <td>{{$activitys->name}} </td>
                                    <td>{{$activitys->users->name}} </td>
                                    <td>{{$activitys->status->name}} </td>
                                    <td>{{$activitys->deadline}} </td>
                                </tr>
                                @endforeach
                            @endforeach  
                        </tbody>   
                    </thead>
                </table>

            <div>
                <a href="{{route('admin.index')}}" class="btn btn-primary btn-md">Voltar</a>

            </div>
            </div>
                
          
            
            </div>
                
        </div>
    </div>
</div>
@endsection