<x-app-layout>
<div class="flex max-h-screen max-w-screen bg-white dark:bg-darkgrey overflow-y-hidden">

    <div class="w-fit h-screen">
        <x-side-bar-navigation />
    </div>

    <div class="flex w-full h-screen rounded-l-2xl bg-lightgrey shadow-lg">
        <div class="flex">
            <div class="flex flex-col w-4/5">
                <x-search-bar />
                <x-course-block-container  />
            </div>
            <div class="flex flex-col ml-auto rounded-l-2xl dark:bg-darkgrey dark:text-white h-screen p-6 space-y-4">
                {{-- <x-user-profile /> --}}
                {{-- <x-notifications /> --}}
            </div>
        </div>
    </div>

</div>
</x-app-layout>
