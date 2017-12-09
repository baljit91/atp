<?php
 include("header.php");
 include("includes/form_controller/settings_controller.php");
#session_destroy();

 ?>



<div class="container">
    <div class="row profile">
		<div class="col-md-3">
			<div class="profile-sidebar">
				<!-- SIDEBAR USERPIC -->
				<div class="user_details column profile-userpic">
					<a href="#">
					<img src="<?php echo $user['profile_pic']; ?>"  style = "margin-left:60px">
					</a>

				</div>
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
						<?php 
						echo $_SESSION['first_name']; 
						echo " ";
						echo $_SESSION['last_name']; 
						?>
					</div>
					
				</div>

				<!-- END SIDEBAR USER TITLE -->
				<!-- SIDEBAR BUTTONS -->

				<!-- END SIDEBAR BUTTONS -->
				<!-- SIDEBAR MENU -->
				<div class="profile-usermenu">
					<ul class="nav">
						<li class="active">
							<a href="#" class="part1">
							<i class="glyphicon glyphicon-user"></i>
							Personal Details </a>
						</li>

						<li>
							<a href="#" class="part2">
							<i class="glyphicon glyphicon-check"></i>
							Test Results </a>
						</li>

						<li >
							<a href="#" class="part3">
							<i class="glyphicon glyphicon-user"></i>
							Account Settings </a>
						</li>


					</ul>
				</div>
				<!-- END MENU -->
			</div>
		</div>
		<!-- Personal Details-->
		<div id="part1" class="col-md-9">
            <div class="profile-content">

					   <div class="container" style="width: auto;">
					  <h2>My Profile</h2>
					  <ul class="nav nav-tabs">
					    <li class="active"><a data-toggle="tab" href="#home">Personal Details</a></li>
					    <li><a data-toggle="tab" href="#menu1">Education</a></li>
					    <li><a data-toggle="tab" href="#menu2">Professional</a></li>
					    <li><a data-toggle="tab" href="#menu3">Test</a></li>
					  </ul>

					  <div class="tab-content">
					    <div id="home" class="tab-pane fade in active">
					      <div>
					      	<div>
					      		<h3>Personal Details</h3>
					      	</div>



					      	<table class="table">


									      <?php
									          $table  = mysqli_query($con ,"SELECT * FROM users WHERE username = '$userLoggedIn'  ");
									             $row  = mysqli_fetch_array($table);{ ?>



									            <div class="<?php echo $row['id']; ?>">
									            	<div id="per-details">

									            	<div data-target="first_name">
									              	<span style="font-weight: 700;">First Name :</span>
									                <span style="margin-left: 20px"><?php echo $row['first_name']; ?></span>

									              </div>

									              <div data-target="last_name">
									              	<span style="font-weight: 700;">Last Name :</span>
									              	<span style="margin-left: 20px"><?php echo $row['last_name']; ?></span>
									              </div>


									              <div data-target="email">
									              	<span style="font-weight: 700;">Email :</span>
									              	<span style="margin-left: 20px"><?php echo $row['email']; ?></span>
									              </div>

									              <div>
					      							<h3>Permanent Address</h3>
					      						</div>

									             <div data-target="address">
									              	<span style="font-weight: 700;">Address :</span>
									              	<span style="margin-left: 20px"><?php echo $row['address']; ?></span>
									              </div>

									              <div data-target="state">
									              	<span style="font-weight: 700;">State :</span>
									              	<span style="margin-left: 20px"><?php echo $row['state']; ?></span>
									              </div>

									              <div data-target="city">
									              	<span style="font-weight: 700;">City :</span>
									              	<span style="margin-left: 20px"><?php echo $row['city']; ?></span>
									              </div>

									              <div data-target="zipcode">
									              	<span style="font-weight: 700;">Zip Code :</span>
									              	<span style="margin-left: 20px"><?php echo $row['zipcode']; ?></span>
									              </div>



									              <div>
									              		<span><a href="#" class="btn btn-primary" data-role="update" data-id="<?php echo $row['id'] ;?>">Update</a></span>
									              </div>


									            	</div>



									              </div>
									         <?php }
									       ?>


									  </table>






					      </div>
					    </div>
					    <div id="menu1" class="tab-pane fade">
					      <h3>Education Details</h3>
					      
                            <table class="table">


									      <?php
									          $table  = mysqli_query($con ,"SELECT * FROM users WHERE username = '$userLoggedIn'  ");
									             $row  = mysqli_fetch_array($table);{ ?>



									            <div class="<?php echo $row['id']; ?>">
									            	<div id="ed-details">

									            	<div data-target="university">
									              	<span style="font-weight: 700;">University :</span>
									                <span style="margin-left: 20px"><?php echo $row['university']; ?></span>

									              </div>

									              <div data-target="university_state">
									              	<span style="font-weight: 700;">University State :</span>
									              	<span style="margin-left: 20px"><?php echo $row['university_state']; ?></span>
									              </div>


									              <div data-target="year_of_completion">
									              	<span style="font-weight: 700;">Year of Completion :</span>
									              	<span style="margin-left: 20px"><?php echo $row['year_of_completion']; ?></span>
									              </div>


									              <div>
									              		<span><a href="#" class="btn btn-primary"  data-role="update" data-id="<?php echo $row['id'] ;?>">Update</a></span>
									              </div>


									            	</div>



									              </div>
									         <?php }
									       ?>


									  </table>


					    </div>
					    <div id="menu2" class="tab-pane fade">
					      <h3>Professional Details</h3>
					      

					    </div>
					    <div id="menu3" class="tab-pane fade">
					      <h3>Enter Company Name : </h3>
					      <form method = "POST" action="search_test.php">
								  Company name:<br>
								  <input type="text" name="Search">
								  <br>
								    <br><br>
								  <input type="submit" value="Submit">
								</form>
					    </div>
					  </div>
					</div>
            </div>







