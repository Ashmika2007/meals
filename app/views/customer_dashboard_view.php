<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Customer Dashboard - Healthys</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-green-50 font-sans min-h-screen">

  <!-- Header -->
  <header class="bg-white shadow-md sticky top-0 z-50">
    <div class="max-w-6xl mx-auto px-4 py-4 flex justify-between items-center">
      <div class="logo text-xl font-bold text-green-700">💚 Healthys</div>
      <nav class="space-x-6 hidden md:flex">
        <a href="meals.php" class="text-green-700 font-medium hover:underline">Browse Meals</a>
        <a href="subscription.php" class="text-green-700 font-medium hover:underline">Subscription</a>
        <a href="cart.php" class="text-green-700 font-medium hover:underline">Cart</a>
      </nav>
      <a href="logout.php" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Logout</a>
    </div>
  </header>

  <!-- Main Content -->
  <main class="max-w-4xl mx-auto text-center mt-12 px-4">
    <h2 class="text-3xl font-bold text-green-700 mb-4">Welcome, <?= htmlspecialchars($customerName) ?> 👋</h2>

    <p class="text-gray-700 text-lg">What would you like to do today?</p>

    <div class="mt-8 grid grid-cols-1 sm:grid-cols-3 gap-6">
      <a href="meals.php" class="bg-white border rounded shadow p-6 hover:bg-green-100">
        <h3 class="font-semibold mb-2">🍲 Browse Meals</h3>
        <p>Explore this week's meal options.</p>
      </a>
      <a href="subscription.php" class="bg-white border rounded shadow p-6 hover:bg-green-100">
        <h3 class="font-semibold mb-2">📦 Subscription</h3>
        <p>Choose or manage your plan.</p>
      </a>
      <a href="cart.php" class="bg-white border rounded shadow p-6 hover:bg-green-100">
        <h3 class="font-semibold mb-2">🛒 View Cart</h3>
        <p>See what you've added.</p>
      </a>
    </div>
  </main>

</body>
</html>
