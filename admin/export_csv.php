<?php 
include "include/session.php";

isset($_GET['tbl_name']) ? $_GET['tbl_name'] : 0;

// Export Excel
$tbl_name = $_GET['tbl_name']; 
$filename = $tbl_name. "_list";  //your_file_name

header("Content-Type: application/xls");    
header("Content-Disposition: attachment; filename=$filename.xls");  
header("Pragma: no-cache"); 
header("Expires: 0");

$sep = "\t";

$result = $conn->query("SELECT * FROM ".$tbl_name."");
while ($property = $result->fetch_field()) { //fetch table field name
    echo $property->name."\t";
}

print("\n");    

while($row =$result->fetch_row()) {
    $schema_insert = "";
    for($j=0; $j < $result->field_count; $j++) {
        if(!isset($row[$j]))
            $schema_insert .= "NULL".$sep;
        elseif ($row[$j] != "")
            $schema_insert .= "$row[$j]".$sep;
        else
            $schema_insert .= "".$sep;
    }
    $schema_insert = str_replace($sep."$", "", $schema_insert);
    $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
    $schema_insert .= "\t";
    print(trim($schema_insert));
    print "\n";
}
 ?>