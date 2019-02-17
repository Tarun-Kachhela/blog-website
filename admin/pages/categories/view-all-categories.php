
<div class="table-responsive">
    <table class="table table-hover">
        <thead>
        <tr>
            <th>id</th>
            <th>category title</th>
            <th>edit</th>
            <th>delete</th>
        </tr>
        </thead>
        <tbody>
        <?php
        include_once ("../includes/functions.php");
        $allCategories = getAllCategories();
        $count = count($allCategories);
        $i=0;

        while($i<$count){
            echo<<<TR
<tr>
TR;
            echo<<<TR
<td>{$allCategories[$i]['cat_id']}</td>
TR;
            echo<<<TR
    <td>{$allCategories[$i]['cat_title']}</td>
TR;
            $id = $allCategories[$i]['cat_id'];
            echo <<<TR
            <td><a href="{$_SERVER['PHP_SELF']}?id=$id">edit</a></td>    
TR;

            echo <<<TR
            <td><a href="includes/delete_data.php?cat_id=$id">delete</a></td>    
TR;
            echo<<<TR
            
</tr>
TR;
            $i++;
        }

        ?>

        </tbody>
    </table>
</div>