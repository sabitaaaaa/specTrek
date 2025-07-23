<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Register</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center px-4">
  <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-md">
    <h3 class="text-2xl font-semibold mb-6 text-center text-green-600">Register</h3>

    <!-- Laravel Error Display -->
    @if ($errors->any())
      <div class="bg-red-100 text-red-700 p-3 rounded mb-4 text-sm">
        <ul class="list-disc pl-5">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form method="POST" action="/register" class="space-y-4">
      @csrf

      <div>
        <label class="block text-sm font-medium mb-1">Name</label>
        <input type="text" name="name" required class="w-full border border-gray-300 px-3 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
      </div>

      <div>
        <label class="block text-sm font-medium mb-1">Email</label>
        <input type="email" name="email" required class="w-full border border-gray-300 px-3 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
      </div>

      <div>
        <label class="block text-sm font-medium mb-1">Password</label>
        <input type="password" name="password" required class="w-full border border-gray-300 px-3 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
      </div>

      <div>
        <label class="block text-sm font-medium mb-1">Confirm Password</label>
        <input type="password" name="password_confirmation" required class="w-full border border-gray-300 px-3 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
      </div>

      <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-4 rounded-md transition duration-300">
        Register
      </button>

      <p class="text-center text-sm mt-4 text-gray-600">
        Already have an account?
        <a href="/login" class="text-green-600 hover:underline">Login here</a>
      </p>
    </form>
  </div>
</body>
</html>
