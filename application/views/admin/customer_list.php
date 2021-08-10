    <div class="wrapper wrapper-content animated fadeInRightBig">
        <div class="ibox-content">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Customer Name</th>
                    <th>Address</th>
                    <th>Area</th>
                    <th>City</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $Customer = $Customer->result_array();
                if(count($Customer) > 0 )
                {
                    $k = 1;
                    foreach ($Customer as $customer)
                    {
                        $sts  = $customer['status'];
                        $sts = $sts ? '<span class="text-success">Active</span>' : '<span class="text-warning">In-Active</span>';

                       
                        
                        echo '<tr>
                        <td>'.$k.'</td>
                        <td>'.$customer['customer_name'].'</td>
                        <td>'.$customer['address'].'</td>
                        <td>'.$customer['area'].'</td>
                        <td>'.$customer['city'].'</td>
                        <td>'.$customer['phone'].'</td>
                        <td>'.$customer['email'].'</td>
                        <td><img src="'.base_url($customer['image']).'" alt="news image" width="70" /></td>
                        <td>'.$sts.'</td>

                    
                        <td><a href="'.BASE_URL_ADMIN.'Customer/edit/'.$customer['customer_id'].'" title="Click to edit"><i class="fa fa-edit"></i></a></td>
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