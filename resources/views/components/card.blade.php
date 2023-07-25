<div class="container">
    <div class="row align-items-center">
        <div {{ $attributes->merge(['class' => 'mx-auto bg-default bg-light bg-gradient']) }}>
            {{ $slot }}
        </div>
    </div>
</div>