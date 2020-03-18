<?php include '../connection.php'; ?>

<form action="" method="_POST">
	<label for="salary">Update salary</label>
	<input type="text" name="salary">
	<input type="hidden" name="id" value="<?=$id?>">
	<input type="submit" value="submit">
</form>
<?php
if(isset($_POST['submit']))
{
	$id=$_POST['id'];
$add=$_POST['designation'];
$package=$_POST['salary'];

$sql = "UPDATE salary_info SET salary='$package' WHERE salary_id=$id";

            if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

}

include 'view_salary.php';