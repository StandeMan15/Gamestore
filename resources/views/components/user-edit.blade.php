<div>
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $id }}" value="{{ $value }}" 
    class="min-w-full p-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500" 
    @if($readonly) style="background-color: #f8f8f8;" readonly @endif>
</div>