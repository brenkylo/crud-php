<?php 

        if (isset($_GET['errmessage'])){
            echo '<h6 class="error_input">'. $_GET['errmessage'] .'</h6>';
        }

    
        if (isset($_GET['delete_msg']) && !isset($_SESSION['alert_displayed'])) {
          $_SESSION['alert_displayed'] = true;
          echo '<h6 class="success_input">' . $_GET['delete_msg'] . '</h6>';
          echo '<script>
                  document.addEventListener("DOMContentLoaded", () => {
                  Swal.fire("Record Deleted!");
              });
          </script>';
      }
    
        if (isset($_GET['insert_msg'])) {
            echo '<h6 class="success_input">' . $_GET['insert_msg'] . '</h6>';
        }
    ?>