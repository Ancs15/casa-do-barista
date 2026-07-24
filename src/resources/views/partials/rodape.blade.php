<footer class="rodape">
    <section class="site rodape-grid">
      <div class="coluna-end">
        <h3>Nosso Endereço</h3>
        <address>
          Av. Marechal Tito, 1500<br>
          São Miguel Paulista
        </address>
        <a href="{{ route('home') }}">Mapa</a>
      </div>

      <div class="coluna-reserve">
        <div class="box-reserva">
          <h3>Faça sua reserva</h3>
          <div class="linha-box">
            <hr>
            <img src="{{ asset('barista/img/coffee-rodape.svg') }}" alt="Faça sua reserva">
            <hr>
          </div>
          <ul>
            <li>Segunda - Sexta <span>09:00-00:00</span></li>
            <li>Sábado <span>08:00 - 00:00</span></li>
            <li>Domingo <span>16:00 - 00:00</span></li>
            <li>Feriado <span>16:00 - 02:00</span></li>
          </ul>
          <a href="#" class="btn">Reserve</a>
        </div>

        <div class="box-email">
        <p>Informe seu email para receber as novidades e promoções da Casa do Barista</p>
        <!-- FORMS NECESSARIAMENTE PRECISAM TER ACTION E METHOD. -->
        <form action="#" method="post">
          <label for="email">Inscreva-se</label>
          <input type="email" name="email" id="email" placeholder="Informe seu email">
          <button type="submit" aria-label="Enviar">
            <img src="{{ asset('barista/img/seta-direita.png') }}" alt="Botão Enviar">
          </button>
        </form>
        </div>
      </div> 

      <div class="coluna-contato">
        <h3>Contate-nos</h3>
        <a class="link-contato" href="mailto:contato@email.com.br">contato@email.com.br</a>
        <a class="link-contato" href="tel:++11999999888">(11)999-999-888</a>

        <ul class="rede-social">
          <li>
            <a href="#" target="_blank">
              <img src="{{ asset('barista/img/facebook-24.png') }}" alt="Logo Facebook - Casa do Barista">
            </a>
          </li>
          <li>
            <a href="#" target="_blank">
              <img src="{{ asset('barista/img/instagram-24.png') }}" alt="Logo Instagram - Casa do Barista">
            </a>
          </li>
          <li>
            <a href="#" target="_blank">
              <img src="{{ asset('barista/img/linkedin-24.png') }}" alt="Logo LinkedIn - Casa do Barista">
            </a>
          </li>
          <li>
            <a href="https://wa.me/551199999999" target="_blank">
              <img src="{{ asset('barista/img/whatsapp-24.png') }}" alt="Logo WhatsApp - Casa do Barista">
            </a>
          </li>
        </ul>
      </div>

    </section>
    <div class="barra-final">
      <p>© {{ date('Y') }} - Criado e Desenvolvido por TIPI06 - Senac SMP</p>
    </div>
</footer>