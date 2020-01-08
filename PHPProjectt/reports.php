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
                <div class="col-lg-12 text-left">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#form_modal">COLLECTIONS</button>

                            <button class="btn btn-primary" onclick="showReports(0)" type="submit" name="done"> CONNECTED</button>

                            <button class="btn btn-danger" onclick="showReports(1)" type="submit" name="done"> DISCONNECTED</button>
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
                                        <h3 class="panel-title"><i class="fa fa-dollars-sign"></i> Collections </h3>
                                    </div>
                                            <div class="panel-body">
                                                <form showReports(2)" action="" method="post">
                                                  <label for="date" class="col-md-5">
                                                    DATE FROM:
                                                  </label>
                                                  <div class="col-md-7">
                                                    <input type="date" class="form-control" id="dateFrom" name="date">
                                                  </div>          
                                                  
                                                    <button class="btn btn-success"  type="submit"  onclick="showReports(2)"data-dismiss="modal" name="done"> GO </button>
                                                  
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
                            <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> REPORTS </h3>
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
                                    </tr>
                                        <?php
                            
                                            include 'include/condb.php';
                                            $q="SELECT * FROM `tblclient` WHERE `status`='connected' ORDER BY `name`";
                            
                                            $query = mysqli_query($condb,$q) or die(mysqli_error($condb)); 
                                            $i =1;
                                            while ($result = mysqli_fetch_array($query)){
                                            $cid = $result['cid'];
                                        ?>

                                    <tr>
                                        <td> <?php echo $i; ?></td>
                                        <td> <input type="text" style="height: 40px; width: 100%; padding: 3px; background-color: transparent;border:0px solid transparent;" value= '<?php echo $result['cCode'] ?>' onchange="editSub('<?php echo $cid;?>','cCode',this.value);"  />
                                         </td>
                                        <td style="text-align: left;"> 
                                          <input type="text" style="height: 40px; width: 100%; padding: 3px; background-color: transparent;border:0px solid transparent;" value= '<?php echo $result['name'] ?>' onchange="editSub('<?php echo $cid;?>','name',this.value);"  />
                                        </td>
                                        <td> <input type="text" style="height: 40px; width: 100%; padding: 3px; background-color: transparent;border:0px solid transparent;" value= '<?php echo $result['brgy'] ?>' onchange="editSub('<?php echo $cid;?>','brgy',this.value);"  /> </td>
                                        <td> <input type="text" style="height: 40px; width: 100%; padding: 3px; background-color: transparent;border:0px solid transparent;" value= '<?php echo $result['mun'] ?>' onchange="editSub('<?php echo $cid;?>','mun',this.value);"  /> </td>
                                        <td> <input type="text" style="height: 40px; width: 100%; padding: 3px; background-color: transparent;border:0px solid transparent;" value= '<?php echo $result['subdate'] ?>' onchange="editSub('<?php echo $cid;?>','subdate',this.value);"  /> </td>
                                        <td> <input type="text" style="height: 40px; width: 100%; padding: 3px; background-color: transparent;border:0px solid transparent;" value= '<?php echo $result['plan'] ?>' onchange="editSub('<?php echo $cid;?>','plan',this.value);"  /> </td>
                                        <td> <input type="text" style="height: 40px; width: 100%; padding: 3px; background-color: transparent;border:0px solid transparent;" value= '<?php echo $result['status'] ?>' onchange="editSub('<?php echo $cid;?>','status',this.value);"  /> </td>
                                    
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
    function showReports(no){
        try{
        var query = "";
        var link = "";
        if (no==0){
            query='SELECT * FROM `tblclient` WHERE `status`="connected" ORDER BY `name`';
            link = "client_list.php";
            form_data = new  FormData(); 
            form_data.append("query",query);
        }
        else if(no==1)
        {
           query='SELECT * FROM `tblclient` WHERE `status`="disconnected" ORDER BY `name`'; 
           link = "client_list.php";
           form_data = new  FormData(); 
            form_data.append("query",query);
        }
        else{
            var dFr=$("#dateFrom").val()
            form_data = new  FormData(); 
            form_data.append("dFr",dFr);
            link = "client_list_by_collection.php";
            
        }
        
    $.ajax({
        url: link,
        method: "POST",
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function(){
        },
        success: function(data){ 
            $('#client_list').html(data)  
            //alert(data) 
        }
      });
        }
        catch(e){
            alert(e);
        }
        return false;
    }
</script>