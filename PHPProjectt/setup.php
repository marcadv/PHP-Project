<?php

include 'include/condb.php';
include 'include/auth.php';

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
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-edit"></i> Billing </h3>
                        </div>
                                        <div class="panel-body">
                                           <form action="" onsubmit="return billing()" method="post">
                                                  <label for="date" class="col-md-5">
                                                    BILLING DATE:
                                                  </label>
                                                  <div class="col-md-7">
                                                    <input type="date" class="form-control" id="billdate" name="billdate">
                                                  </div>
                                                  <label for="date" class="col-md-5">
                                                    DUE DATE:
                                                  </label>
                                                  <div class="col-md-7">
                                                    <input type="date" class="form-control" id="duedate" name="duedate">
                                                  </div>
                                                  <label for="date" class="col-md-5">
                                                    DISCONNECTION DATE:
                                                  </label>
                                                  <div class="col-md-7">
                                                    <input type="date" class="form-control" id="disdate" name="disdate" >
                                                  </div>          
                                      
                                                    <div class ="col-sm-12 text-right">
                                                      <br />
                                                    <button class="btn btn-success"   type="submit" name="done"> Issue </button>
                                                    </div>
                                                  
                                          </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-edit"></i> Rebates </h3>
                        </div>
                                        <div class="panel-body">
                                           <form action="" onsubmit="return rebate()" method="post">
                                                  <label for="brgy" class="col-md-5">
                                                    Barangay:
                                                  </label>
                                                  <div class="col-md-7">
                                                    
                                                    <select name="brgy" id="brgy" onchange ="selecting(0);" class="form-control">
                                                        <option value="">--Select--</option>
                                                       
                                                     <?php 
                                                        $brgy=mysqli_query($condb,"SELECT DISTINCT brgy  FROM tblclient ORDER BY `brgy`") or die(mysqli_error($condb));
                                                        while ($bg=mysqli_fetch_assoc($brgy)) {
                                                          $br = $bg['brgy'];
                                                          $mun=mysqli_query($condb,"SELECT DISTINCT mun FROM tblclient WHERE brgy ='$br' ORDER BY `mun`") or die(mysqli_error($condb));
                                                            while ($mn=mysqli_fetch_assoc($mun)) {
                                                              echo "<option value= '".$bg['brgy']."-".$mn['mun']."' >".$bg['brgy'].
                                                              ", ".$mn['mun']."</option>";
                                                            }
                                                          }
                                                        ?>
                                                      </select>
                                                  </div>          
                                                  <label for="mun" class="col-md-5">
                                                    Municipal:
                                                  </label>
                                                  <div class="col-md-7">
                                                    <select name="mun" id="mun" onchange ="selecting(1)" class="form-control">
                                                        <option value="">--Select--</option>
                                                        <?php 
                                                        $mun=mysqli_query($condb,"SELECT DISTINCT mun FROM tblclient ORDER BY `mun`") or die(mysqli_error($condb));
                                                        while ($mn=mysqli_fetch_assoc($mun)) {
                                                          echo "<option value='".$mn['mun']."'>".$mn['mun']."</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                  </div>
                                                  <label for="recnum" class="col-md-5">
                                                    No.of Days:
                                                  </label>
                                                  <div class="col-md-7">
                                                  <input type="number" class="form-control" id="days" name="days">
                                                  </div>     <label for="date" class="col-md-5">
                                                    DATE:
                                                  </label>
                                                  <div class="col-md-7">
                                                    <input type="date" class="form-control" id="r_date" name="disdate" >
                                                  </div>          
                                         
                                                    <div class ="col-sm-12 text-right">
                                                      <br />
                                                    <button class="btn btn-success"   type="submit" name="done"> Apply </button>
                                                    </div>
                                                  
                                          </form>
                        </div>
                    </div>
                </div>
            </div>
            
    </div>
    <!-- /#wrapper -->

</body>
</html>
<script type="text/javascript">
  function billing(){
    var billdate=$('#billdate').val();
    var duedate=$('#duedate').val();
    var disdate=$('#disdate').val();
      form_data = new  FormData(); 
      form_data.append("billdate",billdate);
      form_data.append("duedate",duedate);
      form_data.append("disdate",disdate);
    $.ajax({
        url: "billing.php",
        method: "POST",
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function(){
        },
        success: function(data){   
                    alert(data) 
        }
      });
    return false;
  }
  var r_no = 0;
  function selecting(n){
    if(n==0){
      $("#mun").val("")
      r_no = 0;
    }else{
      $("#brgy").val("")
      r_no = 1;
    }
  }
  function rebate(){

    var brgy=$('#brgy').val();
    var mun=$('#mun').val();
    var r_date=$('#r_date').val();
    if(r_no==0){
        brgy = brgy.split("-");
        mun  = brgy[1];
        brgy = brgy[0]; 
    }
    var days=$('#days').val();
      form_data = new  FormData(); 
      form_data.append("brgy",brgy);
      form_data.append("mun",mun);
      form_data.append("days",days);
      form_data.append("r_no",r_no);
      form_data.append("r_date",r_date);
    $.ajax({
        url: "rebates.php",
        method: "POST",
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function(){
        },
        success: function(data){   
                    alert(data) 
        }
      });
    return false;
  }
</script>