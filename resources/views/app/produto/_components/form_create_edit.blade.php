   @if (isset($produto->id))
       <form method="post" action="{{ route('produto.update', ['produto' => $produto->id]) }}">
           @csrf
           @method('PUT')
    @else
        <form method="post" action="{{ route('produto.store') }}">
            @csrf
   @endif
   <input type="text" name="nome" placeholder="Nome" value="{{ $produto->nome ?? old('nome') }}"
       class="borda-preta" />
   <span class="cor-msg-erro"> {{ $errors->has('nome') ? $errors->first('nome') : '' }} </span>

   <input type="text" name="descricao" placeholder="Descrição"
       value="{{ $produto->descricao ?? old('descricao') }}" class="borda-preta" />
   <span class="cor-msg-erro"> {{ $errors->has('descricao') ? $errors->first('descricao') : '' }} </span>

   <input type="text" name="peso" placeholder="Peso" value="{{ $produto->peso ?? old('peso') }}"
       class="borda-preta" />
   <span class="cor-msg-erro"> {{ $errors->has('peso') ? $errors->first('peso') : '' }} </span>

   <select name="unidade_id">
       <option>-- Selecione a Unidade de Medida --</option>
       @foreach ($unidades as $unidade)
           <option value="{{ $unidade->id }}"
               {{ ($produto->unidade_id ?? old('unidade_id')) == $unidade->id ? 'selected' : '' }}>
               {{ $unidade->descricao }}</option>
       @endforeach
   </select>
   <span class="cor-msg-erro"> {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }} </span>

   <button type="submit" class="borda-preta">{{isset($produto) ? 'Editar' : 'Cadastrar'}}</button>
   </form>
