
<?php
session_start();

// Redirect authenticated subscribers
if (isset($_SESSION['subscriber_id'])) {
    header("Location: dashboard.php");
    exit;
}

$error = $_SESSION['login_error'] ?? '';
unset($_SESSION['login_error']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <meta name="theme-color" content="#ffffff">

    <title>Subscriber Login | 8FT</title>

    <link rel="stylesheet"
          href="../Assets/css/login.css">
</head>

<body>

<div class="login-wrapper">

    <a href="../index.html" class="back-home">
        ← Back to Home
    </a>

    <div class="login-container">

        <div class="brand-logo">
            8FT
        </div>

        <h1>Welcome Back!</h1>

        <p class="subtitle">
            Sign in to access your subscriber account.
        </p>

        <?php if (!empty($error)): ?>
            <div class="error-message">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>

        <form action="authenticate.php" method="POST">

            <div class="form-group">
                <label for="username">
                    Subscriber ID / Username
                </label>

                <input
                    type="text"
                    id="username"
                    name="username"
                    placeholder="Enter your subscriber ID"
                    autocomplete="username"
                    required>
            </div>

            <div class="form-group">
                <label for="password">
                    Password
                </label>

                <div class="password-wrapper">
                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Enter your password"
                        autocomplete="current-password"
                        required>

                    <button type="button"
                            id="togglePassword">
                        Show
                    </button>
                </div>
            </div>

            <div class="forgot-password">
                <a href="forgot-password.php">
                    Forgot Password?
                </a>
            </div>

            <button type="submit" class="login-button">
                SIGN IN
            </button>

        </form>

        <div class="login-footer">
            <p>Don't have an account?</p>
            <a href="../index.html#contact">
                Contact 8FT Admin
            </a>
        </div>

    </div>

    <div class="footer-text">
        © 2026 8-Fortune Tech Network And Data Solutions.
        All Rights Reserved.
    </div>

</div>

<script>
const toggle = document.getElementById("togglePassword");
const password = document.getElementById("password");

toggle.addEventListener("click", function () {
    const hidden = password.type === "password";

    password.type = hidden ? "text" : "password";
    toggle.textContent = hidden ? "Hide" : "Show";
});
</script>

</body>
</html>
