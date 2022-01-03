{{$slot}}

<form action={{route('site.contato')}} method="post">
          @csrf
          <input name="nome" type="text" value="{{old('nome')}}" placeholder="Nome" class="{{$classe}}">
          <span class="cor-msg-erro">
          @if($errors->has('nome'))
               {{$errors->first('nome')}}
          @endif
          </span>
          <br>
          <input name="telefone" type="text" value="{{old('telefone')}}" placeholder="Telefone" class="{{$classe}}">
         <span class="cor-msg-erro"> {{$errors->has('telefone') ? $errors->first('telefone') : ''}} </span>
          <br>
          <input name="email" type="text" value="{{old('email')}}" placeholder="E-mail" class="{{$classe}}">
          <span class="cor-msg-erro"> {{$errors->has('email') ? $errors->first('email') : ''}} </span>
          <br>
          <select name="motivo_contatos_id" class="{{$classe}}">
                    <option value="">Qual o motivo do contato?</option>
                    @foreach ($motivo_contatos as $key => $motivo_contato )
                    <option value="{{$motivo_contato->id}}" {{old('motivo_contatos_id') == $motivo_contato->id ? 'selected' : ''}}>{{$motivo_contato->motivo_contato}}</option>
                    @endforeach
               {{-- <option value="1" {{old('motivo_contato') == 1 ? 'selected' : ''; }} >Dúvida</option>
                    <option value="2" {{old('motivo_contato') == 2 ? 'selected' : ''; }} >Elogio</option>
                    <option value="3" {{old('motivo_contato') == 3 ? 'selected' : ''; }} >Reclamação</option> --}}
          </select>
          <span class="cor-msg-erro"> {{$errors->has('motivo_contatos_id') ? $errors->first('motivo_contatos_id') : ''}} </span>
          <br>
          <textarea name="mensagem" class="{{$classe}}">@if(old('mensagem') != ''){{old('mensagem')}} @else Preencha aqui a sua mensagem @endif </textarea>
           <span class="cor-msg-erro"> {{$errors->has('mensagem') ? $errors->first('mensagem') : ''}} </span>
          <br>
          <button type="submit" class="{{$classe}}">ENVIAR</button>
</form>



{{-- @if($errors->any())
<div style="position:absolute; top:0px; left:0px; width:100%; background:red;">
          @foreach ($errors->all() as $erro)
               {{$erro}}
               <br/>
          @endforeach          
          <pre>
                    {{ print_r($errors) }}
          </pre>
</div>
@endif --}}