
 @extends('user.master')
 @section('title', 'Dashboard')
 @section('content')

 <!--**********************************
             Content body start
        ***********************************-->

 <div class="content-body ">
     <div class="container-fluid">
         <div class="row">
             <div class="col-lg-12">
                 <div class="card">
                     <div class="card-header">
                         <h4 class="card-title">Book List</h4>

                     </div>




                     <div class="card-body">
                         <div class="table-responsive">
                             <table id="example3" class="display min-w850">
                                 <thead>
                                     <tr>
                                         <th>Book Image</th>
                                         <th>Book Name</th>
                                         <th>Categories</th>
                                         <th>Industry</th>
                                         {{-- <th>Total Users</th> --}}
                                         <th>Amount</th>
                                         <th>Published Date</th>
                                         <th>Action</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     @foreach($books as $book)
                                     <tr>
                                         <td><img width="80" src="{{ asset($book->image) }}" alt=""></td>
                                         <td>{{$book->book_name}}</td>
                                         <td><a href="javascript:void(0);"><strong>123 </strong></a></td>
                                         <td><a href="javascript:void(0);"><strong>456 </strong></a></td>
                                         {{-- <td><a href="javascript:void(0);"><strong>7890</strong></a></td> --}}
                                         <td>&#8377; <a href="javascript:void(0);"><strong>{{$book->book_price}}</strong></a></td>
                                         <td>2011/04/25</td>
                                         <td>
                                             <div class="d-flex">
                                                 <a href="/user-book-details" class="btn btn-primary shadow btn-xs sharp me-1">
                                                     <i class="fa fa-eye"></i>
                                                 </a>

                                             </div>
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
 </div>
 <!--**********************************
        Content body end
    ***********************************-->
 <script>
     var loadFile = function(event) {
         // var selected_image = document.getElementById('selected_image');

         var input = event.target;
         var image = document.getElementById('selected_image');
         if (input.files && input.files[0]) {
             var reader = new FileReader();
             reader.onload = function(e) {
                 image.src = e.target.result;
             }
             reader.readAsDataURL(input.files[0]);
         }

         function validateForm() {
             let x = document.forms["myForm"]["staff_id"].value;
             if (x == "") {
                 alert("Name must be filled out");
                 return false;
             }
         }

     };
 </script>



 @endsection



