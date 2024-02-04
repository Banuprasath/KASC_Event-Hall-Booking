<?php
include 'conn.php';
session_start();
if(isset($_SESSION['login'])){
   

    $sno=$_SESSION['sno'];
    echo $_SESSION['login'];

?>

<table>
    <form method='post'>
<tr><td><input type='text' name='hall' placeholder='Hall' ></td>
<td><input type='text' name='cap' placeholder='dep' ></td> 
<td><input type='submit' name='submit'  ></td></tr>
</table>

</form> 
<?php

echo "<table border='1px solid'>";
echo "<tr>";
echo "<th>Sname</th>";
echo "<th>Dep</th>";
echo "<th>Hall</th>";
echo "<th>Details</th>";
echo "<th>Proof</th>";
echo "<th>Vefiy</th>";


echo "<th colspan='2'> Action </th>";


if(!isset($_GET['submit']))
{
$sql="select * from complaint where sno=$sno";
$result=$conn->query($sql);
if($result !== false &&  $result->num_rows>0){
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
                    echo "<td>".$row['isVf']."</td>";
                  //  echo "<td>".$etime12."</td>";

                    echo "</tr>";
}
} else {
echo "<tr><td colspan='6'>No data found</td></tr>";
}
}


if(isset($_GET['submit']))
{

$hall = $_GET['hall'];
// echo $hall;
$dep = $_GET['dep'];
$sql = "SELECT * FROM complaint WHERE  hall  LIKE '%$hall%' AND cap LIKE '%$cap%' ";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row=$result->fetch_assoc()){
                    $id= $row['id'];

                echo "<tr>";

                echo "<td>".$row['sname']."</td>";
                echo "<td>".$row['capt']."</td>";
                echo "<td>".$row['hall']."</td>";
                echo "<td>".$row['details']."</td>";
                echo "<td>".$row['img']."</td>";
                echo "<td>".$row['isVf']."</td>";
                
               
               
                echo "<td><a href='c-view.php?id=$id' class='edit-button'>View</td>";
                echo "<td><a href='delete.php?id=$id' class='delete-button'>Delete</td>";
                }
}
else
{
?>

<style>
    #no{
        color:red;

        text-align: center;
        padding:30px;
    }

td{
text-align:center;
font-size:23px;
}
</style>
    <tr id="no">
      <b>  <td colspan="7" >No Record Found</td>
</b>        </tr>
<?php
}
}
}
?>