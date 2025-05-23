
<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="sidebar-sticky pt-3">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ $dashboard ?? '' }}" href="{{ url('/dashboard') }}">
            <span data-feather="home"></span>
            Главная страница <span class="sr-only">(current)</span>
          </a>
        </li>
      </ul>

      <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
        <span>Контент</span>
        <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
          <span data-feather="plus-circle"></span>
        </a>
      </h6>
      <ul class="nav flex-column mb-2">
        <li class="nav-item">
            <a class="nav-link {{ $schedule ?? '' }}" href="{{ url('/schedule') }}">
                <span data-feather="file-text"></span>
                Расписание
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $tours ?? '' }}" href="{{ url('/tours') }}">
                <span data-feather="file-text"></span>
                Маршруты
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $vir_tours ?? '' }}" href="{{ url('/vir-tours') }}">
                <span data-feather="file-text"></span>
                Вир-туры
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $blog ?? '' }}" href="{{ url('/blog') }}">
                <span data-feather="file-text"></span>
                Блог
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $faq ?? '' }}" href="{{ url('/faq') }}">
                <span data-feather="file-text"></span>
                FAQ
            </a>
        </li>
      </ul>
    </div>
</nav>
