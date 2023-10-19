<?php
$courseImages = [
    "course1.jpg",
    "course2.jpg",
    "course3.jpg",
    "course4.jpg",
    "course5.jpg",
    "course6.jpg"
];

$authors = [
    "others",
    "others",
    "self",
    "others",
    "others",
    "self"
];


$categories = [
    "Web Development",
    "Data Science",
    "Graphic Design",
    "Mobile App Development",
    "Machine Learning",
    "Business"
];

$courseTitles = [
    "Introduction to HTML and CSS",
    "Data Analysis with Python",
    "Adobe Photoshop Essentials",
    "Building Mobile Apps with Flutter",
    "Machine Learning Fundamentals",
    "Entrepreneurship 101"
];

$enrollees = [150, 230, 80, 120, 320, 100];

$ratings = [4.5, 4.2, 4.8, 4.0, 4.7, 4.3];

$levels = [
    "Beginner",
    "Intermediate",
    "Advanced",
    "Intermediate",
    "Advanced",
    "Beginner"
];

$dates = [
    "08/05/23",
    "06/23/23",
    "04/30/23",
    "03/09/2023",
    "03/01/2023",
    "02/16/2023"
];

$sorting = [
    "Title",
    "Enrollees",
    "Rating",
    "Level",
    "Date Added"
];

?>
<div class="flex">
    <h2 class="text-xl text-gray-500 font-black mx-8">All Courses</h2>
    <div class="flex items-center gap-2 mx-10 ml-auto">
        @foreach($sorting as $item)
            <button class="text-darkgrey text-xs font-semibold pr-2 cursor-pointer hover:text-blue">
                <i class="material-icons relative align-middle">arrow_drop_down</i>
                {{$item}}
            </button>
        @endforeach
    </div>
</div>


<div class="grid grid-cols-3 mr-4 my-4 px-4 overflow-y-auto transparent-scrollbar">

    @for ($i = 0; $i < count($courseImages); $i++)

    {{-- Card --}}
    <div class="bg-white shadow-lg rounded-lg h-fit min-w-60 m-4 transform transition duration-500 hover:scale-105">
        <div class="relative">
            <img src="images/{{$courseImages[$i]}}" alt="Course Image" class="rounded-t-lg h-1/2 w-full object-cover">

            @if ($authors[$i] == "self")
                <i class="material-icons absolute bottom-1 right-1 text-white">person_pin</i>
            @endif
            
        </div>

        <div class="p-4">

            <span class="text-sm text-blue font-semibold">{{$categories[$i]}}</span>
            <h3 class="text-lg font-semibold mt-1">{{$courseTitles[$i]}}</h3>

            <div class="flex items-center mt-2">
                <div class="flex items-center mr-2">
                    <i class="material-icons relative text-darkgrey text-sm">person</i>
                    <span class="text-xs text-darkgrey ml-1">{{$enrollees[$i]}}</span>
                </div>
                <div class="flex items-center mr-2">
                    <i class="material-icons relative text-darkgrey text-sm">star</i>
                    <span class="text-xs text-darkgrey ml-1">{{$ratings[$i]}}</span>
                </div>
                <div class="flex items-center">
                    <i class="material-icons relative text-darkgrey text-sm">calendar_month</i>
                    <span class="text-xs text-darkgrey ml-1">{{$dates[$i]}}</span>
                </div>                
            </div>

            <div class="mt-2">

            @php
                $level = $levels[$i];
                $bgLevelColor = '';
    
                switch ($level) {
                    case 'Beginner':
                        $bgLevelColor = 'bg-green-200';
                        break;
                    case 'Intermediate':
                        $bgLevelColor = 'bg-lightyellow';
                        break;
                    case 'Advanced':
                        $bgLevelColor = 'bg-lightorange';
                        break;
                }
            @endphp

                <span class="{{$bgLevelColor}} text-darkgrey text-xs font-semibold px-2 py-1 rounded-full">{{$levels[$i]}}</span>
            </div>

        </div>
    </div>
    @endfor
</div>
{{-- </div> --}}



