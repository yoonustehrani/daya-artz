{{-- <a href="{{ route($recommendations['show_route'], ['id' => $item->getKey()]) }}" class="btn-sm bg-yellow-400 text-gray-700"><i class="fas fa-eye"></i></a> --}}
{{-- <a href="{{ route($recommendations['edit_route'], ['id' => $item->getKey()]) }}" class="btn-sm bg-blue-600 text-white"><i class="fas fa-pencil-alt"></i></a> --}}
<form action="{{ route($recommendations['restore_route'], ['id' => $item->getKey()]) }}" class="inline" method="post">
    @csrf
    <button type="submit" class="btn-sm bg-blue-yonder text-ghost-white"><i class="far fa-undo-alt"></i></button>
</form>
<form action="{{ route($recommendations['destroy_route'], ['id' => $item->getKey()]) }}" class="inline" method="post">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn-sm btn-red"><i class="fas fa-eraser"></i></button>
</form>