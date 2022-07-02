   @if (isset($pedido->id))
       <form method="post" action="{{ route('pedido.update', ['pedido' => $pedido->id]) }}">
           @csrf
           @method('PUT')
       @else
           <form method="post" action="{{ route('pedido.store') }}">
               @csrf
   @endif

    <select name="cliente_id">
       <option value="0">-- Selecione cliente --</option>
       @foreach ($clientes as $cliente)
           <option value="{{ $cliente->id }}"
               {{ ($pedido->cliente_id ?? old('cliente_id')) == $cliente->id ? 'selected' : '' }}>
               {{ $cliente->nome }}
           </option>
       @endforeach
   </select>
   <span class="cor-msg-erro"> {{ $errors->has('cliente_id') ? $errors->first('cliente_id') : '' }} </span>

   <button type="submit" class="borda-preta">{{ isset($pedido) ? 'Editar' : 'Cadastrar' }}</button>
   </form>
