<?php
require_once './HomePageController.php';
require_once 'BlogController.php';
require_once './PortfolioController.php';
require_once './SkillController.php';

$homeData = new HomePageController();
$h_data = $homeData->getData('home_page');

// echo $h_data[0]->image;
// print_r ($h_data);
?>


<link rel="stylesheet" href="sys_css/sys_nav.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
<link rel="stylesheet" href="sys_css/sys.css">

<div class="col-md-2 left-col">
  <div class="row dashboard-left-top">
    <div class="col-12">Portfolio Dashboard</div>
  </div>

  <div class="row dashboard-left-second">
    <div class="col-12">

      <?php
      if (isset($h_data[0]->image)) {
      ?>
        <img src="../images/<?= $h_data[0]->image; ?>" alt="" width="44" srcset=""> <?= $h_data[0]->name; ?>
    </div>
  <?php } else { ?>
    <img src="" alt="" width="44" srcset=""> User Avatar | User Name
  </div>

<?php
      } ?>
</div>
<div class="row">
  <div class="col-12">
    <ul class="dashboard-nav">
      <a href="dashboard.php">
        <li class="<?= $_SERVER['REQUEST_URI'] == '/system/dashboard.php' ? 'dash-active' : '' ?>">
          <i class="fas fa-tachometer-alt"></i> Dashboard
        </li>
      </a>
      <a href="portfolio.php">
        <li class="<?= $_SERVER['REQUEST_URI'] == '/system/portfolio.php' ? 'dash-active' : '' ?>">
          <i class="fas fa-user-circle"></i> Portfolio
        </li>
      </a>
      <a href="blog.php">
        <li class="<?= $_SERVER['REQUEST_URI'] == '/system/blog.php' ? 'dash-active' : '' ?>">
          <i class="fab fa-blogger"></i> Blogs
        </li>
      </a>
      <a href="page_description.php">
        <li class="<?= $_SERVER['REQUEST_URI'] == '/system/page_description.php' ? 'dash-active' : '' ?>">
          <i class="fas fa-file-medical-alt"></i> Page Description
        </li>
      </a>
      <a href="contact.php">
        <li class="<?= $_SERVER['REQUEST_URI'] == '/system/contact.php' ? 'dash-active' : '' ?>">
          <i class="fas fa-id-card-alt"></i> Contact
        </li>
      </a>
      <a href="experiences.php">
        <li class="<?= $_SERVER['REQUEST_URI'] == '/system/experiences.php' ? 'dash-active' : '' ?>">
          <i class="fas fa-chalkboard-teacher"></i> Experiences
        </li>
      </a>
      <a href="cvs.php">
        <li class="<?= $_SERVER['REQUEST_URI'] == '/system/cvs.php' ? 'dash-active' : '' ?>">
          <i class="fas fa-file"></i> CV
        </li>
      </a>
      <a href="skills.php">
        <li class="<?= $_SERVER['REQUEST_URI'] == '/system/skills.php' ? 'dash-active' : '' ?>">
          <i class="fas fa-braille"></i> Skills
        </li>
      </a>
      <a href="educations.php">
        <li class="<?= $_SERVER['REQUEST_URI'] == '/system/educations.php' ? 'dash-active' : '' ?>">
          <i class="fas fa-school"></i> Educations
        </li>
      </a>
      <a href="about.php">
        <li class="<?= $_SERVER['REQUEST_URI'] == '/system/about.php' ? 'dash-active' : '' ?>">
          <i class="fas fa-address-card"></i> About
        </li>
      </a>
      <a href="namelogo.php">
        <li class="<?= $_SERVER['REQUEST_URI'] == '/system/namelogo.php' ? 'dash-active' : '' ?>">
          <i class="fas fa-street-view"></i> Nav Logo
        </li>
      </a>
    </ul>
  </div>
</div>

<div class="row copyright-row">
  <div class="col-12"> &copy; copyright2021 </div>
</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>