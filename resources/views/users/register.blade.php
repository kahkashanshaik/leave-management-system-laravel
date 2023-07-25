<x-layout>
    <x-card class="col-md-6 col-sm-12">
        <div class="card p-5">
            <form action="{{ route('addEmployee') }}" method="post">
                @csrf
            <div class="card-body">
              <h4 class="card-title text-center">New Employee</h4>
              <p class="text-center mb-2">Fill details to add new employee</p>
               <div class="mb-3">
                   <label for="name" class="form-label">Name</label>
                   <input type="text" name="name" id="name" class="form-control" placeholder="Enter full name" value="{{ old('name') }}">
                   @error('name')
                        <p class="text-danger mt-2 text-xs">{{ $message }}</p>
                    @enderror
               </div>
               <div class="mb-3">
                   <label for="email" class="form-label">Email</label>
                   <input type="email" name="email" id="email" class="form-control" placeholder="example@standardtouch.com" value="{{ old('email') }}">
                   @error('email')
                   <p class="text-danger mt-2 text-xs">{{ $message }}</p>
                   @enderror
                </div>
               <div class="mb-3">
                   <label for="phone" class="form-label">Phone/Mobile</label>
                   <input type="number" name="phone" id="phone" class="form-control" placeholder="+91 123 345 4565" value="{{ old('phone') }} ">
                @error('phone')
                <p class="text-danger mt-2 text-xs">{{ $message }}</p>
                @enderror
                </div>
               <div class="mb-3">
                   <label for="password" class="form-label">Password</label>
                   <input type="password" name="password" id="password" class="form-control" value="{{ old('password') }}">
                @error('password')
                     <p class="text-danger mt-2 text-xs">{{ $message }}</p>
                @enderror
                </div>
               <div class="mb-3">
                   <label for="password_confirmation" class="form-label">Confirm Password</label>
                   <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" value="{{ old('password_confirmation') }}" >
                @error('password_confirmation')
                <p class="text-danger mt-2 text-xs">{{ $message }}</p>
                @enderror
                </div>
            </div>
            <div class="card-footer">
               <button class="btn btn-danger btn-md px-3 text-white my-2">Register</button>
            </div>
            </form>
          </div>
    </x-card>
</x-layout>