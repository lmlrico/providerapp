<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Data Provider App</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  
  <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">
  
</head>
<body>
  <header>
    <div class="px-3 py-2 border-bottom mb-3">
      <div class="container d-flex flex-wrap justify-content-center">
        <div class="col-12 col-lg-auto mb-2 mb-lg-0 me-lg-auto">
          <h4>Data Providers</h4>
        </div>
        <div class="text-end">
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-modal">Add Provider</button>
        </div>
      </div>
    </div>
  </header>
  <div class="container">
    <table id="provider-table" class="table" style="width:100%">
      <thead>
        <tr>
          <th>Name of Provider</th>
          <th>URL</th>
          <th>Actions</th>
        </tr>
      </thead>
    </table>
  </div>
  <div class="modal fade " tabindex="-1" id="add-modal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add Provider</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="add-form">
            <div class="mb-3">
              <label for="provider_name" class="form-label">Name of Provider</label>
              <input type="text" class="form-control" id="provider_name" maxlength="256" required>
            </div>
            <div class="mb-3">
              <label for="provider_url" class="form-label">URL</label>
              <input type="text" class="form-control" id="provider_url" maxlength="256" required>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="add-submit-btn">Submit</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade " tabindex="-1" id="image-modal">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="image-container">
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade " tabindex="-1" id="update-modal">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="update-container">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="update-submit-btn">Update</button>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.4.min.js" type="text/javascript"></script>
  <script src="{{ asset('assets/js/jquery.validate.min.js') }} " type="text/javascript"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js" type="text/javascript"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js" type="text/javascript"></script>
  <script>var token = "{{ csrf_token() }}";</script>
  <script src="{{ asset('assets/js/main.js') }} " type="text/javascript"></script>
</body>
</html>