      <!--begin::App Main-->
      <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6">
                <h1 class="mb-0 fs-3">Galeria</h1>
              </div>
              <div class="col-sm-6">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="{{ route('dash')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Galeria</li>
                  </ol>
                </nav>
              </div>
            </div>
            <!--end::Row-->

            @if(session('sucesso'))
              {{-- ALERTA DE SUCESSO --}}
              <div class="alert alert-success" role="alert">
                <i class="bi bi-check-circle-fill"></i>
                {{ session('sucesso') }}
              </div>
            @elseif (session('erro'))
              {{-- ALERTA DE ERRO --}}
              <div class="alert alert-danger" role="alert">
                <i class="bi bi-exclamation-circle-fill"></i>
                {{ session('erro') }}
              </div>
            @endif
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content Header-->
        <!--begin::App Content-->
        <div class="app-content">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Card-->
            <div class="card">
              <!--begin::Card Header-->
              <div class="card-header d-flex flex-wrap align-items-center gap-2">
                <div class="card-title">Biblioteca de Imagens</div>
                <div class="card-tools">
                  <div
                    class="btn-group btn-group-sm"
                    role="group"
                    aria-label="Filter by category"
                    id="gallery-filters"
                  >
                    <button
                      type="button"
                      class="btn btn-primary"
                      data-gallery-filter="todos"
                      aria-pressed="true"
                    >
                      Todos</button
                    ><button
                      type="button"
                      class="btn btn-outline-primary"
                      data-gallery-filter="ativos"
                      aria-pressed="false"
                    >
                      Ativos</button
                    ><button
                      type="button"
                      class="btn btn-outline-primary"
                      data-gallery-filter="inativos"
                      aria-pressed="false"
                    >
                      Inativos</button
                    >
                  </div>
                </div>
              </div>
              <!--end::Card Header-->
              <!--begin::Card Body-->
              <div class="card-body">
                <!--begin::Gallery Grid-->
                <div
                  class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xxl-4 g-3"
                  id="gallery-grid"
                >

                  @forelse ($listaGaleria as $galeria)
                    <div 
                      class="col"
                      @if ($galeria->status_galeria === 'ATIVO')
                        data-gallery-item="ativos"
                      @else
                        data-gallery-item="inativos"  
                      @endif 
                      >
                      <figure class="card h-100 mb-0">
                        <div class="ratio ratio-4x3">
                          <img
                            src="{{ asset('barista/img/' . $galeria->imagem_galeria) }}"
                            alt="{{ $galeria->nome_galeria }}"
                            class="card-img-top object-fit-cover"
                            loading="lazy"
                          />
                        </div>
                        <figcaption class="card-body d-flex align-items-start gap-2 py-2">
                          <div class="flex-grow-1 overflow-hidden">
                            <p class="fw-semibold mb-0 text-truncate">{{ $galeria->nome_galeria }}</p>
                            @if($galeria->status_galeria === 'ATIVO')
                              <p class="fs-7 badge text-bg-success">Ativo</p>
                            @else
                              <p class="fs-7 badge text-bg-warning">Inativo</p>
                            @endif
                          </div>
                          <div class="dropdown flex-shrink-0">
                            <button
                              class="btn btn-tool"
                              type="button"
                              data-bs-toggle="dropdown"
                              aria-expanded="false"
                              aria-label="Actions for {{ $galeria->nome_galeria }}"
                            >
                              <i class="bi bi-three-dots-vertical" aria-hidden="true"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                              <li>
                                <button 
                                  type="button"
                                  data-bs-toggle="modal"
                                  data-bs-target="#modal-edit-imagem"
                                  class="dropdown-item"
                                  data-id="{{$galeria->id_galeria}}"
                                  data-nome="{{$galeria->nome_galeria}}"
                                  data-status="{{$galeria->status_galeria}}"
                                  data-imagem="{{ asset('barista/img/' . $galeria->imagem_galeria) }}"
                                  data-url="{{ route('admin.galeria.status', $galeria->id_galeria)}}"
                                  aria-label="Editar"
                                >
                                  Editar
                                </button>
                              </li>
                              <li><hr class="dropdown-divider" /></li>
                              <li>
                                <form 
                                  action="{{ route('admin.galeria.status', $galeria->id_galeria) }}"
                                  method="POST"
                                  class="d-inline"
                                >
                                @csrf
                                @method('PATCH')

                                @if($galeria->status_galeria === 'ATIVO')
                                  <button
                                    type="button"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modal-status-imagem"
                                    class="dropdown-item text-danger"
                                    data-id="{{$galeria->id_galeria}}"
                                    data-nome="{{$galeria->nome_galeria}}"
                                    data-status="{{$galeria->status_galeria}}"
                                    data-imagem="{{ asset('barista/img/' . $galeria->imagem_galeria) }}"
                                    data-url="{{ route('admin.galeria.status', $galeria->id_galeria) }}"
                                    aria-label="Deletar">
                                    Desativar 
                                  </button>
                                @else
                                  <button 
                                    type="button"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modal-status-imagem"
                                    class="dropdown-item text-success"
                                    data-id="{{$galeria->id_galeria}}"
                                    data-nome="{{$galeria->nome_galeria}}"
                                    data-status="{{$galeria->status_galeria}}"
                                    data-imagem="{{ asset('barista/img/' . $galeria->imagem_galeria) }}"
                                    data-url="{{ route('admin.galeria.status', $galeria->id_galeria) }}"
                                    aria-label="Deletar">
                                    Ativar 
                                  </button>
                                @endif
                                </form>
                              </li>
                            </ul>
                          </div>
                        </figcaption>
                      </figure>
                    </div>
                  @empty

                  @endforelse
                </div>
                <!--end::Gallery Grid-->
                <!--begin::Empty State-->
                <p class="text-secondary text-center my-5" id="gallery-empty" role="status" hidden>
                  Nenhuma imagem cadastrada
                </p>
                <!--end::Empty State-->
              </div>
              <!--end::Card Body-->
              <!--begin::Card Footer-->
              <div
                class="card-footer d-flex flex-wrap justify-content-between align-items-center gap-2"
              >
                <span class="fs-7 text-body-secondary" id="gallery-count" aria-live="polite">
                  Exibindo <strong>{{ $listaGaleria->count() }}</strong> de <strong>{{ $listaGaleria->count() }}</strong> arquivos
                </span>
                <button 
                  type="button" 
                  class="btn btn-sm btn-primary"
                  data-bs-toggle="modal"
                  data-bs-target="#modal-upload-imagem"
                >
                  <i class="bi bi-upload me-1" aria-hidden="true"></i> Upload
                </button>
              </div>
              <!--end::Card Footer-->
            </div>
            <!--end::Card-->
            <!--INÍCIO - MODAL CADASTRO IMAGEM-->
            <div
              class="modal fade"
              id="modal-upload-imagem"
              tabindex="-1"
              aria-labelledby="modal-upload-imagem-label"
              aria-hidden="true"
            >
              <div class="modal-dialog">
                <div class="modal-content">
                  
                <!-- FORM DE CADASTRO -->
                 <!-- Action serve para: definir a rota -->
                 <!-- Method serve para: definir o método HTTP -->
                 <!-- enctype serve para: permitir upload de arquivos -->
                 <!-- @csrf serve para: gerar token de segurança - USAR EM TODO FORMULÁRIO -->
                <form
                action=" {{ route('admin.galeria.store') }}"
                method="POST"
                enctype="multipart/form-data">
                @csrf

                    <div class="modal-header">
                      <h5 class="modal-title" id="modal-upload-imagem-label">Cadastrar nova IMAGEM</h5>
                      <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                      ></button>
                    </div>
                    <div class="modal-body">
                      <div class="mb-3">
                        <label for="nome_galeria" class="form-label"> Título da imagem </label>
                        <input
                          type="text"
                          class="form-control"
                          id="nome_galeria"
                          placeholder="Ex: Café da Manhã"
                          required
                          name="nome_galeria"
                        />
                      </div>
                      <div class="mb-3">
                        <label for="imagem_galeria" class="form-label"> Selecione uma imagem </label>
                        <input type="file" class="form-control input-banner" id="imagem_galeria" name="imagem_galeria"  accept="image/*" required
                        />
                        
                        <label for="imagem_galeria" class="galeria-upload">

                          <img id="ver-galeria" src="{{ asset('barista/img/galeria/imagem-vazia.svg') }}" alt="Selecione uma imagem para a galeria">

                          <div class="galeria-upload">
                            <i class="bi bi-image"></i>
                            <span>Clique para selecionar a imagem</span>
                          </div>

                        </label>
                      </div>
                      <div class="mb-3">
                        <label for="status_galeria" class="form-label"> Status </label>
                        <select id="status_galeria" class="form-select" name="status_galeria">
                          <option value="ATIVO">Ativo</option>
                          <option value="INATIVO">Inativo</option>
                        </select>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Cancelar
                      </button>
                      <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- FIM - MODAL CADASTRO IMAGEM -->

            <!--INÍCIO - MODAL EDITAR IMAGEM-->
            <div
              class="modal fade"
              id="modal-edit-imagem"
              tabindex="-1"
              aria-labelledby="modal-edit-imagem-label"
              aria-hidden="true"
            >
              <div class="modal-dialog">
                <div class="modal-content">
                  
                <!-- FORM DE CADASTRO -->
                 <!-- Action serve para: definir a rota -->
                 <!-- Method serve para: definir o método HTTP -->
                 <!-- enctype serve para: permitir upload de arquivos -->
                 <!-- @csrf serve para: gerar token de segurança - USAR EM TODO FORMULÁRIO -->
                <form
                id="form-edit-imagem"
                method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                    <div class="modal-header">
                      <h5 class="modal-title" id="modal-upload-imagem-label">Editar IMAGEM</h5>
                      <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                      ></button>
                    </div>
                    <div class="modal-body">
                      <div class="mb-3">
                        <label for="editar-galeria-titulo" class="form-label"> Título da imagem </label>
                        <input
                          type="text"
                          class="form-control"
                          id="editar-galeria-titulo"
                          required
                          name="nome_galeria"
                        />
                      </div>
                      <div class="mb-3">
                        <label for="editar-galeria-imagem" class="form-label"> Selecione uma imagem </label>
                        <input type="file" class="form-control input-banner" id="editar-galeria-imagem" name="imagem_galeria"  accept="image/*"
                        />
                        
                        <label for="editar-galeria-imagem" class="galeria-upload">

                          <img id="editar-galeria-mostrar" src="" alt="imagem">

                          <div class="galeria-upload">
                            <i class="bi bi-image"></i>
                            <span>Deixe vazio para manter a imagem atual.</span>
                          </div>

                        </label>
                      </div>
                      <div class="mb-3">
                        <label for="editar-galeria-status" class="form-label"> Status </label>
                        <select id="editar-galeria-status" class="form-select" name="status_galeria">
                          <option value="ATIVO">Ativo</option>
                          <option value="INATIVO">Inativo</option>
                        </select>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Cancelar
                      </button>
                      <button type="submit" class="btn btn-primary">Atualizar</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- FIM - MODAL EDITAR IMAGEM -->

            <!--INÍCIO MODAL STATUS GALERIA-->
            <div
              class="modal fade"
              id="modal-status-imagem"
              tabindex="-1"
              aria-labelledby="modal-status-imagem-label"
              aria-hidden="true"
            >
              <div class="modal-dialog">
                <div class="modal-content">

                  <form id="form-status-imagem" method="POST">
                    @csrf
                    @method('PATCH')

                    <div class="modal-header">
                      <h5 class="modal-title" id="modal-status-imagem-titulo">Alterar status da IMAGEM</h5>
                      <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                      ></button>
                    </div>

                    <div class="modal-body">
                      <p class="mb-0" id="modal-status-imagem-txt">
                        Tem certeza de que deseja alterar o status da imagem? <br>
                      </p>
                    </div>
                    
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Cancelar
                      </button>
                      <button type="submit" class="btn btn-danger" data-bs-dismiss="modal" id="btn-status-imagem">
                        Confirmar
                      </button>
                    </div>

                  </form>
                </div>
              </div>
            </div>
            <!--FIM MODAL STATUS GALERIA -->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
      </main>
      <!--end::App Main-->

      <!-- Carregando a foto do modal cadastrar -->
      <script>
        const inputGaleria = document.getElementById('imagem_galeria');
        const previewGaleria = document.getElementById('ver-galeria');
    
        inputGaleria.addEventListener('change', function() {
    
            const arquivo = this.files[0];
    
            if (arquivo) {
    
                previewGaleria.src = URL.createObjectURL(arquivo);
    
            }
    
        });
      </script>

      <!-- script editar imagem -->
      <script>
        // document = seleciona dentro de todo o site
        // getElementBy ID = seleciona um ID específico dentro do site
        const modalEditarImagem = document.getElementById('modal-edit-imagem');
        const formEditImagem    = document.getElementById('form-edit-imagem');
        // const editId            = document.getElementById('edit-banner-id');
        const editTitulo        = document.getElementById('editar-galeria-titulo');
        const editStatus        = document.getElementById('editar-galeria-status');
        const editImagem        = document.getElementById('editar-galeria-imagem');
        const editMostrar       = document.getElementById('editar-galeria-mostrar');

        // Carregar as informações no modal
        modalEditarImagem.addEventListener('show.bs.modal', function(event){

          const botao  = event.relatedTarget;

          const id     = botao.getAttribute('data-id');
          const nome   = botao.getAttribute('data-nome');
          const status = botao.getAttribute('data-status');
          const imagem = botao.getAttribute('data-imagem');
          const url    = botao.getAttribute('data-url');

          // Form Action
          formEditImagem.action = url;

          // Preencher
          editTitulo.value = nome;
          editStatus.value = status;
          editMostrar.src  = imagem;

          // Imagem vem vazia
          editImagem.value = '';

        })

        //VER FOTO PARA EDITAR
        editImagem.addEventListener('change', function() {
    
            const arquivo = this.files[0];
    
            if (arquivo) {
    
                editMostrar.src = URL.createObjectURL(arquivo);
    
            }
    
        });


      </script>

      <!-- Ativar e Desativar Galeria -->
      <script>

        // Mapeia os CAMPOS do Modal
        const modalStatusImagem   = document.getElementById('modal-status-imagem');
        const formStatusImagem    = document.getElementById('form-status-imagem');
        const tituloStatusImagem  = document.getElementById('modal-status-imagem-titulo');
        const txtStatusImagem     = document.getElementById('modal-status-imagem-txt');
        const btnStatusImagem     = document.getElementById('btn-status-imagem');


        // Dispara o evento quando o MODAL for ATIVADO com as informações do BOTÃO
        modalStatusImagem.addEventListener('show.bs.modal', function(event){


          const botao = event.relatedTarget;

          const url       = botao.getAttribute('data-url');
          const titulo    = botao.getAttribute('data-titulo');
          const status    = botao.getAttribute('data-status');

          formStatusImagem.action = url;

          if(status === 'ATIVO'){

            tituloStatusImagem.textContent = 'Desativar Status da IMAGEM';
            txtStatusImagem.textContent = 'Tem certeza que deseja desativar o status da imagem?';
            btnStatusImagem.textContent = 'Desativar';

            btnStatusImagem.className = 'btn btn-warning';

          }else{

            tituloStatusImagem.textContent = 'Ativar Status da IMAGEM';
            txtStatusImagem.textContent = 'Tem certeza que deseja ativar o status da imagem?';
            btnStatusImagem.textContent = 'Ativar';

            btnStatusImagem.className = 'btn btn-success';
          };

        });
        
      </script>

      <!-- Timer do aviso -->
      <script>

        setTimeout(() => {
          
          const alertas = document.querySelectorAll('.alert');
          alertas.forEach(alerta => {

            const instancia = bootstrap.Alert.getOrCreateInstance(alerta);

            instancia.close();

          })

        }, 5000);

      </script>