<?php require_once('app/initialize.php');

$harvest = new Harvest();

$pageTitle = 'Add Harvest';
$room = new Room();
$allRooms = $room->getAllRooms();

if (isset($_POST["submit"])) {
    $formData = $_POST["harvest"];
    $addHarvest = new Add();
    $addHarvest->processAddHarvest();
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
          </li>
          <li class="nav-item">
            <a class="nav-link" href="departments.php">
              <span data-feather="file"></span>
              Departmants
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="all_rooms.php">
              <span data-feather="file"></span>
              Rooms
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
            <a class="nav-link active" href="harvest.php">
              <span data-feather="file"></span>
              Harvest<span class="sr-only">(current)</span>
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

        <input type="hidden" name='harvest[harvest_id]'>
        <input type="hidden" name='harvest[active]' value="1">
        <input type="hidden" name='harvest[action]' value="addHarvest">

            <div class="container col-md-10 offset-md-2">

                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <h1 class="page-title underline text-center"><?= $pageTitle; ?></h1>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <div class="input-group">
                            <input type="number" class="form-control" placeholder="Harvest Number" name='harvest[harvest_num]'>

                            Room Number: <select name='harvest[room_num]' class="form-control">
                              <?= $roomCount = 0;
                              foreach ($allRooms as $room): ?>
                                <option value="<?= $room['id']?> " ><?= $room['room_num']?></option>
                                <?= $roomCount++; endforeach; ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <div class="input-group">
                              <h3>Plant Date</h3>
                            </div>
                            <input type="date" class="form-control" placeholder="Plant Date" name='harvest[plant_date]'>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10 offset-md-1">
                            <div class="input-group">
                                  <h3>Projected Harvest Date</h3>
                                </div>
                                <input type="date" class="form-control" placeholder="Harvest Date" name='harvest[harvest_date]'>
                              </div>
                          </div>
                        </div>


            <section class="row harvest-submit-container">

                <div class="col-md-4 offset-md-5 text-center">
                    <div class="btn-group">
                        <input id='submit' type='submit' name='submit' value='<?= $pageTitle; ?>' class="btn btn-default btn-lg <?= slugify($pageTitle); ?>-btn"/>

                    </div>
                </div>

            </section>

        </div>

    </form>

<?php include('app/includes/layout/footer.php'); ?>
