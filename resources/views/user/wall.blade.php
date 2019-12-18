@extends('layouts.master')
@section('title','Dashboard')
@section('styles')
<style>
</style>
@endsection
@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">{{$user->name}}</h1>
      <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i>Add Friend</a>
   </div>
   <!- Content Row ->
   <div class="row">
      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
               <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                     <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Earnings (Monthly)</div>
                     <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                  </div>
                  <div class="col-auto">
                     <i class="fas fa-calendar fa-2x text-gray-300"></i>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
               <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                     <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Earnings (Annual)</div>
                     <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                  </div>
                  <div class="col-auto">
                     <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
               <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                     <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks</div>
                     <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                           <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                        </div>
                        <div class="col">
                           <div class="progress progress-sm mr-2">
                              <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-auto">
                     <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Pending Requests Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
               <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                     <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Requests</div>
                     <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                  </div>
                  <div class="col-auto">
                     <i class="fas fa-comments fa-2x text-gray-300"></i>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
    <div class="row">
        <div class="col-8 load-post">
            {{-- <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">User name Post</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Dropdown Header:</div>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit obcaecati nisi cupiditate, atque aperiam omnis dolore placeat, dicta natus! Deleniti delectus dolorum cupiditate nesciunt eius odio nihil ratione sed suscipit.</p>
                        <img width="100%" src="https://scontent.fsgn5-1.fna.fbcdn.net/v/t1.0-9/80805045_1431058923724488_3564410220992004096_n.jpg?_nc_cat=1&_nc_ohc=fsIO5BN-dZgAQnaRPPY6XsDTVNb_vZZ57K7bawEEoNP7agUCNC9v5BlVw&_nc_ht=scontent.fsgn5-1.fna&oh=3b919b973fc70de88c3d719051290edb&oe=5E7496FA" alt="">
                    </div>
                </div>
            </div> --}}
            
        </div>

        <!-- Content Row -->
        <div class="col-4">
            {{-- <div class="col-xl-4 col-lg-5"> --}}
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">List Friend</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-header">Dropdown Header:</div>
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-pie pt-4 pb-2">
                            <canvas id="myPieChart"></canvas>
                        </div>
                        <div class="mt-4 text-center small">
                            <span class="mr-2">
                                <i class="fas fa-circle text-primary"></i> Direct
                            </span>
                            <span class="mr-2">
                                <i class="fas fa-circle text-success"></i> Social
                            </span>
                            <span class="mr-2">
                                <i class="fas fa-circle text-info"></i> Referral
                            </span>
                        </div>
                    </div>
                </div>
                {{-- </div> --}}
        </div>
    </div>
    <button class="btn btn-primary btn-load-more" user-id="{{$user->id}}" url="{{ route('getPostByUserId') }}" page="1">Xem them</button>
</div>
@endsection
@section('scripts')
<script>
$(document).ready(function() {
    var url = "{{ route("getPostByUserId") }}";
    var userId = "{{$user->id}}";
    getPostByUserId(url, userId, 0);
});
//abc
</script>
@endsection
