<div>
    {{-- Do your work, then step back. --}}
    <x-layouts.admin.header :a="true" :url="route('admin.instructors.create')" label="+ تسجيل محاضر "> Instructors ( {{ $instructors->total() }}) </x-layouts.admin.header>

    <livewire:admin.instructor.search />
</div>
