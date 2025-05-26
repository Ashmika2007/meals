
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Manage Subscriptions - Admin</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

<header class="bg-green-700 text-white py-4 px-6 flex justify-between items-center">
  <h1 class="text-xl font-bold">📦 Manage Subscriptions</h1>
  <a href="admin_dashboard.php" class="bg-white text-green-700 px-4 py-2 rounded hover:bg-green-100">← Back</a>
</header>

<main class="p-6 max-w-7xl mx-auto">
  <h2 class="text-2xl font-semibold mb-4">All Subscriptions</h2>

  <table class="min-w-full bg-white rounded shadow">
    <thead class="bg-green-600 text-white">
      <tr>
        <th class="py-2 px-4 text-left">#</th>
        <th class="py-2 px-4 text-left">Customer</th>
        <th class="py-2 px-4 text-left">Email</th>
        <th class="py-2 px-4 text-left">Plan</th>
        <th class="py-2 px-4 text-left">Start Date</th>
        <th class="py-2 px-4 text-left">Status</th>
        <th class="py-2 px-4 text-left">Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($row = $result->fetch_assoc()): ?>
        <tr class="border-b">
          <form method="POST">
            <input type="hidden" name="id" value="<?= $row['id'] ?>">
            <td class="py-2 px-4"><?= $row['id'] ?></td>
            <td class="py-2 px-4"><?= htmlspecialchars($row['name']) ?></td>
            <td class="py-2 px-4"><?= htmlspecialchars($row['email']) ?></td>
            <td class="py-2 px-4">
              <select name="plan_type" class="border rounded px-2 py-1">
                <option value="weekly" <?= $row['plan_type'] === 'weekly' ? 'selected' : '' ?>>Weekly</option>
                <option value="biweekly" <?= $row['plan_type'] === 'biweekly' ? 'selected' : '' ?>>Biweekly</option>
                <option value="monthly" <?= $row['plan_type'] === 'monthly' ? 'selected' : '' ?>>Monthly</option>
              </select>
            </td>
            <td class="py-2 px-4"><?= $row['start_date'] ?></td>
            <td class="py-2 px-4">
              <select name="status" class="border rounded px-2 py-1">
                <option value="active" <?= $row['status'] === 'active' ? 'selected' : '' ?>>Active</option>
                <option value="paused" <?= $row['status'] === 'paused' ? 'selected' : '' ?>>Paused</option>
                <option value="cancelled" <?= $row['status'] === 'cancelled' ? 'selected' : '' ?>>Cancelled</option>
              </select>
            </td>
            <td class="py-2 px-4 flex gap-2">
              <button name="update" class="bg-blue-500 text-white px-3 py-1 rounded text-sm hover:bg-blue-600">Update</button>
              <a href="?delete=<?= $row['id'] ?>" onclick="return confirm('Are you sure you want to delete this subscription?')" class="bg-red-500 text-white px-3 py-1 rounded text-sm hover:bg-red-600">Delete</a>
            </td>
          </form>
        </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</main>

</body>
</html>
