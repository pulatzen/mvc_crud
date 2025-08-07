<?php require_once __DIR__ . "/partials/header.php"; ?>

<div class="login-container">
    <div class="login-box user-box">
        <!-- Only Left Side Now -->
        <div class="login-left user-left">

            <!-- Manage Users Title Section (top full width) -->
            <div class="manage-header">
                <div class="manage-title">
                    <h2>Manage Users</h2>
                    <p>You can add, edit, or remove users from the system.</p>
                </div>
                <a href="/create" class="btn add">Add New User</a>
            </div>

            <div class="user-controls">
                <form class="user-form" method="GET" action="/users">
                    <input type="text" name="search" value="<?= htmlspecialchars($_GET['search'] ?? '') ?>" class="search-input" placeholder="Search...">

                    <select name="sort" class="sort-select">
                        <option value="">Sort by...</option>
                        <option value="id">ID</option>
                        <option value="name">Name</option>
                        <option value="username">Username</option>
                    </select>

                    <button type="submit" class="submit-btn">Apply</button>
                </form>
            </div>

            <!-- Table Section -->
            <div class="table-wrapper">
                <table class="styled-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td><?= htmlspecialchars($user['id_d']) ?></td>
                                <td><?= htmlspecialchars($user['name_d']) ?></td>
                                <td><?= htmlspecialchars($user['username_d']) ?></td>
                                <td><?= htmlspecialchars($user['password_d']) ?></td>
                                <td>
                                    <a class='btn edit' onclick="window.location.href='/edit?id=<?= $user['id_d'] ?>'">Edit</a>
                                    <a class='btn delete' onclick="window.location.href='/delete?id=<?= $user['id_d'] ?>'">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php require_once __DIR__ . "/partials/footer.php"; ?>