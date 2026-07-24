  <header class="topo" id="topoFixo">
    <div class="site">
      <h1>Casa do Barista</h1>
      <!-- MENU -->
       <button class="abrir-menu"></button>
      <nav class="menu">
        <button class="fechar-menu"></button>
        <ul>
          <li><a class="menu-ativo" href="{{ route('home') }}">Home</a></li>
          <li><a href="{{ route('sobre') }}">Sobre</a></li>
          <li><a href="{{ route('cardapio') }}">Cardápio</a></li>
          <li><a href="{{ route('eventos') }}">Eventos</a></li>
          <li><a href="{{ route('contato') }}">Contato</a></li>
        </ul>

        <div class="rede-login">
          <a href="#" class="login">
            <img src="{{ asset('barista/img/login.png') }}" alt="Login Casa do Barista">
          </a>
          <ul class="rede-social">
            <li><a href="#" target="_blank"><img src="{{ asset('barista/img/facebook-24.png') }}" alt="Logo Facebook - Casa do Barista"></a></li>
            <li><a href="#" target="_blank"><img src="{{ asset('barista/img/instagram-24.png') }}" alt="Logo Instagram - Casa do Barista"></a></li>
            <li><a href="https://wa.me/551199999999" target="_blank"><img src="{{ asset('barista/img/whatsapp-24.png') }}" alt="Logo WhatsApp - Casa do Barista"></a></li>
          </ul>
        </div>

        <!-- GERAR LINK PARA O WSPP PELO CHAT-GPT POR EXEMPLO -->
      </nav>
    </div>
  </header>