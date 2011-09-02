<?php
	include "chkcookie.php";
	include "header.php";
	

// Display The Edit Form
?>
<p class = "y-label"> Edit Your Profile  </p>
<form action = "update_profile.php" method = "post" name = "update_profile" id  = "editform" >
<h1> Basic Details </h1>
<label> Name <span class = "small">Enter Your Name</span>  </label><input type = "text" name = "name" class = "text" />
<label> Department <span class = "small">Select Your Department</span>  </label>
<select name = "department">
<option>IT</option>
<option>CSE</option>
<option>ECE</option>
<option>ME</option>
<option>Civil</option>
<option>EEE</option>
<option>M.Tech</option>
<option>MBA</option>
<option>MCA</option>
</select>




<label> Birth <span class = "small">Enter Your Date Of Birth</span>  </label><input type = "text" name = "dob" class = "text" />
<label> Sex <span class = "small">Select Your Gender</span>  </label>
<select name = "sex">
<option>Male</option>
<option>Female</option>
</select>

<h1>Other Details </h1>
<?php 

if($acc_type == 'Student')
{
?>
<label> Batch <span class = "small">Enter Your Batch</span>  </label><input type = "text" name = "batch" class = "text" />
<label> Status <span class = "small">Current Status</span> </label>
  <select name = "status">
    <option>Pursuing Degree</option>
	<option>Placed</option>
  </select>
<label> Skills <span class = "small">Enter Your Skills</span> </label><input type = "text" name = "skills" class = "text" />
<?php
}
elseif($acc_type == 'Faculty')
{
?>
<label> Experience <span class = "small">Enter Your Experience</span>  </label><input type = "text" name = "exp" class = "text" />
<label> Qualification <span class = "small">Enter Your Qualification</span>  </label><input type = "text" name = "qual" class = "text" />
<?php
}

elseif($acc_type == 'Admin')
{

?>
<label> Designation <span class = "small">(Enter Your Name)</span>  </label><input type = "text" name = "desg" class = "text" />
<?php
}
?>
<input type = "submit" class = "button" value = "Update Details"/>
</form>

<form enctype="multipart/form-data" action="add_image.php" method="POST">

Photo: <input type="file" name="pic"><br>
<input type="submit" value="Add">
</form>
</div>
</body>



