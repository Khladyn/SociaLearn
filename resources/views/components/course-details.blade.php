<div class="flex flex-col h-screen m-8">
    <h2 class="text-xl text-gray-500 font-black mb-8">
        <i class="material-icons relative text-gray-500 align-middle">arrow_back_ios</i>
        My Courses
    </h2>
    <!-- Course Image -->
    <div class="relative h-1/3 w-full">
        <img src="images/course3.jpg" class="h-full w-full object-cover rounded-lg" alt="Course Image">
        <i class="material-icons absolute bottom-2 right-2 text-white">edit</i>
    </div>

    <!-- Editable Course Details -->
    <div class="mt-4">
        <input type="text" class="text-2xl font-semibold mb-2 p-2 w-full border border-gray-300 rounded-lg" placeholder="Course Title">
        <textarea class="text-gray-700 mb-2 p-2 w-full border border-gray-300 rounded-lg" placeholder="Course Description">Master Adobe Photoshop Essentials and unleash your creativity. Learn image editing, retouching, and design techniques. Perfect for beginners and pros alike.</textarea>
        
        <label class="block text-gray-700 mb-2 font-semibold" for="category">Category:</label>
        <select id="category" name="category" class="w-full p-2 border border-gray-300 rounded-lg mb-2">
            <option value="graphic design">Graphic Design</option>
            <option value="design">Web Development</option>
        </select>
        
        <label class="block text-gray-700 mb-2 font-semibold" for="level">Level:</label>
        <select id="level" name="level" class="w-full p-2 border border-gray-300 rounded-lg mb-2">
            <option value="beginner">Beginner</option>
            <option value="intermediate">Intermediate</option>
            <option value="advanced">Advanced</option>
        </select>

        <div class="container mx-auto mt-5 text-right">
            <button class="w-fit bg-green-500 text-white text-sm font-semibold px-3 py-1 rounded-full hover:bg-green-800">
                <i class="material-icons relative align-middle text-base text-white text-sm">save</i> Save
            </button>
            
            <button class="w-fit bg-red-500 text-white text-sm font-semibold px-3 py-1 rounded-full hover:bg-red-800 ml-3">
                <i class="material-icons relative align-middle text-base text-white text-sm">cancel</i> Cancel
            </button>
        </div>
    </div>
</div>