<?php 
     session_start();
    if (!isset($_SESSION["user_id"])) {
        ?>
            <script type="text/javascript">
                window.location="login.php";
            </script>
        <?php
    }
    include 'inc/header.php';
    include 'inc/connection.php';
   // mysqli_query($link,"update request_books set read1='yes'");
 ?>
	<!--dashboard area-->
	<div class="dashboard-content">
		<div class="dashboard-header">
			<div class="container"style="padding-top: 70px">
				<div class="row">
					<div class="col-md-6">
						<div class="left">
							<p><span>|Notification</span></p>
						</div>
					</div>
					<div class="col-md-6">
						<div class="right text-right">
							<a href="dashboard.php"><i class="fas fa-home"></i>Home</a>
						</div>
					</div>
				</div>
				<div class="issued-content">
					<div class="row">
						<div class="col-md-12">
                        <div class="table-responsive"style="overflow: hidden;">     
                            <table id="dtBasicExample" class="table table-bordered table-hover table-sm text-center"style="font-size: 12px;">
									<thead style="height: 40px">
										<tr>
											<th>#</th>
											<th>FulL Name</th>
											<th>School Name</th>
                                            <th>Date</th>
                                            <th>Time In</th>
                                            <th>Time Out</th>
										</tr>
									</thead>
									<tbody>
                                        <?php
                                        $res = mysqli_query($link, "select * from attendance");
                                        while ($row = mysqli_fetch_array($res)) {
                                            echo "<tr>";
                                            echo "<td>"; echo $row["id"]; echo "</td>";
                                            echo "<td>"; echo $row["full_name"]; echo "</td>";
                                            echo "<td>"; echo $row["school_name"]; echo "</td>";
                                            echo "<td>"; echo $row["date"]; echo "</td>";
                                            echo "<td>"; echo $row["time_in"]; echo "</td>";
                                            echo "<td>"; echo $row["time_out"]; echo "</td>";
                                            echo "</tr>";
                                        }
                                        ?>
                                    </tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>					
		</div>
	</div>
 <?php 
	include 'inc/footer.php';
 ?>
   <script>
        $(document).ready(function () {
            $('#dtBasicExample').DataTable();
            $('.dataTables_length').addClass('bs-select');
        });
    </script>