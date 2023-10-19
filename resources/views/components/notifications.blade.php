<?php
    $users = ["user2.jpg", "user7.jpg", "user1.jpg", "user5.jpg", "user4.jpg", "user6.jpg"];

    $names = [
    "Maria Santos",
    "Jose Rizal",
    "Andres Bonifacio",
    "Luzviminda Pascual",
    "Emilio Aguinaldo",
    "Rosario Gonzales"];

    $actions = [
    "uploaded a new document ",
    "enrolled in your course ",
    "posted a discussion on ",
    "completed your video ",
    "scheduled a live session on ",
    "enrolled in your course "];

    $titles = [
    "Introduction to Programming",
    "Web Development Basics",
    "Database Management",
    "Networking Fundamentals",
    "Cybersecurity Essentials",
    "Data Science Fundamentals"];

    $timestamp = [
    "August 26, 2023 @ 09:30 AM",
    "July 15, 2023 @ 03:45 PM",
    "June 5, 2023 @ 11:20 AM",
    "May 18, 2023 @ 02:15 PM",
    "April 2, 2023 @ 08:00 AM",
    "March 10, 2023 @ 06:45 PM"];
?>


<div class="flex-grow rounded-lg w-full">
    <h2 class="text-xl text-gray-500 font-black mb-3">Notifications</h2>
    <div class="space-y-3 h-3/4 overflow-y-auto rounded-xl transparent-scrollbar">

            @for ($i = 0; $i < count($users); $i++)
            <div class="flex items-center text-sm">
                {{-- <div class="relative h-10 w-20"> --}}
                    <img src="images/{{$users[$i]}}" alt="User Profile Image" class="object-cover w-10 h-10 rounded-full">
                    {{-- <i class="material-icons absolute right-1 bottom-0.5 text-base">favorite</i> --}}
                {{-- </div> --}}
                <div class="ml-2">
                    <p><span class="font-semibold">{{$names[$i]}}</span> {{$actions[$i]}} <span class="font-semibold text-yellow"> {{$titles[$i]}}</span>.</p>
                    <p class="text-xs text-gray-500">{{$timestamp[$i]}}</p>
                </div>
                
            </div>
            @endfor

        {{-- <div class="flex items-center">
            <img src="profile-image-2.jpg" alt="User Profile Image" class="w-10 h-10 rounded-full">
            <div class="ml-2 flex-grow">
                <p><span class="font-semibold">Jane Smith</span> commented on your photo.</p>
                <p class="text-xs text-gray-500">5 hours ago</p>
            </div>
            <i class="material-icons text-gray-600 ml-2">comment</i>
        </div> --}}
        <!-- Add more notification items as needed -->
    </div>
</div>
