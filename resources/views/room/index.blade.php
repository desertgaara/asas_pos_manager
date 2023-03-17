<x-base-layout>
    <x-slot name="slot">
        <div class="w-full mb-3">
            <div class="flex flex-wrap">
                <a class="mr-3 inline-flex items-center px-6 py-3 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
                   href="{{ route('room.create') }}">部屋を追加する</a>
            </div>
        </div>
        <table class="table-auto w-full mb-2">
            <thead>
            <tr class="border">
                <th class="py-2 px-1 sm:px-2 lg:px-4">部屋名</th>
                <th class="py-2 px-1 sm:px-2 lg:px-4">部屋タイプ</th>
                <th class="py-2 px-1 sm:px-2 lg:px-4">喫煙タイプ</th>
                <th class="py-2 px-1 sm:px-2 lg:px-4">PCタイプ</th>
                <th class="py-2 px-1 sm:px-2 lg:px-4 w-1/4 sm:w-1/5 lg:w-1/6">操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($rooms as $room)
                <tr class="border bg-white odd:bg-gray-100">
                    <td class="py-2 px-1 sm:px-2 lg:px-4">{{ $room->name }}</td>
                    <td class="py-2 px-1 sm:px-2 lg:px-4">{{ $room->type->name }}</td>
                    <td class="py-2 px-1 sm:px-2 lg:px-4">{{ $room->smoking_type_id == 1 ? '禁煙' : '喫煙' }}</td>
                    <td class="py-2 px-1 sm:px-2 lg:px-4">{{ $room->pc_type_id == 1 ? 'PC有り' : 'PC無し'}}</td>
                    <td class="py-2 px-1 sm:px-2 lg:px-4 text-right">
                        <a class="mr-0.5 sm:mr-1 lg:mr-2" href="{{ route('room.edit', ['room'=>$room->id]) }}">
                            <x-far-edit class="inline-block w-6 h-6 text-blue-600"/></a>
                        <x-delete :route="route('room.destroy', ['room'=>$room->id])">
                            <x-far-trash-alt class="inline-block w-6 h-6 text-red-600"/>
                        </x-delete>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $rooms->links() }}
    </x-slot>
</x-base-layout>
