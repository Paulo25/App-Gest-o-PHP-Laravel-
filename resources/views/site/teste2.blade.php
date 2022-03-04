<h2>Fornecedor</h2>


{{ 'Texto de teste' }}

<?= 'Texto de teste' ?>

{{-- Fica o cometário que será descartado pelo interpretador do blade --}}

@php
          // para comentários de uma linha

          /*
            pata comentários de multiplas linhas 
          */

          echo 'Texto de teste';
@endphp

<?php 
echo 'Texto de teste'; 
?>


{{-- ---------------------------------------------------------------------------------------------------------- --}}

{{-- @dd($fornecedores) --}}

@if(count($fornecedores) > 0 && count($fornecedores) < 10)
  <h3>Existem alguns fornecedores cadastrados</h3>
@elseif(count($fornecedores) > 10)
  <h3>Existem vários fornecedores cadastrados</h3>
@else
  <h3>Ainda não existem fornecedores cadastrados</h3>
@endif

{{-- ---------------------------------------------------------------------------------------------------------- --}}

{{-- @dd($fornecedores2) --}}

Fornecedor: {{$fornecedores2[0]['nome']}}
<br/>
Status: {{$fornecedores2[0]['status']}}
<br/>
@if(($fornecedores2[0]['status'] == 'S'))  <!-- Com if o bloco é executado se a condição for true -->
 Fornecedor Inativo
@endif

@unless($fornecedores2[0]['status'] == 'S') <!-- Com unless o bloco é executado se a condição for false -->
 Fornecedor Inativo
@endunless

{{-- ---------------------------------------------------------------------------------------------------------- --}}


{{-- isset($variavel) //dentro de um operador de condição, isset retorna true se a variável estiver definida (existe)  --}}

@isset($fornecedores2)
<br/><br/>
está variável está definida - @isset($fornecedores2[1]['cnpj']) {{$fornecedores2[1]['cnpj']}}  @endisset
@endisset

<br/><br/>

@empty($fornecedores2[1]['cnpj']) 
- Vazio
@endempty


{{-- ---------------------------------------------------------------------------------------------------------- --}}

<!-- Operador condicional de valor Default (??) --> 
<br/><br/>
CNPJ: {{$fornecedores2[1]['cnpj'] ?? 'Dado testado possui o valor null ou a variável não está definida (isset)'}}

{{-- ---------------------------------------------------------------------------------------------------------- --}}
{{-- switch/case --}}
<br/><br/>
Telefone: ({{ $fornecedores2[2]['ddd'] ?? ''}}) {{ $fornecedores2[2]['telefone'] ?? ''}}
@switch($fornecedores2[2]['ddd'])
  @case('11')
        São Paulo - SP
      @break
  @case('32')
        Juiz de Fora - MG
      @break
  @case('85')
      Fortaleza - CE
    @break
  @default
      Estado não indentificado.
@endswitch

{{-- ---------------------------------------------------------------------------------------------------------- --}}
{{-- for no blade - é analogo do for nativo do php --}}
<br/><br/>
@for($i = 0; $i < 10; $i++)
  {{ $i }}  
@endfor
<br/><br/>

@for($i = 0; isset($fornecedores2[$i]); $i++)
Fornecedor: {{$fornecedores2[$i]['nome']}}
<br/>
Status: {{$fornecedores2[$i]['status']}}
<hr/>
@endfor


{{-- ---------------------------------------------------------------------------------------------------------- --}}
{{-- while no blade - é analogo do while nativo do php --}}
<br/><br/>

@php $i = 0 @endphp
@while(isset($fornecedores2[$i]))
    Fornecedor: {{$fornecedores2[$i]['nome']}}
    <br/>
    Status: {{$fornecedores2[$i]['status']}}
    <hr/>
    @php $i++ @endphp
@endwhile


{{-- ---------------------------------------------------------------------------------------------------------- --}}
{{-- foreach no blade - é analogo do foreach nativo do php --}}
<br/><br/>

@isset($fornecedores2)
  @foreach($fornecedores2 as $key => $fornecedor2)
      Fornecedor: {{$fornecedor2['nome']}}
      <br/>
      Status: {{$fornecedor2['status']}}
      <hr/>
  @endforeach
@endisset
 

 {{-- ---------------------------------------------------------------------------------------------------------- --}}
{{-- forelse no blade - é analogo do forelse nativo do php --}}
<br/><br/>

@isset($fornecedoresx)
  @forelse($fornecedoresx as $key => $fornecedorx)
  <br/>
      Fornecedor: {{$fornecedorx['nome']}}
      <br/>
      Status: {{$fornecedorx['status']}}
      <hr/>
       @empty
      Não existe fornecedores cadastrados!
  @endforelse
@endisset

{{-- ---------------------------------------------------------------------------------------------------------- --}}
{{-- foreach no blade - é analogo do foreach nativo do php --}}
<br/><br/>

@isset($fornecedores2)
  @foreach($fornecedores2 as $key => $fornecedor2)
@{{Iteração atual do laço:}} {{$loop->iteration}}
<br/>
Total de registro {{$loop->count}}
  <br/>
      Fornecedor: {{$fornecedor2['nome']}}
      <br/>
      Status: {{$fornecedor2['status']}}
      <br/>
      @if($loop->first)
        Primeira iteração do Loop
      @endif
       @if($loop->last)
        Ultima iteração do Loop
      @endif
      <hr/>
  @endforeach
@endisset