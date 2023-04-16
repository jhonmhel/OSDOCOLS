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
                            <table id="dtBasicExample" class="table table-bordered text-center"style="font-size: 12px;">
									<thead>
										<tr>
											<th>Sender</th>
											<th>Messages</th>
											<th>Time</th>
                                            <th>Actions </th>
										</tr>
									</thead>
									<tbody>
									<?php
					$res = mysqli_query($link, "select * from message");
					while ($row = mysqli_fetch_array($res)) {
						echo "<tr>";
						echo "<td>"; echo $row["f_school_name"]; echo "</td>";
						echo "<td>"; echo $row["message"]; echo "</td>";
						echo "<td>"; echo $row["time"]; echo "</td>";
						echo "<td>";
						echo '<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete'.$row["id"].'">
								<i class="far fa-trash-alt"></i>
							</button>
							<!-- Modal with form -->
							<div class="modal text-center modal fade" id="delete'.$row["id"].'">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title"><font color="red">Notice!</font></h5>
											<button type="button" class="close" data-dismiss="modal">&times;</button>
										</div>
										<div class="modal-body">
											<form>
												<div class="form-group">
													<h5>Are you sure you want to delete this message?</h5>
													<a href="delete-message.php?id='.$row["id"].'"><button type="button" class="btn btn-danger">Yes!</button></a>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>';
						echo "</td>";
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