<?php
 include("header.php");

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

				<!-- END MENU -->
			</div>
		</div>
		<!-- Personal Details-->
		<div id="display" class="col-md-9 profile-content">

           <h3>Adaptive Test Portal</h3>
           <div id="message" style="display: none;">Close the tab after viewing the results!!</div>
           <div id="timer">
               <span >Minutes :</span>
               <span class="min"></span>
               <span>Seconds :</span>
               <span class="sec"></span>
               <span class="c" id="150" style="display: none;"></span>
               <span style="float: right;">Total Question : 12</span>
           </div>
           

           
           <p id="demo"></p>

           	<div class="alert alert-info">
            <div class="form">
                <label class="control-label" id="que">
                    </label>

                <div>
                    	
                    <table>
                		<tr>
                			<td><input value="option_1" type="radio" name="options" ></td>
                			<td><label class="radio" id="op1" style="margin-left: 10px"></td>
                		</tr>	
                	</table>

                </div>
                 

                 <div>
                 	<table>
                		<tr>
                			<td><input value="option_2" type="radio" name="options" ></td>
                			<td><label class="radio" id="op2" style="margin-left: 10px"> </label></td>
                		</tr>	
                 	</table> 
                 </div>

                
                <div>
                	<table>
                		<tr>
		                	<td><input value="option_3" type="radio" name="options" ></td>
		                	<td><label class="radio" id="op3" style="margin-left: 10px"></label></td>
                		</tr>	
                	</table>                	                    
                </div>


                <div>
                	<table>
                		<tr>
                			<td><input value="option_4" type="radio" name="options" ></td>
                			<td><label class="radio" id="op4" style="margin-left: 10px"></label></td>
                		</tr>	
                	</table>
                </div>
                <div >
                    <table>
                        <tr>
                            <td><label class="radio" id="score" style="margin-left: 10px; display: none;"></label></td>
                        </tr>   
                    </table>
                </div>
                    
                
                
                
            </div>
        </div>

        <div id="chartContainer" style="height: 300px; width: 100%; display: none;"></div>
        <div id="chartContainer2" style="height: 300px; width: 100%;display: none;"></div>

        <div style="text-align: center;" id="next_button">
        	<a href="#" data-role="next" class="btn btn-primary" style="margin: auto;">next</a>
            <span style="margin: auto; display: block;">Click on Next to submit an answer</span>
        </div>


        </div>
    </div>
</div>