@extends('admin.layout')
@section('content')

<style>
   thead{
   background-color:black!imporant;
   } 
   #filterForm{
   width: 15%!important;
   }
   
</style>

<div class="content-wrapper" ng-controller="Contact">
   <div class="container-fluid">
      <!-- Add Result Section -->
      <div class="row mb-1">
         <div class="col-md-12">
            <div class="card">
               <div class="card-body text-center">
                  <h4>Daily Results</h4>
                  <!-- Add Result Button -->
                  <button class="btn btn-success mb-2 btn-black" id="toggleFormBtn">
                  Add Result
                  </button>
                  <!-- Hidden Form Initially -->
                  <div id="addResultForm" style="display: none;">
                     <div class="card card-body">
                        <form id="resultForm" action="" method="POST">
                           <input type="hidden" name="_token" value="{{ csrf_token() }}">
                           <input type="hidden" name="game_id" value="1">
                           <div class="row mb-3">
                              <!-- Game Name -->
                              <div class="col-md-4">
                                 <input type="text" class="form-control" value="( जीबी रोड ) GB ROAD DELHI" readonly>
                              </div>
                              {{-- {{$alldata}} --}}
                              <!-- Yesterday Result (Read-only with first result) -->
                              <div class="col-md-4">
                                 <input type="text" class="form-control" name="yesterday_result" value="{{ $alldata->first()->today ?? '' }}" readonly>
                              </div>
                              <!-- Today Result -->
                              <div class="col-md-4">
                                 <input type="text" class="form-control" name="today_result" placeholder="Enter today's result" required>
                              </div>
                           </div>
                           <div class="row mb-3">
                              <!-- Date (Auto-select today's date and make it read-only) -->
                              <div class="col-md-4">
                                 <input type="date" class="form-control" name="date" value="{{ now()->format('Y-m-d') }}" >
                              </div>
                              <!-- Empty space for alignment -->
                              <div class="col-md-4"></div>
                              <!-- Save Button -->
                              <div class="col-md-4 text-end">
                                 <button type="submit" class="btn btn-success mt-4">Save Result</button>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Results Table Section -->
      <div class="row mb-2">
         <div class="col-md-12">
            <form method="GET" id="filterForm">
               <div class="input-group">
                  <div class="input-group-prepend">
                     <span class="input-group-text" style="background-color: #f8f9fa;">
                     <i class="fas fa-filter"></i>
                     </span>
                  </div>
                  <select name="filter" class="form-control" id="filterSelect">
                  <option value="10_days" {{ $filter == '10_days' ? 'selected' : '' }}>Last 10 Days</option>
                  <option value="1_month" {{ $filter == '1_month' ? 'selected' : '' }}>Last 1 Month</option>
                  <option value="all" {{ $filter == 'all' ? 'selected' : '' }}>All</option>
                  </select>
               </div>
            </form>
         </div>
      </div>
      <div class="row mb-1">
         <div class="col-md-12">
            <div class="card">
               <div class="card-body">
                  <table class="table table-bordered table-striped" id="resulttable">
                     <thead style="background-color:black;">
                        <tr>
                           <th>S.No</th>
                           <th>Date</th>
                           <th>Yesterday Data</th>
                           <th>Today Data</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach($alldata as $key => $data)
                        <tr>
                           <td>{{ $key + 1 }}</td>
                           <td>{{ \Carbon\Carbon::parse($data->date)->format('d-m-Y') }}</td>
                           <td>{{ $data->yesterday }}</td>
                           <td>{{ $data->today }}</td>
                           <td>
   @if(\Carbon\Carbon::parse($data->date)->diffInDays(now()) <= 30)
   <button type="button"
    class="btn btn-black btn-sm"
    data-toggle="modal"
    data-target="#updateResultModal"
    data-id="{{ $data->id }}"
    data-result="{{ $data->today }}"
    data-date="{{ $data->date }}">
    Edit
</button>


   @else
      <span class="text-muted">-</span>
   @endif
</td>

                        </tr>
                        @endforeach
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- Modal -->
<div class="modal fade" id="updateResultModal" tabindex="-1" aria-labelledby="updateResultModalLabel" aria-hidden="true">
  <div class="modal-dialog">
  <form method="POST" action="{{ route('update.today.result') }}">
  @csrf
  <input type="hidden" name="id" id="recordId">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="updateResultModalLabel">Update Today's Result</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <label for="result">Enter Result</label>
          <input type="number" name="today" id="result" class="form-control" required>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Update</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- jQuery Library -->
<!-- Bootstrap 4 CSS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



<script>
   $(document).ready(function () {
       $("#toggleFormBtn").click(function () {
           $("#addResultForm").toggle(); // Show/Hide form
           var isVisible = $("#addResultForm").is(":visible");
   
           // Change button text and color
           if (isVisible) {
               $(this).text("Close").removeClass("btn-success").addClass("btn-danger");
           } else {
               $(this).text("Add Result").removeClass("btn-danger").addClass("btn-success");
           }
       });
   });
</script>
<!-- jQuery -->


<script>
   $(document).ready(function () {
       $("#resulttable").DataTable({
           responsive: true,
           lengthChange: false,
           autoWidth: false,
           buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"]
       })
       .buttons()
       .container()
       .appendTo("#resulttable_wrapper .col-md-6:eq(0)");
   });
</script>


<script>
   document.getElementById('filterSelect').addEventListener('change', function () {
       document.getElementById('filterForm').submit();
   });
</script>



@endsection