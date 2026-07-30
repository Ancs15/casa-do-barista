@extends('layout.site')

@section('content')
    <section class="cardapio">
      <div class="parallax-padrao wow animate__animated animate__fadeInUp">
        <h3>Cardápio | {{ $categoriaSelecionada->nome_categoria }}</h3>

        <nav>
            <ul class="btn-categoria">
                @foreach ($listaCategorias as $linha)

                    <li class="btn-cardapio">
                        <a class="btn" href="{{ route('cardapio.categoria',$linha->id_categoria) }}">{{ $linha->nome_categoria }}</a>
                    </li>

                @endforeach
            </ul>
        </nav>
      </div>

      <div class="site car-cards">
        @foreach ($produtos as $linha)

            <div class="card-flip wow animate__animated animate__fadeInUp">

                <article class="card-flip-miolo">
                    <div class="flip-front">
                        <h4>{{ $linha->nome_produto }}</h4>
                    </div>
                    <div class="flip-back">
                        <h4>{{ $linha->nome_produto }} <span>{{ number_format( $linha->valor_produto, 2, ',', '.' ) }}</span></h4>
                        <h5>{{ $linha->descricao_curta_produto }}
                        </h5>
                    </div>
                </article>
            
            </div>

        @endforeach
      </div>
    </section>

    <!-- INÍCIO DA GALERIA -->
    @include('site.home.galeria')
    <!-- FIM DA GALERIA -->
@endsection