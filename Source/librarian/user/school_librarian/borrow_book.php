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

    // if (isset($_GET['accession_number'])) {
    //     $accessionNumber = $_GET['accession_number'];
    //     $query = mysqli_query($link, "select 
    //     books.title, 
    //     books.book_status,
    //     books_copy.quantity,
    //     school.school_name
    //     from books 
    //     join school on school.school_id = books.school_id 
    //     join books_copy on books_copy.accession_number = books.accession_number 
    //     where books.accession_number = $accessionNumber");
    //     $row = mysqli_fetch_row($query);
    
    
 ?>
	<!--dashboard area-->
    <div class="dashboard-content">
		<div class="dashboard-header">
			<div class="container"style="margin-top:50px; padding-top:20px; margin-left: 15px">
				<div class="row">
					<div class="col-md-6">
						<div class="left">
							<p><span>|Requesting Book</span></p>
						</div>
					</div>
					<div class="col-md-6">
						<div class="right text-right">
							<a href="catalogue_SL.php"><i class="fas fa-book"></i>Back</a>
							<span class="disabled"></span>
						</div>
					</div>
				</div>


            <div class="d-flex justify-content-center">
                <div class="bg-light p-5 " style="width:80%;">
                    <form class="row" action="crud_borrow_book/request.php" method="post">
                    <input type="hidden" name="borrower" value="<?php echo $_SESSION["user_id"]; ?>">
                        <div class="col-6">
                            <label for="input1" class="form-label">Accesion_number</label>
                            <input type="text" class="form-control" name="accession_number" value="<?php echo $accessionNumber; ?>" readonly>
                        </div>
                        <div class="col-6">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" name="title" id="title" value="<?php echo $row[0]; ?>" readonly>
                        </div>
                        <div class="col-12">
                            <label for="school_name" class="form-label">School Name</label>
                            <input type="text" class="form-control" name="school_name" id="school_name" value="<?php echo $row[3]; ?>" readonly>
                        </div>
                        <div class="col-12">
                            <label for="status" class="form-label">Book Status</label>
                            <input type="text" class="form-control" value="<?php echo $row[1]; ?>" id="status" readonly>
                        </div>
                        <div class="col-6">
                            <label for="quantityAvailable" class="form-label">Quantity Available</label>
                            <input type="text" class="form-control" name="quantityAvailable" id="quantityAvailable" value="<?php echo $row[2]; ?>" readonly>
                        </div>
                        <div class="col-6">
                            <label for="quantityBorrowing" class="form-label">Quantity Borrowing</label>
                            <input type="number" class="form-control" name="quantityBorrowing" id="quantityBorrowing">
                        </div>
                        <div class="col-6">
                            <label for="DateToBorrow" class="form-label">Date To Borrow</label>
                            <input type="date" class="form-control" name="DateToBorrow" id="DateToBorrow">
                        </div>
                        <div class="col-6">
                            <label for="DaysDuration" class="form-label">Days Duration</label>
                            <input type="number" class="form-control" name="DaysDuration" id="DaysDuration">
                        </div>
                        <div class="col-12 mt-3">
                            <button type="submit" name="submit" class="btn btn-primary float-right">Request to Borrow</button>
                        </div>
                    </form>
                </div>
            </div>

<?php
    // } else {
    //     echo `<script>alert(can't get the accession number)</script>`;
    // }
?>

				
			</div>					
		</div>
	</div>
	<?php 
		include 'inc/footer.php';
	 ?>