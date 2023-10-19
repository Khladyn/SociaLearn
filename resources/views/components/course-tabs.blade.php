<?php
$files = [
    ['name' => 'Typography Essentials.docx', 'type' => 'document', 'dateAdded' => '2023-08-10', 'points' => 30],
    ['name' => 'Digital Illustration.mp4', 'type' => 'video', 'dateAdded' => '2023-08-12', 'points' => 50],
    ['name' => 'Logo Design.png', 'type' => 'image', 'dateAdded' => '2023-08-15', 'points' => 40],
    ['name' => 'Layout Design.mp4', 'type' => 'video', 'dateAdded' => '2023-08-18', 'points' => 60],
    ['name' => 'Creating Visual Identity.mp4', 'type' => 'video', 'dateAdded' => '2023-08-20', 'points' => 70],
    ['name' => 'Adobe Photoshop Tips.docx', 'type' => 'document', 'dateAdded' => '2023-08-22', 'points' => 25],
    ['name' => 'Adobe Illustrator Basics.pdf', 'type' => 'document', 'dateAdded' => '2023-08-25', 'points' => 35],
    ['name' => 'Creating Mockups.png', 'type' => 'image', 'dateAdded' => '2023-08-28', 'points' => 20],
    ['name' => 'Vector Graphics.png', 'type' => 'image', 'dateAdded' => '2023-08-30', 'points' => 45],
    ['name' => 'Introduction to Graphic Design.mp4', 'type' => 'video', 'dateAdded' => '2023-09-02', 'points' => 55],
    ['name' => 'Graphic Design Principles.jpg', 'type' => 'image', 'dateAdded' => '2023-09-05', 'points' => 30],
    ['name' => 'Color Theory.pdf', 'type' => 'document', 'dateAdded' => '2023-09-08', 'points' => 40],
];

?>
    <!-- Tabs -->
    <div class="mt-4 w-full">
        <ul class="flex gap-2 m-4 border-b">
            <li class="flex-1">
                <a href="#resources" class="rounded-t-lg bg-yellow hover:bg-yellow inline-block font-semibold w-full text-center py-2">Resources</a>
            </li>
            <li class="flex-1">
                <a href="#discussion" class="rounded-t-lg bg-white hover:bg-yellow bg-white inline-block font-semibold w-full text-center py-2">Discussion</a>
            </li>
            <li class="flex-1">
                <a href="#live-sessions" class="rounded-t-lg bg-white hover:bg-yellow bg-white inline-block font-semibold w-full text-center py-2">Live Sessions</a>
            </li>
        </ul>        

    {{-- Search Bar --}}
    <div class="px-4 w-full flex items-center">
        <input type="text" class="px-4 w-full flex-auto pr-0 rounded-full border-0 focus:ring-0 text-darkgrey text-sm font-semibold" placeholder="Search...">
        <button class="w-48 py-2 bg-yellow text-white text-sm font-semibold px-3 py-1 rounded-full ml-3">
            <i class="material-icons relative align-middle text-base text-white text-sm">upload</i> Upload
        </button>
    </div>
    {{-- <i class="material-icons-outlined p-2 text-darkgrey">search</i> --}}

        <div class="p-4">
            <div class="container mx-auto">
                <table class="table-auto w-full text-center text-sm">
                    <thead class="bg-yellow text-white rounded-t-lg">
                        <tr>
                            <th class="py-2 my-2">Type</th>
                            <th class="py-2 my-2">Name</th>
                            <th class="py-2 my-2">Date Added</th>
                            <th class="py-2 my-2">Points</th>
                            <th class="py-2 my-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($files as $file)
                        <tr>
                            <td class="py-2">
                                @if ($file['type'] === 'document')
                                    <i class="material-icons relative text-darkgrey">description</i>
                                @elseif ($file['type'] === 'video')
                                    <i class="material-icons relative text-darkgrey">videocam</i>
                                @elseif ($file['type'] === 'image')
                                    <i class="material-icons relative text-darkgrey">image</i>
                                @endif
                            </td>
                            <td class="py-2">{{ $file['name'] }}</td>
                            <td class="py-2">{{ $file['dateAdded'] }}</td>
                            <td class="py-2">{{ $file['points'] }}</td>
                            <td class="py-2">
                                <a href="#"><i class="material-icons relative text-black mx-2">remove_red_eye</i></a>
                                <a href="#"><i class="material-icons relative text-red-500 mx-2">delete</i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>