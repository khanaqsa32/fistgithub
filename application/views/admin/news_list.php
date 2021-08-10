    <div class="wrapper wrapper-content animated fadeInRightBig">
        <div class="ibox-content">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $News = $News->result_array();
                if(count($News) > 0 )
                {
                    $k = 1;
                    foreach ($News as $nws)
                    {
                        $sts  = $nws['status'];
                        $sts = $sts ? '<span class="text-success">Active</span>' : '<span class="text-warning">In-Active</span>';

                       
                        
                        echo '<tr>
                        <td>'.$k.'</td>
                        <td>'.$nws['nTitle'].'</td>
                        <td>'.$nws['n_des'].'</td>
                        <td><img src="'.base_url($nws['NewsPic']).'" alt="news image" width="70" /></td>
                        <td>'.$sts.'</td>

                    
                        <td><a href="'.BASE_URL_ADMIN.'News/edit/'.$nws['news_id'].'" title="Click to edit"><i class="fa fa-edit"></i></a></td>
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