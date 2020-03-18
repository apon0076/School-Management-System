<?php include '../header&footer/header.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
	<title>Employee profile</title>

	<style>
		
				body{
		    background: -webkit-linear-gradient(left, #3931af, #00c6ff);
		}
		.emp-profile{
		    padding: 3%;
		    margin-top: 3%;
		    margin-bottom: 3%;
		    border-radius: 0.5rem;
		    background: #fff;
		}
		.profile-img{
		    text-align: center;
		}
		.profile-img img{
		    width: 70%;
		    height: 100%;
		}
		.profile-img .file {
		    position: relative;
		    overflow: hidden;
		    margin-top: -20%;
		    width: 70%;
		    border: none;
		    border-radius: 0;
		    font-size: 15px;
		    background: #212529b8;
		}
		.profile-img .file input {
		    position: absolute;
		    opacity: 0;
		    right: 0;
		    top: 0;
		}
		.profile-head h5{
		    color: #333;
		}
		.profile-head h6{
		    color: #0062cc;
		}
		.profile-edit-btn{
		    border: none;
		    border-radius: 1.5rem;
		    width: 70%;
		    padding: 2%;
		    font-weight: 600;
		    color: #6c757d;
		    cursor: pointer;
		}
		.proile-rating{
		    font-size: 12px;
		    color: #818182;
		    margin-top: 5%;
		}
		.proile-rating span{
		    color: #495057;
		    font-size: 15px;
		    font-weight: 600;
		}
		.profile-head .nav-tabs{
		    margin-bottom:5%;
		}
		.profile-head .nav-tabs .nav-link{
		    font-weight:600;
		    border: none;
		}
		.profile-head .nav-tabs .nav-link.active{
		    border: none;
		    border-bottom:2px solid #0062cc;
		}
		.profile-work{
		    padding: 14%;
		    margin-top: -15%;
		}
		.profile-work p{
		    font-size: 12px;
		    color: #818182;
		    font-weight: 600;
		    margin-top: 10%;
		}
		.profile-work a{
		    text-decoration: none;
		    color: #495057;
		    font-weight: 600;
		    font-size: 14px;
		}
		.profile-work ul{
		    list-style: none;
		}
		.profile-tab label{
		    font-weight: 600;
		}
		.profile-tab p{
		    font-weight: 600;
		    color: #0062cc;
		}
	</style>
</head>


<body>

	<?php
		include '../connection.php';
		
		$emp_id=$_SESSION['emp_id'];

	    $sql="SELECT * FROM employee WHERE emp_id='$emp_id'";
	    $query=mysqli_query($conn, $sql);
	    $row=mysqli_fetch_array($query);


	?>
	
	<div class="container emp-profile">
            <form action="#" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img style="width: 200px;height: 250px;" src="../uploads/<?php echo $row['image']; ?>" alt=""/> <br><br><br>
                            <?php
                            if (isset($_GET['edit'])) { ?>
                            <div class="file btn btn-lg btn-primary">
                                Change Photo
                                <input type="file" name="image"/>
                            </div>
                            <!-- <input type="file" name="image"> -->
                           <?php
                           }
                            ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                        <?php echo $row['name']; ?>
                                    </h5>
                                    
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link " id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                    	<?php
                    	if (!isset($_GET['edit'])) { ?>
                        	<a href="s_man_profile.php?edit=<?php echo true; ?>" class="profile-edit-btn">Edit Profile</a>
                    	<?php
                    	}
                    	?>
                        	<a href="s_man_profile.php" class="profile-edit-btn">Refresh</a>
                    </div>
                </div>
                <div class="row">
                   
                    <div class="col-md-7">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>User Id</label>
                                            </div>
                                            <div class="col-md-6">
                                            	<p><?php echo $row['emp_id']; ?></p>
                                            	<input type="hidden" name="eid" value="<?php echo $row['emp_id']; ?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <?php
                                                	if (isset($_GET['edit'])) { ?>
                                                		<input type="text" name="name" value="<?php echo $row['name']; ?>">
                                                	<?php
                                                	}
                                                	else
                                                	{ ?>
                                                		<?php echo $row['name']; ?>
                                                	<?php
                                                	}
                                                ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <?php
                                                	if (isset($_GET['edit'])) { ?>
                                                		<input type="text" name="mail" value="<?php echo $row['mail']; ?>">
                                                	<?php
                                                	}
                                                	else
                                                	{ ?>
                                                		<?php echo $row['mail']; ?>
                                                	<?php
                                                	}
                                                ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Phone</label>
                                            </div>
                                            <div class="col-md-6">
                                                <?php
                                                	if (isset($_GET['edit'])) { ?>
                                                		<input type="text" name="phone" value="<?php echo $row['phone']; ?>">
                                                	<?php
                                                	}
                                                	else
                                                	{ ?>
                                                		<?php echo $row['phone']; ?>
                                                	<?php
                                                	}
                                                ?>
                                            </div>
                                        </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <?php
                if (isset($_GET['edit'])) { ?>
                	<button name="update">Update Profile</button>
               <?php
                }
                ?>
            </form>           
        </div>
        <?php 
        if (isset($_POST['update'])) {
        	$eid=$_POST['eid'];
        	$name=$_POST['name'];
        	$mail=$_POST['mail'];
        	$phone=$_POST['phone'];
        	$image=$_FILES['image']['name'];


        		if (isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])) {
		        	$sql="UPDATE employee SET name='$name', mail='$mail', phone='$phone', image='$image' WHERE emp_id='$eid'";

		        	if (mysqli_query($conn, $sql)) {

		          		move_uploaded_file($_FILES['image']['tmp_name'], "../uploads/" . $_FILES['image']['name']);
		        		echo "<script>window.location='s_man_profile.php';</script>";
		        	}
        		}
        		else
        		{
		        	$sql="UPDATE employee SET name='$name', mail='$mail', phone='$phone' WHERE emp_id='$eid'";

		        	if (mysqli_query($conn, $sql)) {
		        		echo "<script>window.location='s_man_profile.php';</script>";
		        	}
        		}

        }
        ?>
</body>
</html>
<?php include '../header&footer/footer.php';?>