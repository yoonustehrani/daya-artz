@if ($errors->any())
<div class="w-full lg:w-3/4 p-3 mt-5">
    @foreach ($errors->all() as $e)
        <p class="bg-red-300 text-red-700 rounded-md shadow-sm p-1 my-1 mx-2 w-fit inline-block">{{ $e }}</p>
    @endforeach
</div>
@endif