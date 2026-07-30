    <section class="depoimentos wow animate__animated animate__fadeInUp">
      <div class="parallax-padrao">
        <h3>Depoimentos</h3>
        <h2>Nada nos inspira mais do que ouvir a experiência de quem passa por aqui</h2>
      </div>
      <div class="site dep-cards slideDepoimentos">

        @forelse ($listaDepo as $linha)

        @php

          // Garantir que as estrelas fique entre 0 e 5
          $estrela = max(
            0,
            min(5, (int) $linha->nota_depoimento)
          );

          // Cliente relacionado com o Depoimento
          $cliente = $linha->depoimentoCliente;
          
        @endphp

          <article>
            <div class="estrelas">

              @for($i = 1; $i <= 5; $i++)

              <img class="{{ $i <= $estrela ? 'estrela-ativa' : 'estrela-inativa'}}" src="{{ asset('barista/img/estrela.png') }}" alt="{{ $i <= $estrela ? 'Estrela preenchida' : 'Estrela não preenchida'}}">
              @endfor
              
            </div>
            <p>"{{ $linha->descricao_depoimento }}"</p>
            <img src="{{ asset("barista/img/" . $cliente->foto_cliente) }}" alt="{{ $cliente->nome_cliente }}">
            <h5>{{ $cliente->nome_cliente }}</h5>
            <div class="data-local">
              <!-- ? = verdadeiro -->
              <!-- : = falso -->

              <h4>Data: {{ $linha->data_criacao_depoimento ? $linha->data_criacao_depoimento->format('d/m/Y') : 'Data não encontrada' }}<span>{{ $linha->titulo_depoimento }}</span></h4>
            </div>
          </article> 
        @empty
            
        @endforelse              

      </div>
    </section>