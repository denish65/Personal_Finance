@extends('layouts.admin')

@section('library')

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
                        <table class="table" id="libraryTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>title</th>
                                    <th>author</th>
                                    <th>category</th>
                                    <th>file_path</th>
                                    <th>is_hidden</th>
                                    <th>Location</th>
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
          <form id="addBookForm">
            
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">title:</label>
              <input type="text" name="title"  class="form-control" id="title">
            </div>
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">author:</label>
                <input type="text" name="author"  class="form-control" id="author">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">category:</label>
                <input type="date" name="category"  class="form-control" id="category">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">book:</label>
                <input type="file" name="book"  class="form-control" id="book">
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
          
             <button type="button" id="addBookButton" class="btn btn-primary">Send message</button>

          </form>
        </div>
      </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function () {
        // Fetch expenses on page load
        // fetchExpenses();

        // When the "Send message" button is clicked
        $('#addBookButton').on('click', function (e) {
            e.preventDefault(); // Prevent the default form submission

            var formData = new FormData($('#addBookForm')[0]);

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
                    $('#libraryModal').modal('hide'); // Close the modal
                    $('#addBookForm')[0].reset(); // Reset the form
                    // fetchExpenses(); // Refresh the table after adding a new expense
                },
                error: function (xhr, status, error) {
                    alert('An error occurred: ' + xhr.responseText);
                }
            });

            
        });
    });

</script>



@endsection


