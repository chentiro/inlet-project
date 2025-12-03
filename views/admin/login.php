<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - INLET CMS</title>
    
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/login.css">
    
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    
</head>
<body>

<div class="login-box">
    <h2>Login Administrator</h2>
    
    <form action="login/store" method="POST"> 
        <div class="input-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>
        </div>
        
        <div class="input-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
        </div>
        
        <button type="submit" class="btn-login">MASUK</button>
    </form>
    
</div>

</body>
</html>