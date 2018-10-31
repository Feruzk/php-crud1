<?php require 'process.php' ?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<link href="css/style.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<title>ユーザー新規登録</title>
</head>
<body>

	<form action="register.php" method="post">
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
				<td>
					<h1>ユーザー新規登録</h1>
				</td>
			</tr>
			<tr>
				<td>ログインID</td>
				<td><input type="text" name="login_id"
					value="<?php echo $login_id; ?>"></td>
			</tr>
			<tr>
				<td>ユーザー名</td>
				<td><input type="text" name="username"
					value="<?php echo $username; ?>"></td>
			</tr>
			<tr>
				<td>パスワード</td>
				<td><input type="password" name="password1"></td>
			</tr>
			<tr>
				<td>パスワード（確認）</td>
				<td><input type="password" name="password2"></td>
			</tr>

			<tr>
				<br>
				<br>
			<tr>
				<td></td>
			</tr>
			<td><br>
			<a href="login.php">ログイン</a></td>
			<td><br> <input type="submit" value="登録" name="reg"
				class="button button1"></td>
			</tr>
		</table>
	</form>
</body>
</html>
