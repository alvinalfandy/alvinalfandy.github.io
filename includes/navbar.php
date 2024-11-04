<nav class="navbar navbar-expand-md navbar-dark bg-dark" data-bs-theme="dark">
  <div class="container-fluid">
    <!-- Navbar Brand -->
    <a class="navbar-brand" href="?page=home">Menu:</a>

    <!-- Toggler for mobile view -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar content -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
        <!-- Home link -->
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="?page=home">Home</a>
        </li>
        <!-- About link -->
        <li class="nav-item">
          <a class="nav-link" href="?page=about">About</a>
        </li>
        <!-- Contact link -->
        <li class="nav-item">
          <a class="nav-link" href="?page=contact">Contact</a>
        </li>
        <!-- Dropdown for "Belajar" -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="belajarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Belajar
          </a>
          <ul class="dropdown-menu" aria-labelledby="belajarDropdown">
            <li><a class="dropdown-item" href="?page=datatables">Datatables</a></li>
            <li><a class="dropdown-item" href="#">Another Action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
      </ul>
      <!-- Search Form -->
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
