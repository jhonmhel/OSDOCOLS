<?php 		
    session_start();
    if (!isset($_SESSION["user_id"])) {
        ?>
            <script type="text/javascript">
                window.location="login.php";
            </script>
        <?php
    }
    $page = 'manage_book';
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
							<p><span>|Manage Books</span></p>
						</div>
					</div>
              

					<div class="col-md-6">
						<div class="right text-right">
							<a href="dashboard.php"><i class="fas fa-home"></i>Dashboard</a>
							<span class="disabled"></span>
						</div>
					</div>
				</div>
				<div class="student-wrapper">
                <div class="col-md-15">
                        <div class="table-responsive"style="overflow: hidden;">
                            <table id="dtBasicExample" class="table table-bordered text-center"style="font-size: 12px;">
                                <thead >
                                    <tr>
                                        <th>Accession no.</th>
                                        <th>Title</th>
                                        <th>Author(s)</th>
                                        <th>Copyright Year</th>
                                        <th>Book Cover</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody >
                                <?php
                                    //  $res = mysqli_query($link, "Select * books where school_id ='school_id'");
                                    $current_user_id = $_SESSION['user_id'];

                                    $res = mysqli_query($link, "SELECT b.accession_number, b.title, b.authors, b.copyright,
                                                                b.book_cover, b.book_status 
                                                                FROM books b
                                                                INNER JOIN school s ON b.school_id = s.school_id
                                                                INNER JOIN user u ON s.school_id = u.school_id
                                                                WHERE u.user_id = '$current_user_id'");
                                     while ($row = mysqli_fetch_array($res)):  ?>

                                    <tr>
                                        <td><?php  echo $row["accession_number"];  ?> </td>    
                                        <td><?php  echo $row["title"];  ?> </td>    
                                        <td><?php  echo $row["authors"];  ?> </td>    
                                        <td><?php  echo $row["copyright"];  ?> </td>    
                                        <td><?php  echo $row["book_cover"];  ?> </td>    
                                        <td><?php  echo $row["book_status"];  ?> </td>  
                                          
                                        <td>
                                            <button type="button" id="editBtn" class="btn btn-success editBtn" style="" onclick="requestBook(<?php echo $row['accession_number']; ?>)">
                                            <i class="far fa-edit"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?php echo $row["accession_number"] ?>">
                                                <i class="far fa-trash-alt"></i>
                                            </button>
                                            <!-- Modal with form -->
                                            <div class="modal text-center" id="delete<?php echo $row["accession_number"] ?>">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"><font color="red">Notice!</font></h5>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form>
                                                                <div class="form-group">
                                                                    <h5>Are you sure you want to delete this book?</h6>
                                                                    <a href="book-delete.php?id= <?php echo $row["accession_number"] ?>"><button type="button" class="btn btn-danger">Yes!</button></a>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
        function requestBook(accessionNumber) {
                window.location.href = 'edit_books.php?accession_number=' + accessionNumber;
            }
   
        // $(".editBtn").on('click', function (e) {
        //         var accession_number = $(this).attr('data-id');
        //         console.log(accession_number);
        //         location.href="inc/edit_bookFunction.php?accession_number="+accession_number;
        //     }); 
        $(document).ready(function () {
        $('#dtBasicExample').DataTable({
            "lengthMenu": [[5, 10, 25, -1], [5, 10, 25, "All"]]
        });
        $('.dataTables_length').addClass('bs-select');
        });
        // const queryString = window.location.search;
        // const urlParams = new URLSearchParams(queryString);
        // const md = urlParams.get('modalDisplay');
        // console.log(md);
        // if(md == "true") {
        //     $("#myModal").modal('show');
        // }
   
        // $(document).ready(function () {

        //     const queryString = window.location.search;
        //     const urlParams = new URLSearchParams(queryString);
        //     const md = urlParams.get('modalDisplay');
        //     console.log(md);
        //     if(md == "true") {
        //         $("#myModal").modal('show');
        //     }
        // });
</script>