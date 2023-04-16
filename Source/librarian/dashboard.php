<?php 
     session_start();
    if (!isset($_SESSION["user_id"])) {
        ?>
            <script type="text/javascript">
                window.location="../../login.php";
            </script>
        <?php
    }
    $page = 'home';
    include 'inc/header.php';
    include 'inc/connection.php';
 ?>
 <style>
	.box {
		border-left: 5px solid cyan;
		border-radius: 0px 0px 20px 0px ; 	
	}
	/* body{
		background-image: url(../../images/library11.jpg);
		background-size: cover;
	} */
 </style>
 <body >
	<!--dashboard area-->
	<div class="dashboard-content">
		<div class="dashboard-header">
			<div class="container"style="margin-top:50px; padding-top:20px">
				<div class="row">
					<div class="col-md-6">
						<div class="left">
							<p><span style="color:white">|dashboard</span></p>
						</div>
					</div>
					<div class="col-md-6">
						<div class="right text-right">
							<a href="dashboard.php"style="color:white"><i class="fas fa-home text-light "></i>home</a>
							<span class="disabled"></span>
						</div>
					</div>	
				</div>
				<div class="row counterup"style="width: 1000px; margin-left: 35px; ">
					<div class="col-md-3 col-sm-3 col-xs-12 control">
						<div class="box" style="background: rgba(0, 0, 0, 0.44);
												border: 0px 0px 10px 0px;
												box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
												backdrop-filter: blur(1.8px);
												-webkit-backdrop-filter: blur(0.8px);" >
							<div class="icon">
								<i class="fa fa-user"></i>
							</div>
							<div class="text">
								<h3><span class="counter">
                                    <?php
                                         $res = mysqli_query($link, "select * from user where roles = 'School Librarian'");
                                         $count = mysqli_num_rows($res);
										$result = $count;
                                         echo $result;
                                    ?>
                                    </span></h3>
								<h6><a href="all_librarian_info.php" style="text-decoration:transparent; color:white;padding-top:10px">School Librarians</a></h6>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12 control">

<div class="box" style="
				background: rgba(0, 0, 0, 0.44);
				border: 0px 0px 10px 0px;
				box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
				backdrop-filter: blur(1.8px);
				-webkit-backdrop-filter: blur(0.8px);" >
							<div class="icon">
								<i class="fa fa-paper-plane"></i>
							</div>
							<div class="text">
								<h3><span class="counter">
                                    <?php
									 
									  $res = mysqli_query($link, "select * from books");
									  $count = mysqli_num_rows($res);
									 $result = $count;
									  echo $result;
                                        //  $res = mysqli_query($link, "select * from issue_book");
                                        //  $res2 = mysqli_query($link, "select * from t_issuebook");
                                        //  $count2 = mysqli_num_rows($res2);
                                        //  $count = mysqli_num_rows($res);
                                        //  $result = $count + $count2;
                                        // echo $result;
                                    ?>
                                    </span></h3>
									<h6><a href="#" style="text-decoration:transparent; color:white;padding-top:10px">Online</a></h6>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12 control">
						<div class="box " style="background: rgba(0, 0, 0, 0.44);
				border: 0px 0px 10px 0px;
				box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
				backdrop-filter: blur(1.8px);
				-webkit-backdrop-filter: blur(0.8px);" >
							<div class="icon">
								<i class="fa fa-bell"></i>
							</div>
							<div class="text">
								<h3><span class="counter">
                                    <?php
                                         $res = mysqli_query($link, "select * from message");
                                         $count = mysqli_num_rows($res);
                                        echo $count;
                                    ?>
                                    </span></h3>
									<h6><a href="notifadmin.php" style="text-decoration:transparent; color:white;padding-top:10px">Notifications</a></h6>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12 control">
						<div class="box " style="background: rgba(0, 0, 0, 0.44);
							border: 0px 0px 10px 0px;
							box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
							backdrop-filter: blur(1.8px);
							-webkit-backdrop-filter: blur(0.8px);" >
							<div class="icon">
								<i class="fa fa-users"></i>
							</div>
							<div class="text">
								<h3><span class="counter">
                                    <?php
                                         $res = mysqli_query($link, "select * from user");
                                         $count = mysqli_num_rows($res);
                                        echo $count;
                                    ?>
                                    </span></h3>
									<h6><a href="total_accountsadmin.php" style="text-decoration:transparent; color:white;padding-top:10px">Total no. of Accounts</a></h6>
							</div>
						</div>
					</div>
				
					<div class="col-md-3 col-sm-3 col-xs-12 control">
						<div class="box " style="background: rgba(0, 0, 0, 0.44);
							border: 0px 0px 10px 0px;
							box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
							backdrop-filter: blur(1.8px);
							-webkit-backdrop-filter: blur(0.8px);" >
							<div class="icon">
								<i class="fa fa-users"></i>
							</div>
							<div class="text">
								<h3><span class="counter">
                                    <?php
                                         $res = mysqli_query($link, "select * from books");
                                         $count = mysqli_num_rows($res);
                                        echo $count;
                                    ?>
                                    </span></h3>
									<h6><a href="admin_total_inventory.php" style="text-decoration:transparent; color:white;padding-top:10px">Total No. of All Book(s)</a></h6>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12 control">
						<div class="box" style="background: rgba(0, 0, 0, 0.44);
				border: 0px 0px 10px 0px;
				box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
				backdrop-filter: blur(1.8px);
				-webkit-backdrop-filter: blur(0.8px);" >
							<div class="icon">
								<i class="fab fa-staylinked"></i>
							</div>
							<div class="text">
								<h4 class="mt-20"><a href="status.php">Status</a></h4>
							</div>
						</div>
					</div>
					</div>
				</div>
			</div>					
		</div>
	</div >
	</body>
	<?php 
		include 'inc/footer.php';
	 ?>
