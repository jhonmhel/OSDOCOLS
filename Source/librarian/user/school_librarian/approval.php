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
			<div class="container" style="margin-top:50px; padding-top:20px; margin-left: 15px">
				<div class="row">
					<div class="col-md-6">
						<div class="left">
							<p><span>|Approval</span></p>
						</div>
					</div>
					<div class="col-md-6">
						<div class="right text-right">
							<a href="dashboard.php"><i class="fas fa-home"></i>Dashboard</a>
							<span class="disabled"></span>
						</div>
					</div>
				</div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Approval Request</h5>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped table-hover" id="approvalTbl">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Quantity</th>
                                            <th>Borrowing Days</th>
                                            <th>Borrowed Date</th>
                                            <th>Borrower</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $current_user_id = $_SESSION['user_id'];

                                            $res = mysqli_query($link, "SELECT 
                                            bb.id, 
                                            b.title, 
                                            bb.borrowing_quantity, 
                                            bb.borrowed_days, 
                                            bb.borrowing_date,
                                            u.school_name,
                                            bb.status
                                            FROM borrowed_books bb
                                            JOIN books b ON b.accession_number = bb.accession_number
                                            JOIN school s ON b.school_id = s.school_id
                                            JOIN user u ON bb.borrower = u.user_id
                                            WHERE u.user_id != '$current_user_id'");
                                            while ($row = mysqli_fetch_array($res)):  
                                        ?>
                                        <tr>   
                                            <td><?php  echo $row["title"];  ?> </td>    
                                            <td><?php  echo $row["borrowing_quantity"];  ?> </td>    
                                            <td><?php  echo $row["borrowed_days"];  ?> </td>    
                                            <td><?php  echo $row["borrowing_date"];  ?> </td>    
                                            <td><?php  echo $row["school_name"];  ?> </td>    
                                            <td>
                                                <?php 
                                                    if ($row["status"] == 'Pending') {
                                                        echo '<span class="text-warning">'.$row["status"].'</span>';
                                                    } else if($row["status"] == 'Approved'){
                                                        echo '<span class="text-success">'.$row["status"].'</span>';
                                                    }else{
                                                        echo '<span class="text-danger">'.$row["status"].'</span>';
                                                    }
                                                
                                                    
                                                ?> 
                                            </td>  
                                            <td>
                                                <a href="crud_borrow_book/status.php?id=<?php echo $row['id']; ?>&status=Approved" title="Approved" class="btn btn-success btn-sm"><i class="fas fa-thumbs-up"></i></a>
                                                <a href="crud_borrow_book/status.php?id=<?php echo $row['id']; ?>&status=Reject" title="Reject" class="btn btn-danger btn-sm"><i class="fas fa-thumbs-down"></i></a>
                                            </td>  
                                        </tr>
                                        <?php endwhile; ?>
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
        $()
        $('#approvalTbl').DataTable();
    </script>