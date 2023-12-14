<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Idea;
use App\Models\Location;
use Illuminate\Http\Response;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateIdea extends Component
{

    use WithFileUploads;

    //public $title;
    public $category = 0;
    public $location = 0;
    public $description;
    public $price;
    public $no_of_bathrooms =-1 ;
    public $no_of_bedrooms =-1;
    //public $with_pool;
    public $photo;
    public $tempUrl;


    protected $rules = [
        //'title' => 'required|min:4',
        'category' => 'required|integer',
        'location' => 'required|integer',
        'description' => 'required|min:4',
        'price' => 'required|min:4',
        'no_of_bathrooms' => 'required|integer',
        'no_of_bedrooms' => 'required|integer',
       // 'with_pool' => 'required|min:2',
        'photo' => 'required|image|max:5000',
    ];

    public function createIdea()
    {
        if (auth()->check()) {

            $this->validate();
            $imageToShow = $this->photo ?? null;
            $category_name = Category::where('id', $this->category)->first();
            $location_name = Location::where('id', $this->location)->first();
            //dd($category_name);
            Idea::create([
                'user_id' => auth()->id(),
                'category_id' => $this->category,
                'location_id' => $this->location,
                'status_id' => 1,
                'price' => $this->price,
                'no_of_bathrooms' => $this->no_of_bathrooms,
                'no_of_bedrooms' => $this->no_of_bedrooms,
                //'with_pool' => $this->with_pool,
                'title' => $this->no_of_bedrooms . ' bedroom, '. $this->no_of_bathrooms.'bathroom ' .$category_name->name.' @ ' .$location_name->name.' for '.$this->price.'Rs' ,
                'description' => $this->description,
                'photo' => $this->photo ? $this->photo->store('photos', 'public') : $imageToShow,
            ]);

            session()->flash('success_message', 'Home was added successfully.');

            $this->reset();

            return redirect()->route('idea.index');
        }

        abort(Response::HTTP_FORBIDDEN);
    }
    public function updatedPhoto()
    {
        try {
            $this->tempUrl = $this->photo->temporaryUrl();
        } catch (\Exception $e) {
            $this->tempUrl = ''; // placeholder image
        }

        $this->validate();
    }
    public function render()
    {

        return view('livewire.create-idea', [
            'categories' => Category::all(),
            'locations' => Location::all(),
            'no_of_beds' => range(1,10),
           'no_of_baths' => range(1,10),
            'with_swimming_pool' => array("yes","no")
        ]);
    }
}
