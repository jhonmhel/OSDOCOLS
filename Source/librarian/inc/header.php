<?php
    include 'inc/connection.php';
    $not=0;
    $res = mysqli_query($link, "SELECT * FROM user WHERE roles='Admin'");
    if ($res) {
        $not = mysqli_num_rows($res);
    } else {
        echo "Error: " . mysqli_error($link);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>SDO Admin</title>
	<link rel="shortcut icon" href="../../images/libraryhub.png" type="image/x-icon">
	<link rel="stylesheet" href="inc/css/bootstrap.min.css">
	<link rel="stylesheet" href="inc/css/fontawesome-all.min.css">
	<link rel="stylesheet" href="inc/css/datatables.min.css">
	<link rel="stylesheet" href="inc/css/pro1.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600" rel="stylesheet">
</head>
<style>
		body::-webkit-scrollbar {
		width: 0;
		}
</style>
<body>
	<div class="main-content "style=" height:100%">
		<div class="wrapper ">
			<div class="left-sidebar "style="width:285px; background-color: #1F8A70; height:100%; position:fixed; overflow-x: hidden;">
				<div class="p-title"style="background-color: #1F8A70">
                    <h3><a href="dashboard.php"><i class="fas fa-book"></i><span >0SDOCOLS</span></a></h3>
				</div>
				<div class="gap-40"></div>
				<div class="profile">
					<div class="profile-pic">
                        <?php
                            $res = mysqli_query($link, "select * from user where user_id='".$_SESSION['user_id']."'");
                            while ($row = mysqli_fetch_array($res)){
                                ?><img src="<?php echo $row["photo"]; ?> " height="" width="" alt="something wrong" class="rounded-circle"></a> <?php
                            }
                        ?>
					</div>
					<div class="profile-info text-center">
						<span>Welcome!</span>
						<h2>
              <?php 
                $res = mysqli_query($link, "SELECT * FROM user WHERE user_id='".$_SESSION['user_id']."'");
                while ($row = mysqli_fetch_array($res)){
                  $name  =  $row["first_name"];
                  echo $name;
                }
                
              ?>
              
            </h2>
					</div>
				</div>
				<div class="gap-30"></div>
				<div class="sidebar-menu"style="padding-top:110px;">
					<h3>General</h3>
					<div class="border"></div>
	                <ul>
	                    <li class="menu <?php if($page=='home'){ echo 'active';} ?>">
      						<a href="dashboard.php"><i class="fas fa-home"></i>Dashboard</a>
    					</li>
    					
    					  <li class="menu <?php if($page=='profile'){ echo 'active';} ?>">
      						<a href="profile.php"><i class="fas fa-id-card"></i>Manage Profile</a>
    					</li>
	                    <li class="menu <?php if($page=='sinfo'){ echo 'active';} ?>">
      						<a href="all_librarian_info.php"><i class="fas fa-desktop"></i>all Librarians information</a>
    					</li>
    					<li class="menu <?php if($page=='tinfo'){ echo 'active';} ?>">
      						<a href="admin_book_management.php"><i class="fas fa-list"></i>Manage Books</a>
    					</li>
						<li class="menu <?php if($page=='ma'){ echo 'active';} ?>">
      						<a href="adminaddacc.php"><i class="fas fa-user"></i>Manage Accounts</a>
    					</li>
						<li class="menu menu-toggle1">
      						<a href="#"><i class="fas fa-list-alt"></i>Reports<span class="fa fa-chevron-down"></span></a>
      						<ul class="menus1">
									<li><a href="">List of most borrowed books</a></li>
									<li><a href="">List of lost books</a></li>
									<li><a href="">List of damage books</a></li>
									<li><a href="">List of weeded books</a></li>
      						</ul>
    					</li>
						<li class="menu <?php if($page=='stl'){ echo 'active';} ?>">
      						<a href="send-to-librarian.php"><i class="fas fa-file"></i>Send Message</a>
    					</li>
    				
				</div>
			</div>
			<div class="content">
				<div class="inner"style="background-color: #1F8A70; margin-left: -5px; position:fixed; z-index: 1">
					<div class="heading text-center">
					
					</div>
					<div class="header-profile text-right"style="position:fixed; margin-left: 850px">
						<ul>
                            <li class="icon">
                                <a href="notifadmin.php" ><i class="fas fa-bell"></i></a>
                                <span class="count" onclick="window.location='notifadmin.php'"><b><?php echo $not; ?></b></span>
                            </li>
							<li class="dropdown">
								<?php
									$res = mysqli_query($link, "select photo from user where user_id='".$_SESSION['user_id']."'");
									if ($row = mysqli_fetch_array($res)) {
									?>
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
										<img src="<?php echo $row['photo']; ?>" alt="User Photo">
										<span>Admin</span>
									</a>
									<?php
									}
									?>
								<ul class="dropdown-menu"style="
											background: rgba(0, 0, 0, 0.25);
											border-radius: 12px;
											box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
											backdrop-filter: blur(4.1px);
											-webkit-backdrop-filter: blur(4.1px);
											border: 1px solid rgba(0, 0, 0, 0.06);">
									<li class="user-header text-center">
									<?php
										// prepare and bind
										$stmt = mysqli_prepare($link, "SELECT photo FROM user WHERE user_id = ?");
										mysqli_stmt_bind_param($stmt, "s", $_SESSION['user_id']);
										// execute the query
										if (mysqli_stmt_execute($stmt)) {
										// bind the result
										mysqli_stmt_bind_result($stmt, $photo);
										// fetch the result
										if (mysqli_stmt_fetch($stmt)) {
											echo '<img src="' . $photo . '" alt="">';
										}
										} else {
										echo 'Error: ' . mysqli_error($link);
										}
										// close the statement
										mysqli_stmt_close($stmt);
										echo '<p>' . $_SESSION["user_id"] . '</p>';
										//echo '<p>' . $_SESSION["user_id"] . '</p>';
									?>
									</li>

									<li class="user-footer">
										<ul>
											<li>
												<a href="logout.php"style="border-radius:12px;">logout</a>
											</li>
										</ul>
									</li>														
								</ul>
							</li>
						</ul>
					</div>															
				</div>
<!-- 
										<?php
                                        // $res = mysqli_query($link, "select * from user where user_id='".$_SESSION['user_id']."'");
                                        // while ($row = mysqli_fetch_array($res)){
                                            ?><img src="<?php //echo $row["photo"]; ?>" alt=""> <?php
                                        // }
                                        // ?>
										<p><?php //echo $_SESSION["user_id"]; ?></p> -->