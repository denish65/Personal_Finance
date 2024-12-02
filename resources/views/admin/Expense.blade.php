@extends('layouts.admin')

@section('Expense')

<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
             <h2>Expense Table </h2>   
                <h5>Welcome Jhon Deo , Love to see you back. </h5>
               
            </div>
        </div>

    <div class="row">
       
        <div class="col-md-12">
             <!--    Context Classes  -->

            <div class="panel panel-default">
              <button type="button" class="btn btn-primary model-button"  data-toggle="modal" data-target="#exampleModal" data-whatever="@fat">Open modal for @fat</button>

               

                <div class="panel-heading">
                    Context Classes
                </div>
                
                <div class="panel-body">
                    <div class="table-responsive">
                        {{-- <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Username</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="success">
                                    <td>1</td>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                                <tr class="info">
                                    <td>2</td>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                </tr>
                                <tr class="warning">
                                    <td>3</td>
                                    <td>Larry</td>
                                    <td>the Bird</td>
                                    <td>@twitter</td>
                                </tr>
                                <tr class="danger">
                                    <td>4</td>
                                    <td>John</td>
                                    <td>Smith</td>
                                    <td>@jsmith</td>
                                </tr>
                            </tbody>
                        </table> --}}

                        <table class="table" id="expenseTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Date</th>
                                    <th>Payment Type</th>
                                    <th>Expense Note</th>
                                    <th>Location</th>
                                    <th>Item Name</th>
                                    <th>Payment For</th>
                                    <th>Payment Status</th>
                                    <th>Reference Image</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <!-- Data will be populated here using JavaScript -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--  end  Context Classes  -->
        </div>
    </div>
        <!-- /. ROW  -->
</div>
       
</div>



<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">New message</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="ExpenseForm">
            
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">first_name:</label>
              <input type="text" name="first_name"  class="form-control" id="first_name">
            </div>
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">last_name:</label>
                <input type="text" name="last_name"  class="form-control" id="last_name">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">date:</label>
                <input type="date" name="date"  class="form-control" id="date">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">payment_type:</label>
                <select type="text" name="payment_type"  class="form-control" id="payment_type">
                <option value="cash">cash</option>
                <option value="credit">credit</option>
                <option value="debit">debit</option>
                <option value="online">online</option>
                </select>
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">reference_image:</label>
                <input type="file" name="reference_image"  class="form-control" id="reference_image">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">expense_note:</label>
                <input type="text"  name="expense_note"  class="form-control" id="expense_note">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">location:</label>
                <input type="text" name="location"   class="form-control" id="location">
              </div>

              <div class="form-group">
                <label for="recipient-name" class="col-form-label">item_name:</label>
                <input type="text" name="item_name"  class="form-control" id="item_name">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">payment_for:</label>
                <input type="text" name="payment_for"  class="form-control" id="payment_for">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">payment_status:</label>
                <input type="text" name="payment_status" class="form-control" id="payment_status">
              </div>

            {{-- <div class="form-group">
              <label for="message-text" class="col-form-label">Message:</label>
              <textarea class="form-control" id="message-text"></textarea>
            </div> --}}
          <button type="button" id="addexp" class="btn btn-primary">Send message</button>

          </form>
        </div>
        {{-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Send message</button>
        </div> --}}
      </div>
    </div>
</div>
    

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    // $(document).ready(function(){

    //     function fetchExpenses();
    //     // When the "Send message" button is clicked
    //     $('#addexp').on('click', function(e){
    //         // alert("hellop");
    //         e.preventDefault(); // Prevent the default form submission

    //         // Create FormData from the ExpenseForm form
    //         var formData = new FormData($('#ExpenseForm')[0]);

    //         $.ajax({
    //             url: "{{ route('admin.addexpense') }}", // Define the correct route
    //             type: 'POST',
    //             data: formData,
    //             headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Add CSRF token from the meta tag
    //         },
    //             contentType: false, // We are using FormData, so no need to set contentType
    //             processData: false, // Don't process the data (files)
    //             success: function(response) {
    //                 // Handle success
    //                 console.log(response)
    //                 // alert(response.message); // Show a success message
    //                 $('#exampleModal').modal('hide'); // Close the modal
    //                 // Optionally, you can reset the form
    //                 $('#ExpenseForm')[0].reset();
    //             },
    //             error: function(xhr, status, error) {
    //                 // Handle error
    //                 alert('An error occurred: ' + xhr.responseText);
    //             }
    //         });
    //     });

    //      // Fetch expenses and populate the table
       
    // });

    
