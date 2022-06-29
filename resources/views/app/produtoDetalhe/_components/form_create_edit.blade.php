   @if (isset($produto_detalhe->id))
       <form method="post" action="{{ route('produto-detalhe.update', ['produto_detalhe' => $produto_detalhe->id]) }}">
           @csrf
           @method('PUT')
       @else
           <form method="post" action="{{ route('produto-detalhe.store') }}">
               @csrf
   @endif
   <select name="produto_id">
       <option value="0">-- Selecione Produto --</option>
       @foreach ($produtos as $produto)
           <option value="{{ $produto->id }}"
               {{ ($produto_detalhe->produto_id ?? old('produto_id')) == $produto->id ? 'selected' : '' }}>
               {{ $produto->nome }}
           </option>
       @endforeach
   </select>
   <span class="cor-msg-erro"> {{ $errors->has('produto_id') ? $errors->first('produto_id') : '' }} </span>

   <input type="text" name="comprimento" placeholder="Comprimento"
       value="{{ $produto_detalhe->comprimento ?? old('comprimento') }}" class="borda-preta" />
   <span class="cor-msg-erro"> {{ $errors->has('comprimento') ? $errors->first('comprimento') : '' }} </span>

   <input type="text" name="largura" placeholder="Largura"
       value="{{ $produto_detalhe->largura ?? old('largura') }}" class="borda-preta" />
   <span class="cor-msg-erro"> {{ $errors->has('largura') ? $errors->first('largura') : '' }} </span>

   <input type="text" name="altura" placeholder="Altura" value="{{ $produto_detalhe->altura ?? old('altura') }}"
       class="borda-preta" />
   <span class="cor-msg-erro"> {{ $errors->has('altura') ? $errors->first('altura') : '' }} </span>

   <select name="unidade_id">
       <option>-- Selecione a Unidade de Medida --</option>
       @foreach ($unidades as $unidade)
           <option value="{{ $unidade->id }}"
               {{ ($produto_detalhe->unidade_id ?? old('unidade_id')) == $unidade->id ? 'selected' : '' }}>
               {{ $unidade->descricao }}</option>
       @endforeach
   </select>
   <span class="cor-msg-erro"> {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }} </span>

   <button type="submit" class="borda-preta">{{ isset($produto_detalhe) ? 'Editar' : 'Cadastrar' }}</button>
   </form>
