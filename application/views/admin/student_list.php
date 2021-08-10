        <div class="wrapper wrapper-content animated fadeInRightBig">
        <div class="ibox-content">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Address</th>
                    <th>Mobile</th>
                    <th>Email</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $Student = $student->result_array();
                if(count($Student) > 0 )
                {
                    $k = 1;
                    foreach ($Student as $std)
                    {
                         $sts  = $std['status'];
                        $sts = $sts ? '<span class="text-success">Active</span>' : '<span class="text-warning">In-Active</span>';

                       
                        
                        echo '<tr>
                        <td>'.$k.'</td>
                        <td>'.$std['first_name'].'</td>
                        <td>'.$std['last_name'].'</td>
                        <td>'.$std['saddress'].'</td>
                        <td>'.$std['mobile'].'</td>
                        <td>'.$std['email'].'</td>
                        <td><img src="'.base_url($std['student_image']).'" alt="student image" width="70" /></td>
                        <td>'.$sts.'</td>

                    
                        <td><a href="'.BASE_URL_ADMIN.'student/editStudent/'.$std['student_id'].'" title="Click to edit"><i class="fa fa-edit"></i></a></td>
                        </tr>';
                        $k++;
                    }
                }
                else
                {
                    echo '<tr><td colspan="6">Sorry!, No news found</td></tr>';
                }
        
            
        ?>
                </tbody>
            </table>
        </div>
    </div>