</script>

<script>
     $(document).ready(function () {
    // Attach the delete click event to dynamically added delete buttons
        $(document).on('click', '#deleteexpense', function (e) {
            e.preventDefault();

            var expenseId = $(this).data('id'); // Get the expense id
            var confirmed = confirm("Are you sure you want to delete this expense?"); // Confirm before deletion
            
            if (confirmed) {
                $.ajax({
                    // url: '/admin/deleteExpense/' + expenseId, // URL for deleting the expense (make sure to pass the ID)

                    url: "{{ route('admin.deleteExpense', ':id') }}".replace(':id', expenseId), // Dynamically replace :id with the actual expense ID
 
                    type: 'post', // HTTP method should be DELETE
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // CSRF token
                    },
                    success: function (response) {

                            alert("Expense deleted successfully!"); // Success message
                            fetchExpenses(); // Refresh the table after deletion
                    
                    },
                    error: function (xhr, status, error) {
                        alert('An error occurred: ' + xhr.responseText); // Display error
                    }
                });
            }
        });


    });
    
    $(document).ready(function () {
        // Fetch expenses on page load
        fetchExpenses();

        // When the "Send message" button is clicked
        $('#addexp').on('click', function (e) {
            e.preventDefault(); // Prevent the default form submission

            var formData = new FormData($('#ExpenseForm')[0]);

            $.ajax({
                url: "{{ route('admin.addexpense') }}", // Define the correct route for adding expenses
                type: 'POST',
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Add CSRF token from the meta tag
                },
                contentType: false, // We are using FormData, so no need to set contentType
                processData: false, // Don't process the data (files)
                success: function (response) {
                    console.log(response);
                    $('#exampleModal').modal('hide'); // Close the modal
                    $('#ExpenseForm')[0].reset(); // Reset the form
                    fetchExpenses(); // Refresh the table after adding a new expense
                },
                error: function (xhr, status, error) {
                    alert('An error occurred: ' + xhr.responseText);
                }
            });

            
        });

        
    });


    function fetchExpenses() {
            $.ajax({
                url: "{{ route('admin.expense.show') }}", // Route for fetching expenses
                type: 'GET',
                success: function (response) {
                    var tableBody = $('#expenseTable tbody');
                    tableBody.empty(); // Clear existing table data

                    if (response.status === 'success') {
                        response.Expense.forEach(function (expense) {
                            var row = '<tr>';
                            row += '<td>' + expense.id + '</td>';
                            row += '<td>' + expense.first_name + '</td>';
                            row += '<td>' + expense.last_name + '</td>';
                            row += '<td>' + expense.date + '</td>';
                            row += '<td>' + expense.payment_type + '</td>';
                            row += '<td>' + expense.expense_note + '</td>';
                            row += '<td>' + expense.location + '</td>';
                            row += '<td>' + expense.item_name + '</td>';
                            row += '<td>' + expense.payment_for + '</td>';
                            row += '<td>' + expense.payment_status + '</td>';
                            row += '<td><img src="{{ asset('storage/') }}' + '/' + expense.reference_image + '" alt="Expense Image" style="width: 50px;"></td>';
                            row += '<td><i class="bi bi-pencil-square text-success" id="editexpense" data-id='+ expense.id+' ></i> | <i class="bi bi-trash text-danger" id="deleteexpense" data-id='+ expense.id+'></i></td>';
                            row += '</tr>';
                            tableBody.append(row);
                        });
                    }
                },
                error: function (xhr, status, error) {
                    alert('An error occurred: ' + xhr.responseText);
                }
            });
        }

   

</script>



@endsection


