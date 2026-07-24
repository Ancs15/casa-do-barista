    <section class="contato">
      <h2>Casa do Barista</h2>

      <div class="site">
        <!-- Texto -->
        <div class="contato-txt">
          <p>A Casa do Barista nasceu da vontade de unir pessoas através do simples e profundo ato de compartilhar uma xícara de café.</p>
          <p>acreditamos no poder das histórias que começam no campo, passam pelo barista e chegam até você em forma de aroma, sabor e sentimento.</p>
          <p>valorizamos pequenos produtores, técnicas artesanais e processos manuais que resgatam o verdadeiro significado do café brasileiro: riqueza cultural, dedicação e tradição.</p>
          <div>
            <div>
              <div>
                <h3>Nosso Endereço</h3>
                <h4>Av. Marechal Tito, 1500 <br> São Miguel Paulista</h4>
              </div>
              <div>
                <h3>Nossos E-Mails</h3>
                <a href="mailto:contato@email.com.br">contato@email.com.br</a>
                <a href="mailto:atendimento@email.com.br">atendimento@email.com.br</a>
              </div>
            </div>
            <div>
              <div>
                <h3>Nossos Telefones</h3>
                <a href="tel:+5511999999888">(11) 999-999-888</a>
                <a href="tel:+5511999888888">(11) 999-888-888</a>
              </div>
              <div>
                <h3>Siga-nos</h3>
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
            </div>
          </div>
        </div>
        <!-- Formulário -->
        <div class="contato-form">

          <form action="{{ route('contato') }}" method="post">
            <div>
              <input type="text" name="nome" placeholder="Nome Completo*" required>
            </div>
            <div>
              <input type="email" name="email" placeholder="E-Mail" required>
            </div>
            <div>
              <div>
                <input type="tel" name="fone" placeholder="Telefone: ">
              </div>
              <div>
                <select name="assunto">
                  <option value="" disabled selected hidden>Selecione o assunto</option>
                  <option value="Eventos">Eventos</option>
                  <option value="Café">Café</option>
                </select>
              </div>
            </div>
            <div>
                <textarea name="mens" cols="30" rows="10" placeholder="Digite sua mensagem" required></textarea>
            </div>
            <div>
                <button type="submit">Enviar Mensagem</button>
                <button type="reset">Limpar</button>
            </div>
          </form>

  



        </div>
      </div>

    </section>