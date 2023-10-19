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
    <div class="px-4 w-full flex items-center gap-2">
        <input type="text" class="px-4 w-full flex-auto pr-0 rounded-full border-0 focus:ring-0 text-darkgrey text-sm font-semibold" placeholder="Search...">
        <button class="w-24 h-fit bg-green-500 text-white text-sm py-2 rounded-full">Done</button>
        <button class="w-24 h-fit bg-gray-500 text-white text-sm py-2 rounded-full">Not Done</button>
    </div>
<div class="flex flex-wrap mt-4">
    <x-course-card />
</div>
    