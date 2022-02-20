<?php require_once('app/initialize.php');



$pageTitle = 'All Harvest';

$harvest = new Harvest();
$allHarvest = $harvest->getAllHarvest();

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
            <a class="nav-link" href="all_strains.php">
              <span data-feather="file"></span>
              Strains
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="all_harvest.php">
              <span data-feather="file"></span>
              Harvest<span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="all_stems.php">
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
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 clearfooter">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><?= $pageTitle; ?></h1>
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


      <h2><a class="nav-link" href="add-harvest.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"></path>
</svg>Add Harvest</a></h2>

      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Harvest Number</th>
              <th>Room Number</th>
              <th>Plant Date</th>
              <th>Harvest Date</th>
              <th>Actual Harvest Date</th>
              <th>Edit/View<th>
            </tr>
          </thead>
          <tbody>
            <?=
                $harvestCount = 0;
                foreach ($allHarvest as $harvest):
            ?>
            <tr>
              <td><?= $harvest['harvest_num']; ?></td>
              <td><?= $harvest['room_num']; ?></td>
              <td><?= $harvest['plant_date']; ?></td>
              <td><?= $harvest['harvest_date']; ?></td>
              <td><?= $harvest['actual_harvest_date']; ?></td>
              <td><a href="harvest.php?id=<?= $harvest['harvest_id']; ?>" class="btn btn-default btn-sm
                ">View</a>
            </tr>

            <?=
                $harvestCount++; endforeach;

            ?>
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>
</body>

<?php include('app/includes/layout/footer.php'); ?>
