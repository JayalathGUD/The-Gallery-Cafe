<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Welcome to The Gallery Cafe</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
       
        body {
            background-color: #f4f4f9;
            color: #333;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        body {
            background-image: url('images/mainlogin.jpg'); /* Add your background image URL */
            background-size: 100%;
            background-position: center;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            /* background-color: rgba(255, 255, 255, 0.8); */
            padding: 20px 40px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .title {
            font-size: 64px;
            /* color: #2c3e50; */
            margin-bottom: 20px;
            color: white;
        }

        .links > a {
            color: #3498db;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
            background-color: #ecf0f1;
            border: 2px solid #3498db;
            border-radius: 5px;
            margin: 0 10px;
            transition: background-color 0.3s, color 0.3s;
        }

        .links > a:hover {
            background-color: #3498db;
            color: #ecf0f1;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                The Gallery Cafe
            </div>

            <div class="links">
                <a href="admin/admin_login.php" title="Admin Log In">Admin Log In</a>
                <a href="admin/stafflogin.php" title="Staff Log In">Staff Log In</a>
                <a href="login.php" title="User Log In">User Log In</a>

                
            </div>
        </div>
  

</body>
</html>