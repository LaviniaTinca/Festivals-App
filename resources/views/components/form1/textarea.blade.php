@props(['name','placeholder'=>''])
<x-form1.field>

    <x-form1.label name="{{$name}}"/>

    <textarea class="border border-gray-200 p-2 w-full rounded"
              name="{{$name}}"
              id="{{$name}}"
              placeholder="{{$placeholder}}"
              required
    >{{$slot ?? old($name)}}</textarea>


    <x-form1.error name="{{$name}}"/>
</x-form1.field>
