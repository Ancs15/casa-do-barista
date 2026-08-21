      <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
        <!--begin::Sidebar Brand-->
        <div class="sidebar-brand">
          <!--begin::Brand Link-->
          <a href="./index.html" class="brand-link">
            <!--begin::Brand Image-->
            <img
              src="{{ asset('barista/img/logo.png') }}"
              alt="Casa do Barista"
              class="brand-image opacity-75 shadow"
            />
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <!--end::Brand Text-->
          </a>
          <!--end::Brand Link-->
        </div>
        <!--end::Sidebar Brand-->
        <!--begin::Sidebar Search-->
        <div class="sidebar-search" role="search">
          <label for="sidebar-search-input" class="visually-hidden">Filtrar Menu</label>
          <input
            type="search"
            id="sidebar-search-input"
            class="form-control form-control-sm"
            placeholder="Filtrar Menu…"
            autocomplete="off"
            data-lte-toggle="sidebar-search"
            data-lte-target="#navigation"
          />
          <p class="fs-7 text-secondary mt-2 mb-0" data-lte-search-empty role="status" hidden>
            Nenhuma página encontrada.
          </p>
        </div>
        <!--end::Sidebar Search-->
        <!--begin::Sidebar Wrapper-->
        <div class="sidebar-wrapper">
          <nav class="mt-2" aria-label="Main navigation">
            <!--begin::Sidebar Menu-->
            <ul
              class="nav sidebar-menu flex-column"
              data-lte-toggle="treeview"
              data-accordion="false"
              id="navigation"
            >
              <li class="nav-item menu-open">
                <a href="#" class="nav-link active">
                  <i class="nav-icon bi bi-window"></i>
                  <p>
                    Dashboard
                  </p>
                </a>
                <!-- <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="./index.html" class="nav-link active">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Dashboard v1</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./index2.html" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Dashboard v2</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./index3.html" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Dashboard v3</p>
                    </a>
                  </li>
                </ul> -->
              </li>
              <li class="nav-header">
                <h2>PRODUTOS</h2>
              </li>
              <li class="nav-item">
                <a href="./starter.html" class="nav-link">
                  <i class="nav-icon bi bi-cup-hot"></i>
                  <p>Produtos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./generate/theme.html" class="nav-link">
                  <i class="nav-icon bi bi-fork-knife"></i>
                  <p>Categorias</p>
                </a>
              </li>
              <li class="nav-header">
                <h2>VENDAS</h2>
              </li>
              <li class="nav-item">
                <a href="./starter.html" class="nav-link">
                  <i class="nav-icon bi bi-graph-up-arrow"></i>
                  <p>Vendas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./generate/theme.html" class="nav-link">
                  <i class="nav-icon bi bi-person-fill"></i>
                  <p>Clientes</p>
                </a>
              </li>
              <li class="nav-header">
                <h2>SITE</h2>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon bi bi-image-fill"></i>
                  <p>
                    Banner
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon bi bi-camera"></i>
                  <p>
                    Galeria
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon bi bi-star"></i>
                  <p>
                    Depoimentos
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon bi bi-calendar-range"></i>
                  <p>
                    Linha do Tempo
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon bi bi-newspaper"></i>
                  <p>
                    Newsletter
                  </p>
                </a>
              </li>
            </ul>
            <!--end::Sidebar Menu-->

            <!-- Docs CTA (bottom of sidebar) -->
            <div class="p-3 mt-3 border-top border-secondary border-opacity-25">
              <a
                href="./docs/introduction.html"
                class="btn btn-sm btn-outline-light w-100 d-flex align-items-center justify-content-center gap-2"
              >
                <i class="bi bi-book" aria-hidden="true"></i>
                View documentation
              </a>
            </div>
          </nav>
        </div>
        <!--end::Sidebar Wrapper-->
      </aside>