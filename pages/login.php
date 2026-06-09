<?php
if (!isset($_SESSION)) session_start();

require_once __DIR__ . '/../class/class.Connection.php';
require_once __DIR__ . '/../class/class.User.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email    = trim($_POST['email']);
    $password = $_POST['password'];

    $userObj = new User();
    $userObj->ValidateEmail($email);

    if ($userObj->hasil && $userObj->password === $password) {
        $_SESSION['user_id']   = $userObj->userid;
        $_SESSION['user_name'] = $userObj->name;
        $_SESSION['user_email']= $userObj->email;
        $_SESSION['role']      = $userObj->role;

        if ($userObj->role === 'admin') {
            $_SESSION['admin_logged_in'] = true;
            echo '<script>window.location="index.php?p=admin";</script>';
        } elseif ($userObj->role === 'manager') {
            echo '<script>window.location="index.php?p=dashboard-manager";</script>';
        } else {
            echo '<script>window.location="index.php?p=dashboard-employee";</script>';
        }
        exit;
    } else {
        $error = "Email atau password salah!";
    }
}
?>

<div class="page-content-wrapper" style="background-color: var(--olive-bg); padding-bottom: 5rem;">
    <div style="max-width: 440px; margin: 2rem auto 0 auto; background-color: #fff; padding: 3rem; border-radius: 8px; box-shadow: 0 10px 30px rgba(0,0,0,0.2); text-align: center;">
        <img src="logo-brown.png" alt="Plataran" style="height: 70px; margin-bottom: 1.5rem;">
        <h2 style="font-family: var(--font-heading); font-size: 2rem; color: var(--text-dark); margin: 0 0 0.5rem 0; font-weight: 400;">Login</h2>
        <p style="color: #888; font-size: 0.9rem; margin-bottom: 2rem; font-weight: 300;">Masuk sesuai role Anda</p>

        <?php if (!empty($error)): ?>
        <div style="margin-bottom: 1.5rem; padding: 0.8rem 1rem; border: 1px solid #d9534f; background: rgba(217,83,79,0.08); color: #d9534f; border-radius: 4px; font-size: 0.9rem;">
            <?= htmlspecialchars($error) ?>
        </div>
        <?php endif; ?>

        <form method="POST" action="index.php?p=login" style="text-align: left;">
            <div style="margin-bottom: 1.2rem;">
                <label style="display: block; margin-bottom: 0.4rem; font-size: 0.9rem; font-weight: 500; color: #444;">Email</label>
                <input type="email" name="email" placeholder="email@contoh.com" required
                       style="width: 100%; padding: 0.9rem 1rem; border: 1px solid #ccc; border-radius: 4px; font-size: 1rem; box-sizing: border-box;">
            </div>
            <div style="margin-bottom: 1.8rem;">
                <label style="display: block; margin-bottom: 0.4rem; font-size: 0.9rem; font-weight: 500; color: #444;">Password</label>
                <input type="password" name="password" placeholder="Password" required
                       style="width: 100%; padding: 0.9rem 1rem; border: 1px solid #ccc; border-radius: 4px; font-size: 1rem; box-sizing: border-box;">
            </div>
            <button type="submit" class="btn-gold" style="width: 100%; border-radius: 4px; font-size: 1rem; padding: 1rem;">
                Masuk
            </button>
        </form>
    </div>
</div>