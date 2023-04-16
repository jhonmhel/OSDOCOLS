<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

$page = 'sinfo';
include 'inc/header.php';
include 'inc/connection.php';

if (isset($_POST['deactivate'])) {
    $id = $_POST['deactivate'];

    // Check if the user with the given ID exists and has the 'School Librarian' role
    $check_query = mysqli_prepare($link, "SELECT id FROM user WHERE id=? AND roles='School Librarian'");
    mysqli_stmt_bind_param($check_query, "i", $id);
    mysqli_stmt_execute($check_query);
    $result = mysqli_stmt_get_result($check_query);

    if (mysqli_num_rows($result) > 0) {
        // Get the current status of the user
        $status_query = mysqli_prepare($link, "SELECT statuss FROM user WHERE id = ?");
        mysqli_stmt_bind_param($status_query, "i", $id);
        mysqli_stmt_execute($status_query);
        $status_result = mysqli_stmt_get_result($status_query);
        $status_row = mysqli_fetch_assoc($status_result);
        $current_status = $status_row['statuss'];

        // Update the status of the user
        if ($current_status == 'ACTIVE') {
            $update_query = mysqli_prepare($link, "UPDATE user SET statuss = 'INACTIVE' WHERE id = ?");
            mysqli_stmt_bind_param($update_query, "i", $id);
            mysqli_stmt_execute($update_query);
            $button_text = 'activate';
            $button_class = 'btn-success';
        } else {
            $update_query = mysqli_prepare($link, "UPDATE user SET statuss = 'ACTIVE' WHERE id = ?");
            mysqli_stmt_bind_param($update_query, "i", $id);
            mysqli_stmt_execute($update_query);
            $button_text = '';
            $button_class = 'btn-danger';
        }
    }
}

?>
 <style>
    td.status-active {
    color: green;
    font-weight: bold;
}

td.status-inactive {
    color: red;
    font-weight: bold;
}
 </style>
	<!--dashboard area-->
	<div class="dashboard-content">
    <form method="post"> 
		<div class="dashboard-header">
			<div class="container"style="margin-top:50px; padding-top:20px;">
				<div class="row">
					<div class="col-md-6">
						<div class="left">
							<p><span>|all Librarian informations</span></p>
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
                        <div class="table table-sm table-responsive"style="overflow: hidden;">     
                            <table id="dtBasicExample" class="table table-borderless"style="font-size: 12px;">
                                <thead >
                                    <tr >
                                        <th>School ID</th>
                                        <th>User ID</th>
                                        <th>Password</th>
                                        <th>Contact Number</th>
                                        <th>Name</th>
                                        <th>School Name</th>
                                        <th>Address</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody >
                                <?php
                                    $res = mysqli_query($link, "SELECT *, CONCAT(first_name, ' ', middle_name, ' ', last_name) AS full_name, CONCAT(street, ', ', barangay, ', ', city) AS address FROM user WHERE roles = 'School Librarian'");
                                    while ($row = mysqli_fetch_array($res)) {
                                        echo "<tr>";
                                        echo "<td>"; echo $row["school_id"]; echo "</td>";
                                        echo "<td>"; echo $row["user_id"]; echo "</td>";
                                        echo "<td>"; echo $row["passwords"]; echo "</td>";
                                        echo "<td>"; echo $row["phone_number"]; echo "</td>";
                                        echo "<td>"; echo $row["full_name"]; echo "</td>";
                                        echo "<td>"; echo $row["school_name"]; echo "</td>";
                                        echo "<td>"; echo $row["address"]; echo "</td>";
                                        echo "<td class='status-" . strtolower($row['statuss']) . "'>"; 
                                        echo $row["statuss"]; 
                                        echo "</td>";
                                        echo "<td>";
                                        $button_text = $row["statuss"] == 'ACTIVE' ? 'DEACTIVE' : 'ACTIVATE';
                                        $button_class = $row["statuss"] == 'ACTIVE' ? 'btn-danger' : 'btn-success';
                                        echo '<button type="submit" class="btn '.$button_class.'" name="deactivate" value="' . $row["id"] . '">'.$button_text.'</button>';
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
        </form>
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