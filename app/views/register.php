<?php require_once __DIR__ . "/partials/header.php"; ?>

<div class="login-container">
    <div class="login-box">
        <div class="login-left">
            <h2>Register</h2>
            <form method="POST" action="/register">
                <input type="text" name="name" placeholder="Name" required>
                <input type="text" name="username" placeholder="Username" required>

                <?php if (isset($_SESSION['registerUsernameError'])): ?>
                    <div style="color: red; text-align: center; font-weight: bold; margin: 10px 0;"><?= $_SESSION['registerUsernameError'] ?></div>
                    <?php unset($_SESSION['registerUsernameError']); ?>
                <?php endif; ?>

                <input type="password" name="password" placeholder="Password" required>
                <button type="submit">Register</button>
            </form>
        </div>
        <div class="login-right">
            <h2>Hello!</h2>
            <p>Already have an account?</p>
            <a href="/">Sign In</a>
        </div>
    </div>
</div>

<?php require_once __DIR__ . "/partials/footer.php"; ?>