<form method="post" action="{{ route('pedido-produto.store', ['pedido' => $pedido->id]) }}">
    @csrf
    <select name="produto_id" class="borda-preta">
        <option value="0">-- Selecione produto --</option>
        @foreach ($produtos as $produto)
            <option value="{{ $produto->id }}" {{ old('produto_id') == $produto->id ? 'selected' : '' }}>
                {{ $produto->nome }}
            </option>
        @endforeach
    </select>
    <span class="cor-msg-erro"> {{ $errors->has('produto_id') ? $errors->first('produto_id') : '' }} </span>

    <input type="number" name="quantidade" placeholder="Quantidade" value="{{ old('quantidade') ?? '' }}" class="borda-preta" />
    <span class="cor-msg-erro"> {{ $errors->has('quantidade') ? $errors->first('quantidade') : '' }} </span>

    <button type="submit" class="borda-preta">{{ 'Cadastrar' }}</button>
</form>
