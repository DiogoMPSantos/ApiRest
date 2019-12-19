@extends('template.template')

@section('content')

<!-- Styles -->
<style>
    html, body {
        background-color: #fff;
        color: #636b6f;
        font-family: 'Nunito', sans-serif;
        font-weight: 200;
        height: 100vh;
        margin: 0;
    }

    .full-height {
        height: 100vh;
    }

    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
    }

    .position-ref {
        position: relative;
    }

    .top-right {
        position: absolute;
        right: 10px;
        top: 18px;
    }

    .content {
        text-align: center;
    }

    .title {
        font-size: 84px;
    }

    .links > a {
        color: #636b6f;
        padding: 0 25px;
        font-size: 13px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }

    .m-b-md {
        margin-bottom: 30px;
    }
</style>

<div class="flex-center position-ref full-height">

    <div class="card" style="width: 24rem;">

        <div class="card-body">

            @if (session('errors'))
            <div class="alert alert-danger" id="alerta">
                {{ session('errors') }}
            </div>
        @endif
        <form class="form-signin" action="{{ route('user.login') }}" method="POST">
            @csrf
                            
                <h1 class="h3 mb-3 font-weight-normal"> Login</h1>

                    <div class="form-group">
                        <label for="inputEmail" class="sr-only"> Email </label>
                        <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required="" autofocus="">
                    </div>
                    <div class="form-group">
                        <label for="inputPassword" class="sr-only">Password</label>
                        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required="">
                    </div>     

                <button class="btn btn-lg btn-primary btn-block" type="submit"> Entrar </button>
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