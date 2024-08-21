<?php

  $message = "";
  $status = "";

  if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST["btn_submit"])){

    // Form Submitted
    global $wpdb;

    $name = sanitize_text_field($_POST['name']);
    $email = sanitize_text_field($_POST['email']);
    $phoneNo = sanitize_text_field($_POST['phoneNo']);
    $gender = sanitize_text_field($_POST['gender']);
    $designation = sanitize_text_field($_POST['designation']);

    // Insert Command
    $wpdb->insert("{$wpdb->prefix}ems_form_data",array(
      "name" => $name,
      "email" => $email,
      "phoneNo" => $phoneNo,
      "gender" => $gender,
      "designation" => $designation,
    ));

    $last_inserted_id = $wpdb->insert_id;

    if($last_inserted_id > 0){
      $message = "Employee saved Successfully";
      $status = 1;
    }
    else{
      $message = "Failed to save an employee";
      $status = 0;
    }

  }

?>

<div class="container">

  <img src="<?php echo EMS_PLUGIN_URL ?>image/logo.jpg" style="width:100px;" />

    <h2 class="sub-menu-head">Add Employee</h2>

    <?php
        if(!empty($message)){
          if($status == 1){
            ?>
            <div class="alert alert-success">
                <?php echo $message; ?>
            </div>
            <?php
          }else{
            ?>
            <div class="alert alert-danger">
                <?php echo $message; ?>
            </div>
            <?php
          }
        }
    ?>

    <form action="" method="post" id="ems-frm-add-employee">

  <div class="form-group">
    <label for="name">Name:</label>
    <input type="text" required class="form-control" id="name" name="name" aria-describedby="emailHelp" placeholder="Enter Your Name">
  </div>

  <div class="form-group">
    <label for="email">Email:</label>
    <input type="email" required class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter Your Email">
  </div>

  <div class="form-group">
    <label for="phoneNo">Phone No.:</label>
    <input type="number" class="form-control" id="phoneNo" name="phoneNo" aria-describedby="emailHelp" placeholder="Enter Your Phone Number">
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
    <input type="text" class="form-control" id="designation" name="designation" aria-describedby="emailHelp" placeholder="Enter Your Designation">
  </div>

  <button type="submit" class="btn btn-primary" name="btn_submit">Submit</button>
</form>

</div>
    
