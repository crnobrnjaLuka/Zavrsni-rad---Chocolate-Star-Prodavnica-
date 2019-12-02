<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="/chocolate_star/css/login.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
</head>
<body>
    <div class="container">
        <div class="login-box">
            <div class="row">
                <div class="col-md-6 login-left">
                    <h2>Login here</h2>
                    <form action="validation.php" method="post">
                        <div class="form_group">
                            <label for="user_name">Username</label>
                            <input type="text" name="user" class="form-control" required>
                        </div>
                        <div class="form_group">
                            <label for="pass">Password</label>
                            <input type="password" name="password" class="form-control" required>
                            <button type="submit" class="bttn">Login</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-6 login-left">
                    <h2>Register here</h2>
                    <form action="register.php" method="post">
                        <div class="form_group">
                            <label for="user_name">Username</label>
                            <input type="text" name="user" class="form-control" required>
                        </div>
                        <div class="form_group" >
                            <label for="pass">Password</label>
                            <input type="password" name="password" class="form-control" required>
                            <button type="submit" class="bttn">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>