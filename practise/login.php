<?php
include_once 'Database.php';
include_once 'session.php';
include_once 'utilities.php';

if(isset($_POST['signinbtn'])){
    $form_errors = array();
    $required_fields = array('username', 'password');
    $form_errors = array_merge($form_errors, check_empty_fields($required_fields));
    if (empty($form_errors)){
        $user = $_POST['username'];
        $pass = $_POST['password'];

        $sqlQuery = "SELECT * FROM users WHERE username = :username";
        $statement = $db->prepare($sqlQuery);
        $statement->execute(array(':username' => $user));

        while ($row = $statement->fetch()){
            $id = $row['id'];
            $hashedpass = $row['password'];
            $username = $row['username'];

            if (password_verify($pass, $hashedpass)){
                $_SESSION['id'] = $id;
                $_SESSION['username'] = $username;
                header("location:index.php");
            }else{
                $result = "<p style='padding: 20px; color: red;'></p>";
            }

        }

    }else{
        if(count($form_errors) == 1){
            $result = "<p style='color:red;'>there was 1 error in form</p>";
        }else
            $result = "<p style='color:red;'>there were ".count($form_errors)."error in form</p>";

    }


}

?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Login Page</title>
</head>
<body>
<h2>User Authentication System </h2><hr>

<h3>Login Form</h3>
<?php //if() ?>
<form method="post" action="">
    <table>
        <tr><td>Username:</td> <td><input type="text" name="username" value=""></td></tr>
        <tr><td>Password:</td> <td><input type="password" name="password" value=""></td></tr>
        <tr><td></td> <td><input style="float: right" type="submit" name="signinbtn" value="SignIn"></td></tr>


    </table>
</form>
<p><a href="index.php">Back</a></p>
</body>
</html>