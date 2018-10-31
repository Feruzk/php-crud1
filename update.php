<?php include 'process.php';?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<link href="css/style.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<title>データ更新</title>
</head>
<body>
	<form action="update.php" method="post">
  <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
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
				<td colspan="2">
					<h1>ユーザーのデータ更新</h1>
				</td>
			</tr>
			<tr>
				<td>ログインID</td>
				<td><input type="text" name="login_id"></td>
			</tr>
			<tr>
				<td>ユーザー名</td>
				<td><input type="text" name="username"></td>
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
			<td><br></td>
			<td><br>
				 <input type="submit" value="更新" name="update"
				class="button button1"></td>
			</tr>
		</table>
	</form>
</body>
</html>
