<?php 

    include('db.php');
    if($_POST['page']){
        $page = $_POST['page'];
        $cur_page = $page;
        $page -= 1;
        $per_page = 15;
        $previous_button  = true;
        $next_button = true;
        $first_button = true;
        $last_button = true;
        $start = $page * $per_page;
        $query_pag_data = "Select msg_id,message from table_name LIMIT $start,$per_page";
        $result_pag_data = mysqli_query($query_pag_data);
        $msg = "";
        while($row  = mysqli_fetch_array($result_pag_data,MYSQLI_ASSOC)){
            $htmlmsg = htmlentities($row['message']);
            $msg .="<li><b>".$row['msg_id']."</br>".$htmlmsg . "</li>";
        } 
        $msg = "<div class='data'<ul>". $msg ."</ul></div>";
        $query_pag_num = "Select COUNT(*) AS count FROM messages";
        $result_pag_num = mysqli_query($query_pag_num);
        $row = mysqli_fetch_array($result_page_num,MYSQLI_ASSOC);
        $count = $row['count'];
        $no_of_pagination = ceil($count/$per_page);
    }

?>