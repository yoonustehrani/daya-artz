{{-- <td class="text-lg">
    <span class="relative inline-flex rounded-full h-full w-fit {{ $value ? 'text-green-800' : 'text-red-ryb' }}">
        <span class="animate-ping absolute inline-flex h-full w-full rounded-full {{ $value ? 'bg-green-800' : 'bg-red-ryb' }}  opacity-50"></span>
        <i class="relative bg-ghost-white rounded-full z-10 far fa-dot-circle"></i>
    </span>
</td> --}}
<td class="text-lg">
    <i class="fas {{ $value ? 'text-green-800 fa-check' : 'text-red-ryb fa-times' }}"></i>
</td>