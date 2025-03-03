<div>
    <x-layouts.admin.header a="true" url="{{ route('admin.courses.create') }}" label="+ Add Course" > Courses ({{ $courses->total() }}) </x-layouts.admin.header>
    <div class="my-10">
        <livewire:admin.courses.search />
    </div>
</div>
