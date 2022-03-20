<?= require_once('app/initialize.php');
if (!isset($_GET['id'])) {
    redirect_to('all_destem.php');
} else {
    $id = $_GET['id'];
}
$stem = new Stem();
$allDestemStems = $stem->getDestemStems($id);

$fileName = "stem-weight_" . date('Y-m-d') . ".xls";

// Column names
$fields = array('Strain', 'License', 'Weight');

// Display column names as first row
$excelData = implode("\t", array_values($fields)) . "\n";

// Filter the excel data
function filterData(&$str){
    $str = preg_replace("/\t/", "\\t", $str);
    $str = preg_replace("/\r?\n/", "\\n", $str);
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
}

$query = query(getDestemStems($id)); 
if($query->num_rows > 0){
    // Output each row of the data
    while($row = $query->fetch_assoc()){
        $lineData = array($row['strain'], $row['license_type'] . "-" . $row['license'], $row['last_name'], $row['weight']);
        array_walk($lineData, 'filterData');
        $excelData .= implode("\t", array_values($lineData)) . "\n";
    }

  header("Content-Type: application/xls");
  header("Content-Disposition: attachment; filename=\"$fileName\"");
echo $excelData;
exit;
?>
