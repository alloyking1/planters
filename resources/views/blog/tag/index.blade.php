<x-app-layout>

    <div class="py-12">
        
        <div class="max-w-7xl mx-auto w-full sm:px-6 lg:px-8">
            <x-blog.pages.grid-1>
                <x-blog.btn.btn-primary href="{{ route('tag.create') }}" text="New Tag"/>
                <x-blog.components.admin-table :th="['title', 'description', 'edit']">
                    
                    @foreach ($tag as $item)
                    <tr class="bg-white border-b">
                        <td class="px-6 py-4 text-gray-900">
                            {{ $item->title }}
                        </td>
                        <td class="px-6 py-4 text-gray-900">
                            {{ $item->description }}
                        </td>
                        <td class="px-6 py-4 text-gray-900">
                            <x-blog.nav.link text="Tutorials" link="{{ route('tag.create', $item->id) }}" text="Edit"/> 
                        </td>
                    </tr>
                    @endforeach
                </x-blog.components.admin-table>

            </x-blog.pages.grid-1>

        
        </div>
    </div>
    
</x-app-layout>