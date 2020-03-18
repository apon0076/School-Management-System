<?php include '../connection.php'; 
 $id = $_GET['id'];
?>
   

<form action="" method="post">
    <label for="salary">Update salary</label>
    <input type="text" name="salary">
   <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>

    <input type="submit" value="submit">
</form>
<?php
if(isset($_POST['submit']))
{
$add=$_POST['designation'];
$package=$_POST['salary'];

$sql = "UPDATE salary_info SET salary='$package' WHERE salary_id=$id";

 if(mysqli_query($conn, $sql)){
    echo "Records were updated successfully.";
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
 

}
mysqli_close($conn);

include 'view_salary.php';