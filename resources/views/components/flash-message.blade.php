@if (session()->has('message'))
    <div  x-data="{show: true}" x-init="setTimeout(()=> show = false, 3000)" x-show="show" class="container fixed-top">
        <div class="row text-align-center">
            <div class="col-md-6 col-sm-12 mx-auto bg-danger">
                <p class="text-white text-center mt-2">
                    {{ session('message') }}
                </p>
            </div>
        </div>
    </div>
@endif