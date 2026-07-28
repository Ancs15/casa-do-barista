    <section class="galeria wow animate__animated animate__fadeInUp">
      <div class="parallax-padrao">
        <h3>Galeria</h3>
        <h2>Um retrato da nossa essência</h2>
      </div>
      <div class="gal-cards slideGaleria">
        @foreach( $listaGaleria as $linha)
          <img src="{{ asset('barista/img/' . $linha->imagem_galeria) }}" alt="{{ $linha->nome_galeria }}">
        @endforeach
      </div>
    </section>