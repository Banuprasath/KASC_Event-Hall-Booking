<?php
include 'conn.php';


$sql="select * from complaint WHERE isVf = 'test'";
$result=$conn->query($sql);
if($result->num_rows>0){
while($row=$result->fetch_assoc()){

                        echo "<tr>";
                        $id= $row['id'];
                    echo "<td>".$row['sname']."</td>";
                    echo "<td>".$row['capt']."</td>";
                    echo "<td>".$row['hall']."</td>";
                    echo "<td>".$row['details']."</td>";
                    echo "<td><img style='width: 100px; height: 100px; object-fit: cover;' src='../complaints/". $row['img'] ." ' alt='Complaint Image'></td>";
                    

        
                    
                    
                   
                    echo "<td><a href='c-view.php?id=$id' class='edit-button'>View</td>";
                    echo "<td><a href='delete.php?id=$id' class='btn btn-success btn-sm'>Delete</td>";
                    //echo "<td><a href='verify.php?id=$id' class='btn btn-success btn-sm'>Verify</td>";
                  //  echo "<td>".$etime12."</td>";

                    echo "</tr>";

                    
}
} else {
echo "<tr><td colspan='3'>No data found</td></tr>";
}
?>