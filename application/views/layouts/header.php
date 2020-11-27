<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title><?=$title?> &mdash; Biodata</title>

  <!-- Favicon -->
  <link rel="shortcut icon" href="<?=base_url()?>src/assets/img/favicon.ico">

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?=base_url()?>src/node_modules/weathericons/css/weather-icons.min.css">
  <link rel="stylesheet" href="<?=base_url()?>src/node_modules/weathericons/css/weather-icons-wind.min.css">
  <link rel="stylesheet" href="<?=base_url()?>src/node_modules/summernote/dist/summernote-bs4.css">
  <link rel="stylesheet" href="<?=base_url()?>src/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?=base_url()?>src/node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?=base_url()?>src/assets/css/style.css">
  <link rel="stylesheet" href="<?=base_url()?>src/assets/css/components.css">
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
          </ul>
          <div class="search-element">
            
          </div>
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
              <div class="dropdown-header">Notifications
                <div class="float-right">
                  <a href="#">Mark All As Read</a>
                </div>
              </div>
              <div class="dropdown-list-content dropdown-list-icons">
                <a href="#" class="dropdown-item dropdown-item-unread">
                  <div class="dropdown-item-icon bg-primary text-white">
                    <i class="fas fa-code"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    Template update is available now!
                    <div class="time text-primary">2 Min Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-icon bg-info text-white">
                    <i class="far fa-user"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    <b>You</b> and <b>Dedik Sugiharto</b> are now friends
                    <div class="time">10 Hours Ago</div>
                  </div>
                </a>
              </div>
              <div class="dropdown-footer text-center">
                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </li>
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="<?=base_url()?>src/assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block"><?= $this->session->userdata('email');?></div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-divider"></div>
              <a href="<?=base_url('logout')?>" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="#">My Company</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="#">MCP</a>
          </div>
          <ul class="sidebar-menu">
            <?php 
              if ($this->session->userdata('role')=="User") {?>
                <li class="menu-header">Data Diri</li>
                  <li class="nav-item <?php if($this->uri->segment(1)=="dashboard"){echo 'active';}?>">
                    <a class="nav-link" href="<?=base_url('dashboard')?>">
                      <i class="fas fa-fire"></i><span>Entry Biodata</span>
                    </a>
                  </li>
                  <li class="nav-item <?php if($this->uri->segment(1)=="pendidikan"){echo 'active';}?>">
                    <a class="nav-link" href="<?=base_url('pendidikan')?>">
                      <i class="fas fa-school"></i><span>Pendidikan Terakhir</span>
                    </a>
                  </li>
                  <li class="nav-item <?php if($this->uri->segment(1)=="pelatihan"){echo 'active';}?>">
                    <a class="nav-link" href="<?=base_url('pelatihan')?>">
                      <i class="fas fa-book-reader"></i><span>Riwayat Pelatihan</span>
                    </a>
                  </li>
                  <li class="nav-item <?php if($this->uri->segment(1)=="pekerjaan"){echo 'active';}?>">
                    <a class="nav-link" href="<?=base_url('pekerjaan')?>">
                      <i class="far fa-id-card"></i><span>Riwayat Pekerjaan</span>
                    </a>
                  </li>
                  <li class="nav-item <?php if($this->uri->segment(1)=="biodata"){echo 'active';}?>">
                    <a class="nav-link" href="<?=base_url('biodata')?>">
                      <i class="fas fa-users"></i><span>Biodata</span>
                    </a>
                  </li>
              <?php } else {?>
                <li class="menu-header">Data Pelamar</li>
                  <li class="nav-item <?php if($this->uri->segment(1)=="pelamar"){echo 'active';}?>">
                    <a class="nav-link" href="<?=base_url('pelamar')?>">
                      <i class="fas fa-users"></i><span>Pelamar</span>
                    </a>
              <?php }
            ?>
            
          </ul>
        </aside>
      </div>