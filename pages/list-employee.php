<?php

global $wpdb;

$employees = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}ems_form_data", ARRAY_A);

?>

<div class="container">
  
    <img src="<?php echo EMS_PLUGIN_URL ?>image/logo.jpg" style="width:100px;" />  
    <h2 class="sub-menu-head">List Employees</h2>

    <table class="table table-hover" id="tbl-employee">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone No.</th>
                <th>Gender</th>
                <th>Designation</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            <?php
            if (count($employees) > 0) {
                foreach ($employees as $employee) {
                    ?>
                    <tr>
                        <td><?php echo $employee['id']; ?></td>
                        <td><?php echo $employee['name']; ?></td>
                        <td><?php echo $employee['email']; ?></td>
                        <td><?php echo $employee['phoneNo']; ?></td>
                        <td><?php echo ucfirst($employee['gender']); ?></td>
                        <td><?php echo $employee['designation']; ?></td>
                        <td>
                            <a href="admin.php?page=employee-system&action=edit&empId=<?php echo $employee['id']; ?>" class="btn btn-warning">Update</a>
                            <a href="admin.php?page=employee-system&action=delete&empId=<?php echo $employee['id']; ?>" class="btn btn-danger">Delete</a>
                            <a href="admin.php?page=employee-system&action=view&empId=<?php echo $employee['id']; ?>" class="btn btn-info">View</a>
                        </td>
                    </tr>
                    <?php
                }
            } else {
                echo "<tr><td colspan='7'>No Employee Found</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>
