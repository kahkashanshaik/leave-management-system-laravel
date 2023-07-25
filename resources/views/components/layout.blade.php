<x-header />
<main>
    <div class="container-fluid p-0 mt-3">
        {{ $slot }}
    </div>
</main>
<x-flash-message />
<x-footer />