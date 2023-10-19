<?php
    $profileImage = "images/profile-image.jpg";
    $dateJoined = "August 27, 2023";
    $rating = 5;
    $interests = ["Database Management", "Cybersecurity", "Web Development", "IT Project Management"];
?>

<div class="flex flex-col h-max w-full">

    <div class="flex w-full items-center">
        <h2 class="text-xl text-gray-500 font-black flex-grow">Profile</h2>
        <a href="#" class="material-icons relative rounded-md p-1 text-gray-600 text-darkgrey hover:bg-white hover:duration-500">edit</a>
        <a href="#" class="material-icons relative rounded-md p-1 text-gray-600 hover:text-white hover:bg-red-700 hover:duration-500">logout</a>
    </div>
    

    <div class="flex flex-col items-center">
        <div class="relative">
            <img src="{{ $profileImage }}" alt="User Profile Image" class="w-28 h-28 rounded-full border border-white border-4 shadow-lg">
            <div class="absolute bottom-1 right-1 w-6 h-6 bg-green-500 rounded-full border border-white border-4 shadow-lg"></div>
        </div>
        
        <h2 class="text-xl text-center font-semibold mt-2">Juan Dela Cruz</h2>

        <div class="text-center">
            
            @for ($i = 0; $i < $rating; $i++)
                <i class="material-icons relative text-yellow text-sm">star</i>
            @endfor

            <p class="text-gray-400 text-xs my-1">Joined {{$dateJoined}}</p>

            <div class="flex flex-wrap justify-center text-center w-full">
                @foreach($interests as $item)
                    <a href="#" class="text-gray-500 text-xs hover:font-semibold hover:text-blue px-1 whitespace-no-wrap">{{$item}}</a>
                @endforeach
            </div>
        </div>
    </div>
</div>
