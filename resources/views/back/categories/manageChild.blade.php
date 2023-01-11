<tr>
    @foreach($childs as $child)
        <tr class="border-b border-gray-100">
            <td class="p-4"><label class="hidden" for="cb-select-3"></label><input  type="checkbox" name="delete_tags[]" value="3" id="cb-select-3"></td>
            <td class="p-4">{{ $child->name }}</td>
            <td class="p-4">{{ $child->slug }}</td>
            <td class="p-4">{{ $child->parent_id }}</td>
            <td class="p-4">{{ $child->level }}</td>
        </tr>
        @if(count($child->childs))
            @include('back.categories.manageChild',['childs' => $child->childs])
        @endif
    @endforeach
</tr>