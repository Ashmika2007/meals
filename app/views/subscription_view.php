<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Subscription Plan</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="subscription.css" />
</head>
<body class="bg-green-50 font-sans">

<!-- Header -->
<header class="bg-white shadow-md sticky top-0 z-50">
  <div class="max-w-6xl mx-auto px-4 py-4 flex justify-between items-center">
    <div class="logo">💚 Healthys</div>
    <nav class="space-x-6 hidden md:flex">
      <a href="index.php" class="nav-link">Home</a>
      <a href="about.php" class="nav-link">About</a>
      <a href="meals.php" class="nav-link">Meals</a>
      <a href="subscription.php" class="nav-link font-bold text-green-600">Subscription Plan</a>
    </nav>
    <a href="logout.php" class="btn-primary">Logout</a>
  </div>
</header>

<!-- Subscription Form -->
<main class="max-w-xl mx-auto my-12 bg-white p-6 rounded shadow">
  <h2 class="text-2xl font-bold mb-4 text-center">Subscribe to a Meal Plan</h2>

  <?php if (!empty($error)): ?>
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
      ⚠️ <?= htmlspecialchars($error) ?>
    </div>
  <?php endif; ?>

  <form method="POST" action="subscription.php" class="space-y-6">
    <div>
      <label class="block font-medium mb-1">Choose a Plan</label>
      <div class="space-y-2">
        <label class="flex items-center">
          <input type="radio" name="plan" value="weekly" required class="mr-2 text-green-600">
          <span class="font-semibold">Weekly</span> - $59/week
        </label>
        <label class="flex items-center">
          <input type="radio" name="plan" value="biweekly" class="mr-2 text-green-600">
          <span class="font-semibold">Biweekly</span> - $109/every 2 weeks
        </label>
        <label class="flex items-center">
          <input type="radio" name="plan" value="monthly" class="mr-2 text-green-600">
          <span class="font-semibold">Monthly</span> - $209/month
        </label>
      </div>
    </div>

    <button type="submit" name="subscribe"
            class="w-full bg-green-600 text-white py-2 rounded hover:bg-green-700 transition">
      Subscribe Now
    </button>
  </form>
</main>

<!-- Footer -->
<footer class="bg-white border-t py-6 mt-10 text-sm text-gray-600">
  <div class="max-w-6xl mx-auto px-4 grid grid-cols-1 md:grid-cols-4 gap-6">
    <div>
      <h4 class="font-bold text-lg">Healthys</h4>
      <p>2025 by Healthys</p>
    </div>
    <div>
      <p>081-2072837</p>
      <p><a href="mailto:info@mysite.com" class="hover:underline">info@mysite.com</a></p>
    </div>
    <div>
      <ul>
        <li><a href="#" class="hover:underline">Privacy policy</a></li>
        <li><a href="#" class="hover:underline">Accessibility</a></li>
        <li><a href="#" class="hover:underline">Terms & conditions</a></li>
        <li><a href="#" class="hover:underline">Refund policy</a></li>
      </ul>
    </div>
    <div>
      <label class="block mb-1">Stay connected with us</label>
      <input type="email" placeholder="Enter Email*" class="border p-2 w-full rounded mb-2" />
      <label class="inline-flex items-center">
        <input type="checkbox" class="mr-2" /> I agree to terms & conditions
      </label>
      <button class="block bg-yellow-500 text-white w-full mt-2 py-2 rounded">Submit</button>
    </div>
  </div>
</footer>

</body>
</html>
