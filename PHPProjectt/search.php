<?php
include 'include/condb.php';

if (isset($_POST['keyword'])) {
        $keyword = $_POST['keyword'];

        $query = mysqli_query($condb,"SELECT * FROM tblclient WHERE `name` LIKE '%$keyword%' OR `brgy` LIKE '%$keyword%' OR `mun` LIKE '%$keyword%' OR `plan` LIKE '$keyword' OR `status` LIKE '%$keyword%' ORDER BY `name`") or die (mysql_error($condb));


                        ?>
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
                                <?php

                        }

                        ?>