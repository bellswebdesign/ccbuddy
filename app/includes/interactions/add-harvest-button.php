<?php require_once('app/initialize.php');

if (isset($_GET['harvest_id'])) {
    $id = $_GET['harvest_id'];
}

$formData = $_POST["harvest"];

?>

<script type="text/javascript">
    $("document").ready(function () {
        $('.add-harvest-btn').click(function () {
            $.ajax({
                type: "POST",
                url: "ajax.php",
                data: <?= json_encode($formData); ?>,
                dataType: "html",
                success: function () {
                    swal("Done!", "Your harvest has been successfully added.", "success");
                    window.setTimeout(function(){location.reload()},1000)
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    swal("Uh Oh!", "Something went wrong. Your harvest was not successfully updated. Please try again.", "error");
                }
            });
            return false;
        });
    });
</script>
