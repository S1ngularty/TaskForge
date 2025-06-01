@props(['id'=>''])
<div class="py-4  w-[700px] h-[700px]" style="height: 500px" >
    <div class="max-w-xl  mx-auto sm:px-6 lg:px-8 space-y-6 h-100">
  <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg" style="height: 100%">
            <div class="w-full flex flex-row gap-4 " id="{{$id}}">
                {{$slot}}
            </div>
        </div>
    </div>
</div>