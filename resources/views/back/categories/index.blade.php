<x-app-layout>
    <div 
        x-data="{ 
            open: false,
            name: '',
            slug: '',
            toggle() { this.open = ! this.open },
            autoSlug() {
                this.slug = this.name.toLowerCase().replace(/ /g, '-')
                    .replace(/[^\w-]+/g, '');
            }
        }"
        class="app-content">
        <header class="entry-header flex items-center">
            <h1 class="app-title">Danh mục sản phẩm</h1>
            <button @click="toggle()" class="inline-block rounded border py-1 px-2 mx-2 
                            text-sm text-indigo-600 border-indigo-600 hover:text-indigo-100 hover:bg-indigo-600 hover:border-indigo-600">Thêm Mới</button>
        </header>
        <div class="entry-content">
            @if ($errors->any())
                <div class="m-4 p-4  rounded
                        border bg-rose-300 text-rose-900 border-rose-900 text-center">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div 
                x-show="open" 
                @click.outside="open = ! open"
                class="popup-box">

                <div class="add-category w-96 m-4 p-8 bg-white rounded border border-gray-300 drop-shadow-2xl">
                    <h2 class="font-bold font-xl">Thêm danh mục</h2>
                    <form method="POST" action="{{ route('categories.store') }}">
                        @csrf
                        <div class="form-line form-line-mask">
                            <label for="name">Tên danh mục</label>
                            <input x-model="name" @keyup="autoSlug()" type="text" name="name" id="name" required />
                        </div>
                        <div class="form-line form-line-mask">
                            <label for="slug">Đường dẫn</label>
                            <input x-model="slug" type="text" name="slug" id="slug"  />
                        </div>
                        <div class="form-line form-line-mask">
                            <label for="parent_id">Danh mục cha</label>
                            <select name="parent_id" id="parent_id" >
                                <option value="0">Không</option>
                                @foreach ($parentCategories as $parentCategory)
                                    <option value="{{ $parentCategory->id }}">{{ $parentCategory->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-break">
                            <label for="description">Mô tả danh mục:</label>
                            <textarea type="text" name="description" id="description" class="w-full rounded" required></textarea>
                        </div>
                        <div class="form-break">
                            <label for="featured_id">Ảnh đại diện:</label>
                            <input type="file" name="featured_id" id="featured_id"/>
                        </div>
                        <button type="submit" class="block mt-4 py-2 px-4 w-full rounded bg-indigo-800 text-indigo-100">Thêm</button>
                    </form>
                </div>
                
            </div>

            <div class="list-catagories my-8 p-4 h-96 bg-white rounded">
                <h2 class="font-bold">Table title</h2>
                <table class="table w-full my-4 text-left">
                    <thead class="bg-slate-200 text-slate-800">
                        <tr>
                            <th class="p-4"><label class="hidden" for="cb-select-all-1"></label><input  type="checkbox" id="cb-select-all-1"></th>
                            <th class="p-4">Tên danh mục</th>
                            <th class="p-4">Đường dẫn</th>
                            <th class="p-4">Danh mục cha</th>
                            <th class="p-4">Lượt</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($parentCategories as $category)
                            <tr class="border-b border-gray-100">
                                <td class="p-4"><label class="hidden" for="cb-select-3"></label><input  type="checkbox" name="delete_tags[]" value="3" id="cb-select-3"></td>
                                <td class="p-4">{{ $category->name }}</td>
                                <td class="p-4">{{ $category->slug }}</td>
                                <td class="p-4">{{ $category->parent_id }}</td>
                                <td class="p-4">{{ $category->level }}</td>
                            </tr>
                            @if (count($category->childs))
                                @include('back.categories.manageChild', ['childs' => $category->childs])
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>