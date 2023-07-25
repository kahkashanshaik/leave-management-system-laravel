<x-layout>
    @include('partials._hero_employee')
    <div class="container mt-5">
        <div class="row align-items-center">
            @foreach ($dashcounts as $dashcount)
                <x-dashboard-box :dashcount="$dashcount" /> 
            @endforeach
        </div>
    </div>
</x-layout>