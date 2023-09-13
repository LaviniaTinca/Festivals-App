@props(['heading'])
<div class="p-5 ml-20 mr-20 ">
    <h1 class="text-lg font-bold mb-4 text-gray-700">{{$heading}}</h1>
    <div class="flex justify-between items-center mt-8 ">
        {{$slot}}
    </div>

    <x-form.button>Submit</x-form.button>
</div>