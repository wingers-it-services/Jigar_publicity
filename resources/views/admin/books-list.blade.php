
 @extends('admin.master')
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

                     <!-- Modal -->
                     <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                         <div class="modal-dialog modal-lg">
                             <div class="modal-content">
                                 <div class="modal-header">
                                     <h5 class="modal-title">Update Book</h5>
                                     <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                 </div>
                                 <form id="editBookForm" action="{{route('updateBook')}}" method="POST" enctype="multipart/form-data">
                                     @csrf
                                     <div class="modal-body">
                                         <input type="hidden" name="uuid" id="editBookId">
                                         <div class="row">
                                             <div class="col-12 d-flex justify-content-center">
                                                 <img id="selected_image" src="https://p7.hiclipart.com/preview/831/479/764/ibooks-computer-icons-ios-apple-app-store-sparito-lo-scaffale-sono-rimaste-le-pagine-aperte-i-colori-cambiano.jpg" style="width: 200px;height:200px">
                                             </div>
                                         </div>
                                         <div class="mb-3">
                                             <label for="editBookImage" class="form-label">Book Image</label>
                                             <input type="file" class="form-control" id="editBookImage" name="image" accept="image/*" onchange="loadFile(event)">
                                         </div>
                                         <div class="mb-3">
                                             <label for="editBookName" class="form-label">Book Name</label>
                                             <input type="text" class="form-control" id="editBookName" name="book_name" required>
                                         </div>
                                         <div class="mb-3">
                                             <label for="editBookPrice" class="form-label">Book Price</label>
                                             <input type="number" class="form-control" id="editBookPrice" name="book_price" required>
                                         </div>
                                         <!-- Add more fields as necessary -->
                                         <div class="row">
                                             <div class="card-footer mt-0">
                                                 <button class="btn btn-primary btn-lg btn-block">Association Details</button>
                                             </div>
                                             <div class="col-lg-6 mb-2">
                                                 <div class="form-group">
                                                     <label class="text-label">Association Name<span class="required">*</span></label>
                                                     <input type="text" name="association_name" id="editAssName" class="form-control" placeholder="Montana">
                                                 </div>
                                             </div>
                                             <div class="col-lg-6 mb-2">
                                                 <div class="form-group">
                                                     <label class="text-label">Website Link<span class="required">*</span></label>
                                                     <input type="text" name="association_web_link"  id="editAssLink"  class="form-control" placeholder="https://wingersitservices.co.in/">
                                                 </div>
                                             </div>
                                             <div class="col-lg-6 mb-2">
                                                 <div class="form-group">
                                                     <label class="text-label">Email Address<span class="required">*</span></label>
                                                     <input type="email" class="form-control" id="email" id="editAssEmail"  name="association_email" placeholder="example@example.com.com">
                                                 </div>
                                             </div>

                                             <div class="col-lg-6 mb-2">
                                                 <div class="form-group">
                                                     <label class="text-label">Phone Number<span class="required">*</span></label>
                                                     <input type="text" name="association_ph_no" id="editAssPhone" class="form-control" placeholder="(+1)408-657-9007">
                                                 </div>
                                             </div>
                                             <div class="col-lg-12 mb-3">
                                                 <div class="form-group">
                                                     <label class="text-label">Address<span class="required">*</span></label>
                                                     <textarea type="text" name="association_address" id="editAssAddress" rows="4" class="form-control"></textarea>

                                                 </div>
                                             </div>
                                         </div>

                                         <div class="row">
                                             <div class="card-footer mt-0">
                                                 <button class="btn btn-primary btn-lg btn-block">Publication Details</button>
                                             </div>
                                             <div class="col-lg-6 mb-2">
                                                 <div class="form-group">
                                                     <label class="text-label">Publication Name<span class="required">*</span></label>
                                                     <input type="text" name="publication_name" id="editPubName" class="form-control" placeholder="Montana">
                                                 </div>
                                             </div>

                                             <div class="col-lg-6 mb-2">
                                                 <div class="form-group">
                                                     <label class="text-label">Website Link<span class="required">*</span></label>
                                                     <input type="text" name="publication_web_link" id="editPubLink" class="form-control" placeholder="https://wingersitservices.co.in/">
                                                 </div>
                                             </div>

                                             <div class="col-lg-6 mb-2">
                                                 <div class="form-group">
                                                     <label class="text-label">Email Address<span class="required">*</span></label>
                                                     <input type="email" class="form-control" id="editPubEmail" name="publication_email" placeholder="example@example.com.com">
                                                 </div>
                                             </div>

                                             <div class="col-lg-6 mb-2">
                                                 <div class="form-group">
                                                     <label class="text-label">Phone Number<span class="required">*</span></label>
                                                     <input type="text" name="publication_ph_no" id="editPubPhone" class="form-control" placeholder="(+1)408-657-9007">
                                                 </div>
                                             </div>
                                             <div class="col-lg-12 mb-3">
                                                 <div class="form-group">
                                                     <label class="text-label">Address<span class="required">*</span></label>
                                                     <textarea type="text" name="publication_address" id="editPubAddress" rows="4" class="form-control"></textarea>

                                                 </div>
                                             </div>
                                         </div>

                                     </div>
                                     <div class="modal-footer">
                                         <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                                         <button type="submit" class="btn btn-primary">Save changes</button>
                                     </div>
                                 </form>
                             </div>
                         </div>
                     </div>




                     <div class="card-body">
                         <div class="table-responsive">
                             <table id="example3" class="display min-w850">
                                 <thead>
                                     <tr>
                                         <th></th>
                                         <th>Book Name</th>
                                         <th>Total Categories</th>
                                         <th>Total Industry</th>
                                         <th>Total Users</th>
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
                                         <td><a href="javascript:void(0);"><strong>7890</strong></a></td>
                                         <td>&#8377; <a href="javascript:void(0);"><strong>{{$book->book_price}}</strong></a></td>
                                         <td>2011/04/25</td>
                                         <td>
                                             <div class="d-flex">
                                                 <a href="/admin/book-details/{{$book->uuid}}" class="btn btn-primary shadow btn-xs sharp me-1">
                                                     <i class="fa fa-eye"></i>
                                                 </a>
                                                 <a href="/admin/update-book" class="btn btn-primary shadow btn-xs sharp me-1 edit-book-button" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg" data-book='@json($book)'>
                                                     <i class="fa fa-pencil"></i>
                                                 </a>
                                                 <a href="/admin/delete-book/{{$book->uuid}}" class="btn btn-danger shadow btn-xs sharp">
                                                     <i class="fa fa-trash"></i>
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
 <script>
     document.addEventListener('DOMContentLoaded', function() {
         var editButtons = document.querySelectorAll('.edit-book-button');
         editButtons.forEach(function(button) {
             button.addEventListener('click', function() {
                 var book = JSON.parse(this.dataset.book);
                 document.getElementById('editBookId').value = book.uuid;
                 document.getElementById('editBookName').value = book.book_name;
                 document.getElementById('editBookPrice').value = book.book_price;
                 document.getElementById('selected_image').src = '{{ asset('') }}' + book.image;
                 document.getElementById('editBookImage').value = '{{asset($book->image)}}' + book.image; 

                 document.getElementById('editAssName').value = book.association_name;
                 document.getElementById('editAssLink').value = book.association_web_link;
                 document.getElementById('editAssEmail').value = book.association_email; 
                 document.getElementById('editAssPhone').value = book.association_ph_no;
                 document.getElementById('editAssAddress').value = book.association_address;

                 document.getElementById('editPubName').value = book.publication_name;
                 document.getElementById('editPubLink').value = book.publication_web_link;
                 document.getElementById('editPubEmail').value = book.publication_email; 
                 document.getElementById('editPubPhone').value = book.publication_ph_no;
                 document.getElementById('editPubAddress').value = book.publication_address;
             });
         });
     });
 </script>


 @endsection