<!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Modal Header</h4>
          </div>
          <div class="modal-body">
              <div class="form-group">
                <label>First Name</label>
                <input type="text" id="first_name" class="form-control">
              </div>
              <div class="form-group">
                <label>Last Name</label>
                <input type="text" id="last_name" class="form-control">
              </div>

               <div class="form-group">
                <label>Email</label>
                <input type="text" id="email" class="form-control">
              </div>

              <div class="form-group">
                <label>Address</label>
                <input type="text" id="address" class="form-control">
              </div>


              <div class="form-group">
                <label>State</label>
                <input type="text" id="state" class="form-control">
              </div>


              <div class="form-group">
                <label>City</label>
                <input type="text" id="city" class="form-control">
              </div>

              <div class="form-group">
                <label>Zip Code</label>
                <input type="text" id="zipcode" class="form-control">
              </div>

              <div class="form-group">
                <label>University</label>
                <input type="text" id="university" class="form-control">
              </div>

              <div class="form-group">
                <label>University State</label>
                <input type="text" id="university_state" class="form-control">
              </div>

              <div class="form-group">
                <label>Year of Completion</label>
                <input type="text" id="year_of_completion" class="form-control">
              </div>


                <input type="hidden" id="userId" class="form-control">


          </div>
          <div class="modal-footer">
            <a href="#" id="save" class="btn btn-primary pull-right">Update</a>
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>





		</div>
		<!-- Test results-->
		<!-- user_id = $user['id']'-->
        <div id="part2" class="col-md-9" style="display: none">
        	<div>Test Results are below :</div>
            <div class="profile-content">
			   
			   <?php
          $table  = mysqli_query($con ,"SELECT * FROM test WHERE user_id = '$userid' ");

          while($row  = mysqli_fetch_array($table)){ ?>

			   	<div class="alert alert-info">
            <div class="form">



                <label class="control-label" >
                    </label>

                <div>
                    	
                    <table>
                    	<tr>
                			<td><label class="radio" style="margin-left: 10px"><?php 
                			echo "Organization Name :  ";
                			echo $row['company_name']; ?></td>
                		</tr>
                		<tr>
                			<td><label class="radio" style="margin-left: 10px"><?php 
                			echo "Toatal Questions :  ";
                			echo $row['total_questions']; ?></td>
                		</tr>
                		<tr>
                			<td><label class="radio"  style="margin-left: 10px"><?php
                			 echo "Correct Answers :  " ;
                			 echo $row['correct_answers']; ?> </label></td>
                		</tr>	
                		<tr>
		                	<td><label class="radio"  style="margin-left: 10px"><?php 
		                	echo "Wrong Answers :  " ;
		                	echo $row['wrong_answers']; ?></label></td>
                		</tr>
                		<tr>
                			<td><label class="radio"  style="margin-left: 10px"><?php 
                			echo "Unanswered Questions :  ";
                			echo $row['unanswered']; ?></label></td>
                		</tr>	
                		<tr>
                            <td><label class="radio"  style="margin-left: 10px; ">
                            	<?php 
                            	echo "Your Score :  ";
                            	echo $row['score']; ?></label></td>
                        </tr> 
                	</table>

                </div>
                 
    
                <div>
						<span><a href="#" class="btn btn-primary"  data-role="seechart" data-id="<?php echo $row['test_id'] ;?>">Chart</a></span>
					</div>
  			         
                
            </div>
        </div>
  				<?php }
      			 ?>

            </div>
		</div>
		<!-- Account setting-->



		<div id="chartModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">performance Overview</h4>
          </div>
          <div class="modal-body" style="overflow: scroll;">
              

          		<div id="chartContainer" style="height: 280px; width: 568px; "></div>
        		<div id="chartContainer2" style="height: 300px; width: 568px; margin-top: 101px;"></div>
              


                <input type="hidden" id="userId" class="form-control">


          </div>
          <div class="modal-footer">
            <a href="#" id="save" class="btn btn-primary pull-right" style="display: none;">Update</a>
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>






        <div id="part3" class="col-md-9" style="display: none">
            <div class="profile-content">
			 <div class="main_column column">

					<h4>Account Settings</h4>
					<?php
					echo "<img src='" . $user['profile_pic'] ."' id='small_profile_pics'>";
					?>
					<br>
					<a href="upload.php">Upload new profile picture</a> <br><br><br>

					Modify the values and click 'Update Details'

					


					<h4>Change Password</h4>
					<form action="settings.php" method="POST">
						Old Password: <input type="password" name="old_password" ><br>
						New Password: <input type="password" name="new_password_1" ><br>
						New Password Again: <input type="password" name="new_password_2" ><br>

						<?php echo $password_message; ?>

						<input type="submit" name="update_password" id="save_details" value="Update Password"><br>
					</form>

					
				</div>
            </div>
		</div>
		<!-- Learning -->

	</div>
</div>

<br>
<br>



</div>
 </body>
 </html>
