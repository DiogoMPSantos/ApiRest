@extends('template.template')

@section('content')

<div class="container" style="margin-top: 5%;">
        @if (session('success'))
        <div class="alert alert-success" id="alerta">
            {{ session('success') }}
        </div>
    @endif
    <div class="card col-md-8">
        <div class="card-body">
            <div class="col-md-8">
                    <h5 class="card-title">Cadastro de  Atividades</h5>
            <label  for="project" readonly>Nome do Projeto: {{$project->name}}</label>
            
            </div>
                
                <form action="{{ route('admin.create.activity') }}" method="post">
                    @csrf
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="activity">Nome da atividade</label>
                            <input class="form-control" required type="text" name="activity" id="">
                            <input type="hidden" name="projects_id" value="{{$project->id}}">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                                <label for="description">Descrição da atividade</label>
                                <input class="form-control" required type="text" name="description" id="">
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01">Responsável</label>
                                </div>                          
                                <select class="custom-select" required name="user_id" id="inputGroupSelect01">
                                    <option selected>Selecionar ...</option>
                                    @foreach ($users as $user)
                                        <option  value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01">Status</label>
                                </div>                          
                                <select class="custom-select" name="status_id" id="inputGroupSelect01">
                                    <option selected>Status ...</option>

                                    @foreach ($status as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="form-group inline">
                            <label for="date">Data pa Deadline</label>
                            <input type="date" required class="form-control input-group-prepend" name="deadline" id="">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <button class="btn btn-primary btn-md" type="submit">Cadastrar</button>
                    <a href="{{route('admin.index')}}" class="btn btn-warning btn-md">Voltar </a>
                    </div>
                    
                </form>
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