<?php
include '../components/connect.php';

session_start();

if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $name = filter_var($name, FILTER_SANITIZE_STRING);
    $pass = $_POST['pass'];
    $pass = filter_var($pass, FILTER_SANITIZE_STRING);

    $select_staff = $conn->prepare("SELECT * FROM staff WHERE name = ?");
    $select_staff->execute([$name]);

    if($select_staff->rowCount() > 0) {
        $fetch_staff = $select_staff->fetch(PDO::FETCH_ASSOC);
        if (password_verify($pass, $fetch_staff['password'])) {
            $_SESSION['admin_id'] = $fetch_staff['id'];
            session_regenerate_id(true); // Security improvement
            header('location:staffdashboard.php');
        } else {
            $message[] = 'Incorrect username or password!';
        }
    } else {
        $message[] = 'Incorrect username or password!';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: beige;
        }
        .form-container {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }
        .form-container h3 {
            color: #333;
            margin-bottom: 20px;
            font-size: 24px;
        }
        .form-container p {
            color: #555;
            margin-bottom: 30px;
            font-size: 14px;
        }
        .form-container p span {
            color: #e67e22;
            font-weight: bold;
        }
        .form-container .box {
            width: 100%;
            padding: 15px;
            margin: 10px 0;
            border: 2px solid #ddd;
            border-radius: 10px;
            box-sizing: border-box;
            font-size: 16px;
            transition: border-color 0.3s ease, background-color 0.3s ease;
        }
        .form-container .box:focus {
            border-color: #e67e22;
            background-color: #fff5e6;
            outline: none;
        }
        .form-container .btn {
            width: 100%;
            padding: 15px;
            background: linear-gradient(135deg, #55efc4, #00b894);
            border: none;
            border-radius: 10px;
            color: white;
            font-size: 18px;
            cursor: pointer;
            transition: background 0.3s ease;
            margin-top: 10px;
        }
        .form-container .btn:hover {
            background: linear-gradient(135deg, #00b894, #55efc4);
        }
        .message {
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 5px;
            color: white;
            background-color: #e74c3c; /* Error messages in red */
        }
    </style>
</head>
<body>

<?php
if(isset($message)) {
    foreach($message as $msg) {
        echo '<div class="message">';
        echo htmlspecialchars($msg, ENT_QUOTES, 'UTF-8');
        echo '</div>';
    }
}
?>

<section class="form-container">
    <form action="" method="POST">
        <h3>Staff Login Now</h3>
        <p> Username = <span>sandu</span> & Password = <span>123</span> </p>
        
        <input type="text" name="name" maxlength="20" required placeholder="Enter your username" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
        <input type="password" name="pass" maxlength="20" required placeholder="Enter your password" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
        <input type="submit" value="Login Now" name="submit" class="btn">
    </form>
</section>

</body>
</html>