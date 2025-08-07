<?php require_once __DIR__ . "/partials/header.php"; ?>

<body>
    <div class="login-container">
        <div class="login-box">
            <!-- Left Side: Form -->
            <div class="login-left">
                <h2>Edit User</h2>
                <form action="/edit" method="POST" class="login-form">
                    <input type="hidden" name="id" value="<?= $user['id_d'] ?>">

                    <input type="text" name="name" value="<?= htmlspecialchars($user['name_d'] ?? '') ?>" placeholder="Full Name" required>

                    <input type="text" name="username" value="<?= htmlspecialchars($user['username_d'] ?? '') ?>" placeholder="Username" required>

                    <input type="password" name="password" value="<?= htmlspecialchars($user['password_d'] ?? '') ?>" placeholder="Password">

                    <button type="submit" class="btn submit">Edit User</button>
                </form>
            </div>

            <!-- Right Side: Info -->
            <div class="login-right">
                <h2>User Panel</h2>
                <p>You can update user information here. If password is left blank, it won’t be changed.</p>
                <a href="/users" class="btn add">← Back to User List</a>
            </div>
        </div>
    </div>

    <?php require_once __DIR__ . "/partials/footer.php"; ?>