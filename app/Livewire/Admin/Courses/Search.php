<?php

namespace App\Livewire\Admin\Courses;

use App\Livewire\AdminComponent;
use App\Models\Category;
use App\Models\Course;
use Livewire\Attributes\Isolate;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\WithPagination;

#[Isolate]
class Search extends AdminComponent
{
    use WithPagination;

    #[Url(as: 'q', except: '')]

    // Search Input
    public $searchText;

    // Filters
    public $status = '';
    public $level = '';
    public $category = '';
    public $price = '';
    // Another Attr
    public $categories ;

    public function mount()
    {
        $this->categories = Category::all();
    }
    #[On('search:clear')]
    public function clear() {
        $this->reset('searchText', 'page');
    }

    public function updatedStatus()
    {
        $this->resetPage();
    }

    public function delete(Course $course)
    {
        $course->delete();
        $this->resetPage();
    }

    public function render()
    {
        $query = Course::query();

        if (!empty($this->searchText)) {
            $query->where('title', 'LIKE', '%' . $this->searchText . '%');
        }

        if(!empty($this->status)) {
            $query->where('status', $this->status);
        }

        if(!empty($this->level)) {
            $query->where('level', $this->level);
        }

        if(!empty($this->category)) {
            $query->where('category_id', $this->category);
        }

        if (!empty($this->price)) {
            $priceRanges = [
                'free'     => fn($query) => $query->whereNull('price')->orWhere('price', 0),
                '100-300'  => fn($query) => $query->whereBetween('price', [100, 300]),
                '300-500'  => fn($query) => $query->whereBetween('price', [300, 500]),
                '500-1000' => fn($query) => $query->whereBetween('price', [500, 1000]),
                '1000+'    => fn($query) => $query->where('price', '>', 1000),
            ];

            if (isset($priceRanges[$this->price])) {
                $priceRanges[$this->price]($query);
            }
        }

        return view('livewire.admin.courses.search', [
            'courses' => $query->paginate(10),
        ]);
    }
}
