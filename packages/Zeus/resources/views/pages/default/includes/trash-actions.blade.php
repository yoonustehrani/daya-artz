<form action="{{ $modeltype->get_route('restore', ['id' => $item->getKey()]) }}" class="inline" method="post">
    @csrf
    <button type="submit" class="btn-sm bg-blue-yonder text-ghost-white"><i class="far fa-undo-alt"></i></button>
</form>
<form action="{{ $modeltype->get_route('destroy', ['id' => $item->getKey()]) }}" class="inline" method="post">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn-sm btn-red"><i class="fas fa-eraser"></i></button>
</form>