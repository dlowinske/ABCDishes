<?php
  $nav_selected = "SCANNER";
  $left_buttons = "YES";
  $left_selected = "Tables";

  include("./nav.php");

 $con = mysqli_connect("localhost", "root", "", "abcd_db");  


 $queryProposed = "SELECT Status, count(*) as number FROM dishes WHERE Status = 'Proposed'";  
 $queryInReview = "SELECT Status, count(*) as number FROM dishes WHERE Status = 'In Review'";  
 $queryApproved = "SELECT Status, count(*) as number FROM dishes WHERE Status = 'Approved'";  




  ?>
<header>Status</header>

  
    
<table border="1">
  <tr>
    <th>Proposed </th>
    <th>In Review </th>
    <th>Approved </th>

  </tr>
  <tr>
    <td>
    <?php
    $row = mysqli_fetch_array(mysqli_query($con,$queryProposed));
    echo $row["number"];  
    ?>
    </td>
    <td>
    <?php
    $row = mysqli_fetch_array(mysqli_query($con,$queryInReview));
    echo $row["number"];  
    ?>
    </td>
    <td>
    <?php
    $row = mysqli_fetch_array(mysqli_query($con,$queryApproved));
    echo $row["number"];  
    ?>
    </td>
  </tr>
</table>






  

<?php include("./footer.php"); ?>