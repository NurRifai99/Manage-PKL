<x-filament-panels::page>

    @foreach ( $page->getData() as $pkl )
        <p>{{ $pkl->name }}</p>
    @endforeach

</x-filament-panels::page>
