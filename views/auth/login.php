<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - InLet CMS</title>
    
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/login.css">
    
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    
</head>
<body>

<?php
$error_message = $error ?? null;
?>

<div class="login-container">
    <div class="login-card">
        <h1 class="login-title">Login Admin INLET</h1>
        
        <?php if (!empty($error_message)): ?>
            <div class="alert alert-danger" style="color: #b91c1c; background-color: #fee2e2; padding: 10px; border-radius: 4px; margin-bottom: 15px;">
                <?php echo htmlspecialchars($error_message); ?>
            </div>
        <?php endif; ?>

        <form action="<?php echo BASE_URL; ?>auth/login" method="POST" class="login-form">
            
            <div class="form-group">
                <label for="credential">Username / Email</label>
                <input type="text" name="credential" id="credential" required 
                       value="<?php echo htmlspecialchars($_POST['credential'] ?? ''); ?>"
                       placeholder="Masukkan Username atau Email Anda">
            </div>
            
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required 
                       placeholder="Masukkan Password">
            </div>
            
            <button type="submit" class="login-btn">
                <span class="material-icons-outlined">login</span> Masuk
            </button>
        </form>
    </div>
</div>

</body>
</html>