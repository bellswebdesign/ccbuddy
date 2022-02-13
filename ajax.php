<?php require_once('app/initialize.php');

$ajax = new Ajax();

if ($ajax->is_ajax()) {
    if (isset($_POST["action"]) && !empty($_POST["action"])) {
        $action = $_POST["action"];
        switch ($action) {
            case "addHarvest":
                $ajax->addHarvest();
                break;
            case "editHarvest":
                $ajax->editHarvest();
                break;
            case "deleteHarvest":
                $ajax->deleteHarvest();
                break;

        }
    }
}

?>
