<?php
 include("admin_header.php");
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
						<?php echo $_SESSION['company_name']; ?> 
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
							Company Details </a>
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
						<li >
							<a href="#" class="part4">
							<i class="glyphicon glyphicon-pencil"></i>
							Upload Questions </a>
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
					  <h2>Company Profile</h2>
					  
					  	<table class="table">


									      <?php
									          $table  = mysqli_query($con ,"SELECT * FROM company WHERE company_name = '$userLoggedIn'  ");
									             $row  = mysqli_fetch_array($table);{ ?>



									            <div class="<?php echo $row['id']; ?>">
									            	<div id="per-details">

									            	<div data-target="company_name">
									              	<span style="font-weight: 700;">Company Name :</span>
									                <span style="margin-left: 20px"><?php echo $row['company_name']; ?></span>

									              </div>

									              


									              <div data-target="email">
									              	<span style="font-weight: 700;">Email :</span>
									              	<span style="margin-left: 20px"><?php echo $row['email']; ?></span>
									              </div>


									              	<div data-target="company_details">
									              	<span style="font-weight: 700;">Company Details :</span>
									              	<span style="margin-left: 20px"><?php echo $row['company_details']; ?></span>
									              </div>
									             

									              <div>
									              		<span><a href="#" data-role="update" data-id="<?php echo $row['id'] ;?>">Update</a></span>
									              </div>

									            	</div>

									              </div>
									         <?php }
									       ?>

									  </table>
					  
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
                <label>Company Name</label>
                <input type="text" id="company_name" class="form-control">
              </div>
              <div class="form-group">
                <label>Email</label>
                <input type="text" id="email" class="form-control">
              </div>

               <div class="form-group">
                <label>Company Details</label>
                <input type="text" id="company_details" class="form-control">
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
        <div id="part2" class="col-md-9" style="display: none">
            <div class="profile-content">
			   
            	<?php
          $table  = mysqli_query($con ,"SELECT * FROM test WHERE company_id = '$company_id' ");

          while($row  = mysqli_fetch_array($table)){ ?>

			   	<div class="alert alert-info">
            <div class="form">



                <label class="control-label" >
                    </label>

                <div>
                    	
                    <table>
                    	<tr>
                			<td><label class="radio" style="margin-left: 10px"><?php 
                			echo "Student Name :  ";
                			echo $row['st_firstname']; 
							echo " ";
							echo $row['st_lastname']; ?></td>
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
                            	echo "Student Score :  ";
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
		<!-- Learning -->
		<div id="part4" class="col-md-9" style="display: none;">
            <div class="profile-content">
            	
				<div class="container">
				  <h2>Add Question Below :</h2>
				  <form method="POST" action="add_question.php" style="width: 450px">
				    <div class="form-group">
				      <label for="que">Question:</label>
				      <input style="height: 70px" type="text" class="form-control" name="question" placeholder="Enter Question">
				    </div>
				    <div class="form-group">
				      <label for="op">Option 1:</label>
				      <input type="text" class="form-control" name="op1"  placeholder="Option 1">
				    </div>
				    <div class="form-group">
				      <label for="op">Option 2:</label>
				      <input type="text" class="form-control" name="op2"   placeholder="Option 2">
				    </div>
				    <div class="form-group">
				      <label for="op">Option 3:</label>
				      <input type="text" class="form-control" name="op3"  placeholder="Option 3">
				    </div>
				    <div class="form-group">
				      <label for="op">Option 4:</label>
				      <input type="text" class="form-control" name="op4"   placeholder="Option 4">
				    </div>
				    <div class="form-group">
				    	<label for="op">Select correct answer :</label>
				    	
				     <select class="form-control"  name="answer">
				     	<option value="option_1">option_1</option>
				     	<option value="option_2">option_2</option>
				     	<option value="option_3">option_3</option>
				     	<option value="option_4">option_4</option>
				     </select>
				    </div>


				    <div class="form-group">
				    	<label for="op">Select Level :</label>
				     <select class="form-control"  name="level">
				     	<option value="easy">easy</option>
				     	<option value="medium">medium</option>
				     	<option value="hard">hard</option>
				     </select>
				    </div>
				   
				    <button type="submit" name="submit_question" class="btn btn-default">Submit</button>
				  </form>
				</div>
           </div>
       </div>

	</div>
</div>

<br>
<br>




</div>
 </body>
 </html>
