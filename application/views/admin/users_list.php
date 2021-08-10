    <div class="wrapper wrapper-content animated fadeInRightBig">
        <div class="ibox-content">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>dr_name</th>
                    <th>dr_qual</th>
                    <th>dr_fees</th>
                    <th>dr_timing</th>
                    <th>Mobile</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $members = $members->result_array();
                if(count($members) > 0 )
                {
                    $k = 1;
                    foreach ($members as $member)
                    {
                        //$sts  = $member['status'];
                        
                        echo '<tr>
                        <td>'.$k.'</td>
                        <td>'.$member['dr_name'].'</td><td> '.$member['dr_qual'].' </td><td>'.$member['dr_fees'].'</td>
                        <td>'.$member['dr_timing'].'</td><td> '.$member['mobile'].' </td><td>'.$member['email'].'</td>
                       
                        
                        <td><a href="'.BASE_URL_ADMIN.'Member/edit/'.$controller->encodeData($member['user_id']).'" title="Click to edit"><i class="fa fa-edit"></i></a></td>
                        </tr>';
                        $k++;
                    }
                }
                else
                {
                    echo '<tr><td colspan="6">Sorry!, No users found</td></tr>';
                }
        
            
        ?>
                </tbody>
            </table>
        </div>
    </div>