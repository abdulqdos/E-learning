<div class="max-w-3xl mx-auto p-6 bg-white shadow-lg rounded-lg mt-6">
    <h1 class="text-3xl font-bold text-blue-600 mb-4">{{ $course->title }}</h1>
    <p class="text-gray-700 mb-6">{{ $course->description }}</p>

    <div class="border-t pt-4 mt-6">
        <h2 class="text-xl font-semibold text-gray-800">Instructor:
            <span class="font-normal text-blue-600">{{ $instructor->name }}</span>
        </h2>
    </div>

    <div class="border-t pt-4 mt-6">
        <h3 class="text-lg font-semibold text-gray-800">Lessons:</h3>
        <p class="text-gray-500 mt-2">No lessons available yet. Please check back later.</p>
    </div>

    <div class="mt-6 text-center">
        <a href="{{ route('instructors.courses' , Auth::user()->id ) }}" class="text-primary">
            <span class="inline-block px-4 py-2 border border-blue-600 rounded-lg hover:bg-primary hover:text-white transition-all duration-300">
                Back to Courses
            </span>
        </a>
    </div>
</div>
