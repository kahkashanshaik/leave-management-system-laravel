<x-layout>
    <x-card class="col-md-6 col-sm-12">
        <div class="card p-5">
            <form action="{{ route('leave.store') }}" method="post">
                @csrf
            <div class="card-body">
                @php
                    $name = Route::currentRouteName();
                @endphp
              <h4 class="card-title text-center">Applay Leave</h4>
              <p class="text-center mb-2">Fill details to applay new leave</p>
              <div class="mb-3">
                <label for="leave_type" class="form-label">Leave</label>
                <select class="form-control" name="leave_type" id="leave_type">
                    <option value=""> Select Leave Type </option>
                    <option value="normal"> Normal Leave </option>
                    <option value="festival"> Festival Leave </option>
                    @error('leave_type')
                        <p class="text-danger mt-2 text-xs">{{ $message }}</p>
                    @enderror
                </select>
                </div>  
               <div class="mb-3">
                   <label for="number_of_days" class="form-label">Number of days</label>
                   <input type="number" name="number_of_days" id="number_of_days" class="form-control" placeholder="Enter full name" value="{{ old('number_of_days') }}">
                   @error('number_of_days')
                        <p class="text-danger mt-2 text-xs">{{ $message }}</p>
                    @enderror
               </div>
               <div class="mb-3">
                   <label for="from_date" class="form-label">From Date</label>
                   <input type="date" name="from_date" id="from_date" class="form-control" value="{{ old('from_date') }}">
                   @error('from_date')
                   <p class="text-danger mt-2 text-xs">{{ $message }}</p>
                   @enderror
                </div>
                <div class="mb-3">
                    <label for="to_date" class="form-label">From Date</label>
                    <input type="date" name="to_date" id="to_date" class="form-control" value="{{ old('to_date') }}">
                    @error('to_date')
                    <p class="text-danger mt-2 text-xs">{{ $message }}</p>
                    @enderror
                 </div>
                 <div class="mb-3">
                   <label for="reason" class="form-label"></label>
                   <textarea class="form-control" name="reason" id="reason" rows="3">{{ old('reason') }}</textarea>
                   @error('reason')
                   <p class="text-danger mt-2 text-xs">{{ $message }}</p>
                   @enderror 
                </div>
            </div>
            <div class="card-footer">
               <button class="btn btn-danger btn-md px-3 text-white my-2">Submit</button>
            </div>
            </form>
          </div>
    </x-card>
</x-layout>