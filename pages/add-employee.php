<?php

  $message = "";
  $status = "";
  $action = "";
  $empId = "";

  // Find request for view and edit
  if(isset($_GET['action']) && isset($_GET['empId'])){

    global $wpdb;
    $empId = $_GET['empId'];

    // Action: Edit
    if($_GET['action'] == "edit"){
      $action = "edit";
    }

    // Action: View
    if($_GET['action'] == "view"){
      $action = "view";
    }

    // Single employee informarion
    $employee = $wpdb->get_row(
      $wpdb->prepare("SELECT * FROM {$wpdb->prefix}ems_form_data WHERE id = '%d'", $empId), ARRAY_A
    );

  }

  // Save form data
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

    <h2 class="sub-menu-head">
      <?php 
      if($action == "view"){
        echo "View Employee";
      }
      else{
        echo "Add Employee";
      } ?>
    </h2>

    <?php
    if(!empty($message)){
      if($status == 1){
        ?>
        <div class="alert alert-success alert-dismissible fade show">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <?php echo $message; ?>
        </div>
        <?php
      } else {
        ?>
        <div class="alert alert-danger alert-dismissible fade show">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <?php echo $message; ?>
        </div>
        <?php
      }
    }
  ?>


    <form action="" method="post" id="ems-frm-add-employee">

  <div class="form-group">
    <label for="name">Name:</label>
    <input 
    type="text" 
    value="<?php if($action == 'view'){ echo $employee['name'];} ?>" 
    required 
    <?php if($action == "view"){ echo "readonly='readonly'"; } ?>
    class="form-control" 
    id="name" 
    name="name" 
    aria-describedby="emailHelp" 
    placeholder="Enter Your Name">
  </div>

  <div class="form-group">
    <label for="email">Email:</label>
    <input 
    type="email" 
    value="<?php if($action == 'view'){ echo $employee['email'];} ?>" 
    required 
    <?php if($action == "view"){ echo "readonly='readonly'"; } ?>
    class="form-control" 
    id="email" 
    name="email" 
    aria-describedby="emailHelp" 
    placeholder="Enter Your Email">
  </div>

  <div class="form-group">
    <label for="phoneNo">Phone No.:</label>
    <input 
    type="number" 
    value="<?php if($action == 'view'){ echo $employee['phoneNo'];} ?>" 
    <?php if($action == "view"){ echo "readonly='readonly'"; } ?>
    class="form-control" 
    id="phoneNo" 
    name="phoneNo" 
    aria-describedby="emailHelp" 
    placeholder="Enter Your Phone Number">
  </div>

  <div class="form-group">
    <label for="gender">Gender:</label>
    <select <?php if($action == "view"){echo "disabled";} ?> class="form-control" id="gender" name="gender">
      <option value="">Select Gender</option>
      <option value="male"<?php if($action == 'view' && $employee['gender'] == "male"){ echo "selected"; } ?>>Male</option>
      <option value="female"<?php if($action == 'view' && $employee['gender'] == "female"){ echo "selected"; } ?>>Female</option>
      <option value="other"<?php if($action == 'view' && $employee['gender'] == "other"){ echo "selected"; } ?>>Other</option>
    </select>
  </div>

  <div class="form-group">
    <label for="designation">Designation:</label>
    <input 
    type="text" 
    value="<?php if($action == 'view'){ echo $employee['designation'];} ?>" 
    <?php if($action == "view"){ echo "readonly='readonly'"; } ?>
    class="form-control" 
    id="designation" 
    name="designation" 
    aria-describedby="emailHelp" 
    placeholder="Enter Your Designation">
  </div>
  
  <?php 
      if($action == "view"){

      }
      else{
        echo '<button type="submit" class="btn btn-primary" name="btn_submit">Submit</button>';
      } ?>
</form>

</div>
    
