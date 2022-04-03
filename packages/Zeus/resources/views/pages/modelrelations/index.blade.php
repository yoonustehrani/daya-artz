@extends('zview::layouts.default')

@push('head')
<title>List of {{ $modeltype->name_singular }} relations | ZEUSCMS</title>
@endpush

@section('content')
<h1 class="title">List of {{ $modeltype->name_singular }} relations <a class="btn text-sm text-white bg-gray-500" href="{{ route('zeus.modeltypes.edit', ['modeltype' => $modeltype->getKey()]) }}">Back</a> </h1>
<form action="{{ route('zeus.modeltypes.relations.store', ['modeltype' => $modeltype->getKey()]) }}" class="p-4 mt-3" method="post">
    @csrf
    <div class="w-full xl:w-3/4 bg-white p-4 shadow-md">
        <div class="w-full mb-3 grid grid-cols-1 xl:grid-cols-2 grid-flow-row gap-4 place-content-center full-input" >
            <p class="xl:col-span-2 font-sans text-xl font-medium">+ Create a new relation</p>
            <x-zview::forms.text-input value="" name="local_method" label="Local method" class="p-2" placeholder="method in class"/>
            <div class="p-2">
                <label for="relation_type">
                    <span class="text-gray-700 italic">Type :</span>
                </label>
                <select name="type" id="relation_type" class="solid-select w-full ml-2 mt-1">
                    @foreach (\ZeusPanel::getRelationTypes() as $type)
                    <option value="{{ $type }}">{{ $type }}</option>
                    @endforeach
                </select>
            </div>
            <div class="p-2">
                <label for="target_model_type">
                    <span class="text-gray-700 italic">Target ModelType :</span>
                </label>
                <select name="target_model_type" id="target_model_type" class="solid-select w-full ml-2 mt-1">
                    @foreach (\ZeusPanel::getModelTypes() as $mt)
                    <option value="{{ $mt->getKey() }}">{{ $mt->slug }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="w-full flex justify-center">
            <button type="submit" class="btn bg-emerald-500">Create</button>
        </div>
    </div>
</form>
<div class="w-full bg-white p-4 mt-5 shadow-md overflow-x-auto">
    <p class="text-2xl"><i class="fas fa-link"></i> Relations</p>
    <table class="w-full table-auto text-center mt-4 awesome-table">
        <thead class="text-ghost-white-lighter">
            <th>#</th>
            <th>type</th>
            <th>local method</th>
            {{-- <th>target model</th> --}}
            <th><i class="fas fa-code"></i></th>
        </thead>
        <tbody>
            @foreach ($modeltype->relations as $rel)
            <tr>
                <th>{{ $loop->index + 1 }}</th>
                <td>{{ $rel->type }}</td>
                <td>{{ $modeltype->model_class }} <i class="fas fa-arrow-right"></i> {{ $rel->local_method }}</td>
                {{-- <td>{{ $rel->target_model }}</td> --}}
                <td>
                    <div class="flex-justify-center items-center">
                        <form action="{{ route('zeus.relations.destroy', ['relation' => $rel->getKey()]) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-sm bg-salsa text-ghost-white"><i class="fas fa-times"></i></button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection