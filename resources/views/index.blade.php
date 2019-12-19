@extends('template.template')

@section('content')

<div class="container" style="margin-top: 5%;">

        <div class="card" style="width: 60rem;">
                <div class="card-body">
                    <div class="row"> 
                        <h5 class="card-title col-10">Cadastrar Novo Projeto</h5>
                        <a class="card-title" href="{{ route('user.logout') }}"> <i class="fas fa-power-off"></i> Sair do Sistema</a>

                    </div>
                 
                    <form action="{{ route('admin.create') }}" method="post">
                        @csrf
                        <div class="row col-8">
                               
                            <div class="form-group">
                                <label for="name-project">Nome do Projeto</label>
                                <input type="text" class="form-control" name="name" placeholder="nome do projeto">
                            </div>
                        </div>
                         
                     
                      <button class="btn btn-primary btn-sm" type="submit">Cadastrar</button>
                    </form>
                </div>
        </div>
    </br>

        <div class="card"  style="width: 60rem;">
            <div class="card-body">
                @if (session('success'))
                <div class="alert alert-success" id="alerta">
                    {{ session('success') }}
                </div>
                @endif

                <h5 class="card-title">Lista de Projetos</h5>
            
                <div class=" table-striped table-responsible-sm">
                    <table class="table" id="listProjects">
                        <thead class="table table- table-success">
                            <tr>
                                <th>#</th>
                                <th>Nome do Projeto</th>
                                <th>Adicionar Atividade</th>
                                <th>Visualizar Detalhes</th>
                                <th>Excluir Projeto</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projects as $project)

                                <tr>
                                    <td>{{$project->id}}</td>
                                    <td>{{$project->name}}</td>
                                <td><a href="{{ route('admin.link-activities', ['id'=>$project->id]) }}"> <i class="fas fa-plus-circle"></i> Adicionar Atividade </a></td>
                                <td><a href="{{ route('admin.shows', ['id'=>$project->id]) }}"> <i class="fas fa-eye"></i> Visualizar Projeto</a></td>
                                <td><a href="{{ route('admin.delete', ['id'=>$project->id]) }}"> <i class="fas fa-trash"></i> Remover Projeto</a></td>
                                </tr>
                                
                            @endforeach
                           
                        </tbody>
                    </table>
                </div>
            
            </div>
        </div>



</div>

<script>
    var div = document.getElementById('alerta');
    setTimeout(function() {
        div.style.display = 'none';
    }, 3000);
</script>

@endsection