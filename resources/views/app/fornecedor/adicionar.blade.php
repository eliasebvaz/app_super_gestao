@extends ('app.layouts.basico')
@section('titulo', 'Fornecedor')
@section('conteudo')
    
    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Fornecedor - Adicionar</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('app.fornecedor.adicionar') }}">Novo</a></li>
                <li><a href="{{ route('app.fornecedor') }}">Consulta</a></li>
            </ul>
            
        </div>

        <div class="informacao-pagina">

            {{ $msg ?? ''}}

            <div style="width: 30%; margin-left: auto; margin-right: auto;">
            
                <form method="post" action="{{ route('app.fornecedor.adicionar') }}">
                    @csrf
                    <input type="hidden" value="{{ $fornecedor->id ?? ''}}" name="id">
                    <input type="text" value="{{ $fornecedor->nome ?? old ('nome')}}" name="nome" placeholder="Nome" class="borda-preta">
                    @error('nome') {{$errors->first('nome') }} @enderror
                    <input type="text" value="{{ $fornecedor->site ?? old ('site')}}" name="site" placeholder="Site" class="borda-preta">
                    @error('site') {{$errors->first('site') }} @enderror
                    <input type="text" value="{{ $fornecedor->uf ?? old ('uf')}}" name="uf" placeholder="UF" class="borda-preta">
                    @error('uf') {{$errors->first('uf') }} @enderror
                    <input type="text" value="{{ $fornecedor->email ?? old ('email')}}" name="email" placeholder="E-mail" class="borda-preta">
                    @error('email') {{$errors->first('email') }} @enderror
                    <button type="submit" class="borda-preta">Cadastrar</button>
                </form>
            </div>
            
        </div>

    </div>

@endsection