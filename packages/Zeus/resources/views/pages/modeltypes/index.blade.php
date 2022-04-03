<x-zview-layout-default title="Database table">
    @php
    $model_types_array = $model_types->map(fn($mt) => $mt->namespace)->toArray();
    @endphp
    <h1 class="title">{{ trans_choice('zlang::main.modeltypes', 2) }}</h1>
    <table class="awesome-table table-auto w-10/12 mt-12 mx-auto text-center">
        <thead>
            <tr class="text-ghost-white-lighter font-sans">
                <th scope="col"><i class="fas fa-hashtag"></i></th>
                <th scope="col" class="text-left"><i class="fas fa-database mr-2"></i>Table Name</th>
                <th scope="col"><i class="fas fa-server mr-2"></i>Actions</th>
            </tr>
        </thead>
        <tbody class="row-mango">
        @foreach ($tables as $table)
            <tr>
                <th>{{ $loop->index + 1}}</th>
                <td class="text-left italic">{{ $table }}</td>
                <td>
                    @if (in_array($table, $model_types_array))
                        @php
                            $mt = $model_types->firstWhere('namespace', $table);
                        @endphp
                        <a target="_blank" href="{{ route('zeus.modeltypes.show', ['modeltype' => $mt->getKey()]) }}" class="btn-sm bg-mango text-gray-800"><i class="fas fa-eye"></i></a>
                        <a href="{{ route('zeus.modeltypes.edit', ['modeltype' => $mt->getKey()]) }}" class="btn-sm bg-blue-600 text-white"><i class="fas fa-pencil-alt"></i></a>
                        <form action="{{ route('zeus.modeltypes.destroy', ['modeltype' => $mt->getKey()]) }}" class="inline" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-sm btn-red"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    @else
                        <a class="btn bg-gray-500 text-white" href="{{ route('zeus.modeltypes.create', ['namespace' => $table]) }}">
                            <i class="fas fa-plus"></i>
                            Add as ModelType
                        </a>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</x-zview-layout-default>