=======
 @extends('admin.master')
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

                     <!-- Modal -->
                     <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                         <div class="modal-dialog modal-lg">
                             <div class="modal-content">
                                 <div class="modal-header">
                                     <h5 class="modal-title">Update Book</h5>
                                     <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                 </div>
                                 <form id="editBookForm" action="{{route('updateBook')}}" method="POST" enctype="multipart/form-data">
                                     @csrf
                                     <div class="modal-body">
                                         <input type="hidden" name="uuid" id="editBookId">
                                         <div class="row">
                                             <div class="col-12 d-flex justify-content-center">
                                                 <img id="selected_image" src="https://p7.hiclipart.com/preview/831/479/764/ibooks-computer-icons-ios-apple-app-store-sparito-lo-scaffale-sono-rimaste-le-pagine-aperte-i-colori-cambiano.jpg" style="width: 200px;height:200px">
                                             </div>
                                         </div>
                                         <div class="mb-3">
                                             <label for="editBookImage" class="form-label">Book Image</label>
                                             <input type="file" class="form-control" id="editBookImage" name="image" accept="image/*" onchange="loadFile(event)">
                                         </div>
                                         <div class="mb-3">
                                             <label for="editBookName" class="form-label">Book Name</label>
                                             <input type="text" class="form-control" id="editBookName" name="book_name" required>
                                         </div>
                                         <div class="mb-3">
                                             <label for="editBookPrice" class="form-label">Book Price</label>
                                             <input type="number" class="form-control" id="editBookPrice" name="book_price" required>
                                         </div>
                                         <!-- Add more fields as necessary -->
                                     </div>
                                     <div class="modal-footer">
                                         <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                                         <button type="submit" class="btn btn-primary">Save changes</button>
                                     </div>
                                 </form>
                             </div>
                         </div>
                     </div>




                     <div class="card-body">
                         <div class="table-responsive">
                             <table id="example3" class="display min-w850">
                                 <thead>
                                     <tr>
                                         <th></th>
                                         <th>Book Name</th>
                                         <th>Total Categories</th>
                                         <th>Total Industry</th>
                                         <th>Total Users</th>
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
                                         <td><a href="javascript:void(0);"><strong>7890</strong></a></td>
                                         <td>&#8377; <a href="javascript:void(0);"><strong>{{$book->book_price}}</strong></a></td>
                                         <td>2011/04/25</td>
                                         <td>
                                             <div class="d-flex">
                                                 <a href="/admin/book-details/{{$book->uuid}}" class="btn btn-primary shadow btn-xs sharp me-1">
                                                     <i class="fa fa-eye"></i>
                                                 </a>
                                                 <a href="/admin/update-book" class="btn btn-primary shadow btn-xs sharp me-1 edit-book-button" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg" data-book='@json($book)'>
                                                     <i class="fa fa-pencil"></i>
                                                 </a>
                                                 <a href="/admin/delete-book/{{$book->uuid}}" class="btn btn-danger shadow btn-xs sharp">
                                                     <i class="fa fa-trash"></i>
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
 <script>
     document.addEventListener('DOMContentLoaded', function() {
         var editButtons = document.querySelectorAll('.edit-book-button');
         editButtons.forEach(function(button) {
             button.addEventListener('click', function() {
                 var book = JSON.parse(this.dataset.book);
                 document.getElementById('editBookId').value = book.uuid;
                 document.getElementById('editBookName').value = book.book_name;
                 document.getElementById('editBookPrice').value = book.book_price;
                 document.getElementById('selected_image').src = '{{ asset('') }}' + book.image;
                 document.getElementById('editBookImage').value = '{{asset($book->image)}}' + book.image; // Reset the file input
                 // Populate more fields as necessary
             });
         });
     });
 </script>


 @endsection

