<x-form1.field>
    @props(['disabled'=>false])
    <button type="submit"
            @if($disabled)
                class="opacity-75 bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl"
            disabled
            @else
                class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600"
        @endif
    >
        {{$slot}}
    </button>
</x-form1.field>
