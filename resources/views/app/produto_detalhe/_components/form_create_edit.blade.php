@if (isset($produto_detalhe->id))
    <form method="post" action="{{ route('produto.update', ['produto' => $produto_detalhe->id]) }}">
        @csrf
        @method('PUT')
@else
    <form method="post" action="{{ route('produto-detalhe.store') }}">
        @csrf
@endif  
        <input type="text" value="{{ $produto_detalhe->produto_id ?? old('produto_id')}}" name="produto_id" placeholder="ID do produto" class="borda-preta">
        @error('produto_id') {{$errors->first('produto_id') }} @enderror

        <input type="text" value="{{ $produto_detalhe->comprimento ?? old('comprimento')}}" name="comprimento" placeholder="Comprimento" class="borda-preta">
        @error('comprimento') {{$errors->first('comprimento') }} @enderror

        <input type="text" value="{{ $produto_detalhe->largura ?? old('largura')}}" name="largura" placeholder="Largura" class="borda-preta">
        @error('largura') {{$errors->first('largura') }} @enderror

        <input type="text" value="{{ $produto_detalhe->altura ?? old('altura')}}" name="altura" placeholder="Altura" class="borda-preta">
        @error('altura') {{$errors->first('altura') }} @enderror

        <select name="unidade_id">
            <option>Selecione a Unidade de Medida</option>
            @foreach ($unidades as $unidade)
                <option value="{{ $unidade->id }}" {{ $produto_detalhe->unidade_id ?? old('unidade_id') == $unidade->id ? 'selected' : ''}}>{{ $unidade->descricao }}</option>
            @endforeach
        </select>
        @error('unidade_id') {{$errors->first('unidade_id') }} @enderror

        <button type="submit" class="borda-preta">Cadastrar</button>
    </form>