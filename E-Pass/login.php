<?php include "Resource/db.php"; 

if(isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $username=stripcslashes($username);
        $password=stripcslashes($password);
        $username=mysqli_real_escape_string($connection, $username);
        $password=mysqli_real_escape_string($connection, $password);

        $query = "select * from admin where username='$username' and password='$password'";
        $search_connection = mysqli_query($connection,$query);
    
    $row=mysqli_fetch_array($search_connection);
    error_reporting(E_ALL ^ E_NOTICE);
    if ($row['username'] == $username && $row['password'] == $password) {
        header ('Location: admin.php');
    } else {
        echo '<script>alert("Login Failed")</script>';
    } 
}
    
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>
            Login
        </title>
		<link rel="Stylesheet" href="Resource/CSS/login.css">
    </head>

    <body background="loginwallpaper.jpg">
        <table  border=5 width=400 height=400 id="Login" bgcolor=white>
            <tr>
                <td style="border:0px">
					<img src="Resource/CSS/Images/admin-settings-male.png" id="UserLoginImg"><br>
					<span style="padding-left:40%">Welcome</span>
                   
                    <form action="" method="post">
                        <table id="LoginInside" border=0 width=400 height=300>
                            <tr>
                                <td>
                                    <span>UserName<span style="color:green"></span></span><br>
                                    <input type="text" id="uname" placeholder="Enter UserName" name="username" required>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Password<span style="color:green"></span></span><br>
                                    <input type="password" id="pword" placeholder="Enter Password" name="password" required><br>
                                </td>
                            </tr>
                            <tr>
                                <td align=right>
                                    <button id="buttonLogin" name="login">Login</button><br><br>
									
                                </td>
                            </tr>
                        </table>
                    </form>
                </td>
            </tr>
        </table>
    </body>

</html>