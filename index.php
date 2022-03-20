<?php  require_once('app/initialize.php');

$pageTitle = 'Dashboard';
$hideCount = " ";
$harvest = new Harvest();
$allHarvest = $harvest->getAllActiveHarvest();
$strain = new Strain();
$allStrains = $strain->getAllStrains();
include('app/includes/layout/header.php');

?>
<div class="container-fluid">
  <div class="row">
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="index.php">
              <span data-feather="home"></span>
              Dashboard<span class="sr-only">(current)</span>
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
            <a class="nav-link" href="all_harvest.php">
              <span data-feather="file"></span>
              Harvest
            </a>
          <li class="nav-item">
            <a class="nav-link" href="all_destem.php">
              <span data-feather="shopping-cart"></span>
              De-Stem
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="users"></span>
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
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 clearfooter">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            Harvest
          </button>
        </div>
      </div>


      <h2>Harvest</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Harvest Number</th>
              <th>Room Number</th>
              <th>Plant Date</th>
              <th>Harvest Date</th>
            </tr>
          </thead>
          <tbody>
            <?=
            $harvestCount = 0;
            $hideCount = $harvestCount;

                foreach ($allHarvest as $harvest):
            ?>
            <tr>
              <td><?= $harvest['harvest_num']; ?></td>
              <td><?= $harvest['room_num']; ?></td>
              <td><?= $harvest['plant_date']; ?></td>
              <td><?= $harvest['harvest_date']; ?></td>
            </tr>

            <?=
                $harvestCount++; endforeach;

            ?>
          </tbody>
        </table>
      </div>
      <h2>De-Stem</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Strain</th>
              <th>License</th>
              <th>Weight</th>
              <th>Date</th>
            </tr>
          </thead>
          <tbody>
            <?=
              $strainCount = 0;
                foreach ($allStrains as $strain):

            ?>
            <tr>
              <td><?= $strain['name']; ?></td>
              <td><?= $strain['license']; ?></td>
              <td>2,657</td>
              <td>12/24/21</td>
            </tr>
            <?=
                $strainCount++; endforeach;

            ?>


          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>
</body>

<?php include('app/includes/layout/footer.php'); ?>
