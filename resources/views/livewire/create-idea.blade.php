<form wire:submit.prevent="createIdea" action="#" method="POST" class="space-y-4 px-4 py-6">
{{--    <div>--}}
{{--        <input wire:model.defer="title" type="text" class="w-full text-sm bg-gray-100 border-none rounded-xl placeholder-gray-900 px-4 py-2" placeholder="Give it a title" required>--}}
{{--        @error('title')--}}
{{--            <p class="text-red text-xs mt-1">{{ $message }}</p>--}}
{{--        @enderror--}}
{{--    </div>--}}
    <div>
        <select wire:model.defer="category" name="category_add" id="category_add" class="w-full bg-gray-100 text-sm rounded-xl border-none px-4 py-2" required>
            <option  value="">Category</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
    @error('category')
        <p class="text-red text-xs mt-1">{{ $message }}</p>
    @enderror
    <div>
        <select wire:model.defer="location" name="location_add" id="location_add" class="w-full bg-gray-100 text-sm rounded-xl border-none px-4 py-2" required>
            <option  value="">Location</option>
            @foreach ($locations as $location)
                <option value="{{ $location->id }}">{{ $location->name }}</option>
            @endforeach
        </select>
    </div>
    @error('location')
    <p class="text-red text-xs mt-1">{{ $message }}</p>
    @enderror

    <div>
        <select wire:model.defer="no_of_bedrooms" name="no_of_bedrooms" id="no_of_bedrooms" class="w-full bg-gray-100 text-sm rounded-xl border-none px-4 py-2" required>
            <option  value="">No of bedrooms</option>
            @foreach ($no_of_beds as $key=>$value)
                <option value="{{ $key}}">{{ $value }}</option>
            @endforeach
        </select>
    </div>
    @error('no_of_bedrooms')
    <p class="text-red text-xs mt-1">{{ $message }}</p>
    @enderror
    <div>
        <select wire:model.defer="no_of_bathrooms" name="no_of_bedrooms" id="no_of_bedrooms" class="w-full bg-gray-100 text-sm rounded-xl border-none px-4 py-2" required>
            <option  value="">No of bathrooms</option>
        @foreach ($no_of_baths as $key=>$value)
            <option value="{{ $key}}">{{ $value }}</option>
            @endforeach
            </select>
        @error('no_of_bathrooms')
        <p class="text-red text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>
{{--    <div>--}}
{{--        <select wire:model.defer="with_pool" name="no_of_bedrooms" id="no_of_bedrooms" class="w-full bg-gray-100 text-sm rounded-xl border-none px-4 py-2" required>--}}

{{--            <option  value="">With Pool?</option>--}}
{{--            @foreach ($with_swimming_pool as $key=>$value)--}}
{{--                <option value="{{ $value}}">{{ $value }}</option>--}}
{{--            @endforeach--}}
{{--        </select>--}}
{{--        @error('with_pool')--}}
{{--        <p class="text-red text-xs mt-1">{{ $message }}</p>--}}
{{--        @enderror--}}
{{--    </div>--}}
    <div>
        <input wire:model.defer="price" type="number" class="w-full text-sm bg-gray-100 border-none rounded-xl placeholder-gray-900 px-4 py-2" placeholder="How Much?" required>
        @error('price')
        <p class="text-red text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <textarea wire:model.defer="description" name="idea" id="idea" cols="30" rows="4" class="w-full bg-gray-100 rounded-xl border-none placeholder-gray-900 text-sm px-4 py-2" placeholder="Pitch it to prospects" required></textarea>
        @error('description')
            <p class="text-red text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>
    <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 flex sm:col-span-4">
        <!-- Profile Photo File Input -->
        <input type="file" class="hidden"
               wire:model="photo"
               x-ref="photo"
               x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

        <label for="photo" value="{{ __('Photo') }}" />

        <!-- New Profile Photo Preview -->
        <div class="mt-2" x-show="photoPreview">
                    <span class="block rounded-full w-20 h-20"
                          x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'">
                    </span>

        </div>
        <button class="mt-2 mr-2 flex" type="button" x-on:click.prevent="$refs.photo.click()">
            <svg class="text-gray-600 w-6 transform -rotate-45" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
            </svg>  {{ __('Select MAIN Photo') }}
        </button>

    </div>
        @error('photo')
        <p class="text-red text-xs mt-1">{{ $message }}</p>
        @enderror

    <div class="flex items-center justify-between space-x-3">
        <button type="submit" class="flex items-center justify-center w-1/2 h-11 text-xs bg-green text-white font-semibold rounded-xl border border-green hover:bg-green-hover transition duration-150 ease-in px-6 py-3"
        >
            <span class="ml-1">Submit</span>
        </button>
    </div>

    <div>
        @if (session('success_message'))
            <div
                x-data="{ isVisible: true }"
                x-init="
                    setTimeout(() => {
                        isVisible = false
                    }, 5000)
                "
                x-show.transition.duration.1000ms="isVisible"
                class="text-green mt-4"
            >
                {{ session('success_message') }}
            </div>
        @endif
    </div>
</form>
