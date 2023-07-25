<x-layout>
    <x-card class="col-md-12 col-sm-12">
        <div class="card p-5">
            <div class="card-body">
                <h4 class="card-title text-center">Manage Employees</h4>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        @php
                            $counter = 1;
                        @endphp
                        <head>
                            <tr>
                                <th>SL.No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Taken Leaves</th>
                                <th>Taken Festive Leaves</th>
                                <th>Action</th>
                            </tr>
                        </head>    
                        <tbody>
                            @foreach ($users as $user)
                            <tr class="text-center">
                                 <td>{{ $counter }}</td>   
                                 <td>{{ $user->name  }}</td>   
                                 <td>{{ $user->email }}</td>   
                                 <td>{{ $user->phone }}</td> 
                                 <td class="badge bg-secondary text-white">{{ $user->total_taken_leaves }}</td> 
                                 <td>{{ $user->total_taken_festive_leaves }}</td> 
                                 <td><a href="{{ Route('mangemps.edit', $user->id) }}"><i class="fas fa-edit text-danger"></i></a></td>   
                            </tr>
                            @php
                                $counter++;
                            @endphp
                            @endforeach
                           
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="6">
                                {{ $users->links() }}
                            </td>
                        </tr>
                    </tfoot>
                    </table>  
                </div>        
            </div>
            <div class="card-footer">
            </div>
        </div>
    </x-card>
</x-layout>