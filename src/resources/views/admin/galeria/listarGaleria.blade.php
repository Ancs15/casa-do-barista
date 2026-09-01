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
                            <p class="fs-7 text-secondary mb-0">4.2 MB · 3840×2160</p>
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
                                <a class="dropdown-item" href="#">Baixar</a>
                              </li>
                              <li>
                                <a class="dropdown-item" href="#">Renomear</a>
                              </li>
                              <li><hr class="dropdown-divider" /></li>
                              <li>
                                <a class="dropdown-item text-danger" href="#"> Deletar </a>
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
                  Exibindo {{ $listaGaleria->count() }} de {{ $listaGaleria->count() }} arquivos
                </span>
                <button type="button" class="btn btn-sm btn-primary">
                  <i class="bi bi-upload me-1" aria-hidden="true"></i> Upload
                </button>
              </div>
              <!--end::Card Footer-->
            </div>
            <!--end::Card-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
      </main>
      <!--end::App Main-->