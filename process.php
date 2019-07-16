<?php

    session_start();
    
    $errors = array();

    $mysqli = new mysqli('localhost', 'root', 'password', 'mydata' ) or die(mysqli_error($mysqli));
   
    if(isset($_POST['reg'])){
      $login_id = $_POST['login_id'];
      $username = $_POST['username'];
      $password1 = $_POST['password1'];
      $password2 = $_POST['password2'];

      $query = "SELECT * FROM user WHERE login_id='$login_id'";
      $result = $mysqli->query($query) or die($mysqli->error());
      $count = mysqli_num_rows($result);
      if($count>0){
        array_push($errors, " * 入力されたログインID既に使われています<br>　他のIDを選んでください");
      }

      if(empty($login_id)){
        array_push($errors, " * ログインIDの入力して下さい");
      }

      if(empty($username)){
        array_push($errors, " * ユーザー名を入力して下さい");
      }

      if(empty($password1)){
        array_push($errors, " * パスワードを入力してください");
      }

      if($password1 != $password2){
        array_push($errors, " * パスワードが違います。上下に同じパスワードを入力してください");
      }

      if(count($errors) == 0){
        $password = md5($password1);
        $query = "INSERT INTO user (login_id, name, password, create_date, update_date)
                VALUES ('$login_id','$username','$password', now(), now())";
        $mysqli->query($query) or die($mysqli->error());
        if(empty($_SESSION)){
          header("location: success.php");
        }
        else{
          header("location: userList.php");
        }
  }
}

//log

  if (isset($_POST['login_user'])) {
  $login_id = $_POST['login_id'];
  $password = $_POST['password'];

  if (empty($login_id)) {
  	array_push($errors, " * ログインIDの入力して下さい");
  }
  if (empty($password)) {
  	array_push($errors, " * パスワードを入力してください");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM user WHERE login_id='$login_id' AND password='$password'";
  	$results =  $mysqli->query($query) or die($mysqli->error());

  	if (mysqli_num_rows($results) > 0) {
      while($row = $results->fetch_assoc()){
        $_SESSION['username'] = $row['name'];
    }
  	  header("location: userList.php");
  	}else {
  	 array_push($errors, " * ログインID又はパスワードが違います <br> もう一度お試しください");

  	}
  }
}

//actions

if(isset($_GET['delete'])){
  $id = $_GET['delete'];
  $mysqli -> query("DELETE FROM user WHERE id=$id") or die($mysqli->error());

  $_SESSION['message'] = "データ削除されました";
  $_SESSION['msg_type'] = "danger";

  header("location: userList.php");
}

if(isset($_GET['edit'])){
  $id = $_GET['edit'];
  $result = $mysqli->query("SELECT * FROM user WHERE id=$id") or die($mysqli->error());
  if (count($result)==1){
    while($row = $result->fetch_assoc()){
      $_SESSION['login_id'] = $row['login_id'];
      $_SESSION['usernamee'] = $row['name'];
  }
    header("location: update.php?id=".$id);
  }
  else{
    header("location: userList.php");
  }
}

if(isset($_POST['update'])){
  $id = $_POST['id'];
  $login_id = $_POST['login_id'];
  $username = $_POST['username'];
  $password1 =$_POST['password1'];
  $password2 =$_POST['password2'];


    if(empty($login_id)){
      array_push($errors, " * ログインIDの入力して下さい");
    }

    if(empty($username)){
      array_push($errors, " * ユーザー名を入力して下さい");
    }

    if(empty($password1)){
      array_push($errors, " * パスワードを入力してください");
    }

    if($password1 != $password2){
      array_push($errors, " * パスワードが違います。上下に同じパスワードを入力してください");
    }

    if(count($errors) == 0){
      $password = md5($password1);
      $mysqli->query("UPDATE user SET login_id='$login_id', name='$username',  password ='$password', update_date = now() WHERE id=$id")
        or die($mysqli->error());

      header("location: userList.php");

      $_SESSION['message'] = "データ更新されました";
      $_SESSION['msg_type'] = "success";
}

}

?>
