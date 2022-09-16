{{ $slot }}
<form action={{ route('site.contato')}} method="post">
    @csrf

    {{-- Campo nome --}}
    <input name="nome" value="{{ old('nome')}}" type="text" placeholder="Nome" class="{{ $classe }}">
    {{-- Alerta de erro do campo --}}
    @if ($errors->has('nome'))
        {{ $errors->first('nome') }}
    @endif
    <br>

    {{-- Campo Telefone --}}
    <input name="telefone" value="{{ old('telefone')}}" type="text" placeholder="Telefone" class="{{ $classe }}">
    {{-- Alerta de erro do campo --}}
    {{ $errors->has('telefone') ? $errors->first('telefone') : '' }}
    <br>

    {{-- Campo E-mail --}}
    <input name="email" value="{{ old('email')}}" type="text" placeholder="E-mail" class="{{ $classe }}">
    {{-- Alerta de erro do campo --}}
    @error('email') {{ $errors->first('email')  }} @enderror
    <br>

    {{-- Campo Motivos de Contato --}}
    <select name="motivo_contatos_id" class="{{ $classe }} ">
        <option value="">Qual o motivo do contato?</option>

        @foreach ( $motivo_contatos as $key => $motivo_contato)
            <option value="{{ $motivo_contato->id }}" {{ old('motivo_contatos_id') == $motivo_contato->id ? 'selected' : ''}} >{{ $motivo_contato['motivo_contato'] }}</option>
        @endforeach
    </select>
    {{-- Alerta de erro do campo --}}
     @error('motivo_contatos_id') {{ $errors->first('motivo_contatos_id')  }} @enderror
    <br>

    {{-- Campo Mensagem --}}
    <textarea name="mensagem" value="{{ old('mensagem')}}" class="{{ $classe }}" placeholder="Preencha aqui a sua mensagem"></textarea>
    {{-- Alerta de erro do campo --}}
     @error('mensagem') {{ $errors->first('mensagem')  }} @enderror
    <br>
    <button type="submit" class="{{ $classe }}">ENVIAR</button>
</form>