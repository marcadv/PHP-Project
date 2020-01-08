<table class='table table-bordered table-hover'>
                                    <tr>
                                        <th>No.</th>
                                        <th>Name</th>
                                        <th>Barangay</th>
                                        <th>Municipal</th>
                                        <th>Subscribed Date</th>
                                        <th>Plan</th>
                                        <th>Status</th>
                                    </tr>
                                        <?php
                            
                                            include 'include/condb.php';
                                            $q=$_POST['query'];
                            
                                            $query = mysqli_query($condb,$q) or die(mysqli_error($condb)); 
                                            $i =1;
                                            while ($result = mysqli_fetch_array($query)){
                                            $cid = $result['cid'];
                                        ?>

                                    <tr>
                                        <td> <?php echo $i; ?></td>
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