<?php require_once('app/initialize.php');

if (!isset($_GET['id'])) {
    redirect_to('all_harvest.php');
} else {
    $id = $_GET['id'];
}


$harvest = new Harvest();
$harvestDetails = $harvest->getHarvestId($id);
$pageTitle = $harvestDetails['harvest_num'];

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
            <a class="nav-link active" href="all_harvest.php">
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
        <h1 class="h2">Harvest Number <?= $pageTitle; ?></h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
          </button>
        </div>
      </div>


      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>

              <th>Harvest Number</th>
              <th>Room Number</th>
              <th>Plant Date</th>
              <th>Harvest Date</th>
              <th>Actual Harvest Date</th>
              <th>Edit</th>
            </tr>
          </thead>
          <tbody>
          <td><?= $harvestDetails['harvest_num']; ?></td>
          <td><?= $harvestDetails['room_num']; ?></td>
          <td><?= $harvestDetails['plant_date']; ?></td>
          <td><?= $harvestDetails['harvest_date']; ?></td>
          <td><?= $harvestDetails['actual_harvest_date']; ?></td>
          <td><a href="edit-harvest.php?id=<?= $harvestDetails['harvest_id']; ?>">Edit</a></td>
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>
</body>

<?php include('app/includes/layout/footer.php'); ?>
