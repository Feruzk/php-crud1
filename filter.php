<?php
require 'process.php';
 //filter.php
 if(isset($_POST["from_date"], $_POST["to_date"]))
 {
      $connect = mysqli_connect("localhost", "root", "password", "mydata2");
      $output = '';
      $query = "
           SELECT * FROM user
           WHERE create_date BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."'
      ";
      $result = mysqli_query($connect, $query);
      $output .= '
           <table class="table table-striped">
           <tr>
             <th>ログインID</th>
             <th>ユーザ名</th>
             <th>登録日</th>
             <th>更新日</th>
             <th></th>
           </tr>
      ';
      if(mysqli_num_rows($result) > 0)
      {
           while($row = mysqli_fetch_array($result))
           {
                $output .= '
                     <tr>
                          <td>'. $row["login_id"] .'</td>
                          <td>'. $row["name"] .'</td>
                          <td>'. $row["create_date"] .'</td>
                          <td>'. $row["update_date"] .'</td>
                          <td><a href="process.php?edit='. $row['id'].'"
              							class="btn btn-success">更新</a> <a
              							href="process.php?delete='. $row['id'].'"
              							class="btn btn-danger">削除</a></td>
                     </tr>
                ';
           }
      }
      else
      {
           $output .= '
                <tr>
                     <td colspan="5">No Order Found</td>
                </tr>
           ';
      }
      $output .= '</table>';
      echo $output;
 }
 ?>
