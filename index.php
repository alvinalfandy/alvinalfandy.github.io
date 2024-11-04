<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>One Piece - Dynamic Website</title>

  <!-- Bootstrap CSS -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <!-- DataTables CSS -->
  <link href="assets/datatables/dataTables.dataTables.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

  <style>
    /* Custom CSS */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

    :root {
      --primary: #D32F2F;
      --secondary: #FDD835;
      --accent: #ff9800;
      --dark: #1a1a1a;
      --light: #ffffff;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body {
      background: url('https://i.pinimg.com/originals/bf/82/f6/bf82f6956a32819af48c2572243e8286.jpg') fixed;
      background-size: cover;
      position: relative;
      overflow-x: hidden;
    }

    body::before {
      content: '';
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.7);
      z-index: -1;
    }

    /* Navbar Styling */
    .navbar {
      background: linear-gradient(90deg, #D32F2F 0%, #B71C1C 100%) !important;
    }

    /* home.php */
    .hero-section {
      padding: 100px 0;
      text-align: center;
      color: var(--light);
      margin-bottom: 50px;
    }

    .profile-card {
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(10px);
      border-radius: 15px;
      padding: 30px;
      color: var(--light);
      margin-bottom: 50px;
      border: 1px solid rgba(255, 255, 255, 0.2);
      transition: transform 0.3s ease;
    }

    .profile-card:hover {
      transform: translateY(-5px);
    }

    .profile-image {
      width: 200px;
      height: 200px;
      border-radius: 50%;
      margin: 0 auto 20px;
      border: 5px solid var(--secondary);
      object-fit: cover;
    }

    .feature-card {
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(10px);
      border-radius: 15px;
      padding: 30px;
      margin-bottom: 30px;
      color: var(--light);
      border: 1px solid rgba(255, 255, 255, 0.2);
      transition: transform 0.3s ease;
    }

    .feature-card:hover {
      transform: translateY(-5px);
    }

    .feature-icon {
      font-size: 3rem;
      color: var(--secondary);
      margin-bottom: 20px;
    }

    /* Navbar Components */
    .navbar-brand {
      font-size: 1.8rem;
      font-weight: 700;
      color: var(--secondary) !important;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .navbar-brand img {
      width: 40px;
      height: auto;
    }

    .nav-link {
      color: var(--light) !important;
      font-weight: 500;
      padding: 10px 20px !important;
      transition: all 0.3s ease;
      position: relative;
    }

    .nav-link::after {
      content: '';
      position: absolute;
      width: 0;
      height: 2px;
      bottom: 5px;
      left: 50%;
      transform: translateX(-50%);
      background-color: var(--secondary);
      transition: width 0.3s ease;
    }

    .nav-link:hover::after {
      width: 80%;
    }

    .nav-link.active::after {
      width: 80%;
    }

    /* DataTables Styling */
    #example {
      background: rgba(255, 255, 255, 0.9);
      border-radius: 10px;
      margin: 20px 0;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }

    #example thead {
      background: linear-gradient(90deg, #D32F2F 0%, #B71C1C 100%);
    }

    #example thead th {
      color: #FDD835 !important;
      font-weight: 600;
      font-size: 1.1rem;
      padding: 15px;
      border-bottom: none;
    }

    #example tbody td {
      font-size: 1rem;
      padding: 12px;
      color: #333;
      border-bottom: 1px solid rgba(0, 0, 0, 0.1);
    }

    #example tbody tr:hover {
      background: rgba(211, 47, 47, 0.1) !important;
    }

    /* DataTables Controls */
    .dataTables_wrapper .dataTables_length,
    .dataTables_wrapper .dataTables_filter,
    .dataTables_wrapper .dataTables_info,
    .dataTables_wrapper .dataTables_processing,
    .dataTables_wrapper .dataTables_paginate {
      color: #fff !important;
      margin: 15px 0;
    }

    .dataTables_wrapper .dataTables_length select,
    .dataTables_wrapper .dataTables_filter input {
      background: rgba(255, 255, 255, 0.1);
      border: 1px solid rgba(255, 255, 255, 0.2);
      border-radius: 5px;
      color: #fff;
      padding: 5px 10px;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button {
      background: rgba(255, 255, 255, 0.1) !important;
      border: 1px solid rgba(255, 255, 255, 0.2) !important;
      border-radius: 5px;
      color: #fff !important;
      margin: 0 5px;
      padding: 5px 12px;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
      background: #D32F2F !important;
      border-color: #D32F2F !important;
      color: #FDD835 !important;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button.current,
    .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
      background: #D32F2F !important;
      border-color: #D32F2F !important;
      color: #FDD835 !important;
    }

    /* DataTables Search Box */
    .dataTables_filter input {
      background: rgba(255, 255, 255, 0.1) !important;
      border: 1px solid rgba(255, 255, 255, 0.2) !important;
      color: #fff !important;
      padding: 8px 15px !important;
      border-radius: 5px !important;
      margin-left: 10px !important;
    }

    .dataTables_filter input::placeholder {
      color: rgba(255, 255, 255, 0.7);
    }

    /* DataTables Header */
    .datatables-header {
      color: #FDD835;
      font-size: 2rem;
      font-weight: 600;
      margin-bottom: 30px;
      text-align: center;
    }

    /* Footer Styling */
    .footer {
      background: linear-gradient(135deg, #1a1a1a 0%, #333 100%);
      color: var(--light);
      padding: 50px 0 20px;
      margin-top: 50px;
    }

    .footer-section {
      margin-bottom: 30px;
    }

    .footer h4 {
      color: var(--secondary);
      margin-bottom: 20px;
      font-weight: 600;
    }

    .footer-links {
      list-style: none;
      padding: 0;
    }

    .footer-links li {
      margin-bottom: 10px;
    }

    .footer-links a {
      color: var(--light);
      text-decoration: none;
      transition: all 0.3s ease;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .footer-links a:hover {
      color: var(--secondary);
      transform: translateX(5px);
    }

    .social-links {
      display: flex;
      gap: 15px;
      margin-top: 20px;
    }

    .social-links a {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      background: rgba(255, 255, 255, 0.1);
      display: flex;
      align-items: center;
      justify-content: center;
      color: var(--light);
      transition: all 0.3s ease;
    }

    .social-links a:hover {
      background: var(--secondary);
      color: var(--dark);
      transform: translateY(-5px);
    }

    .footer-bottom {
      text-align: center;
      padding-top: 20px;
      border-top: 1px solid rgba(255, 255, 255, 0.1);
      margin-top: 30px;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
      .navbar-collapse {
        background: var(--primary);
        padding: 20px;
        border-radius: 8px;
        margin-top: 10px;
      }

      .search-form {
        margin-top: 15px;
      }

      .footer {
        text-align: center;
      }

      .social-links {
        justify-content: center;
      }
    }
  </style>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="?page=home">
        <img src="https://cdn-icons-png.flaticon.com/512/1076/1076928.png" alt="One Piece Logo">
        ONE PIECE
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" href="?page=home">
              <i class="fas fa-home"></i> Home
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?page=about">
              <i class="fas fa-info-circle"></i> About
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?page=contact">
              <i class="fas fa-envelope"></i> Contact
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
              <i class="fas fa-graduation-cap"></i> Belajar
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="?page=datatables"><i class="fas fa-table"></i> Datatables</a></li>
              <li><a class="dropdown-item" href="?page=form"><i class="fas fa-code"></i> Form</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#"><i class="fas fa-star"></i> Something else</a></li>
            </ul>
          </li>
        </ul>
        <form class="search-form d-flex">
          <input class="form-control" type="search" placeholder="Search..." aria-label="Search">
          <button class="btn" type="submit"><i class="fas fa-search"></i></button>
        </form>
      </div>
    </div>
  </nav>

  <!-- Main Content -->

  <div class="container" id="pageContent">
    <?php
    if (isset($_GET['page'])) {
      $page = $_GET['page'];
      $valid_pages = ['home', 'about', 'contact', 'datatables', 'form']; // Daftar halaman yang valid

      if (in_array($page, $valid_pages)) {
        $file = $page . ".php";
        if (file_exists($file)) {
          include $file;
        } else {
          include "404.php"; // Menggunakan 404.php
        }
      } else {
        include "404.php"; // Redirect ke 404.php untuk page yang tidak valid
      }
    } else {
      include "home.php"; // Default page
    }
    ?>
  </div>

  <!-- Footer -->
  <footer class="footer">
    <div class="container">
      <div class="row">
        <div class="col-md-4 footer-section">
          <h4>About One Piece</h4>
          <p>Join us on an epic adventure through the Grand Line. Discover the world of pirates, Devil Fruits, and the quest for the ultimate treasure!</p>
          <div class="social-links">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-youtube"></i></a>
          </div>
        </div>
        <div class="col-md-4 footer-section">
          <h4>Quick Links</h4>
          <ul class="footer-links">
            <li><a href="?page=home"><i class="fas fa-chevron-right"></i> Home</a></li>
            <li><a href="?page=about"><i class="fas fa-chevron-right"></i> About</a></li>
            <li><a href="?page=contact"><i class="fas fa-chevron-right"></i> Contact</a></li>
            <li><a href="?page=datatables"><i class="fas fa-chevron-right"></i> Datatables</a></li>
          </ul>
        </div>
        <div class="col-md-4 footer-section">
          <h4>Contact Info</h4>
          <ul class="footer-links">
            <li><a href="#"><i class="fas fa-map-marker-alt"></i> Grand Line, East Blue</a></li>
            <li><a href="#"><i class="fas fa-phone"></i> +62 851 5614 9251</a></li>
            <li><a href="#"><i class="fas fa-envelope"></i> alvinalfandy0601@gmail.com</a></li>
          </ul>
        </div>
      </div>
      <div class="footer-bottom">
        <p>&copy; 2024 One Piece Dynamic Website. All rights reserved.</p>
      </div>
    </div>
  </footer>

  <!-- JavaScript -->
  <script src="assets/jquery-3.7.1.js"></script>
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <script src="assets/datatables/dataTables.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      if (document.querySelector("#example")) {
        new DataTable("#example");
      }

      // Active nav link
      const currentPage = window.location.search.split('=')[1] || 'home';
      document.querySelectorAll('.nav-link').forEach(link => {
        if (link.getAttribute('href').includes(currentPage)) {
          link.classList.add('active');
        } else {
          link.classList.remove('active');
        }
      });
    });
  </script>
</body>

</html>