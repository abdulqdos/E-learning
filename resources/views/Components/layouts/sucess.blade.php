<div id="alert" class="fixed top-24 right-0 m-6 bg-green-600 text-white p-4 rounded-lg shadow-md flex items-center space-x-4 z-50" role="alert">
    <span>{{ session('success') }}</span>
    <button onclick="document.getElementById('alert').style.display = 'none'" class="ml-4 text-white focus:outline-none">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
        </svg>
    </button>
</div>
