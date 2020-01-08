<?php

include 'include/condb.php';
include 'include/auth.php';

if(isset($_POST['done'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password = md5($password);
    $q="INSERT INTO `tbluser`(`username`, `password`) VALUES ('$username', '$password')";

    $query = mysqli_query($condb,$q);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FCI BILLING SYSTEM</title>

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="css/local.css" />

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

    <!-- you need to include the shieldui css and js assets in order for the charts to work -->
    <link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/light-bootstrap/all.min.css" />
    <link id="gridcss" rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/dark-bootstrap/all.min.css" />

    <script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>
    <script type="text/javascript" src="http://www.prepbootstrap.com/Content/js/gridData.js"></script>
</head>
<body>
    <?php
        include 'include/header.php';
    ?>
        <div id="page-wrapper">

            <div class="row">
                <div class="col-lg-12 text-left">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#form_modal"><span class="glyphicon glyphicon-plus"></span> ADD NEW</button>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="modal fade" id="form_modal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                         <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><i class="fa fa-users"></i> User</h3>
                                    </div>
                                            <div class="panel-body">
                                                <form action="" method="post">
                                                  <label for="username" class="col-md-5">
                                                    Username:
                                                  </label>
                                                  <div class="col-md-7">
                                                    <input type="text" class="form-control" id="username" name="username">
                                                  </div>
                                                  <label for="password" class="col-md-5">
                                                    Password:
                                                  </label>
                                                  <div class="col-md-7">
                                                    <input type="password" class="form-control" id="password" name="password" >
                                                  </div>          
                                                  
                                                    <center><button class="btn btn-success"  type="submit" name="done">Save</button>
                                                        <button class="btn btn-default"  type="submit">Back</button></center>
                                                  
                                          </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-user"></i> ADMIN </h3>
                        </div>
                        <div class="panel-body">
                            <table class='table table-bordered table-hover'>
                                    <tr>
                                        <th>No.</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>Action</th>
                                    </tr>
                                        <?php
                            
                                            include 'include/condb.php';
                                            $q="SELECT * FROM `tbluser` ORDER BY `username`";
                            
                                            $query = mysqli_query($condb,$q);
                                            $i =1;
                                            while ($result = mysqli_fetch_array($query)){
                                            $user_id = $result['user_id'];
                                        ?>

                                    <tr>
                                        <td> <?php echo $i; ?></td>
                                        <td> <input type="text" style="height: 40px; width: 100%; padding: 3px; background-color: transparent;border:0px solid transparent;" value= '<?php echo $result['username'] ?>' onchange="editAdmin('<?php echo $user_id;?>','username',this.value);"  /> </td>
                                        <td> <input type="text" style="height: 40px; width: 100%; padding: 3px; background-color: transparent;border:0px solid transparent;" value= '<?php echo $result['password'] ?>' onchange="editAdmin('<?php echo $user_id;?>','password',this.value);"  /> </td>
                                        <td> <button  class="btn btn-danger"> <a onClick ='return confirm("Do you want to remove this record?");' href="admin_delete.php?user_id=<?php echo $result['user_id']; ?>" class="text-white"><i class="fa fa-trash"></i></a></button>
                                      </td>
                                    </tr>
                                    <?php $i++;
                                        }
                                    ?>
                                </table>
                        </div>
                    </div>
                </div>
            </div>
            
    </div>
    <!-- /#wrapper -->

</body>
</html>
<script type="text/javascript">
  function editAdmin(user_id,fld,val){
    var query = 'UPDATE tbluser SET '+fld+'="'+val+'" WHERE user_id = "'+user_id+'"';
        form_data = new  FormData(); 
        form_data.append("query",query); 
    $.ajax({
        url: "admin_edit.php",
        method: "POST",
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function(){
        },
        success: function(data){   
                //    alert(data) 
        }
      });
        return false;
  }
</script>