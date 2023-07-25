<x-layout>
    <x-card class="col-md-6 col-sm-12">
        <div class="card p-5">
            <form action="/admin/newsettings" method="post">
                <div class="card-body">
                    <h4 class="card-title text-center">Manage Leave Settings</h4>
                    <p class="text-center mb-2">Manage Leaves for the whole year</p>
                    @csrf
                    <div class="mb-3">
                        <label for="total_leaves" class="form-label">Total Leaves</label>
                        <input type="number" name="total_leaves" id="total_leaves" class="form-control"
                            value="{{ old('total_leaves') }}">
                        @error('total_leaves')
                        <p class="text-danger mt-2 text-xs">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="total_festive_leaves" class="form-label">Total Festive Leaves</label>
                        <input type="number" name="total_festive_leaves" id="total_festive_leaves" class="form-control"
                            value="{{ old('total_festive_leaves') }}">
                        @error('total_festive_leaves')
                        <p class="text-danger mt-2 text-xs">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-danger btn-md px-3 text-white my-2">Submit</button>
                </div>
            </form>
        </div>
    </x-card>
</x-layout>