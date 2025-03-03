<?php

namespace App\Livewire\Admin\Instructor;


use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class Search extends Component
{
    use WithPagination;

    #[Url(as: 'q', except: '')]

    // Search Input
    public $searchText;



//    public function mount()
//    {
//        $this->categories = Category::all();
//    }

    #[On('search:clear')]
    public function clear() {
        $this->reset('searchText', 'page');
    }



    public function delete(User $instructor)
    {
        $instructor->delete();
        $this->resetPage();
    }

    public function render()
    {
        $query = User::where('role', 'instructor');

        if (!empty($this->searchText)) {
            $query->where('name', 'LIKE', "%{$this->searchText}%");
        }

        return view('livewire.admin.instructor.search', [
            'instructors' => $query->paginate(10),
        ]);

    }

}
