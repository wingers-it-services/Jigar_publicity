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

                         <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                             <div class="modal-dialog modal-lg">
                                 <div class="modal-content">
                                     <div class="modal-header">
                                         <h5 class="modal-title">Modal title</h5>
                                         <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                     </div>
                                     <div class="modal-body">Modal body text goes here.</div>
                                     <div class="modal-footer">
                                         <button type="button" class="btn btn-danger light"
                                             data-bs-dismiss="modal">Close</button>
                                         <button type="button" class="btn btn-primary">Save changes</button>
                                     </div>
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
                                         <tr>
                                             <td><img class="rounded-circle" width="35"
                                                     src="https://fito.dexignzone.com/laravel/demo/images/profile/small/pic1.jpg"
                                                     alt=""></td>
                                             <td>Blue Bird</td>
                                             <td><a href="javascript:void(0);"><strong>123 </strong></a></td>
                                             <td><a href="javascript:void(0);"><strong>456 </strong></a></td>
                                             <td><a href="javascript:void(0);"><strong>7890</strong></a></td>
                                             <td>&#8377; <a href="javascript:void(0);"><strong>12345678.90</strong></a></td>
                                             <td>2011/04/25</td>
                                             <td>
                                                 <div class="d-flex">
                                                     <a href="/admin/book-details/1234" class="btn btn-primary shadow btn-xs sharp me-1">
                                                         <i class="fa fa-eye"></i>
                                                     </a>
                                                     <a href="#" class="btn btn-primary shadow btn-xs sharp me-1" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg">
                                                         <i class="fa fa-pencil"></i>
                                                     </a>
                                                     <a href="#" class="btn btn-danger shadow btn-xs sharp">
                                                         <i class="fa fa-trash"></i>
                                                     </a>
                                                 </div>
                                             </td>
                                         </tr>

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
 @endsection
