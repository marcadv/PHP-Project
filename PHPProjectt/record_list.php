<?php

include 'include/condb.php';
include 'include/auth.php';

    $cid = $_GET['cid'];
if(isset($_POST['done'])){

    $date    = $_POST['date'];
    $recnum  = $_POST['recnum'];
    $charges = $_POST['charges'];
    $payment = $_POST['payment'];
    $duedate = isset($_POST['duedate']);
    $disdate = isset($_POST['disdate']);
    $remarks = $_POST['remarks'];

    $q="INSERT INTO `tblhistory`(`cid`, `date`, `recnum`, `charges`, `payment`, `duedate`, `disdate`,`remarks`) VALUES ('$cid', '$date', '$recnum', '$charges', '$payment', '$duedate', '$disdate', '$remarks')";

    $query = mysqli_query($condb,$q);
}
?>
<!DOCTYPE html>
<html>
<head>

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
    <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12 text-left">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#form_modal"><span class="glyphicon glyphicon-plus"></span> ADD NEW</butto>
                            <button type="button" class="btn btn-default"><a href="subs_list.php"> Back </a></button>
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
                                        <h3 class="panel-title"><i class="fa fa-users"></i> Records</h3>
                                    </div>
                                            <div class="panel-body">
                                                <form action="" method="post">
                                                  <label for="date" class="col-md-5">
                                                    Date:
                                                  </label>
                                                  <div class="col-md-7">
                                                    <input type="date" class="form-control" id="date" name="date">
                                                  </div>
                                                  <label for="recnum" class="col-md-5">
                                                    Reciept No.:
                                                  </label>
                                                  <div class="col-md-7">
                                                    <input type="text" class="form-control" id="recnum" name="recnum">
                                                  </div>            
                                                  <label for="charges" class="col-md-5">
                                                    Charges:
                                                  </label>
                                                  <div class="col-md-7">
                                                    <input type="text" class="form-control" id="charges" name="charges">
                                                  </div>  
                                                  <label for="payment" class="col-md-5">
                                                    Payment:
                                                  </label>
                                                  <div class="col-md-7">
                                                  <input type="text" class="form-control" id="payment" name="payment">
                                                  </div>
                                                  <label for="remarks" class="col-md-5">
                                                    Remarks:
                                                  </label>
                                                  <div class="col-md-7">
                                                  <input type="text" class="form-control" id="remarks" name="remarks">
                                                  </div>
                                                    <center><button class="btn btn-success"  type="submit" name="done">Save</button>
                                                        <button class="btn btn-default"  type="submit"> Back </button></center>
                                                  
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
                            <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> HISTORY </h3>
                        </div>
                        <div class="panel-body">
                            <table class='table table-bordered table-hover'>
                                    <tr>
                                        <th>Date</th>
                                        <th>Receipt No.</th>
                                        <th>Charges</th>
                                        <th>Rebate</th>
                                        <th>Payment</th>
                                        <th>Balance</th>
                                        <th>Due Date</th>
                                        <th>Disconnection Date</th>
                                        <th>Remarks</th>
                                    </tr>
                                        <?php
                            
                                            include 'condb.php';
                                            $q="SELECT * FROM `tblhistory` WHERE cid='$cid'";
                            
                                            $query = mysqli_query($condb,$q);
                                            
                                            $tbal = 0;
                                            $trebate = 0;
                                            $tcharge = 0;
                                            $tpayment = 0;

                                            while ($result = mysqli_fetch_array($query)){
                                            $bal =0;
                                            $bal+= ($result['charges']-$result['rebates'])-$result['payment'];
                                            $tbal += $bal;
                                            $trebate += $result['rebates'];
                                            $tcharge += $result['charges'];
                                            $tpayment += $result['payment'];
                                            $hid = $result['hid'];
                                      
                                        ?>
                                    <tr>
                                        <td> <input type="date" style="height: 40px; width: 100%; padding: 3px; background-color: transparent;border:0px solid transparent;" value= '<?php echo $result['date'] ?>' onchange="editHis('<?php echo $hid;?>','date',this.value);"  /> </td>
                                        <td> <input type="text" style="height: 40px; width: 100%; padding: 3px; background-color: transparent;border:0px solid transparent;" value= '<?php echo $result['recnum'] ?>' onchange="editHis('<?php echo $hid;?>','recnum',this.value);"  /> </td>
                                        <td> <input type="text" style="text-align:right; height: 40px; width: 100%; padding: 3px; background-color: transparent;border:0px solid transparent;" value= '<?php echo $result['charges'] ?>' onchange="editHis('<?php echo $hid;?>','charges',this.value);"  /> </td>
                                        <td> <input type="text" style="text-align:right; height: 40px; width: 100%; padding: 3px; background-color: transparent;border:0px solid transparent;" value= '<?php echo $result['rebates'] ?>' onchange="editHis('<?php echo $hid;?>','rebates',this.value);"  /> </td>
                                        <td> <input type="text" style="text-align:right; height: 40px; width: 100%; padding: 3px; background-color: transparent;border:0px solid transparent;" value= '<?php echo $result['payment'] ?>' onchange="editHis('<?php echo $hid;?>','payment',this.value);"  /> </td>
                                        <td> <?php echo $bal ?> </td>
                                        <td> <input type="date" style="height: 40px; width: 100%; padding: 3px; background-color: transparent;border:0px solid transparent;" value= '<?php echo $result['duedate'] ?>' onchange="editHis('<?php echo $hid;?>','duedate',this.value);"  />  </td>
                                        <td> <input type="date" style="height: 40px; width: 100%; padding: 3px; background-color: transparent;border:0px solid transparent;" value= '<?php echo $result['disdate'] ?>' onchange="editHis('<?php echo $hid;?>','disdate',this.value);"  /></td>
                                        <td> <input type="text" style="height: 40px; width: 100%; padding: 3px; background-color: transparent;border:0px solid transparent;" value= '<?php echo $result['remarks'] ?>' onchange="editHis('<?php echo $hid;?>','remarks',this.value);"  /> </td>
                                        
                                        
                                    </tr>
                                    <?php
                                        }
                                    ?>
                                    <tr>
                                        <td colspan = 2 > TOTAL</td>
                                        <td style='text-align:right;'>&#8369; <?php echo number_format($tcharge,2);?></td>
                                        <td style='text-align:right;'>&#8369; <?php echo number_format($trebate,2);?></td>
                                        <td style='text-align:right;'>&#8369; <?php echo number_format($tpayment,2);?></td>
                                        <td>&#8369; <?php echo number_format($tbal,2);?></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </table>
                        </div>
                    </div>
                </div>
            </div>
    </div>
            
</body>
</html>
<script type="text/javascript">
  function editHis(hid,fld,val){
    var query = 'UPDATE tblhistory SET '+ fld +'="'+ val +'" WHERE hid = "'+ hid +'"';
        form_data = new  FormData(); 
        form_data.append("query",query); 
         
    $.ajax({
        url: "record_edit.php",
        method: "POST",
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function(){
        },
        success: function(data){   
                   // alert(data) 
            window.location.href="record_list.php?cid=<?php echo $cid;?>";
        }
      });
        return false;
  }
</script>