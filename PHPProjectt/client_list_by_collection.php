<table class='table table-bordered table-hover'>
                                    <tr>
                                        <th>No.</th>
                                        <th>Date</th>
                                        <th>Name</th>
                                        <th>Receipt No</th>
                                        <th>Payment</th>
                                        
                                    </tr>
                                        <?php
                            
                                            include 'include/condb.php';
                                            include 'include/auth.php';
                                            $dFr=$_POST['dFr'];
                                            $q = 'SELECT * FROM `tblclient` ORDER BY `name`';
                                            $query = mysqli_query($condb,$q) or die(mysqli_error($condb)); 
                                            $i =1;
                                            while ($client = mysqli_fetch_array($query)){
                                            $cid = $client['cid'];
                                             $cn = $client['name'];
                                            $hs = mysqli_query($condb,"SELECT * FROM tblhistory WHERE cid = '$cid' AND `payment` >= '$dFr' ") or die(mysql_error($condb));
                                            while ($result = mysqli_fetch_array($hs)) {
                                                $hid = $result['hid'];
                                            
                                        ?>

                                    <tr>
                                        <td> <?php echo $i; ?> </td>
                                        <td> <?php echo $result['date'] ?> </td>
                                        <td> <?php echo $cn; ?> </td>
                                        <td> <?php echo $result['recnum'] ?> </td>
                                        <td> <?php echo $result['payment'] ?> </td>

                                    </tr>                                               
                                    <?php $i++;
                                        }
                                    }
                                    ?>
                                </table>