      <!--begin::App Main-->
      <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6">
                <h1 class="mb-0 fs-3">Categorias</h1>
              </div>
              <div class="col-sm-6">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="{{ route('dash') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Categorias</li>
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
            <!--begin::Row-->
            <div class="row">
              <div class="col-12">
                <!--begin::Card-->
                <div class="card mb-4">
                  <!--begin::Card Header-->
                  <div class="card-header">
                    <div class="row g-2 align-items-center">
                      <div class="col-12 col-md-4">
                        <h3 class="card-title">Categorias cadastradas</h3>
                      </div>
                      <div class="col-12 col-md-8">
                        <div class="d-flex flex-wrap justify-content-md-end gap-2">
                          <div class="input-group input-group-sm w-auto">
                            <span class="input-group-text">
                              <i class="bi bi-search" aria-hidden="true"></i>
                            </span>
                            <input
                              type="search"
                              id="user-search"
                              class="form-control"
                              placeholder="Pesquisar Categorias"
                              aria-label="Pesquisar Categorias"
                              style="width: 180px"
                            />
                          </div>
                          <select
                            id="user-role-filter"
                            class="form-select form-select-sm w-auto"
                            aria-label="Filter by role"
                          >
                            <option value="all" selected>Todos</option>
                            <option value="ativo">Ativos</option>
                            <option value="inativo">Inativos</option>
                          </select>
                          <button
                            type="button"
                            class="btn btn-sm btn-primary"
                            data-bs-toggle="modal"
                            data-bs-target="#modal-add-user"
                          >
                            <i class="bi bi-person-plus-fill me-1" aria-hidden="true"> </i>
                            Nova Categoria
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!--end::Card Header-->
                  <!--begin::Card Body-->
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-hover align-middle m-0">
                        <thead>
                          <tr>
                            <th>Código</th>
                            <th>Categoria</th>
                            <th>Status</th>

                            <th class="text-end">
                              Ações
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                          @forelse ($listaCategorias as $categoria)
                              
                          
                          <tr>
                            <td>
                              {{--ID--}}
                              {{$categoria->id_categoria}}
                            </td>
                            {{--Nome--}}
                            <td>
                              {{$categoria->nome_categoria}}
                            </td>
                            {{--Status--}}
                            <td>
                              @if ($categoria->status_categoria === 'ATIVO')
                                  <span class="badge text-bg-success">Ativo</span>
                              @else
                                  <span class="badge text-bg-warning">Inativo</span>
                              @endif
                            </td>
                            <td class="text-end">
                              <div class="btn-group btn-group-sm">
                                <button
                                  type="button"
                                  class="btn btn-outline-secondary"
                                  data-bs-toggle="modal"
                                  data-bs-target="#modal-edit-categoria"
                                  data-id="{{ $categoria->id_categoria }}"
                                  data-nome="{{ $categoria->nome_categoria }}"
                                  data-status="{{ $categoria->status_categoria }}"
                                  data-url="{{ route('admin.categoria.update', $categoria->id_categoria) }}"
                                  aria-label="Editar"
                                >
                                  <i class="bi bi-pencil" aria-hidden="true"> </i>
                                </button>
                                <form 
                                  action="{{ route('admin.categoria.status', $categoria->id_categoria) }}" 
                                  method="POST" 
                                  class="d-inline"
                                >
                                @csrf
                                @method('PATCH')


                                  @if( $categoria->status_categoria === 'ATIVO')
                                  <button
                                    type="button"
                                    class="btn btn-outline-danger"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modal-status-categoria"
                                    title="Desativar categoria"
                                    data-nome="{{ $categoria->nome_categoria }}"
                                    data-status="{{ $categoria->status_categoria }}"
                                    data-url="{{ route('admin.categoria.status', $categoria->id_categoria) }}"
                                    aria-label="Deletar"
                                  >
                                    <i class="bi bi-eye-fill" aria-hidden="true"> </i>
                                  </button>
                                  @else
                                  <button
                                    type="button"
                                    class="btn btn-outline-success"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modal-status-categoria"
                                    title="Ativar categoria"
                                    data-nome="{{ $categoria->nome_categoria }}"
                                    data-status="{{ $categoria->status_categoria }}"
                                    data-url="{{ route('admin.categoria.status', $categoria->id_categoria) }}"
                                    aria-label="Deletar"
                                  >
                                    <i class="bi bi-eye-slash-fill" aria-hidden="true"> </i>
                                  </button>
                                  @endif
                                </form>
                              </div>
                            </td>
                          </tr>
                          @empty
                              
                          <tr>
                            <td
                                colspan="5"
                                class="text-center py-4 text-muted"
                            >
                              Nenhuma categoria cadastrada.
                            </td>
                          </tr>

                          @endforelse
                        </tbody>
                      </table>
                    </div>
                    <!-- /.table-responsive -->
                  </div>
                  <!--end::Card Body-->
                  <!--begin::Card Footer-->
                  <div class="card-footer clearfix">
                    <div class="float-start pt-1 fs-7 text-body-secondary">
                      Total de categorias:
                      <strong>
                          {{ $listaCategorias->count() }}
                      </strong>
                    </div>
                    <ul class="pagination pagination-sm m-0 float-end">
                      <li class="page-item disabled">
                        <a class="page-link" href="#" aria-label="Previous"> &laquo; </a>
                      </li>
                      <li class="page-item active">
                        <a class="page-link" href="#">1</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="#">2</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="#">3</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="#">4</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="#">5</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next"> &raquo; </a>
                      </li>
                    </ul>
                  </div>
                  <!--end::Card Footer-->
                </div>
                <!--end::Card-->
              </div>
              <!-- /.col -->
            </div>
            <!--end::Row-->

            <!--INÍCIO - MODAL CADASTRO CATEGORIA -->
            <div
              class="modal fade"
              id="modal-add-user"
              tabindex="-1"
              aria-labelledby="modal-add-user-label"
              aria-hidden="true"
            >
              <div class="modal-dialog">
                <div class="modal-content">
                  <form
                    action="{{ route('admin.categoria.store') }}"
                    method="POST"
                  >
                  @csrf
                    <div class="modal-header">
                      <h5 class="modal-title" id="modal-add-user-label">Adicionar nova categoria</h5>
                      <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                      ></button>
                    </div>
                    <div class="modal-body">
                      <div class="mb-3">
                        <label for="nome_categoria" class="form-label"> Nome da categoria </label>
                        <input
                          type="text"
                          class="form-control"
                          id="new-user-name"
                          placeholder="EX: Bebidas"
                          required
                          name="nome_categoria"
                        />
                      </div>
                      <div class="mb-3">
                        <label for="status_categoria" class="form-label"> Status: </label>
                        <select id="new-user-role" class="form-select" name="status_categoria">
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
            <!-- FIM - MODAL CADASTRO CATEGORIA -->

            <!-- INÍCIO - MODAL EDITAR CATEGORIA -->

            <div
              class="modal fade"
              id="modal-edit-categoria"
              tabindex="-1"
              aria-labelledby="modal-edit-categoria-label"
              aria-hidden="true"
            >
              <div class="modal-dialog">
                <div class="modal-content">
                  <form
                    id="form-edit-categoria"
                    method="POST"
                  >
                  @csrf
                  @method('PUT')
                    <div class="modal-header">
                      <h5 class="modal-title" id="modal-add-user-label">Editar categoria</h5>
                      <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                      ></button>
                    </div>
                    <div class="modal-body">
                      <div class="mb-3">
                        <label for="edit_nome_categoria" class="form-label"> Nome da categoria </label>
                        <input
                          type="text"
                          class="form-control"
                          id="edit_nome_categoria"
                          required
                          name="nome_categoria"
                        />
                      </div>
                      <div class="mb-3">
                        <label for="edit_status_categoria" class="form-label"> Status: </label>
                        <select id="edit_status_categoria" class="form-select" name="status_categoria">
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

             <!-- FIM - MODAL EDITAR CATEGORIA -->

            <!--INÍCIO - MODAL ATIVAR/DESATIVAR CATEGORIA -->
            <div
              class="modal fade"
              id="modal-status-categoria"
              tabindex="-1"
              aria-labelledby="modal-status-categoria-label"
              aria-hidden="true"
            >
              <div class="modal-dialog">
                <div class="modal-content">
                  <form 
                    id="form-status-categoria"
                    method="POST"
                  >
                  @csrf
                  @method('PATCH')

                    <div class="modal-header">
                      <h5 class="modal-title" id="modal-status-categoria-titulo">Alterar Status</h5>
                      <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                      ></button>
                    </div>
                    <div class="modal-body">
                      <p class="mb-0" id="modal-status-categoria-txt">
                        Você tem certeza de que deseja alterar o status desta categoria?
                      </p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Cancelar
                      </button>
                      <button type="submit" class="btn btn-danger" data-bs-dismiss="modal" id="btn-status-categoria">
                        Alterar Status
                      </button>
                    </div>

                  </form>
                </div>
              </div>
            </div>
            <!--FIM - MODAL ATIVAR/DESATIVAR CATEGORIA -->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
      </main>
      <!--end::App Main-->

      <!-- Script editar categoria -->
      <script>

        const modalEditarCategoria  = document.getElementById('modal-edit-categoria');
        const formEditarCategoria   = document.getElementById('form-edit-categoria');
        const editNome              = document.getElementById('edit_nome_categoria');
        const editStatus            = document.getElementById('edit_status_categoria');

        modalEditarCategoria.addEventListener('show.bs.modal', function(event){

          const botao = event.relatedTarget;

          const id      = botao.getAttribute('data-id');
          const nome    = botao.getAttribute('data-nome');
          const status  = botao.getAttribute('data-status');
          const url     = botao.getAttribute('data-url');

          formEditarCategoria.action = url;

          editNome.value = nome;
          editStatus.value = status;


        });

      </script>
      <!-- Fim script editar categoria -->

      <!-- Script ativar/desativar categoria -->
      <script>

        const modalStatusCategoria = document.getElementById('modal-status-categoria');
        const formStatusCategoria = document.getElementById('form-status-categoria');
        const btnStatusCategoria = document.getElementById('btn-status-categoria');
        const StatusCategoriaTitulo = document.getElementById('modal-status-categoria-titulo');
        const StatusCategoriaTxt = document.getElementById('modal-status-categoria-txt');

        modalStatusCategoria.addEventListener('show.bs.modal', function(event){

          const botao = event.relatedTarget;

          const nome = botao.getAttribute('data-nome');
          const status = botao.getAttribute('data-status');
          const url = botao.getAttribute('data-url');

          formStatusCategoria.action = url;

          if(status === 'ATIVO'){

            StatusCategoriaTitulo.textContent = 'Desativar Categoria';
            StatusCategoriaTxt.textContent = 'Você tem certeza de que deseja desativar a categoria?'
            btnStatusCategoria.textContent = 'Desativar';

            btnStatusCategoria.className = 'btn btn-warning';

          } else {

            StatusCategoriaTitulo.textContent = 'Ativar Categoria';
            StatusCategoriaTxt.textContent = 'Você tem certeza de que deseja ativar a categoria?'
            btnStatusCategoria.textContent = 'Ativar';

            btnStatusCategoria.className = 'btn btn-success';

          }

        });

      </script>
      <!-- Fim script ativar/desativar categoria -->

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