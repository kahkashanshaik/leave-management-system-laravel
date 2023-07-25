<x-layout>
    <x-card class="col-md-6 col-sm-12">
        <div class="card p-5">
            <form action="{{ Route('authenticate') }}" method="post">
            <div class="card-body">
                <h4 class="card-title text-center">Login In</h4>
                <p class="text-center mb-2">Login to LMS</p>
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Enter email address">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="">
                    </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-danger btn-md px-3 text-white my-2">Login</button>
            </div>
        </form>
        </div>
    </x-card>
</x-layout>