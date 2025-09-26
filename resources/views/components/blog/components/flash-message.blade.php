@props([
    'status' => 'success', //or error
    'session' => null,
    'message' => null
])

<div>
    @if ($message)
        <div {{ $attributes->merge()->class([
            'bg-green-500' => $status == 'success',
            'bg-red-500' => $status == 'error',
            'bg-orange-500' => $status == 'warning',
            'text-white font-bold p-6'
            ]) }}>
            {{ $message }}
        </div>
    @endif
    
</div>