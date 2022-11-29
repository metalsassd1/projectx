<?php
// database connection code
if(isset($_POST['txtName']))
$con = mysqli_connect('localhost', 'metha', '12345678','product_project');

// get the post records
$result = mysqli_query($connection,"SELECT * FROM products");
$all_property = array();

// database insert SQL code
echo '<table class="data-table">
        <tr class="data-heading">';  //initialize table tag
while ($property = mysqli_fetch_field($result)) {
    echo '<td>' . $property->name . '</td>';  //get field name for header
    array_push($all_property, $property->name);  //save those to array
}
echo '</tr>'; //end tr tag

// insert in database 
while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    foreach ($all_property as $item) {
        echo '<td>' . $row[$item] . '</td>'; //get items using property value
    }
    echo '</tr>';
}
echo "</table>";
?>