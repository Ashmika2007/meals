<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Manage Meals - Admin</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

  <!-- Header -->
  <header class="bg-green-700 text-white py-4 px-6 flex justify-between items-center">
    <h1 class="text-xl font-bold">🍽 Manage Meals</h1>
    <a href="admin_dashboard.php" class="bg-white text-green-700 px-4 py-2 rounded">Back to Dashboard</a>
  </header>

  <main class="p-6 max-w-5xl mx-auto">
    <!-- Add New Meal Form -->
    <h2 class="text-2xl font-semibold mb-4">Add New Meal</h2>
    <form method="POST" class="bg-white p-4 rounded shadow mb-8 grid grid-cols-1 md:grid-cols-2 gap-4">
      <input type="text" name="title" placeholder="Meal Title" required class="border p-2 rounded">
      <input type="number" step="0.01" name="price" placeholder="Price" required class="border p-2 rounded">
      <input type="text" name="description" placeholder="Description" required class="border p-2 rounded">
      <select name="category" required class="border p-2 rounded">
        <option value="">Select Category</option>
        <option value="vegan">Vegan</option>
        <option value="keto">Keto</option>
        <option value="gluten-free">Gluten-Free</option>
        <option value="high-protein">High Protein</option>
      </select>
      <input type="text" name="image" placeholder="Image file name (e.g. meal.jpg)" required class="border p-2 rounded">
      <button type="submit" name="add_meal" class="bg-green-600 text-white py-2 rounded hover:bg-green-700 col-span-full">Add Meal</button>
    </form>

    <!-- View Meals Table -->
    <h2 class="text-2xl font-semibold mb-4">All Meals</h2>
    <table class="min-w-full bg-white shadow rounded">
      <thead class="bg-green-600 text-white">
        <tr>
          <th class="py-2 px-4 text-left">#</th>
          <th class="py-2 px-4 text-left">Title</th>
          <th class="py-2 px-4 text-left">Description</th>
          <th class="py-2 px-4 text-left">Category</th>
          <th class="py-2 px-4 text-left">Price</th>
          <th class="py-2 px-4 text-left">Image</th>
          <th class="py-2 px-4 text-left">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($meals as $row): ?>
          <tr class="border-b">
            <td class="py-2 px-4"><?= $row['id'] ?></td>
            <td class="py-2 px-4"><?= htmlspecialchars($row['title']) ?></td>
            <td class="py-2 px-4"><?= htmlspecialchars($row['description']) ?></td>
            <td class="py-2 px-4"><?= htmlspecialchars($row['category']) ?></td>
            <td class="py-2 px-4">$<?= number_format($row['price'], 2) ?></td>
            <td class="py-2 px-4"><?= htmlspecialchars($row['image']) ?></td>
            <td class="py-2 px-4">
              <a href="manage_meals.php?delete=<?= $row['id'] ?>" onclick="return confirm('Delete this meal?')" class="text-red-600 hover:underline">Delete</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </main>
</body>
</html>
