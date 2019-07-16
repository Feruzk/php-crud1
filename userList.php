<?php require 'process.php' ?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ユーザ一覧画面</title>
<link href="css/style.css" rel="stylesheet">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script	src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
<script src="js/bootstrap.min.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
</head>
<body>
	<header>
		<nav class="navbar navbar-inverse">
			<div class="container">
				<div class="navbar-header">
					<a class="navbar-brand" href="">ユーザ管理システム</a>
				</div>
				<ul class="nav navbar-nav navbar-right">
          		  <?php
            				if (isset($_SESSION['username'])) :
                ?>
           			 <li class="navbar-text"><?=$_SESSION['username']?> さん</li>
          				  <?php endif; ?>
  				     <li class="dropdown"><a href="logout.php"
						class="navbar-link logout-link">ログアウト</a></li>
				</ul>
			</div>
		</nav>
	</header>
	<div class="container">
		<div class="text-right">
			<a href="register.php">新規登録</a>
		</div>
      <?php
    		$mysqli = new mysqli('localhost', 'root', 'password', 'mydata') or die(mysqli_error($mysqli));
    		$result = $mysqli->query("SELECT * FROM user") or die($mysqli->error);
    	?>
        <div class="table-responsive">
      <?php
        		if (isset($_SESSION['message'])) :
      ?>
          <div class="alert alert-<?=$_SESSION['msg_type']?>">
            <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
            ?>
          </div>
        <?php endif; ?>

				<div class="col-md-3">
						 <input type="text" name="from_date" id="from_date" class="form-control" placeholder="登録日～" />
				</div>

				<div class="col-md-3">
						 <input type="text" name="to_date" id="to_date" class="form-control" placeholder="～登録日" />
				</div>
				<div class="col-md-5">
						 <input type="button" name="filter" id="filter" value="検索" class="btn btn-info" />
				</div>
				<div style="clear:both"></div>
				<br />
			  <div id="filter_table">
             <table class="table table-striped">
				<thead>
					<tr>
						<th>ログインID</th>
						<th>ユーザ名</th>
						<th>登録日</th>
						<th>更新日</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
				   <tr>
             <?php
                 while ($row = $result->fetch_assoc()) :
              ?>
           <tr>
						<td><?php echo $row['login_id']; ?></td>
						<td><?php echo $row['name']; ?></td>
						<td><?php echo $row['create_date']; ?></td>
						<td><?php echo $row['update_date']; ?></td>
						<td><a href="process.php?edit=<?php echo $row['id'] ?>"
							class="btn btn-success">更新</a> <a
							href="process.php?delete=<?php echo $row['id'] ?>"
							class="btn btn-danger">削除</a></td>
					 </tr>
             <?php endwhile; ?>
          </tr>
				</tbody>
			</table>
		</div>
		</div>
	</div>
	</div>
	</div>
</body>
</html>

<script>
		 $(document).ready(function(){
					$.datepicker.setDefaults({
							 dateFormat: 'yy/mm/dd'
					});
					$(function(){
							 $("#from_date").datepicker();
							 $("#to_date").datepicker();
					});
					$('#filter').click(function(){
							 var from_date = $('#from_date').val();
							 var to_date = $('#to_date').val();
							 if(from_date != '' && to_date != '')
							 {
										$.ajax({
												 url:"filter.php",
												 method:"POST",
												 data:{from_date:from_date, to_date:to_date},
												 success:function(data)
												 {
															$('#filter_table').html(data);
												 }
										});
							 }
							 else
							 {
										alert("日付を選択してください");
							 }
					});
		 });
</script>
