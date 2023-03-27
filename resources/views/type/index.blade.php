<x-base-layout>
    <x-slot name="title">部屋タイプ一覧</x-slot>
    <x-slot name="slot">
        <div class="w-full mb-3">
            <div class="flex flex-wrap">
                <a id="F1" class="mr-3 inline-flex items-center px-6 py-3 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
                   href="{{ route('type.create') }}">部屋タイプ追加(F1)</a>
            </div>
        </div>
        <table class="table-auto w-full mb-2">
            <thead>
            <tr class="border">
                <th class="py-2 px-1 sm:px-2 lg:px-4 w-2/12 sm:w-2/12 lg:w-2/12 text-left">部屋タイプ名</th>
                <th class="py-2 px-1 sm:px-2 lg:px-4 w-9/12 sm:w-9/12 lg:w-9/12 text-left">操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($types as $type)
                <tr class="border bg-white odd:bg-gray-100">
                    <td class="py-2 px-1 sm:px-2 lg:px-4 w-2/12 sm:w-2/12 lg:w-2/12 text-left">{{ $type->name }}</td>
                    <td class="py-2 px-1 sm:px-2 lg:px-4 w-9/12 sm:w-9/12 lg:w-9/12 text-left">
                        <a class="mr-0.5 sm:mr-1 lg:mr-2" href="{{ route('type.edit', ['type'=>$type->id]) }}">
                            <x-far-edit class="inline-block w-6 h-6 text-blue-600"/></a>
                        <form action="{{ route('type.destroy', ['type'=>$type->id]) }}"
                              class="inline-block"
                              method="post">
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('type.destroy', ['type'=>$type->id]) }}" onclick="event.preventDefault(); this.closest('form').submit();">
                                <x-far-trash-alt class="inline-block w-6 h-6 text-red-600"/></a>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $types->links() }}
    </x-slot>
</x-base-layout>