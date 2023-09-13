@props(['name'])
<x-form1.field>

    <x-form1.label name="{{$name}}"/>

    <input class="border border-gray-200 p-2 w-full rounded"
           name="{{$name}}"
           id="{{$name}}"
        {{$attributes(['value'=>old($name)])}}
    >

    <x-form1.error name="{{$name}}"/>
</x-form1.field>
