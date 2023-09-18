<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Dashboard - Analytics | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('Admin/assets/img/favicon/favicon.ico') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('Admin/assets/vendor/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('Admin/assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('Admin/assets/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('Admin/assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('Admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <link rel="stylesheet" href="{{ asset('Admin/assets/vendor/libs/apex-charts/apex-charts.css') }}" />

    <!-- Page CSS -->
    <!-- Helpers -->
    <script src="{{ asset('Admin/assets/vendor/js/helpers.js') }}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('Admin/assets/js/config.js') }}"></script>
  </head>

  <body>
        <!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white">
  <!-- Container wrapper -->
  <div class="container-fluid">
    <!-- Toggle button -->
    <button
      class="navbar-toggler"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>
    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Navbar brand -->
      <a class="navbar-brand mt-2 mt-lg-0" href="#">
        <img
          src="data:image/png;base64,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"
          height="60"
          width="100"
          alt=" Logo"
          loading="lazy"
        />
      </a>
    </div>
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar --> 
          
          