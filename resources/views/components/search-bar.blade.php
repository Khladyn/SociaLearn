<?php
    $dropdownItems = ["Data Science", "Game Development", "Web Design", "Mobile App Development", "Core Computer Science", "Network Security", "IT Automation"];
?>

<div class="relative flex m-8 h-10 rounded-full shadow-lg bg-white">
    <div class="relative group">
        <button class="flex items-center bg-blue-500 bg-yellow rounded-l-full text-white text-sm font-bold pl-3 py-2 w-max">Area of Study
            <i class="material-icons relative">arrow_drop_down</i>
        </button>
            <ul class="absolute bg-white w-52 rounded-md shadow-lg mt-2 max-h-48 overflow-auto transparent-scrollbar opacity-0 group-focus-within:opacity-100 z-10 scrollbar-border">
                @foreach($dropdownItems as $item)
                    <li>
                        <a href="#" class="block px-4 py-2 rounded-md text-darkgrey text-sm hover:bg-yellow hover:font-semibold hover:text-white">{{$item}}</a>
                    </li>
                @endforeach
            </ul>       
    </div>
    <input type="text" class="flex-auto pr-0 rounded-md border-0 focus:ring-0 text-darkgrey text-sm font-semibold" placeholder="Search...">
        <i class="material-icons-outlined p-2 text-darkgrey">search</i>
</div>