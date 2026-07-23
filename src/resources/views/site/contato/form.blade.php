    <section class="contato">
      <h2>Casa do Barista</h2>
      <h3 class="wow animate__animated animate__fadeInUp">

        

        <?php
        // if ($ok == 1) {
          // echo $nome . ", sua mensagem foi enviada com sucesso";
        // } elseif ($ok == 2) {
          // echo $nome . ", não foi possível enviar sua mensagem";
        // }

        ?>
      </h3>

      <div class="site">

        <!-- Texto -->

        <div class="contato-txt">


          <p>
            a casa do barista nasceu da vontade de unir pessoas através de algo simples e profundo: o ato de
            compartilhar uma xí­cara de café.
          </p>
          <p>
            acreditamos no poder das histórias que começam no campo, passam pelo barista e chegam até vocês em forma de
            aroma, sabor e sentimento.
          </p>
          <p>
            valorizamos pequenos produtores, técnicas artesanais e processos manuais que resgatam o verdadeiro
            significado do café brasileiro: riqueza cultural,dedicação e tradição.
          </p>
          <div>
            <div>

              <div>
                <h3>Nosso Endereço</h3>
                <h4>Av marachal tito, 1500 <br>São Miguel Paulista</h4>

              </div>

              <div class="emails">
                <h3>Nossos Emails</h3>
                <a href="mailto:contato@email.com.br"> contato@email.com.br</a>
                <a href="mailto:atendimento@email.com.br">atendimento@email.com.br</a>

              </div>

            </div>

            <div>
              <div class="telefone">
                <h3>Nossos Telefones</h3>
                <a href="tel:+5511999999888"> (11) 999-999-888</a>
                <a href="tel:+5511999999888">(11) 999-999-888 </a>

              </div>

              <div>
                <h3>Siga-nos</h3>
                <ul class="rede-social">

                  <li><a href="#" target="_blank"><img src="{{asset('barista/img/facebook-24.png')}}" alt="Logo facebook"></a></li>

                  <li><a href="#" target="_blank"><img src="{{asset('barista/img/instagram-24.png')}}" alt="Logo instagram"></a></li>

                  <li><a href="#" target="_blank"><img src="{{asset('barista/img/linkedin-24.png')}}" alt="Logo linkedin"></a></li>

                  <li><a href="https://wa.me/5511999999999" target="_blank"><img src="{{asset('barista/img/whatsapp-24.png')}}"
                        alt="Logo whatsapp"></a></li>

                </ul>


              </div>

            </div>
          </div>

        </div>


        <!-- Form -->

        <div class="contato-form">
          <h2>Formulario de contato</h2>

          <form class="form-contato" action="{{route('home')}}" method="POST">
            <div class="campo-linha">
              <input type="text" name="nome" placeholder="NOME COMPLETO*" required>
            </div>

            <div class="campo-linha">
              <input type="email" name="email" placeholder="E-MAIL*" required>
            </div>

            <div class="campo-duplo">
              <div class="campo-linha">
                <input type="tel" name="fone" placeholder="TELEFONE" required>
              </div>
              <div class="campo-linha">
                <select name="assunto" required>
                  <option value="" disabled selected>ASSUNTO</option>
                  <option value="cafe">CAFÉ</option>
                  <option value="expresso">EXPRESSO</option>
                </select>
              </div>
            </div>

            <div class="campo-linha">
              <textarea name="mens" cols="30" rows="10" placeholder="MENSAGEM*" required></textarea>
            </div>

            <div class="acoes-form">
              <button type="submit">ENVIAR MENSAGEM</button>
              <button type="reset">LIMPAR</button>
            </div>
          </form>
        </div>

      </div>

    </section>