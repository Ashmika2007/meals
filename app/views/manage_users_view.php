
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Manage Users - Admin Panel</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">
  <header class="bg-green-700 text-white px-6 py-4 flex justify-between items-center">
    <h1 class="text-xl font-bold">👥 Manage Users</h1>
    <a href="admin_dashboard.php" class="bg-white text-green-700 px-4 py-2 rounded">⬅ Back</a>
  </header>

  <main class="max-w-6xl mx-auto px-6 py-8">
    <h2 class="text-2xl font-semibold mb-4">All Registered Users</h2>

    <table class="min-w-full bg-white border rounded text-sm">
      <thead class="bg-green-100">
        <tr>
          <th class="px-4 py-2 border">ID</th>
          <th class="px-4 py-2 border">Name</th>
          <th class="px-4 py-2 border">Email</th>
          <th class="px-4 py-2 border">Role</th>
          <th class="px-4 py-2 border">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = $users->fetch_assoc()): ?>
          <tr class="hover:bg-gray-50">
            <td class="border px-4 py-2"><?= $row['id'] ?></td>
            <td class="border px-4 py-2"><?= htmlspecialchars($row['name']) ?></td>
            <td class="border px-4 py-2"><?= htmlspecialchars($row['email']) ?></td>
            <td class="border px-4 py-2"><?= $row['role'] ?></td>
            <td class="border px-4 py-2 space-x-2">
              <a href="?edit=<?= $row['id'] ?>" class="text-blue-600 hover:underline">Edit</a>
              <a href="?delete=<?= $row['id'] ?>" class="text-red-600 hover:underline" onclick="return confirm('Delete this user?');">Delete</a>
            </td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>

    <?php if (isset($_GET['edit'])): 
      $editId = (int)$_GET['edit'];
      $editUser = $conn->query("SELECT * FROM users WHERE id = $editId")->fetch_assoc();
    ?>
    <div class="mt-10 bg-white p-6 rounded shadow max-w-md mx-auto">
      <h3 class="text-lg font-semibold mb-4">Edit User</h3>
      <form method="POST" action="">
        <input type="hidden" name="user_id" value="<?= $editUser['id'] ?>">

        <label class="block mb-1">Name</label>
        <input type="text" name="name" value="<?= htmlspecialchars($editUser['name']) ?>" class="w-full border px-3 py-2 rounded mb-4" required>

        <label class="block mb-1">Email</label>
        <input type="email" name="email" value="<?= htmlspecialchars($editUser['email']) ?>" class="w-full border px-3 py-2 rounded mb-4" required>

        <label class="block mb-1">Role</label>
        <select name="role" class="w-full border px-3 py-2 rounded mb-4">
          <option value="customer" <?= $editUser['role'] == 'customer' ? 'selected' : '' ?>>Customer</option>
          <option value="admin" <?= $editUser['role'] == 'admin' ? 'selected' : '' ?>>Admin</option>
        </select>

        <button type="submit" name="update_user" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Update</button>
      </form>
    </div>
    <?php endif; ?>

  </main>
</body>
</html>
