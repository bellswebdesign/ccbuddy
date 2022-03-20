<?php require_once('app/initialize.php');

$room = new Room();

$pageTitle = 'Add Room';


if (isset($_POST["submit"])) {
    $formData = $_POST["room_num"];
    $addRoom = new AddRoom();
    $addRoom->processAddRoom();
}
include('app/includes/layout/header.php');

?>
<div class="container-fluid">
  <div class="row">
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" href="index.php">
              <span data-feather="home"></span>
              Dashboard
            </a>
            <li class="nav-item">
              <a class="nav-link" href="departments.php">
                <span data-feather="file"></span>
                Departmants
              </a>
            </li>
          </li><li class="nav-item">
            <a class="nav-link active" href="all_strains.php">
              <span data-feather="file"></span>
              Rooms<span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="all_strains.php">
              <span data-feather="file"></span>
              Strains
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="all_licenses.php">
              <span data-feather="file"></span>
              License
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="harvest.php">
              <span data-feather="file"></span>
              Harvest
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="all_destem.php">
              <span data-feather="shopping-cart"></span>
              De-Stem
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-fDashboardeather="users"></span>
              De-Leaf
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="bar-chart-2"></span>
              De-Fan
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="layers"></span>
              Irrigation
            </a>
          </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">

      </div>
    </nav>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

        </div>
      </div>

    <form class="<?= pageSlug($pageTitle); ?>" action="" method="post">

        <input type="hidden" name='room[id]'>
        <input type="hidden" name='room[action]' value="addRoom">

            <div class="container col-md-10 offset-md-2">

                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <h1 class="page-title underline text-center"><?= $pageTitle; ?></h1>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Room Number" name='room[room_num]'>
                        </div>
                    </div>
                </div>


            <section class="row strain-submit-container">

                <div class="col-md-4 offset-md-5 text-center">
                    <h4>Add Room</h4>
                    <div class="btn-group">
                        <input id='submit' type='submit' name='submit' value='<?= $pageTitle; ?>' class="btn btn-default btn-lg <?= slugify($pageTitle); ?>-btn"/>

                    </div>
                </div>

            </section>

        </div>

    </form>

<?php include('app/includes/layout/footer.php'); ?>
