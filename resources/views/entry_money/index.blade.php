<x-base-layout>
    <x-slot name="title">入金一覧　　　　　処理日付：{{ $trans_date }}</x-slot>
    <x-slot name="slot">
        <div class="w-full mb-3">
            <div class="flex flex-wrap">
                <div class="w-full sm:w-1/3 mb-2 sm:mb-0">
                    <a id="F1" class="mr-3 inline-flex items-center px-6 py-3 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
                       href="{{ route('entry_money.create') }}">入金を追加する(F1)</a>
                </div>
                <div class="w-full sm:w-2/3">
                    <form id="form2" action="{{ route('entry_money.search') }}" method="post">
                        @csrf
                        <x-label class="w-full" value="期間"></x-label>
                        <x-input id="from_date" class="inline-flex" type="date" name="from_date" :value="old('from_date', $from_date)"></x-input> 〜
                        <x-input id="to_date" class="inline-flex" type="date" name="to_date" :value="old('to_date', $to_date)"></x-input>
                        <x-button id="F5" type="submit" class="px-6 py-3 bg-gray-600">検索(F5)</x-button>
                    </form>
                    @error('from_date')
                    <div class="w-full"><div class="text-red-500">{{ $message }}</div></div>
                    @enderror
                    @error('to_date')
                    <div class="w-full"><div class="text-red-500">{{ $message }}</div></div>
                    @enderror

                </div>
            </div>
        </div>
        <table class="table-auto w-full mb-2">
            <thead>
            <tr class="border">
                <th class="py-2 px-1 sm:px-2 lg:px-4 w-1/12 sm:w-1/12 lg:w-1/12 text-right">処理日付</th>
                <th class="py-2 px-1 sm:px-2 lg:px-4 w-1/12 sm:w-1/12 lg:w-1/12 text-right">伝票No.</th>
                <th class="py-2 px-1 sm:px-2 lg:px-4 w-3/12 sm:w-3/12 lg:w-3/12 text-left">内容</th>
                <th class="py-2 px-1 sm:px-2 lg:px-4 w-1/12 sm:w-1/12 lg:w-1/12 text-right">金額</th>
                <th class="py-2 px-1 sm:px-2 lg:px-4 w-6/12 sm:w-6/12 lg:w-6/12 text-left">操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($slips as $slip)
                <tr class="border bg-white odd:bg-gray-100">
                    <td class="py-2 px-1 sm:px-2 lg:px-4 w-1/12 sm:w-1/12 lg:w-1/12 text-right">{{ $slip->transacted_on }}</td>
                    <td class="py-2 px-1 sm:px-2 lg:px-4 w-1/12 sm:w-1/12 lg:w-1/12 text-right">{{ $slip->slip_no }}</td>
                    <td class="py-2 px-1 sm:px-2 lg:px-4 w-3/12 sm:w-3/12 lg:w-3/12 text-left">{{ $slip->note }}</td>
                    <td class="py-2 px-1 sm:px-2 lg:px-4 w-1/12 sm:w-1/12 lg:w-1/12 text-right">{{ number_format($slip->total_payment_amount) }}</td>
                    <td class="py-2 px-1 sm:px-2 lg:px-4 w-6/12 sm:w-6/12 lg:w-6/12 text-left">
                        <a class="mr-0.5 sm:mr-1 lg:mr-2" href="{{ route('entry_money.edit', ['slip'=>$slip->id]) }}">
                            <x-far-edit class="inline-block w-6 h-6 text-blue-600"/></a>
                        <x-delete :route="route('entry_money.destroy', ['slip'=>$slip->id])">
                            <x-far-trash-alt class="inline-block w-6 h-6 text-red-600"/>
                        </x-delete>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $slips->links() }}
    </x-slot>
</x-base-layout>