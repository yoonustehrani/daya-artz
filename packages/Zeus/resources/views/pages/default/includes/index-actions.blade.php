<a href="{{ $modeltype->get_route('show', ['id' => $item->getKey()]) }}" class="btn-sm bg-yellow-400 text-gray-700">
    <i class="fas fa-eye"></i>
</a>
<a href="{{ $modeltype->get_route('edit', ['id' => $item->getKey()]) }}" class="btn-sm bg-blue-600 text-white">
    <i class="fas fa-pencil-alt"></i>
</a>
{{-- <form action="{{ route($recommendations['clone_route'], ['id' => $item->getKey()]) }}" method="post">
    @csrf
    <button type="submit" class="btn-sm bg-blue-yonder text-ghost-white"><i class="far fa-clone"></i></button>
</form>
--}}
<form action="{{ $modeltype->get_route('destroy', ['id' => $item->getKey()]) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn-sm btn-red"><i class="fas fa-trash-alt"></i></button>
</form> 