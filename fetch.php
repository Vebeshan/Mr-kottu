<?php

include 'connection.php';

$sql = "SELECT * FROM customer where E_mail LIKE '%".$_POST['search']."%' OR  Name LIKE '%".$_POST['search']."%' OR Address LIKE '%".$_POST['search']."%'";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
$output= "<br><div class='col-lg-12'>
<div class='card'>
<div class='card-body'><table class='table text-center' width='100%' align='center' cellpadding='5' cellspacing='5'><tr>
<td>Name</td>
<td>Address</td>
<td>Phone</td>
<td>E_mail</td>


</tr>";


    while($row = mysqli_fetch_assoc($result)) {
        $output .= "<tr><td>".$row['Name']."</td><td>".$row['Address']."</td><td>".$row['Tel_no']."</td><td>".$row['E_mail']."</td></tr>";
		
    }
	echo "$output";
} 
echo"</table></div></div></div>";


mysqli_close($con);
?>
