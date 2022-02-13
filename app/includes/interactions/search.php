<?php require_once('app/initialize.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

?>

<script type="text/javascript">
    $(document).ready(function(){
        $('.search-form input[type="text"]').on("keyup input", function(){
            var inputVal = $(this).val();
            var resultDropdown = $(this).siblings(".result");
            if(inputVal.length){
                $.get("backend-search.php", {term: inputVal}).done(function(data){
                    // Display the returned data in browser
                    resultDropdown.html(data);
                    console.log(data);
                });
            } else{
                resultDropdown.empty();
            }
        });

        // Set search input value on click of result item
        $(document).on("click", ".result p", function(){
            $(this).parents(".search-form").find('input[type="text"]').val($(this).text());
            $('#search-recipe-id').val($(this).attr('id'));
            $(this).parent(".result").empty();
            window.location.href = 'recipe' + '/?id=' + $('#search-recipe-id').val();
        });


    });
</script>