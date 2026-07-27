<section class="banner">
  @foreach ($listaBanner as $linha)
    <img src="{{ asset("barista/img/$linha->imagem_banner")}}" alt="{{ $linha->titulo_banner }}"> 
  @endforeach

  {{-- @forelse ($collection as $item)
      <img src="{{ asset("barista/img/$linha->imagem_banner")}}" alt="{{ $linha->titulo_banner }}">     
  @empty
      <h2>Nenhum banner encontrado</h2>
  @endforelse --}}

</section>