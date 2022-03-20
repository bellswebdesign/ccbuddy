<?php require_once('app/initialize.php');

if (!isset($_GET['id'])) {
    redirect_to('all-harvest.php');
} else {
    $id = $_GET['id'];
    $harvestroom = new HarvestRoom();
    $harvestroom->processAddHarvestRoom();
}

?>
