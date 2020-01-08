<?php

include 'include/condb.php';
include 'include/auth.php';

if(isset($_POST['done'])){
    $cCode = $_POST['cCode'];
    $name = $_POST['name'];
    $brgy = $_POST['brgy'];
    $mun = $_POST['mun'];
    $subdate = $_POST['subdate'];
    $plan = $_POST['plan'];
    $status = $_POST['status'];

    $q="INSERT INTO `tblclient`(`cCode`, `name`, `brgy`, `mun`, `subdate`, `plan`, `status`) VALUES ('$cCode', '$name', '$brgy', '$mun', '$subdate', '$plan', '$status')";

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
                            <ul class="nav navbar-nav navbar-right navbar-user">
                                <li class="divider-vertical"></li>
                                <li>
                                    <form class="navbar-search">
                                        <input type="text" placeholder="Search" id="srch" onkeyup="searchClient()"class="form-control">
                                    </form>
                                </li>
                            </ul>
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
                                        <h3 class="panel-title"><i class="fa fa-users"></i> SUBSCRIBER INFORMATION</h3>
                                    </div>
                                            <div class="panel-body">
                                                <form action="" method="post">
                                                  <label for="cCode" class="col-md-5">
                                                    Code:
                                                  </label>
                                                  <div class="col-md-7">
                                                    <input type="text" class="form-control" id="cCode" name="cCode" placeholder="Subscriber Code">
                                                  </div>
                                                  <label for="fullname" class="col-md-5">
                                                    FullName:
                                                  </label>
                                                  <div class="col-md-7">
                                                    <input type="text" class="form-control" id="name" name="name" placeholder="LastName, FirstName MI">
                                                  </div>
                                                  <label for="brgy" class="col-md-5">
                                                    Barangay:
                                                  </label>
                                                  <div class="col-md-7">
                                                    <select name="brgy" id="brgy" class="form-control">
                                                        <option>--Select--</option>
                                                        <option>Minoyho</option>
                                                        <option>Pong-oy</option>
                                                        <option>Osao</option>
                                                        <option>Sto. Nino</option>
                                                        <option>San Jose</option>
                                                        <option>Sta. Cruz</option>
                                                        <option>San Roque</option>
                                                        <option>Dayanog</option>
                                                        <option>Basak</option>
                                                        <option>Sua</option>
                                                        <option>Timba</option>
                                                        <option>Agay-ay</option>
                                                        <option>Bobon-A</option>
                                                        <option>Bobon-B</option>
                                                        <option>Poblacio</option>
                                                        <option>Look</option>
                                                        <option>Tagup-on</option>
                                                        <option>Mahalo</option>
                                                        <option>San Vicente</option>
                                                        <option>Progresso</option>
                                                        <option>Rizal St.</option>
                                                        <option>Peral St.</option>
                                                        <option>Lungodaan</option>
                                                        <option>Bonifacio St.</option>
                                                        <option>Olarte St.</option>
                                                        <option>Antipala St.</option>
                                                        <option>Veloso St.</option>
                                                        <option>Canipaan</option>
                                                        <option>Salog</option>
                                                        <option>Pondol</option>
                                                        <option>Labrador</option>
                                                        <option>Talisay</option>
                                                        <option>Bangkas-A</option>
                                                        <option>Bangkas-B</option>
                                                        <option>Magbagacay</option>
                                                        <option>Malibago</option>
                                                        <option>Center Zone</option>
                                                        <option>Hilltop</option>
                                                        <option>Lotao</option>
                                                        <option>Ma. Socorro</option>
                                                        <option>Atuyan</option>
                                                        <option>Ma. Asuncion</option>
                                                        <option>Catmon</option>
                                                        <option>Himbangan</option>
                                                        <option>Hindag-an</option>
                                                        <option>Lipanto</option>
                                                        <option>Himay-angan</option>
                                                        <option>Hiway</option>
                                                    </select>
                                                  </div>            
                                                  <label for="mun" class="col-md-5">
                                                    Municipal:
                                                  </label>
                                                  <div class="col-md-7">
                                                    <select name="mun" id="mun" class="form-control">
                                                        <option>--Select--</option>
                                                        <option>San Juan</option>
                                                        <option>St. Bernard</option>
                                                        <option>Liloan</option>
                                                        <option>Anahawan</option>
                                                        <option>Hinundayan</option>
                                                        <option>Hinunangan</option>
                                                    </select>
                                                  </div>
                                                  <label for="subdate" class="col-md-5">
                                                    Subscribed Date:
                                                  </label>
                                                  <div class="col-md-7">
                                                  <input type="date" class="form-control" id="subdate" name="subdate">
                                                  </div>
                                                  <label for="plan" class="col-md-5">
                                                    Plan:
                                                  </label>
                                                  <div class="col-md-7">
                                                    <select name="plan" id="plan" class="form-control">
                                                      <option>--Select--</option>
                                                      <option> 130 </option>
                                                      <option> 269 </option>
                                                      <option> 369 </option>
                                                    </select>
                                                  </div>
                                                  <label for="status" class="col-md-5">
                                                    Status:
                                                  </label>
                                                  <div class="col-md-7">
                                                    <select name="status" id="status" class="form-control">
                                                      <option>--Select--</option>
                                                      <option> Connected </option>
                                                      <option> Disconnected </option>
                                                    </select>
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
                            <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> SUBSCRIBER </h3>
                        </div>
                        <div class="panel-body" id="client_list">
                            <table class='table table-bordered table-hover'>
                                    <tr>
                                        <th>No.</th>
                                        <th>Code</th>
                                        <th>Name</th>
                                        <th>Barangay</th>
                                        <th>Municipal</th>
                                        <th>Subscribed Date</th>
                                        <th>Plan</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                        <?php
                            
                                            include 'condb.php';
                                            $q="SELECT * FROM `tblclient` ORDER BY `name`";
                            
                                            $query = mysqli_query($condb,$q);
                                            $i =1;
                                            while ($result = mysqli_fetch_array($query)){
                                            $cid = $result['cid'];
                                        ?>

                                    <tr>
                                        <td> <?php echo $i; ?></td>
                                        <td>
                                        <input type="text" style="height: 40px; width: 100%; padding: 3px; background-color: transparent;border:0px solid transparent;" value= '<?php echo $result['cCode'] ?>' onchange="editSub('<?php echo $cid;?>','cCode',this.value);"  />
                                         </td>
                                        <td style="text-align: left;"> 
                                          <input type="text" style="height: 40px; width: 100%; padding: 3px; background-color: transparent;border:0px solid transparent;" value= '<?php echo $result['name'] ?>' onchange="editSub('<?php echo $cid;?>','name',this.value);"  />
                                        </td>
                                        <td> <input type="text" style="height: 40px; width: 100%; padding: 3px; background-color: transparent;border:0px solid transparent;" value= '<?php echo $result['brgy'] ?>' onchange="editSub('<?php echo $cid;?>','brgy',this.value);"  /> </td>
                                        <td> <input type="text" style="height: 40px; width: 100%; padding: 3px; background-color: transparent;border:0px solid transparent;" value= '<?php echo $result['mun'] ?>' onchange="editSub('<?php echo $cid;?>','mun',this.value);"  /> </td>
                                        <td> <input type="text" style="height: 40px; width: 100%; padding: 3px; background-color: transparent;border:0px solid transparent;" value= '<?php echo $result['subdate'] ?>' onchange="editSub('<?php echo $cid;?>','subdate',this.value);"  /> </td>
                                        <td> <input type="text" style="height: 40px; width: 100%; padding: 3px; background-color: transparent;border:0px solid transparent;" value= '<?php echo $result['plan'] ?>' onchange="editSub('<?php echo $cid;?>','plan',this.value);"  /> </td>
                                        <td> <input type="text" style="height: 40px; width: 100%; padding: 3px; background-color: transparent;border:0px solid transparent;" value= '<?php echo $result['status'] ?>' onchange="editSub('<?php echo $cid;?>','status',this.value);"  /> </td>
                                        <td> <button  class="btn btn-info"> <a href="record_list.php?cid=<?php echo $result['cid']; ?>" class="text-white"><i class="fa fa-th-list"></i></a></button> 
                                        | <button  class="btn btn-danger"> <a onClick ='return confirm("Do you want to remove this record?");' href="subs_delete.php?cid=<?php echo $result['cid']; ?>" class="text-white"><i class="fa fa-trash"></i></a></button>
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
  function editSub(cid,fld,val){
    var query = 'UPDATE tblclient set '+ fld +'="'+ val +'" where cid = "'+ cid +'"';
        form_data = new  FormData(); 
        form_data.append("query",query);
    $.ajax({
        url: "subs_edit.php",
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
  function searchClient(){
    var srch = $('#srch').val();
    $("#client_list").load('search.php',{keyword:srch});
  }
</script>