@props(['festivals'])

<x-festival-featured-card :festival="$festivals[0]"/>
@if($festivals->count()>1)
    <div class="lg:grid lg:grid-cols-6">
        @foreach($festivals->skip(1) as $festival)
            <x-festival-card
                :festival="$festival"
                class="{{$loop->iteration < 3 ? 'col-span-3':'col-span-2'}}"
            />
        @endforeach
    </div>
@endif
