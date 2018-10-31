<?php require 'process.php' ?>
<!DOCTYPE html>
<html lang=ja>
<head>
<meta charset="utf-8">
<link href="css/style.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<title>ユーザーログイン</title>
</head>
<body>
	<div class="">
		<form class="login" action="" method="post">
			<table>
				<thead>
					<th colspan="2">
						<?php if(count($errors) > 0): ?>
							<p class="alert alert-danger">
				    		<?php include('errors.php'); ?>
         			</p>
						<?php endif; ?>
					</th>
				</thead>
				<tr>
					<td><h1>ログイン画面</h1></td>
					<td></td>
				</tr>
				<tr>
					<td>ログインID</td>
					<td><input type="text" name="login_id" value="<?php echo $login_id; ?>"></td>
				</tr>
				<tr>

					<td>パスワード</td>
					<td><input type="password" name="password"></td>
				</tr>

				<tr>
					<br>
					<br>


				<tr>
					<td></td>
				</tr>
				<td><a href="register.php">新規登録</a></td>
				<td><input type="submit" value="ログイン" class="button button1"
					name="login_user"></td>
				</tr>

			</table>

		</form>
	</div>
</body>
</html>
