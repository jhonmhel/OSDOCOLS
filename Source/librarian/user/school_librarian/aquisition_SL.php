<?php 
    session_start();
    if (!isset($_SESSION["user_id"])) {
        ?>
            <script type="text/javascript">
                window.location="login.php";
            </script>
        <?php
    }
    $page = 'aqui';
    include 'inc/header.php';
    include 'inc/connection.php';
 ?>
 <style>
    label{
        font-size: 15px;
        margin-left: 5px;
		
       
    }
	.form-control::placeholder{
			color:darkgrey;
			font-weight: 15px;
	}	
	.form-group{
		width: 300px;
		margin-left: 20px;
	}


 </style>
	<!--dashboard area-->
    <div class="dashboard-content">
		<div class="dashboard-header">
			<div class="container"style="margin-top:50px; padding-top:20px; margin-left: 15px">
				<div class="row">
					<div class="col-md-6">
						<div class="left">
							<p><span>|Add books</span></p>
						</div>
					</div>
					<div class="col-md-6">
						<div class="right text-right">
							<a href="dashboard.php"><i class="fas fa-home"></i>Dashboard</a>
							<span class="disabled"></span>
						</div>
					</div>
				</div>
				<div class="d-flex justify-content-center">
                        <div class="bg-light p-3 " style="width:80%; border-radius: 20px">
							<form class="row g-2" action='inc/add_book.php' method= 'POST'>

							<div class="col-md-6 pt-2 ">
								<label style="font-size: 12px">Accession Number*</label>
								<input type="text" class="form-control" name="accession_number" placeholder="Enter Accession number"required>
							</div>
							<div class="col-md-6 pt-2 ">
								<label style="font-size: 12px">ISBN*</label>
								<input type="text" class="form-control" name="isbn" placeholder="Enter ISBN"required>
							</div>
							<div class="col-md-6 pt-2 ">
								<label style="font-size: 12px">ISSN*</label>
								<input type="text" class="form-control" name="issn" placeholder="Enter ISSN"required>
							</div>
							<div class="col-md-6 pt-2 ">
								<label style="font-size: 12px">LCCN*</label>
								<input type="text" class="form-control" name="lccn" placeholder="Enter LCCN"required>
							</div>
							<div class="col-md-12 pt-2 ">
								<label style="font-size: 12px">Title*</label>
								<input type="text" class="form-control" name="title" placeholder="Enter Title"required>
							</div>
							<div class="col-md-12 pt-2 ">
								<label style="font-size: 12px">Authors*</label>
								<input type="text" class="form-control" name="authors" placeholder="Enter Authors"required>
							</div>
							<div class="col-md-4 pt-2 ">
								<label style="font-size: 12px">Published Date*</label>
								<input type="date" class="form-control" name="publish_date" required>
							</div>
							<div class="col-md-8 pt-2 ">
								<label style="font-size: 12px">Publisher*</label>
								<input type="text" class="form-control" name="publisher" placeholder="Enter Publisher"required>
							</div>
							<div class="col-md-6 pt-2 ">
								<label style="font-size: 12px">Book Category*</label>
								<input type="text" class="form-control" name="book_category" placeholder="Enter Book category"required>
							</div>
							<div class="col-md-6 pt-2 ">
								<label style="font-size: 12px">Book Status*</label>
								<select class="form-control" id="book_status" name="book_status" required>
                                             <option selected disabled >Select Book status</option>
                                             <option >AVAILABLE</option>
                                             <option >NOT AVAILABLE</option>
                                         </select>
							</div>
							<div class="col-md-12 pt-2 ">
								<label style="font-size: 12px">Material Type*</label>
								<input type="text" class="form-control" name="material_type" placeholder="Enter Material type"required>
							</div>
							<div class="col-md-12 pt-2 ">
								<label style="font-size: 12px">Book Remarks*</label>
								<!-- <textarea class="form-control" name="comment" rows="5" cols="50" name="book_remarks" placeholder="Enter Book remarks"required></textarea> -->
								<input type="text" class="form-control" name="book_remarks" placeholder="Enter Book remarks"required>
							</div>
							<div class="col-md-6 pt-2 ">
								<label style="font-size: 12px">Edition*</label>
								<input type="text" class="form-control" name="edition" placeholder="Enter Edition"required>
							</div>
							<div class="col-md-6 pt-2 ">
								<label style="font-size: 12px">Book Cover*</label>
								<select class="form-control" id="book_cover" name="book_cover" placeholder="Select book cover"required>
											 <option selected disabled >Select Book cover</option>
                                             <option >Hard Bound</option>
                                             <option >Soft Bound</option>
                                             <option >Paper Back</option>
                                         </select>
							</div>
							<div class="col-md-6 pt-2 ">
								<label style="font-size: 12px">Book Section*</label>
								<input type="text" class="form-control" name="book_section" placeholder="Enter Book section"required>
							</div>
							<div class="col-md-6 pt-2 ">
								<label style="font-size: 12px">Subject*</label>
								<input type="text" class="form-control" name="subject" placeholder="Enter Subject"required>
							</div>
							<div class="col-md-8 pt-2 ">
								<label style="font-size: 12px">Book Shelves*</label>
								<input type="text" class="form-control" name="book_shelved" placeholder="Enter Book shelves"required>
							</div>
							<div class="col-md-4 pt-2 ">
								<label style="font-size: 12px">Copyright Year*</label>
								<input type="date" class="form-control" name="copyright" placeholder="Enter Copyright year"required>
							</div>
							<div class="col-md-8 pt-2 ">
								<label style="font-size: 12px">Extent*</label>
								<input type="text" class="form-control" name="extent" placeholder="Enter Extent"required>
							</div>
							<div class="col-md-4 pt-2 ">
								<label style="font-size: 12px">Size*</label>
								<input type="text" class="form-control" name="size" placeholder="Enter Size"required>
							</div>
							<div class="col-md-8 pt-2 ">
								<label style="font-size: 12px">Place*</label>
								<input type="text" class="form-control" name="place" placeholder="Enter Place"required>
							</div>
							<div class="col-md-4 pt-2 ">
								<label style="font-size: 12px">Keywords to search*</label>
								<input type="text" class="form-control" name="key_word" placeholder="Enter Keywords"required>
							</div>
							
							<div class="col-12 p-2">
								<button type="submit" class="btn btn-primary btn-block" style="border-radius:20px" name="submit">Add Books</button>
								
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