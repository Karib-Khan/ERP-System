<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>New User Registration</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen flex justify-center items-start p-6">
  <div class="max-w-5xl w-full bg-white shadow-lg rounded-lg p-8">
    <h2 class="text-3xl font-semibold text-gray-800 mb-8 text-center">New User Registration</h2>

    <?php if (!empty($_SESSION['message'])): ?>
      <div class="mb-6 px-4 py-3 rounded 
        <?= $_SESSION['message_type'] == 'success' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' ?>">
        <?= htmlspecialchars($_SESSION['message']) ?>
      </div>
      <?php unset($_SESSION['message'], $_SESSION['message_type']); ?>
    <?php endif; ?>

    <form id="registrationForm" method="post" action="<?= ROOT ?>/register" class="grid grid-cols-1 md:grid-cols-3 gap-x-8 gap-y-6">

      <!-- Name -->
      <div>
        <label for="name" class="block mb-1 font-medium text-gray-700">Name</label>
        <input
          type="text" id="name" name="name" required
          class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:border-indigo-600"
        />
      </div>

      <!-- Age -->
      <div>
        <label for="age" class="block mb-1 font-medium text-gray-700">Age</label>
        <input
          type="number" id="age" name="age" min="1" max="120" required
          class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:border-indigo-600"
        />
      </div>

      <!-- DOB -->
      <div>
        <label for="dob" class="block mb-1 font-medium text-gray-700">Date of Birth</label>
        <input
          type="date" id="dob" name="dob" required
          class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:border-indigo-600"
        />
      </div>

      <!-- Gender -->
      <div>
        <label for="gender" class="block mb-1 font-medium text-gray-700">Gender</label>
        <select
          id="gender" name="gender" required
          class="w-full px-4 py-2 border border-gray-300 rounded bg-white focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:border-indigo-600"
        >
          <option value="" disabled selected hidden>Select gender</option>
          <option value="male">Male</option>
          <option value="female">Female</option>
          <option value="other">Other</option>
        </select>
      </div>

      <!-- Nationality -->
      <div>
        <label for="nationality" class="block mb-1 font-medium text-gray-700">Nationality</label>
        <input
          type="text" id="nationality" name="nationality" required
          class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:border-indigo-600"
        />
      </div>

      <!-- Marital Status -->
      <div>
        <label for="marital" class="block mb-1 font-medium text-gray-700">Marital Status</label>
        <select
          id="marital" name="maritial_status" required
          class="w-full px-4 py-2 border border-gray-300 rounded bg-white focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:border-indigo-600"
        >
          <option value="" disabled selected hidden>Select status</option>
          <option value="married">Married</option>
          <option value="single">Single</option>
          <option value="widowed">Widowed</option>
          <option value="divorced">Divorced</option>
        </select>
      </div>

      <!-- Religion -->
      <div>
        <label for="religion" class="block mb-1 font-medium text-gray-700">Religion</label>
        <select
          id="religion" name="religion" required
          class="w-full px-4 py-2 border border-gray-300 rounded bg-white focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:border-indigo-600"
        >
          <option value="" disabled selected hidden>Select religion</option>
          <option value="islam">Islam</option>
          <option value="hinduism">Hinduism</option>
          <option value="christianity">Christianity</option>
          <option value="buddhism">Buddhism</option>
          <option value="other">Other</option>
        </select>
      </div>

      <!-- Phone -->
      <div>
        <label for="phone" class="block mb-1 font-medium text-gray-700">Phone</label>
        <input
          type="tel" id="phone" name="phone" pattern="[0-9]{10,15}" required
          class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:border-indigo-600"
        />
      </div>

      <!-- Email -->
      <div>
        <label for="email" class="block mb-1 font-medium text-gray-700">Email</label>
        <input
          type="email" id="email" name="email" required
          class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:border-indigo-600"
        />
      </div>

      <!-- Address -->
      <div>
        <label for="address" class="block mb-1 font-medium text-gray-700">Address</label>
        <input
          type="text" id="address" name="address" required
          class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:border-indigo-600"
        />
      </div>

      <!-- NID/Passport -->
      <div>
        <label for="nid" class="block mb-1 font-medium text-gray-700">NID/Passport</label>
        <input
          type="text" id="nid" name="nid" required
          class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:border-indigo-600"
        />
      </div>

      <!-- Blood Group -->
      <div>
        <label for="blood" class="block mb-1 font-medium text-gray-700">Blood Group</label>
        <input
          type="text" id="blood" name="blood_group" required
          class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:border-indigo-600"
        />
      </div>

      <!-- Role (spanning all 3 cols) -->
      <fieldset class="col-span-1 md:col-span-3 pt-4">
        <legend class="mb-2 font-medium text-gray-700">Role</legend>
        <div class="flex gap-6">
          <label class="inline-flex items-center cursor-pointer">
            <input type="radio" name="role" value="Administration" required class="hidden peer" />
            <span
              class="px-4 py-2 rounded border border-gray-300 peer-checked:bg-red-600 peer-checked:text-white transition select-none"
            >Admin</span>
          </label>
          <label class="inline-flex items-center cursor-pointer">
            <input type="radio" name="role" value="Employee" class="hidden peer" />
            <span
              class="px-4 py-2 rounded border border-gray-300 peer-checked:bg-blue-600 peer-checked:text-white transition select-none"
            >Employee</span>
          </label>
          <label class="inline-flex items-center cursor-pointer">
            <input type="radio" name="role" value="HR" class="hidden peer" />
            <span
              class="px-4 py-2 rounded border border-gray-300 peer-checked:bg-yellow-600 peer-checked:text-white transition select-none"
            >HR</span>
          </label>
        </div>
      </fieldset>

      <!-- Buttons: Register and Go Back side-by-side spanning all 3 cols -->
      <div class="col-span-1 md:col-span-3 flex justify-between items-center pt-6 gap-4">
        <button
          type="submit"
          class="flex-1 bg-green-600 text-white font-semibold py-3 rounded hover:bg-green-700 transition"
        >
          Register
        </button>

        <a href="javascript:history.back()" class="inline-block">
          <button
            type="button"
            class="flex-1 bg-indigo-600 text-white px-4 py-3 rounded hover:bg-indigo-700 transition"
          >
            ← Go Back
          </button>
        </a>
      </div>
    </form>
  </div>

  <script src="<?php echo ROOT ?>/assets/js/signup.js"></script>
</body>
</html>
