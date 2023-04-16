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
 ?>
	<!--dashboard area-->
	<div class="dashboard-content">
		<div class="dashboard-header">
			<div class="container"style="margin-top:50px; padding-top:20px">
				<div class="row">
					<div class="col-md-6">
						<div class="left">
							<p><span>|Total number of Accounts</span></p>
						</div>
					</div>
					<div class="col-md-6">
						<div class="right text-right">
							<a href="dashboard.php"><i class="fas fa-home"></i>dashboard</a>
							<span class="disabled"></span>
						</div>
					</div>
				</div>
			</div>					
		</div>
        <div class="student-wrapper">
           <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive"style="overflow: hidden;">     
                            <table id="dtBasicExample" class="table table-bordered text-center"style="font-size: 12px;">
                                <thead>
                                    <tr>
                                        <th>Roles</th>
                                        <th>School ID</th>
                                        <th>User ID</th>
                                        <th>Password</th>
                                        <th>Contact Number</th>
                                        <th>Name</th>
                                        <th>School Name</th>
                                        <th>Address</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $res = mysqli_query($link, "SELECT *, CONCAT(first_name, ' ', middle_name, ' ', last_name) AS full_name, CONCAT(street, ', ', barangay, ', ', city) AS address FROM user ");
                                    while ($row = mysqli_fetch_array($res)) {
                                        echo "<tr>";
                                        echo "<td>"; echo $row["roles"]; echo "</td>";
                                        echo "<td>"; echo $row["school_id"]; echo "</td>";
                                        echo "<td>"; echo $row["user_id"]; echo "</td>";
                                        echo "<td>"; echo $row["passwords"]; echo "</td>";
                                        echo "<td>"; echo $row["phone_number"]; echo "</td>";
                                        echo "<td>"; echo $row["full_name"]; echo "</td>";
                                        echo "<td>"; echo $row["school_name"]; echo "</td>";
                                        echo "<td>"; echo $row["address"]; echo "</td>";
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
	<?php 
		include 'inc/footer.php';
	 ?>
   <script>
    $(document).ready(function () {
        $('#dtBasicExample').DataTable({
            "lengthMenu": [[5, 10, 25, -1], [5, 10, 25, "All"]]
        });
        $('.dataTables_length').addClass('bs-select');
    });
</script>