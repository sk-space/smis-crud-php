<?php
  include('view.php');
?>

<ol style="list-style: none; ">
    <li><a href=""><i class="glyphicon glyphicon-list"></i>&nbsp;&nbsp;List</a></li>
    <li><a data-toggle="modal" data-target="#regform" href="#regform"><i class="glyphicon glyphicon-edit"></i>&nbsp;&nbsp;Create</a></li>
</ol>

<!--Employee Registration Form Modal-->
    <div class="modal fade" id="regform" tabindex="-1" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Employee Registration Form</h4>
          </div>
          <div class="modal-body">
            <div>
              <h2>Register Here</h2>
              <form name="registration" action="" method="POST">
                <div class="form-group left">
                  <label for="exampleInputEmail1">User Group</label>
                <input class="form-control" id="disabledInput" type="text" name="usergroup" value="3" disabled>
                </div>
                <div class="form-group left">
                <select class="form-control">
                  <option>Select Department</option>
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                </select>
              </div>
                <select class="form-control">
                  <option>Select Designation</option>
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                </select>
                <select class="form-control">
                  <option>Select Employee Type</option>
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                </select>

                <div class="form-group left">
                  <label for="exampleInputEmail1">First Name</label>
                  <input type="text" name="first_name" class="form-control" id="exampleInputEmail1" placeholder="Enter full name" required>
                </div>
                <div class="form-group left">
                  <label for="exampleInputEmail1">Last Name</label>
                  <input type="text" name="last_name" class="form-control" id="exampleInputEmail1" placeholder="Enter full name" required>
                </div>    
                <div class="form-group right">
                  <label for="exampleInputEmail1">Address</label>
                  <input type="text" name="address" class="form-control" id="exampleInputEmail1" placeholder="Enter contact" required>
                </div>
                <div class="form-group right">
                  <label for="exampleInputEmail1">Contact</label>
                  <input type="text" name="contact" class="form-control" id="exampleInputEmail1" placeholder="Enter contact" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Username</label>
                  <input type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="Enter Username" required>
                </div>
                <div class="form-group left">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
                </div>
              </form>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="register" type="button" class="btn btn-primary">Submit</button>
            <a href="login.php"><input type="button" class="btn btn-default" value="Sign In"></a>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->