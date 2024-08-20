<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Add Employee</title>
</head>

<body>

<div class="container">

  <img src="<?php echo EMS_PLUGIN_URL ?>image/logo.jpg" style="width:100px;" />

    <h2 class="sub-menu-head">Add Employee</h2>
    <form>

  <div class="form-group">
    <label for="name">Name:</label>
    <input type="email" class="form-control" id="name" name="name" aria-describedby="emailHelp" placeholder="Enter Your Name">
  </div>

  <div class="form-group">
    <label for="email">Email:</label>
    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter Your Email">
  </div>

  <div class="form-group">
    <label for="phoneNo">Phone No.:</label>
    <input type="email" class="form-control" id="phoneNo" name="phoneNo" aria-describedby="emailHelp" placeholder="Enter Your Phone Number">
  </div>

  <div class="form-group">
    <label for="gender">Gender:</label>
    <select class="form-control" id="gender" name="gender">
      <option value="">Select Gender</option>
      <option value="male">Male</option>
      <option value="female">Female</option>
      <option value="other">Other</option>
    </select>
  </div>

  <div class="form-group">
    <label for="designation">Designation:</label>
    <input type="email" class="form-control" id="designation" name="designation" aria-describedby="emailHelp" placeholder="Enter Your Designation">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>
    
</body>

</html>