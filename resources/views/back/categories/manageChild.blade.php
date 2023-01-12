<tr>
    @foreach($childs as $child)
        <tr class="border-b border-gray-100">
            <td class="p-4"><label class="hidden" for="cb-select-3"></label><input  type="checkbox" name="delete_tags[]" value="3" id="cb-select-3"></td>
            <td class="p-4">{{ $child->name }}</td>
            <td class="p-4">{{ $child->slug }}</td>
            <td class="p-4">{{ $child->parent_id }}</td>
            <td class="p-4">{{ $child->level }}</td>
            <td class="p-4">
                <button class="p-1 rounded bg-slate-100 text-slate-500 hover:bg-sky-600 hover:text-sky-100">
                    <svg width="30" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                        <path fill="currentColor" d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM432 256c0 79.5-64.5 144-144 144s-144-64.5-144-144s64.5-144 144-144s144 64.5 144 144zM288 192c0 35.3-28.7 64-64 64c-11.5 0-22.3-3-31.6-8.4c-.2 2.8-.4 5.5-.4 8.4c0 53 43 96 96 96s96-43 96-96s-43-96-96-96c-2.8 0-5.6 .1-8.4 .4c5.3 9.3 8.4 20.1 8.4 31.6z"/>
                    </svg>
                </button>
                <button class="p-1 rounded bg-slate-100 text-slate-500 hover:bg-rose-600 hover:text-rose-100">
                    <svg width="30" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path fill="currentColor" d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/>
                    </svg>
                </button>
            </td>
        </tr>
        @if(count($child->childs))
            @include('back.categories.manageChild',['childs' => $child->childs])
        @endif
    @endforeach
</tr>