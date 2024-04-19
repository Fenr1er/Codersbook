<?php
component("head");
component("navbar");
?>

<div name="content" class="w-5/6 mx-auto flex justify-around items-center pt-4 h-[94vh]">
  <div class="w-1/3 mt-[-6vh]">
    <form action="/login" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
      <div class="mb-4">

        <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
          Username/Email
        </label>
        <input name="loginname" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" placeholder="Username">
      </div>
      
      <div class="mb-6">
        <label  class="block text-gray-700 text-sm font-bold mb-2" for="password">
          Password
        </label>
        <input name="password" class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="******************">
        <p class="text-red-500 text-xs italic">Enter your password.</p>
      </div>
     
      <div class="flex items-center justify-between">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
          Login
        </button>
        <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="/login">
          No Account Sign Up here
        </a>
      </div>
    </form>
    <p class="text-center text-gray-500 text-xs">
      &copy;2020 Acme Corp. All rights reserved.
    </p>
  </div>

</div>





<?php
component("footer");
?>