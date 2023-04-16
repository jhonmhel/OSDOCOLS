<?php 
    session_start();
    if (!isset($_SESSION["user_id"])) {
        ?>
            <script type="text/javascript">
                window.location="login.php";
            </script>
        <?php
    }
    $page = 'profile';
    include 'inc/header.php';
    include 'inc/connection.php';
 ?>
 <style>
    label{
        font-size: 10px;
        margin-left: 5px;
       
    }


 </style>
	<!--dashboard area-->
    <div class="dashboard-content">
		<div class="dashboard-header">
			<div class="container"style="margin-top:50px; padding-top:20px">
				<div class="row">
					<div class="col-md-6">
						<div class="left">
							<p><span>|manage profile</span></p>
						</div>
					</div>
					<div class="col-md-6">
						<div class="right text-right">
							<a href="dashboard.php"><i class="fas fa-home"></i>Dashboard</a>
							<span class="disabled"></span>
						</div>
					</div>
				</div>
				<div class="profile-content">
					<div class="row">
						<div class="col-md-3">
							<div class="photo">
								<?php
                                    $res = mysqli_query($link, "select * from user where user_id='".$_SESSION['user_id']."'");
                                    while ($row = mysqli_fetch_array($res)){
                                        ?><img src="<?php echo $row["photo"]; ?> "height="" width="" alt="something wrong"></a> <?php
                                    }
                                ?>
							</div>
							<div class="uploadPhoto">
								<div class="gap-30"></div>
								<form action="" method="post" enctype="multipart/form-data">
									<input type="file" name="image" class="modal-mt" id="image">
									<div class="gap-30"></div>
									<input type="submit" class="modal-mt btn btn-primary" value="Upload Image" name="submit">
								</form>
							</div>
                            <?php 
                                if (isset($_POST["submit"])) {
                                    $image_name=$_FILES['image']['name'];
                                    $temp = explode(".", $image_name);
                                    $newfilename = round(microtime(true)) . '.' . end($temp);
                                    $imagepath="upload/".$newfilename;
                                    move_uploaded_file($_FILES["image"]["tmp_name"],$imagepath);
                                    mysqli_query($link, "update user set photo='".$imagepath."' where user_id='".$_SESSION['user_id']."'");
                                    
                                    ?>
                                        <script type="text/javascript">
                                            window.location="profile.php";
                                        </script>
                                    <?php
                                }
                            ?>
						</div>
						<div class="col-md-8 ml-30">
							<div class="bg-light p-3 rounded">
								<?php
                                   $res5 = mysqli_query($link, "select * from user where user_id='$_SESSION[user_id]' ");
                                   while($row5 = mysqli_fetch_array($res5)){
                                       $school_id    = $row5['school_id'];
                                       $user_id      = $row5['user_id'];
                                       $phone_number = $row5['phone_number'];
                                       $first_name   = $row5['first_name'];
                                       $middle_name  = $row5['middle_name'];
                                       $last_name    = $row5['last_name'];
                                       $street       = $row5['street'];
                                       $barangay     = $row5['barangay'];

                                   }
                                   ?>
                                <form class="row g-2" method="post" action='<?php  echo htmlentities($_SERVER['PHP_SELF']) ?>'>
                                    <div class="col-md-12 pt-2 ">
                                        <label><h6>School ID*</h6> </label>
                                        <input type="text" class="form-control" placeholder="School_id" name="school_id" value="<?php echo $school_id; ?>" disabled />
                                    </div>
                                    <div class="col-md-8 pt-2 " >
                                        <label><h6>User ID*</h6> </label>
                                        <input type="text" class="form-control " placeholder="User ID" name="user_id" value="<?php echo $user_id; ?>" disabled />
                                    </div>
                                    <div class="col-md-4 pt-2 ">
                                        <label><h6>Contact Number*</h6> </label>
                                        <input type="text" class="form-control "  placeholder="Phone Number" name="phone_number" value="<?php echo $phone_number; ?>" />
                                    </div> 
                                    <div class="col-md-8 pt-2 ">
                                        <label><h6>First Name*</h6> </label>
                                        <input type="text" class="form-control" placeholder="First Name" name="first_name" value="<?php echo $first_name; ?>"/>
                                    </div>
                                    <div class="col-md-4 pt-2">
                                        <label><h6>Middle Name*</h6> </label>
                                         <input type="text" class="form-control "  placeholder="Middle Name"name="middle_name" value="<?php echo $middle_name; ?>" />
                                    </div>
                                    <div class="col-md-12 pt-2 ">
                                        <label><h6>Last Name*</h6> </label>
                                            <input type="text" class="form-control " placeholder="Last Name" name="last_name" value="<?php echo $last_name; ?>" />
                                    </div>
                                    <div class="col-md-6 pt-2">
                                    <label><h6>Street*</h6> </label>
                                         <input type="text" class="form-control " placeholder="Street" name="street" value="<?php echo $street; ?>" />
                                    </div>
                                        <div class="col-md-6 pt-2 ">
                                        <label><h6>Barangay*</h6> </label>
                                         <input type="text" class="form-control"  placeholder="Barangay" name="barangay" value="<?php echo $barangay; ?>" />
                                    </div>
                                    
                                    <div class="col-12 pt-2">
                                        <input type="submit"value="Save" class="btn btn-info btn-block" style="border-radius:20px" name="update">
                                    </div>
                                </form>
			                </div> 
                       
                            <?php
                           if (isset($_POST["update"])){

                            $userId = $_SESSION["user_id"];

                            echo $_POST['phone_number'];

                            $query = "UPDATE user SET phone_number='". $_POST['phone_number']."',first_name='". $_POST['first_name']."', middle_name='". $_POST['middle_name']."', last_name='". $_POST['last_name']."', 
                            street = '". $_POST['street']."', barangay ='". $_POST['barangay']."'
                            WHERE user_id = $userId";

                                   if( mysqli_query($link, $query) == true) {
                                    echo '
                                    <script type="text/javascript">
                                            window.location="profile.php?Update=success";
                                        </script>
                                    
                                    ';

                                   }
                            //        school_id='". $_POST['school_id'] ."',
                            //        user_id='". $_POST['user_id'] ."',
                            //        phone_number='". $_POST['phone_number'] ."',
                            //        first_name='".$_POST['first_name']."',
                            //        middle_name='".$_POST['middle_name']."',
                            //        last_name='".$_POST['last_name']."',
                            //        street='".$_POST['street']."',
                            //        barangay='".$_POST['barangay']."',
                            //        where user_id =$_SESSION[user_id]'")
                                 
                                
                              }
                            ?>
		                </div>    
					</div>
				</div>
			</div>					
		</div>
	</div>
	<?php 
		include 'inc/footer.php';
	 ?>