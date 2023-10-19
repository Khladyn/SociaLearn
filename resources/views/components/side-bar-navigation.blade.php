<?php
    $sidebarMenu = [
        'Dashboard' => 'dashboard',
        'My Courses' => 'auto_stories',
        'Enrolled Courses' => 'local_library',
        'Progress' => 'insert_chart',
        'Network' => 'diversity_3',
        'Chat' => 'chat',
    ];
?>

<aside id="logo-sidebar" class="top-0 left-0 z-40 w-64 h-96 transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
    <div class="max-w-24 px-3 py-4 bg-white dark:bg-darkgrey">
    
    <!-- Logo -->
    <picture>
        <source
            srcset="images/logo-white.png"
            media="(prefers-color-scheme: dark)">
        <img src="images/logo-black.png" class="h-fit max-w-2 p-4" alt="SociaLearn Logo" />
    </picture>

    <!-- Menu Items -->
        <ul class="space-y-4 font-medium p-4">

            @foreach($sidebarMenu as $key => $value)
                <li>
                    <a href="#"
                        class="flex items-center p-2 text-darkgrey hover:font-bold rounded-lg dark:text-white hover:bg-yellow dark:hover:text-darkgrey hover:duration-500 group">
                        <i class="material-icons-outlined">{{$value}}</i>
                        <span class="ml-3">{{$key}}</span>
                    </a>
                </li>
            @endforeach

        </ul>
    </div>
</aside>