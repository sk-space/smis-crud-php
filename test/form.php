<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Responsive Template</title>

    <link type="text/css" href="src/css/layout.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link type="text/css" href="src/css/bootstrap.css" rel="stylesheet">
    <link type="text/css" href="src/css/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" href="src/css/bootstrap-theme.css" rel="stylesheet">
    <link type="text/css" href="src/css/bootstrap-theme.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
      section{
        border: 1px solid #ccc;
        padding: 50px;
        margin-bottom: 50px;
      }
      .submit{
        margin-top: 25px;
      }
      .left{
        width: 45%;
        margin-right: 50px;
        margin-left: 0px;
      }      
      .right{
        width: 45%;
      }
      .bg{
        background-color: #eee;
        border-radius: 5px;
      }
    </style>

  </head>
   <body>
    <div class="container">
      <section>
        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
          <div class="row">
            <h4>Instutional Details</h4>
            <!-- Selection Dropdown-->
            <div class="col-sm-6 left">
              <div class="form-group">
                <label for="exampleInputName2"  class="control-label">User Group</label>
                <div class="">
                  <input type="text" value="3" class="form-control" readonly>
                </div>
              </div>
              <div class="form-group">
                <label for="exampleInputName2"  class="control-label">Select Department</label>
                <div class="">
                  <?php
                    echo "<select class='form-control' id='exampleInputName2' name='select'>";
                      echo "<option disabled selected><i>Select</i></option>";
                      while ($row = mysql_fetch_array($query)) {
                        echo "<option value='" . $row['id'] ."'>" . $row['title'] ."</option>";
                      }
                    echo "</select>";
                  ?>
                </div>
              </div>
              <div class="form-group">
                <label for="exampleInputName2"  class="control-label">Select Designation</label>
                <div class="">
                  <?php
                    echo "<select class='form-control' id='exampleInputName2' name='select'>";
                      echo "<option disabled selected><i>Select</i></option>";
                      echo "<option value=''>A</option>";
                      echo "<option value=''>B</option>";
                      echo "<option value=''>C</option>";
                      echo "<option value=''>D</option>";
                    echo "</select>";
                  ?>
                </div>
              </div>
              <div class="form-group">
                <label for="exampleInputName2"  class="control-label">Select Employee Type</label>
                <div class="">
                  <?php
                    echo "<select class='form-control' id='exampleInputName2' name='select'>";
                      echo "<option disabled selected><i>Select</i></option>";
                      echo "<option value=''>A</option>";
                      echo "<option value=''>B</option>";
                      echo "<option value=''>C</option>";
                      echo "<option value=''>D</option>";
                    echo "</select>";
                  ?>
                </div>
              </div>
            </div>
            <!-- End of Selection Dropdown -->

            <!-- Uploads -->
            <div class="col-sm-6  right">
              <div class="form-group ">
                <label for="exampleInputName2"  class="control-label">Select Your Photo</label>
                <input class="btn" type="file" name="fileToUpload" id="fileToUpload">
              </div>
              <div class="form-group ">
                <label for="exampleInputName2"  class="control-label">Upload Your Citizenship</label>
                <input class="btn" type="file" name="fileToUpload" id="fileToUpload">
              </div>
              <div class="form-group ">
                <label for="exampleInputName2"  class="control-label">Upload Your Resume</label>
                <input class="btn" type="file" name="fileToUpload" id="fileToUpload">
              </div>
            </div>
            <!-- End of uploads -->
          </div>
          <br><br>
          <div class="row">
            <h4>Personal Details</h4>
            <div class="col-sm-6 left">
              <div class="form-group">
                <label for="exampleInputName2"  class="control-label">First Name</label>
                <div class="">
                  <input type="text" class="form-control" id="exampleInputName2" placeholder="Jane Doe">
                </div>
              </div>
              <div class="form-group">
                <label for="exampleInputName2"  class="control-label">Last Name</label>
                <div class="">
                  <input type="text" class="form-control" id="exampleInputName2" placeholder="Jane Doe">
                </div>
              </div>
            </div>

            <div class="col-sm-6 right">
              <div class="form-group">
                <label for="exampleInputName2"  class="control-label">First Name</label>
                <div class="">
                  <input type="text" class="form-control" id="exampleInputName2" placeholder="Jane Doe">
                </div>
              </div>
              <div class="form-group">
                <label for="exampleInputName2"  class="control-label">Last Name</label>
                <div class="">
                  <input type="text" class="form-control" id="exampleInputName2" placeholder="Jane Doe">
                </div>
              </div>
            </div>
          </div>

          <div class="row submit">
            <button class="btn btn-info" type="submit">Submit</button>
          </div>
        </form>
      </section>
    </div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="src/js/jquery-2.2.3.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="src/js/bootstrap.min.js"></script>
  </body>
</html>