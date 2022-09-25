@if (isset($produto->id))
    <form method="post" action="{{ route('produto.update', ['produto' => $produto->id]) }}">
    @csrf
    @method('PUT')
@else
    <form method="post" action="{{ route('produto.store') }}">
    @csrf
@endif  
        <input type="text" value="{{ $produto->nome ?? old('nome')}}" name="nome" placeholder="Nome" class="borda-preta">
        @error('nome') {{$errors->first('nome') }} @enderror

        <input type="text" value="{{ $produto->descricao ?? old('descricao')}}" name="descricao" placeholder="Descrição" class="borda-preta">
        @error('descricao') {{$errors->first('descricao') }} @enderror

        <input type="text" value="{{ $produto->peso ?? old('peso')}}" name="peso" placeholder="Peso" class="borda-preta">
        @error('peso') {{$errors->first('peso') }} @enderror

        <select name="unidade_id">
            <option>Selecione a Unidade de Medida</option>
            @foreach ($unidades as $unidade)
                <option value="{{ $unidade->id }}" {{ $produto->unidade_id ?? old('unidade_id') == $unidade->id ? 'selected' : ''}}>{{ $unidade->descricao }}</option>
            @endforeach
        </select>
        @error('unidade_id') {{$errors->first('unidade_id') }} @enderror

        <button type="submit" class="borda-preta">Cadastrar</button>
    </form>