<?php 
     session_start();
    if (!isset($_SESSION["user_id"])) {
        ?>
            <script type="text/javascript">
                window.location="login.php";
            </script>
        <?php
    }
    $page = 'catalogue';
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
							<p><span>|Catalogue</span></p>
						</div>
					</div>
					<div class="col-md-6">
						<div class="right text-right">
							<a href="dashboard.php"><i class="fas fa-home"></i>Dashboard</a>
							<span class="disabled"></span>
						</div>
					</div>
				</div>
                <?php 

                $searchTerm = ""; // initialize search term variable
                if(isset($_POST['submit'])){ // check if form has been submitted
                    $searchTerm = mysqli_real_escape_string($link, $_POST['search']); // get search term from input field
                }
                ?>
                   <div class="books">
                    <form action="" method="post" name="form1">
                        <table class="table">
                            <tr>
                                <td>
                                    <input type="text" name="search" class="form-control" style="border-radius:30px; width: 300px; margin-left: 300px " placeholder="Search for a book" value="<?php echo $searchTerm; ?>">
                                </td>
                                <td>
                                    <input type="submit" name="submit" class="btn btn-info" style="border-radius:30px; margin-left: -450px" value="Search">
                                </td>
                            </tr>
                        </table>
                    </form>

                    <div class="student-wrapper">
                <div class="col-md-15">
                        <div class="table-responsive"style="overflow: hidden; margin-left: -10px">
                            <table id="dtBasicExample" class="table table-sm table-hover text-center"style="font-size: 12px;">
                                <thead>
                                    <tr>

                                        <th>Accession No.</th>
                                        <th>Title</th>
                                        <th>Author(s)</th>
                                        <th>School name</th>
                                        <th>Book Status</th>
                                        <th>Book Remarks</th>     
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="table-body">
                                <?php
                              
                            
                              
                            $searchTerm = mysqli_real_escape_string($link, $searchTerm); 
                            $res = mysqli_query($link, "SELECT books.accession_number, books.title, books.authors, school.school_name, books.book_status, books.book_remarks
                                     FROM books
                                     INNER JOIN school
                                     ON books.school_id = school.school_id
                                     INNER JOIN search
                                     ON books.title = search.title
                                     WHERE books.book_status = 'AVAILABLE' 
                                     AND (books.title LIKE '%".$searchTerm."%' OR search.key_word LIKE '%".$searchTerm."%')");

                                while ($row = mysqli_fetch_array($res)): ?>

                                    <tr>
                                        <td><?php  echo $row["accession_number"];  ?> </td>  
                                        <td><?php  echo $row["title"];  ?> </td>    
                                        <td><?php  echo $row["authors"];  ?> </td>       
                                        <td><?php  echo $row["school_name"];  ?> </td>    
                                        <td><?php  echo $row["book_status"];  ?> </td>    
                                        <td><?php  echo $row["book_remarks"];  ?> </td>  
                                       

                                        <td>
                                        <button type="button" id="editBtn" class="btn btn-primary editBtn" style="border-radius: 30px; font-size: 12px; " onclick="requestBook(<?php echo $row['accession_number']; ?>)">
                                            Request
                                        </button>
                                        </td>
                                     </tr>
                                     <?php endwhile; ?>
				</div>
			</div>					
		</div>
	</div>
	<?php 
		include 'inc/footer.php';
	 ?>
     <script>
        function requestBook(accessionNumber) {
            window.location.href = 'borrow_book.php?accession_number=' + accessionNumber;
        }
        // Get the table body element
        const tableBody = document.querySelector('#table-body');
        if (tableBody.rows.length === 0) {
        const emptyMessage = document.querySelector('#empty-message');
        emptyMessage.innerText = 'No books found.';
        }
     </script>
