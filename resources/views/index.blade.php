<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>

	

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">To do</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('save') }}" method="POST">
        	@csrf
        	<input type="hidden" id="id" name="">
        	<div class="mb-3">
				  <label for="description" class="form-label">Description</label>
				  <input type="text" class="form-control" id="description" placeholder="Description" name="description">
			</div>
            <div class="mb-3">
                  <label for="description" class="form-label">Description</label>
                  <input type="time" class="form-control" id="description" placeholder="Description" name="time">
            </div>

			<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
        </form>
      </div>
      
    </div>
  </div>
</div>



<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">To do</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('update') }}" method="POST">
        	@csrf
        	@method('put')
        	<input type="hidden" id="editid" name="desid">
        	<div class="mb-3">
				  <label for="description" class="form-label">Description</label>
				  <input type="text" class="form-control" id="edit" placeholder="Description" name="editdescription">
			</div>
            <div class="mb-3">
                  <label for="description" class="form-label">Description</label>
                  <input type="time" class="form-control" id="edittime" placeholder="Description" name="time">
            </div>


			<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
        </form>
      </div>
      
    </div>
  </div>
</div>

<div class="dashboard-wrapper">
    <div class="container-fluid  dashboard-content">
        <div class="row w-50 mx-auto" style="margin-top: 100px;">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <!-- Button trigger modal -->
						<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
						  Add task
						</button>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered first">
                                <thead>
                                    <tr>
                                        <th>Description</th>
                                        <th>Time</th>
                                        <th>Created_at</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                    @foreach($list as $value)
                                    <tr>
                                        <td>{{ $value->description }}</td>
                                        <td>{{ $value->time }}</td>
                                        <td>{{ $value->created_at }}</td>
                                        <td>
                                            <button type="button" class="btn btn-success editbtn" value="{{ $value->id }}">Edit</button>
                                             <a href="/delete/{{ $value->id }}"> <button type="button" class="btn btn-danger">Delete</button></a>
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
<script>
	 $(document).ready(function () {
    $(document).on('click', '.editbtn', function()
    {
     var pid = $(this).val();
     $('#editModal').modal('show');

     $.ajax({
         type: "GET",
         url: "/edit/"+pid,
         success: function (response) {
            $('#edit').val(response.todo.description)
            $('#edittime').val(response.todo.time)
            $('#editid').val(pid)
            
         }
     });
    });
});
 
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>