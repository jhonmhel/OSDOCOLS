<?php 
     session_start();
    if (!isset($_SESSION["user_id"])) {
        ?>
            <script type="text/javascript">
                window.location="login.php";
            </script>
        <?php
    }
    $page ="ma" ;
    include 'inc/header.php';
    include 'inc/connection.php';
  
 ?>

<style>
.header1{
  padding:20px 0px 0px 20px;
  color:#818181;
}
select{
    width: 218px;
}
.formaddacc{
    height: 500px;
    width: 800px;
    position: absolute;
    margin-top: 15px;
    margin-left: 180px;
    background-color: rgb(255, 255, 255);
	border-radius: 10px;
  	box-shadow: 0 14px 28px rgba(0,0,0,0.25), 
			0 10px 10px rgba(0,0,0,0.22);
	overflow: hidden;
	min-height: 300px;
}
.addbutton{
  height: 50px;
  width: 300px;
  color: white;
  background-color:#1F8A70;
  margin: 10px;
  margin-left: 245px;
  margin-top: 50px;
  border-color: transparent;
  letter-spacing: 5px;
  font-weight: bolder;
  font-family: Arial, Helvetica, sans-serif;
  cursor: pointer;
  border-radius: 100px;
}
.addbutton:hover{
    background-color: #00425A; 
    color: white;
}

.formaddacc h3{
    padding: 15px;
    margin-top: 10px;
    color: #20262E;
}
.textbox{
    padding-left: 60px;
  
    
}
.textbox input{
    height: 50px;
    font-size: 16px;
    margin-top: 10px;
    padding-left: 10px;
    margin-left: 8px;
}
.textbox select{
    height: 50px;
    font-size: 16px;
    padding: 10px;
    width: 210px;
    margin-left: 10px;
}
#text{
    padding:10px 10px 10px 10px;
}
</style>

<div class="main">
<div class="dashboard-content">
		<div class="dashboard-header">
			<div class="container"style="margin-top:50px; padding-top:20px">
				<div class="row">
					<div class="col-md-6">
						<div class="left">
							<p><span>|manage account</span.</p>
						</div>
					</div>
					<div class="col-md-6">
						<div class="right text-right">
							<a href="dashboard.php"><i class="fas fa-home"></i>home</a>
							<span class="disabled"></span>
						</div>
					</div>
				</div>
                <form action='inc/adduserfunction.php' method= 'POST'>
    <div class="formaddacc">
            <h3>Add Account</h3>
            <div class="textbox">
            <select name="role" required>
                    <option selected disabled > Select Role</option>
                    <option >Admin</option>
                    <option >School Librarian</option>
                </select>
                <input type="text" id="texts "name="school_id" placeholder="School ID" required> 
                <select name="school_name" required>
                    <option selected disabled > Select School</option>
                    <option>Calapan Central School </option>
                    <option>Lazareto Elementary School </option>
                    <option>Villa Antonio Elementary School </option>
                    <option>Salong Elementary School  </option>
                    <option> Suqui Elementary School </option>
                    <option> Bucayao National High School </option>
                    <option> Bayanan 1 Elementary School </option>
                    <option> Nag iba Elementary School </option>
                    <option> Batino Elementary School  </option>
                    <option > Malad Elementary School </option>
                    <option >Adriatico Memorial S
                    <option >Baruyan Elementary School  </option>
                    <option > Ma. Estrella PVG Tawiran Elementary School </option>
                    <option > T.C Montellano Memorial School </option>
                    <option > Tawagan Elementary School </option>
                    <option > Ibaba Elementary School </option>
                    <option > M.Kalaw Memorial School </option>
                    <option > Navotas Elementary School </option>
                    <option > San Antonio Elementary School  </option>
                    <option > Canubing National High School</option>
                    <option > Bucayao Elementary School  </option>
                    <option > Bayanan II Elementary School </option>
                    <option > Nag iba National High School </option>
                    <option > Camilmil Central School</option>
                    <option > P.Tolentino Memorial School </option>
                    <option > Malamig Elementary School </option>
                    <option > Canubing 1 Elementary School</option>
                    <option > Patas Elementary School </option>
                    <option > Wawa Elementary School </option>
                    <option > Gutad Elementary School </option>
                    <option > Bulusan Elementary School </option>
                    <option > Maidlang Elementary School </option>
                    <option > Parang Elementary School </option>
                    <option > Silonay Elementary School </option>
                    <option > Pedro V. Panaligan Memorial National Highschool</option>
                    <option > Managpi Elementary School </option>
                    <option > Biga Elementary School </option>
                    <option > Camansihan Elementary School </option>
                    <option > Lalud  Elementary School </option>
                    <option > F. Samaco Memorial School </option>
                    <option > Balingayan Elementary School</option>
                    <option > Canubing II Elementary School. </option>
                    <option > Sta.Isabel Elementary School</option>
                    <option > Ceriaco A. Abes Memorial National High School </option>
                    <option > Guinobatan Elementary School </option>
                    <option > N. Aboboto Memorial  School</option>
                    <option > Parang National High School</option>
                    <option > Sto.Nino Elementary School </option>
                    <option > Oriental Mindoro National High School</option>
                    <option > Managpi National High School </option>
                    <option > Buhuan Elementary School </option>
                    <option > Caguisikan Elementary School</option>
                    <option > M. Pasig Memorial School </option>
                    <option > Personas  Elementary School </option>
                    <option > Sta Cruz Elementary School </option>
                    <option > Masipit Elementary School</option>
                    <option > Community Vocational High School </option>

                </select>
                <input type="text" id="texts "name="first_name" placeholder="First Name" required> 
                <input type="text" id="texts "name="middle_name" placeholder="Middle Name(Optional)"> 
                <input type="text" id="texts "name="last_name" placeholder="Lastname" required> 
                <input type="text" id="texts "name="user_id" placeholder="User ID" required> 
                <input type="text" id="texts "name="password" placeholder="Password" required> 
                <input type="number" maxlength="11" id="texts"name="phone_number" placeholder="Phone Number" required> 
                <input type="text" id="texts "name="street" placeholder="Street" required> 
                <input type="text" id="texts "name="barangay" placeholder="Barangay" required> 
                <input type="text" id="texts "name="city" Value="Calapan" readonly style="color:#818181"> 

            </div>
            <button type="submit" class="addbutton" name="submit">SAVE</button>
    </div>
    </form>
    <?php 
		include 'inc/footer.php';
	 ?>


