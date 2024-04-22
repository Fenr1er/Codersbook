<?php

use App\Core\Auth;
use App\Core\Session;

?>


<div name="navarea" class="w-full h-[6vh] bg-slate-800">
    <div name="navcontainer" class="flex items-center w-5/6 h-full mx-auto">
        <div name="navlogo" class="px-3 text-xl font-bold "><a href="/">Codersbook</a></div>
        <div name="navlinks" class="flex-1 flex items-center w_full ml-5">
            <?php if (!Auth::is_loggedin()) { ?>
                <a href="/signup" class="mx-3 text-gray-300 hover:text-teal-400">Sign up</a>
                <a href="/login" class="mx-3 text-gray-300 hover:text-teal-400">Login</a>

            <?php } else { ?>
                <a href="/dashboard" class="mx-3 text-gray-300 hover:text-teal-400">Dashboard</a>
                <a href="" class="mx-3 text-gray-300 hover:text-teal-400">Link 4</a>
                <a href="" class="mx-3 text-gray-300 hover:text-teal-400">Link 5</a>
                <a href="/logout" class="mx-3 text-gray-300 hover:text-teal-400">Logout</a>
            <?php } ?>
        </div>

        <div name="navsearch" class="flex-1 text-center ">
            <?php if (Auth::is_loggedin()) { ?>
                <input type="search" name="searchfield" placeholder="Search..." class="p-2 w-80 h-10 bg-gray-900 rounded-md outline-none border-none">
            <?php } ?>
        </div>

        <div id="navusermenu" class="flex items-center">
            <?php if (Auth::is_loggedin()) { ?>
                <div class="text-3xl mr-5 text-gray-300">
                    <i class='bx bxs-bell-ring mr-2'></i>
                    <i class='bx bxs-message-square-dots'></i>
                </div>

                <div id="usermenu">
                    <!--- < ?= ist ein kurzer Weg, um echo zu schreiben --->
                    <img id="usermenupic" src="imgs/<?= Session::get('profile_image') ?>" alt="" class="w-10 h-10 rounded-[50%] border">
                    <div id="usermenudropdowncontent" class="hidden top-[6vh] absolute w-1/12 h-auto bg-gray-500 rounded-md">
                        <div class="w-full p-3 hover:bg-teal-700"><a href="/logout">Logout</a></div>
                        <div class="w-full p-3 hover:bg-teal-700"><a href="/logout">Profile</a></div>
                        <div class="w-full p-3 hover:bg-teal-700"><a href="/logout">Settings</a></div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>