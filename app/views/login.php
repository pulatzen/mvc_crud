<?php require_once __DIR__ . "/partials/header.php"; ?>

<div class="login-container">
    <div class="login-box">
        <div class="login-left">
            <h2>Sign In</h2>
            <form method="POST" action="/login">
                <input type="text" name="username" placeholder="Username" required>

                <?php if (isset($_SESSION['loginUsernameError'])): ?>
                    <div style="color: red; text-align: center; font-weight: bold; margin: 10px 0;"><?= $_SESSION['loginUsernameError'] ?></div>
                    <?php unset($_SESSION['loginUsernameError']); ?>
                <?php endif; ?>

                <input type="password" name="password" placeholder="Password" required>

                <?php if (isset($_SESSION['loginPasswordError'])): ?>
                    <div style="color: red; text-align: center; font-weight: bold; margin: 10px 0;"><?= $_SESSION['loginPasswordError'] ?></div>
                    <?php unset($_SESSION['loginPasswordError']); ?>
                <?php endif; ?>

                <button type="submit">Sign In</button>
            </form>
        </div>
        <div class="login-right">
            <h2>Welcome to login</h2>
            <p>Don't have an account?</p>
            <a href="/register">Sign Up</a>
        </div>
    </div>
</div>

<?php require_once __DIR__ . "/partials/footer.php"; ?>