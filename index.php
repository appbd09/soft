<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

    <title>Student Management System</title>
  </head>
  <body>
    <div class="container animated shake">
      <br>
        <a href="admin/login.php" class="btn btn-primary float-right">Login</a>
        <br> <br>
          <h1 class="text-center">Welcome to Student Management System</h1>
<br><br>
          <div class="row">
            <div class="col-sm-4 offset-4">
              <form action="" method="POST">
            <table class="table table-bordered">
              <tr>
                <td colspan="2" class="text-center"> <label for="">Student Information</label> </td>
              </tr>
              <tr>
                <td><label for="choose">Choose Class</label></td>
                <td>
                  <select name="choose" id="choose" class="form-control">
                    <option value="select">Select</option>
                    <option value="1st">1st</option>
                    <option value="2nd">2nd</option>
                    <option value="3rd">3rd</option>
                    <option value="4th">4th</option>
                    <option value="5th">5th</option>
                  </select>
                </td>
              </tr>
              <tr>
                <td><label for="roll">Roll</label></td>
                <td><input type="text" name="roll" class="form-control" pattern="[0-9]{6}" placeholder="Roll"></td>
              </tr>
              <tr>
                <td colspan="2" class="text-center"><input type="submit" value="Show_Info" name="show_info"></td>
              </tr>
              
            </table>
          </form>
            </div>
          </div>
<br><br>

<?php 
  require_once './admin/dbcon.php';
  if (isset($_POST['show_info'])) {
    $choose = $_POST['choose'];
    $roll = $_POST['roll'];

    $result = mysqli_query($dbcon,"SELECT * FROM `student_info` WHERE `class`='$choose' and `roll`='$roll'");
    
    if (mysqli_num_rows($result) == 1) {
       $row = mysqli_fetch_assoc($result);

       ?>
       <div class="row">
            <div class="col-sm-6 offset-3">
              <table class="table table-bordered">
                <tr>
                  <td rowspan="4" class="text-center">
                    <img src="admin/student_images/<?=$row['photo'];?>" alt="" style="height: 250px; width: 250px;" class="img-thumbnail">
                  </td>
                  <td>Name</td>
                  <td><?=ucwords($row['name']);?></td>
                </tr>
                <tr>
                  <td>Roll</td>
                  <td><?=$row['roll'];?></td>
                </tr>
                <tr>
                  <td>Class</td>
                  <td><?=$row['class'];?></td>
                </tr>
                <tr>
                  <td>City</td>
                  <td><?=ucwords($row['city']);?></td>
                </tr>
              </table>
            </div>
          </div>
       <?php
    } else{
      ?>
        <script type="text/javaScript">
          alert('Data Not Found!');
        </script>
      <?php }}?>
          
    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
  </body>
</html>