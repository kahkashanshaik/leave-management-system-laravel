<x-layout>
    <x-card class="col-md-12 col-sm-12">
        <div class="card p-5">
            <div class="card-body">
                <h4 class="card-title text-center">Manage Leaves</h4>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        @php
                            $counter = 1;
                        @endphp
                        <head>
                            <tr>
                                <th>SL.NO</th>
                                <th>Date</th>
                                <th>Number of Days</th>
                                <th>Reason</th>
                                <th>Leave Status</th>
                                <th>Action</th>
                            </tr>
                        </head>    
                        <tbody>
                           
                                @foreach ($leaves as $leave)
                                <tr class="text-center">
                                     <td>{{ $counter }}</td>   
                                     <td>{{ $leave->from_date }}-{{ $leave->to_date }}</td>   
                                     <td>{{ $leave->number_of_days }}</td>   
                                     <td>{{ $leave->reason }}</td> 
                                     @if ($leave->status == 'Pending')
                                        <td class="badge bg-warning text-white">{{ $leave->status }}</td>   
                                     @endif 
                                     @if ($leave->status == 'Approve')
                                        <td class="badge bg-success text-white">{{ $leave->status }}</td>   
                                     @endif 
                                     @if ($leave->status == 'Rejected')
                                        <td class="badge bg-danger text-white">{{ $leave->status }}</td>   
                                     @endif  
                                     @if (!in_array( $leave->status, ['rejected', 'approve'] ))
                                        <td><a href="{{ Route('leave.edit', $leave->id) }}"><i class="fas fa-edit text-danger"></i></a></td>   
                                     @else
                                     <td><a href="#"><i class="fas fa-edit text-secondary no-edit"></i></a></td>   
                                     @endif
                                </tr>
                                @php
                                    $counter++;
                                @endphp
                                @endforeach
                               
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="6">
                                    {{ $leaves->links() }}
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