@props(['dashcount'])
<div class="col-md-4 col-sm-12 mx-auto bg-default bg-light bg-gradient mb-3">
    <div class="card dashboard-card">
      <div class="card-body text-center">
        <h4 class="card-title mb-5">{{ $dashcount['title'] }}</h4>
        <button class="btn btn-danger" >
             <span class="badge bg-danger">{{ $dashcount['totcount'] }}</span>
        </button>
      </div>
    </div>
 </div>