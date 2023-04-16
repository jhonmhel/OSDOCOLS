<?php 
     session_start();
    if (!isset($_SESSION["user_id"])) {
        ?>
            <script type="text/javascript">
                window.location="login.php";
            </script>
        <?php
    }
    $page ='att';
    include 'inc/header.php';
    include 'inc/connection.php';
 ?>
 
	<!--dashboard area-->
    <div class="dashboard-content">
		<div class="dashboard-header">
			<div class="container"style="margin-top:50px; padding-top:20px; margin-left: 15px">
				<div class="row">
					<div class="col-md-6">
						<div class="left">
							<p><span>|Attendace</span></p>
						</div>
					</div>
					<div class="col-md-6">
						<div class="right text-right">
							<a href="dashboard.php"><i class="fas fa-book"></i>Dashboard</a>
							<span class="disabled"></span>
						</div>
					</div>
				</div>

                    <div class="d-flex justify-content-center">
                        <div class="bg-light p-3 " style="width:50%; border-radius: 20px">
                            <form class="row g-2" action='inc/add_attendance.php' method= 'POST'>
                                <h2 style=" margin-left: 100px; color: #1F8A70">Library Attendance</h2>
                                <div class="col-md-12 pt-2 ">
                                    <input type="text" class="form-control" name="full_name" placeholder= "Enter Full Name">
                                </div>
                                <div class="col-md-12 pt-2 ">
                                    <input type="text" class="form-control" name="school_name" placeholder= "Enter School Name">
                                </div>
                                <div class="col-md-6 pt-2 ">
                                    <label style="font-size: 15px">Select Time In*</label>
                                    <div class="input-group ">
                                        <input type="time" name="time_in" min="09:00" max="18:00" required class="form-control">
                                        <div class="input-group-append">
                                            <span class="input-group-text">AM/PM</span>
                                        </div>
                                    </div>
                                    </div>

                                    <div class="col-md-6 pt-2 ">
                                    <label style="font-size: 15px">Select Time Out*</label>
                                    <div class="input-group ">
                                        <input type="time" name="time_out" min="09:00" max="18:00" required class="form-control">
                                        <div class="input-group-append">
                                            <span class="input-group-text">AM/PM</span>
                                        </div>
                                    </div>
                                    </div>
                                <div class="col-12 p-4" >
                                    <button type="submit" name="submit" class="btn btn-primary btn-block" style="border-radius: 20px">Add Attendance</button>
                                </div>
                            </form>
                        </div>
                    </div>



				
			</div>					
		</div>
	</div>
	<?php 
		include 'inc/footer.php';
	 ?>