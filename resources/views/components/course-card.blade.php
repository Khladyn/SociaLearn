<?php

$courseInfo = [
    ['imageSrc' => 'course4.jpg', 'title' => 'Introduction to Machine Learning', 'resourceType' => 'videocam', 'date' => '2023-08-10', 'views' => 120, 'points' => 30, 'status' => 'done'],
    ['imageSrc' => 'course2.jpg', 'title' => 'Neural Networks Explained', 'resourceType' => 'videocam', 'date' => '2023-08-11', 'views' => 80, 'points' => 25, 'status' => 'done'],
    ['imageSrc' => 'course5.jpg', 'title' => 'Machine Learning Algorithms', 'resourceType' => 'description', 'date' => '2023-08-12', 'views' => 150, 'points' => 40, 'status' => 'undone'],
    ['imageSrc' => 'course6.jpg', 'title' => 'Image Classification Techniques', 'resourceType' => 'image', 'date' => '2023-08-13', 'views' => 90, 'points' => 35, 'status' => 'done'],
    ['imageSrc' => 'course1.jpg', 'title' => 'Natural Language Processing Basics', 'resourceType' => 'description', 'date' => '2023-08-14', 'views' => 200, 'points' => 50, 'status' => 'undone'],
    ['imageSrc' => 'course3.jpg', 'title' => 'Advanced Machine Learning Concepts', 'resourceType' => 'videocam', 'date' => '2023-08-15', 'views' => 110, 'points' => 30, 'status' => 'undone'],
];


?>

    @foreach($courseInfo as $info)
    
    <div class="w-60 h-fit m-4 bg-white rounded-md shadow-md">
        <div class="relative">
            <i class="material-icons absolute bottom-2 left-2 text-white">{{$info['resourceType']}}</i>
            <img src="images/{{$info['imageSrc']}}" alt="Resource Image" class="w-full h-32 object-cover rounded-t-md">
            <i class="material-icons-outlined absolute bottom-2 right-2 text-white">check_circle</i>
        </div>

        <div class="px-4 py-2">
            <h2 class="font-bold mb-2">{{$info['title']}}</h2>
            <button class="w-full h-fit bg-green-500 text-white text-sm py-1 rounded-full">Mark as Done</button>

            <div class="mt-3 flex justify-between">
                <div class="flex text-darkgrey">
                    <i class="material-icons ml-2 relative text-sm text-gray-500">calendar_month</i>
                    <span class="ml-1 font-semibold text-sm text-gray-500">{{$info['date']}}</span>
                </div>
                <div class="flex text-darkgrey">
                    <i class="material-icons relative text-base text-gray-500">visibility</i>
                    <span class="ml-1 font-semibold text-sm text-gray-500">{{$info['views']}}</span>
                </div>
            </div>
            <div class="flex justify-between">
                <div class="flex text-darkgrey">
                    <i class="material-icons ml-2 relative text-sm text-blue">cloud_download</i>
                    <span class="ml-1 font-semibold text-sm text-blue">Offline</span>
                </div>
                <div class="flex text-darkgrey">
                    <i class="material-icons relative text-base text-green-500">sports_score</i>
                    <span class="ml-1 font-semibold text-sm text-green-500">{{$info['points']}}</span>
                </div>
            </div>
        </div>
    </div>
@endforeach