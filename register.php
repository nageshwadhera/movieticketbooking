<?php require 'config.php'; 
    if(isset($_POST['login'])){
        $email= $_POST['email'];
        $password= sha1($_POST['password']);

        $qre=mysql_query("select * from users where user_email='$email' and user_password='$password' limit 1");
        $num_rows= mysql_num_rows($qre);
        if($num_rows==0){
            $error_login= "invalid username/password";
        }else{
            while($res=mysql_fetch_array($qre)){
                $_SESSION['user_id']= $res['user_id'];
                $_SESSION['username']= $res['user_name'];
                if(isset($_SESSION['user_id']) && $_SESSION['username']){
                    if(!empty($_SERVER['QUERY_STRING'])){
                       header("location:booking.php?".$_SERVER['QUERY_STRING']);
                    }else{
                        header("location: home.php");    
                    }
                    
                }
            }

        }

    }


    if(isset($_POST['submit'])){
        $fullname= $_POST['fullname'];
        $email= $_POST['email'];
        $password= $_POST['password'];
        $cpassword= $_POST['cpassword'];
        $mobile= $_POST['mobile'];

        if(empty($fullname) || empty($email) || empty($password) || empty($cpassword) || empty($mobile)){
            $error= "please enter empty fields";
        }else{
            $password= sha1($password);
            $qre=mysql_query("insert into users (user_name,user_email,user_password,user_mobile) values 
                ('$fullname','$email','$password','$mobile')");
            if( $qre ){
                $success="your account created! Please Log in";
            }
        }
    }
?>
<?php require 'includes/header.php'; ?>
	<div class="body">
	<div class="register_form">
            <h2 class="heading">Register your account</h2>
            <?php if(isset($success)){
                echo "<div class='success'>$success</div>";
                } 
            ?>
            <?php if(isset($error)){
                echo "<div class='error'>$error</div>";
                } 
            ?>
            <form action="" class="form" method="post">
            <table>
                <tbody><tr>
                    <th>Fullname</th>
                    <td><input type="text" required placeholder="enter full name" name="fullname" id=""></td>
                </tr>
                <tr>
                    <th>E-mail</th>
                    <td><input type="email" required placeholder="enter email" name="email" id=""></td>
                </tr>
                <tr>
                    <th>Password</th>
                    <td><input type="password" required placeholder="enter password" name="password" id=""></td>
                </tr>
                <tr>
                    <th>Confirm Password</th>
                    <td><input type="password" required placeholder="confirm password" name="cpassword" id=""></td>
                </tr>
                <tr>
                    <th>Mobile Number</th>
                    <td><input type="text" required name="mobile" placeholder="enter mobile number" id=""></td>
                </tr>
                <tr>
                    <th></th>
                    <td><input type="submit" class="book_flight_btn" value="Register" name="submit"></td>
                </tr>
            </tbody></table>
        </form>
        </div>
        <div class="login_form">
            <h2 class="heading">Login to your account</h2>
            <?php if(isset($error_login)){
                echo "<div class='error'>$error_login</div>";
                } 
            ?>
            <form action="" class="form" method="post">
            <table>
                <tbody><tr>
                    <th>E-mail</th>
                    <td><input type="email" required placeholder="enter email" name="email" id=""></td>
                </tr>
                <tr>
                    <th>Password</th>
                    <td><input type="password" required placeholder="enter password" name="password" id=""></td>
                </tr>
                <tr>
                    <th></th>
                    <td><input type="submit" class="book_flight_btn" value="Register" name="login"></td>
                </tr>
            </tbody></table>
                </form>
        </div>
	</div>
<?php require 'includes/footer.php'; ?>
