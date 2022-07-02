   @if (isset($cliente->id))
       <form method="post" action="{{ route('cliente.update', ['cliente' => $cliente->id]) }}">
           @csrf
           @method('PUT')
       @else
           <form method="post" action="{{ route('cliente.store') }}">
               @csrf
   @endif

   <input type="text" name="nome" placeholder="Nome" value="{{ $cliente->nome ?? old('nome') }}"
       class="borda-preta" />
   <span class="cor-msg-erro"> {{ $errors->has('nome') ? $errors->first('nome') : '' }} </span>

   <button type="submit" class="borda-preta">{{ isset($produto) ? 'Editar' : 'Cadastrar' }}</button>
   </form>
