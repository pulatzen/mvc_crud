<?php require_once __DIR__ . "/partials/header.php"; ?>

<div class="login-container">
    <div class="login-box">
        <!-- Left side: Form -->
        <div class="login-left">
            <h2>Add New User</h2>
            <form action="/create" method="POST" class="login-form">
                <input type="text" name="name" placeholder="Enter full name" required>
                <input type="text" name="username" placeholder="Choose a username" required>

                <?php if (isset($_SESSION['createUsernameError'])): ?>
                    <div style="color: red; text-align: center; font-weight: bold; margin: 10px 0;"><?= $_SESSION['createUsernameError'] ?></div>
                    <?php unset($_SESSION['createUsernameError']); ?>
                <?php endif; ?>

                <input type="password" name="password" placeholder="Choose a password" required>
                <button type="submit" class="btn submit">Add User</button>
            </form>
        </div>

        <!-- Right side: Info -->
        <div class="login-right">
            <h2>User Panel</h2>
            <p>Add a new user to your system using this form.</p>
            <a href="/users" class="btn add">Back to User List</a>
        </div>
    </div>
</div>

<?php require_once __DIR__ . "/partials/footer.php"; ?>