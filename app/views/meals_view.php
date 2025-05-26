
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Meals - Healthys</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="meals.css" />
</head>
<body class="bg-white font-sans">

<!-- Header -->
<header class="bg-white shadow-md sticky top-0 z-50">
  <div class="max-w-6xl mx-auto px-4 py-4 flex justify-between items-center">
    <div class="logo">💚 Healthys</div>
    <nav class="space-x-6 hidden md:flex">
      <a href="index.php" class="nav-link">Home</a>
      <a href="about.php" class="nav-link">About</a>
      <a href="meals.php" class="nav-link">Meals</a>
      <a href="subscription.php" class="nav-link">Subscription Plan</a>
    </nav>
    <div class="flex gap-2">
      <a href="login.php" class="btn-primary">Log In</a>
      <a href="cart.php" class="btn-primary bg-yellow-400 hover:bg-yellow-500 text-black">🛒 Cart</a>
    </div>
  </div>
</header>

<!-- Page Title -->
<h1 class="text-center text-3xl font-semibold my-6">Meals</h1>

<div class="max-w-7xl mx-auto px-4 md:flex gap-8">
  <!-- Filters -->
  <aside class="w-full md:w-1/4 mb-6 md:mb-0">
    <h2 class="font-bold text-xl mb-4">Filters</h2>
    <h3 class="font-semibold mb-2">Categories</h3>
    <ul class="space-y-2 mb-6">
      <li><a href="meals.php" class="text-green-700 hover:underline">All</a></li>
      <li><a href="meals.php?category=vegan" class="text-green-700 hover:underline">Vegan</a></li>
      <li><a href="meals.php?category=keto" class="text-green-700 hover:underline">Keto</a></li>
      <li><a href="meals.php?category=gluten-free" class="text-green-700 hover:underline">Gluten-Free</a></li>
      <li><a href="meals.php?category=high-protein" class="text-green-700 hover:underline">High Protein</a></li>
    </ul>
  </aside>

  <!-- Meals -->
  <main class="w-full md:w-3/4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    <?php if (empty($meals)): ?>
      <p class="col-span-full text-center text-red-600 font-medium">No meals found in this category.</p>
    <?php else: ?>
      <?php foreach ($meals as $meal): ?>
        <div class="feature-box bg-green-50 rounded-lg p-4 shadow">
          <img src="images/<?= htmlspecialchars($meal['image']) ?>" alt="<?= htmlspecialchars($meal['title']) ?>" class="rounded mb-2 w-full h-40 object-cover" />
          <h3 class="font-semibold text-center text-lg"><?= htmlspecialchars($meal['title']) ?></h3>
          <p class="text-center mb-2 font-semibold text-gray-700">$<?= number_format($meal['price'], 2) ?></p>
          <form action="cart.php" method="POST">
            <input type="hidden" name="meal_name" value="<?= htmlspecialchars($meal['title']) ?>">
            <input type="hidden" name="meal_price" value="<?= $meal['price'] ?>">
            <button type="submit" class="bg-yellow-400 hover:bg-yellow-500 text-black font-bold py-1 px-3 rounded w-full">Add to cart</button>
          </form>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>
  </main>
</div>

<!-- Footer -->
<footer class="bg-white border-t py-6 mt-10 text-sm text-gray-600">
  <div class="max-w-6xl mx-auto px-4 grid grid-cols-1 md:grid-cols-4 gap-6">
    <div>
      <h4 class="font-bold text-lg">Healthys</h4>
      <p>2025 by Healthys</p>
    </div>
    <div>
      <p>081-2072837</p>
      <p>info@mysite.com</p>
    </div>
    <div>
      <ul>
        <li>Privacy policy</li>
        <li>Accessibility</li>
        <li>Terms & condition</li>
        <li>Refund policy</li>
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
