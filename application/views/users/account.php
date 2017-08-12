<!DOCTYPE html>
<html lang="en">  
<head>
<link href="http://127.0.0.1:4567/assets/css/style.css" rel='stylesheet' type='text/css' />
</head>
<body>
<div class="container">
    <h2>User Account</h2>
    <h3>Welcome <?php echo $user['name']; ?>!</h3>
    <div class="account-info">
        <p><b>Name: </b><?php echo $user['name']; ?></p>
        <p><b>Email: </b><?php echo $user['email']; ?></p>
        <p><b>Phone: </b><?php echo $user['phone']; ?></p>
        <p><b>Gender: </b><?php echo $user['gender']; ?></p>
    </div>

    <p class="footInfo">Wanna leave?<a href="http://127.0.0.1:4567/users/logout">Logout here</a></p>
</div>
</body>
</html>