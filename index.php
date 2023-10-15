
<?php include 'includes/header.php' ?>
<?php include 'config/config.php' ?>

<div class="box1">
    <h2>Record of all Students</h2>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Add Students
    </button>
</div>

<table class="table table-hover table-bordered table-striped">
    <thead><!--Table Header section-->
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Middle Name</th>
            <th>Last Name</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody><!--Body section-->
    <?php 

        $sql = "SELECT * FROM students";//gather data from database
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $users = $stmt->fetchAll();

        foreach ($users as $user) {//fetching all data to form
            echo '<tr id="row_' . $user->id . '">'; //I've prepended "row_" to the id attribute, which makes it valid and less likely to cause issues
            echo '<td data-target="id">'     . $user->id . '</td>';
            echo '<td data-target=f_name>'   . $user->first_name . '</td>';
            echo '<td data-target=m_name>'   . $user->midle_name . '</td>';
            echo '<td data-target=l_name>'   . $user->last_name . '</td>';
            echo '<td data-target=age>'      . $user->age . '</td>';
            echo '<td data-target=gender>'   . $user->gender . '</td>';
            echo '<td class="text-center"><a href="#" class="btn btn-success update-button" data-role="update" data-id="'
                    .$user->id.  
                 '" >Update</a></td>';
                 echo '<td class="text-center">
                 <form method="post" action="delete_page_1.php" id="deleteForm_' . $user->id . '">
                     <input type="hidden" name="id" value="' . $user->id . '">
                     <input type="hidden" name="scrollPosition" value="">
                     <button type="submit" class="btn btn-danger" name="delete_students">Delete</button>
                 </form>
              </td>';
         
            echo '</tr>';
        }
    ?>
    </tbody>
    </table>
    
    <?php include 'includes/popups.php' ?>

<!-- Modal 1 for Adding students -->
<form action="insert.php" method="post">
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Students</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
            <div class="form-group">
                <label for="f_name">First Name</label>
                <input type ="text" name="f_name" class="form-control">
            </div>
            <div class="form-group">
                <label for="m_name">Middle Name</label>
                <input type ="text" name="m_name" class="form-control">
            </div>
            <div class="form-group">
                <label for="l_name">Last Name</label>
                <input type ="text" name="l_name" class="form-control">
            </div>
            <div class="form-group">
                <label for="age">Age</label>
                <input type ="text" name="age" class="form-control">
            </div>
            <div class="form-group">
                <label for="gender">Gender</label>
                <input type ="text" name="gender" class="form-control">
            </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-success" name="add_students" value ="Add" >
      </div>
    </div>
  </div>
</div>
</form>

<!-- Modal 2 for updating students -->
<div class="modal fade" id="modal2" tabindex="-1" aria-labelledby="modal2Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal2Label">Update Record of ID:</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">
                <div class="form-group">
                    <label >First Name</label>
                    <input type="text" class="form-control" id="f_name">
                </div>
                <div class="form-group">
                    <label for="m_name">Middle Name</label>
                    <input type="text" name="m_name" class="form-control" id="m_name">
                </div>
                <div class="form-group">
                    <label for="l_name">Last Name</label>
                    <input type="text" name="l_name" class="form-control" id="l_name">
                </div>
                <div class="form-group">
                    <label for="age">Age</label>
                    <input type="text" name="age" class="form-control" id="age">
                </div>
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <input type="text" name="gender" class="form-control" id="gender">
                </div>
                <input type="hidden" id="userId" class="form-control">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a href="#" id="save" class="btn btn-primary">Save changes</a>
            </div>
        </div>
    </div>
</div>
<script src="js-methods/script.js"></script>


<?php include 'includes/footer.php' ?>

   