@props(['category'])

<a href="{{route('showcategory', $category->slug)}}"
    class="px-3 py-1 border-2 border-black border-opacity-10 rounded-full text-blue-400 text-xs uppercase font-semibold no-underline"
    style="font-size: 10px">{{ $category->name }}</a>