<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Idea;
use App\Models\Location;
use App\Models\Status;
use App\Models\Vote;
use Livewire\Component;
use Livewire\WithPagination;

class IdeasIndex extends Component
{
    use WithPagination;

    public $status;
    public $category;
    public $location;
    public $filter;
    public $no_of_bathrooms;
    public $no_of_bedrooms;
    public $search;

    protected $queryString = [
        'status',
        'category',
        'location',
        'filter',
        'search',
    ];

    protected $listeners = ['queryStringUpdatedStatus'];

    public function mount()
    {
        $this->status = request()->status ?? 'All';
    }

    public function updatingCategory()
    {
        $this->resetPage();
    }

    public function updatingLocation()
    {
        $this->resetPage();
    }

    public function updatingFilter()
    {
        $this->resetPage();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatedFilter()
    {
        if ($this->filter === 'My Ideas') {
            if (! auth()->check()) {
                return redirect()->route('login');
            }
        }
    }

    public function queryStringUpdatedStatus($newStatus)
    {
        $this->resetPage();
        $this->status = $newStatus;

    }

    public function render()
    {
        $statuses = Status::all()->pluck('id', 'name');
       // dd($statuses->get($this->status));
        $categories = Category::all();
        $locations = Location::all();

        return view('livewire.ideas-index', [
            'ideas' => Idea::with('user', 'category', 'location', 'status')
                ->when($this->status && $this->status !== 'All', function ($query) use ($statuses) {
                    return $query->where('status_id', $statuses->get($this->status));
                })->when($this->category && $this->category !== 'All Categories', function ($query) use ($categories) {
                    return $query->where('category_id', $categories->pluck('id', 'name')->get($this->category));
                })->when($this->location && $this->location !== 'All Locations', function ($query) use ($locations) {
                    return $query->where('location_id', $locations->pluck('id', 'name')->get($this->location));
                })->when($this->no_of_bathrooms && $this->no_of_bathrooms !== 'No of Bathrooms', function ($query)  {
                    return $query->where('no_of_bathrooms', $this->no_of_bathrooms);
                })->when($this->no_of_bedrooms && $this->no_of_bedrooms !== 'No of Bedrooms', function ($query)  {
                    return $query->where('no_of_bedrooms', $this->no_of_bedrooms);
                })->when($this->filter && $this->filter === 'Top Voted', function ($query) {
                    return $query->orderByDesc('votes_count');
                })->when($this->filter && $this->filter === 'My Ideas', function ($query) {
                    return $query->where('user_id', auth()->id());
                })->when($this->filter && $this->filter === 'High Budget', function ($query) {
                    return $query->orderByDesc('price');
                })->when($this->filter && $this->filter === 'Low Budget', function ($query) {
                    return $query->orderBy('price');
                })->when(strlen($this->search) >= 3, function ($query) {
                    return $query->where('description', 'like', '%'.$this->search.'%');
                })
                ->addSelect(['voted_by_user' => Vote::select('id')
                    ->where('user_id', auth()->id())
                    ->whereColumn('idea_id', 'ideas.id')
                ])
                ->withCount('votes')
                ->orderBy('id', 'desc')
                ->simplePaginate(Idea::PAGINATION_COUNT),
            'categories' => $categories,
            'locations' => $locations,
            'no_of_beds' => range(1,10),
            'no_of_baths' => range(1,10),
        ]);
    }
}
