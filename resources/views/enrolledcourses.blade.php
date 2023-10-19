<x-app-layout>
<div class="flex max-h-full max-w-screen bg-white dark:bg-darkgrey">

    <div class="w-fit h-full">
        <x-side-bar-navigation />
    </div>

    <div class="flex w-full h-full rounded-l-2xl bg-lightgrey shadow-lg">
        <div class="flex w-full">
            <div class="flex flex-col w-full m-8">
                <x-view-course />
                <x-view-course-tabs />
            </div>
        </div>
    </div>

</div>
</x-app-layout>
