<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard - Healthys</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans min-h-screen">

  <!-- Header -->
  <header class="bg-green-700 text-white py-4 px-6 flex justify-between items-center shadow">
    <h1 class="text-xl font-bold">Admin Dashboard</h1>
    <a href="logout.php" class="bg-red-500 px-4 py-2 rounded hover:bg-red-600">Log Out</a>
  </header>

  <!-- Main Content -->
  <main class="p-6">
    <h2 class="text-2xl font-semibold mb-4">Welcome, <?= htmlspecialchars($adminName) ?> 👨‍💼</h2>


    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
      <a href="manage_meals.php" class="bg-white shadow p-6 rounded text-center hover:bg-green-50 border">
        <h3 class="text-lg font-bold mb-2">🍽 Manage Meals</h3>
        <p class="text-sm text-gray-700">View, add or remove meals.</p>
      </a>
      <a href="view_subscription.php" class="bg-white shadow p-6 rounded text-center hover:bg-green-50 border">
        <h3 class="text-lg font-bold mb-2">📦 Subscriptions</h3>
        <p class="text-sm text-gray-700">View user subscription data.</p>
      </a>
      <a href="users.php" class="bg-white shadow p-6 rounded text-center hover:bg-green-50 border">
        <h3 class="text-lg font-bold mb-2">👥 Users</h3>
        <p class="text-sm text-gray-700">Manage customer accounts.</p>
      </a>
    </div>
  </main>

</body>
</html>
