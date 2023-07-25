<x-layout>
    @include('partials._hero_admin')
    @php
    $dashcounts = [
    [
    'title' => 'Total Leaves',
    'totcount' => 20
    ],
    [
    'title' => 'Total Festival Leaves',
    'totcount' => 4
    ],
    [
    'title' => 'Total Taken Leaves',
    'totcount' => 10
    ]
    ]
    @endphp
    <div class="container mt-5">

        <div class="row align-items-center">
            @foreach ($dashcounts as $dashcount)
            <x-dashboard-box :dashcount="$dashcount" />
            @endforeach
        </div>
    </div>
</x-layout>