<x-layout>
    <x-card class="col-md-6 col-sm-12">
        <div class="card p-5">
            <form method="POST" action="{{ route('leave.update', $edit_data->id) }}" >
                @csrf
                @method('PUT')
            <div class="card-body">
              <h4 class="card-title text-center">Edit Leave Details</h4>
              <p class="text-center mb-2">Fill to Update leave Details</p>
              <div class="mb-3">
                <label for="leave_type" class="form-label">Leave</label>
                <select class="form-control" name="leave_type" id="leave_type">
                    <option value=""> Select Leave Type </option>
                    @if ($edit_data == 'normal')
                        <option value="normal" selected> Normal Leave </option>
                        <option value="festival"> Festival Leave </option>

                    @else
                        <option value="normal"> Normal Leave </option>
                        <option value="festival" selected> Festival Leave </option>

                    @endif
                        
                    @error('leave_type')
                        <p class="text-danger mt-2 text-xs">{{ $message }}</p>
                    @enderror
                </select>
                </div> 
               <div class="mb-3">
                   <label for="number_of_days" class="form-label">Number of days</label>
                   <input type="number" name="number_of_days" id="number_of_days" class="form-control" placeholder="Enter full name" value="{{ $edit_data->number_of_days }}">
                   @error('number_of_days')
                        <p class="text-danger mt-2 text-xs">{{ $message }}</p>
                    @enderror
               </div>
               <div class="mb-3">
                   <label for="from_date" class="form-label">From Date</label>
                   <input type="date" name="from_date" id="from_date" class="form-control" value="{{ $edit_data->from_date }}">
                   @error('from_date')
                   <p class="text-danger mt-2 text-xs">{{ $message }}</p>
                   @enderror
                </div>
                <div class="mb-3">
                    <label for="to_date" class="form-label">From Date</label>
                    <input type="date" name="to_date" id="to_date" class="form-control" value="{{ $edit_data->to_date }}">
                    @error('to_date')
                    <p class="text-danger mt-2 text-xs">{{ $message }}</p>
                    @enderror
                 </div>
                 <div class="mb-3">
                   <label for="reason" class="form-label"></label>
                   <textarea class="form-control" name="reason" id="reason" rows="3">{{ $edit_data->reason }}</textarea>
                   @error('reason')
                   <p class="text-danger mt-2 text-xs">{{ $message }}</p>
                   @enderror 
                </div>
            </div>
            <div class="card-footer">
               <button class="btn btn-danger btn-md px-3 text-white my-2">Update</button>
            </div>
            </form>
          </div>
    </x-card>
</x-layout>