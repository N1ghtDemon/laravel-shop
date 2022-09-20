<form action="{{route('productFilter')}}">
    <div {{ $attributes->merge(['class'=>'bg-gray-100 border-l-8 border-gray-200'])->except(['title', 'price', 'action']) }}>
        <div class="d-flex p-4 flex items-center border border-gray-100">

            <div class="p-4">
                <label for="category_id">Categories</label><select id="category_id" class="form-control" name="category_id">
                    <option value="">-</option>
                @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="p-4">
                <label for="city_ids">Cities</label><select id="city_ids" class="form-control" name="city_ids[]" multiple>
                    <option value="">-</option>
                    @foreach($cities as $city)
                        <option value="{{$city->id}}">{{$city->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <x-button class="ml3">
            {{'Filter'}}
        </x-button>

    </div>
</form>
