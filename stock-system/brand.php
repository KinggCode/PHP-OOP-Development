<?php require_once 'includes/header.php'?>
<br>
<div class="row">
    <div class="col-md-12">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="dashboard.php ">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Brand</li>
      </ol>
    </nav>

    <div class="card">
        <div class="card-header"><i class="fas fa-edit"></i>Manage Brand</div>
        <div class="card-body">
            <div class="remove-messages"></div>
            <div class="div-action d-flex justify-content-end" style="padding-bottom:20px;">
            <button class="btn btn-secondary" data-toggle="modal"  data-target="#addBrandModal"><i class="fas fa-plus-circle"></i>Add Brand</button>
            </div> <!--- End of div action-->
            

            <table class="table table-hover" id="manageBrandTable">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">Brand Name</th>
                    <th scope="col">Status </th>
                    <th scope="col" style="width:15%;">Options</th>
                    </tr>
                </thead>
                
            </table>
        </div>
    </div>
    </div><!---End of Column -->
</div><!-- End of Row --->

<div class="modal" tabindex="-1" role="dialog" id="addBrandModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="fas fa-add"></i> Add Brand</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="submitBrandForm" action="php_action/createBrand.php" method="POST">
      <div class="modal-body">
    <div class="form-group row">
        <label for="brandName" class="col-sm-3 col-form-label">Brand Name: </label>
        <div class="col-sm-9">
        <input type="text" class="form-control" id="brandName" name="brandName" placeholder="Brand Name" autocomplete="off">
        </div>
    </div>
    <div class="form-group row">
        <label for="brandStatus" class="col-sm-3 col-form-label">Status: </label>
        <div class="col-sm-9">
        <select  class="form-control" name="brandStatus" id="brandStatus">
            <option value="">~~SELECT~~</option>
            <option value="1">Available</option>
            <option value="2">Not Available</option>
        </select>
        </div>
    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="createBrandBtn"  id="createBrandBtn">Save changes</button>
      </div>
    </form>
    </div><!--- End of Modal Content--->
  </div><!--- End of Modal Dialog--->
</div><!--- End of Modal--->



<div class="modal" tabindex="-1" role="dialog" id="editBrandModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="fas fa-edit"></i> Edit Brand</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form id="editBrandForm" action="php_action/editBrand.php" method="POST">
      <div class="modal-body">
      <div class="form-group row">
        <label for="editBrandName" class="col-sm-3 col-form-label">Brand Name: </label>
        <div class="col-sm-9">
        <input type="text" class="form-control" id="editBrandName" name="brandName" placeholder="Brand Name" autocomplete="off">
        </div>
    </div>
    
    <div class="form-group row">
        <label for="editBrandStatus" class="col-sm-3 col-form-label">Status: </label>
        <div class="col-sm-9">
        <select name="editBrandStatus" id="editBrandStatus" class="form-control">
            <option value="">~~SELECT~~</option>
            <option value="">Available</option>
            <option value="">Not Available</option>
        </select>
        </div>
    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="createBrandbtn"  data-loading-text="Loading...">Save changes</button>
      </div>
    </form>
      </div><!--- End of Modal Content--->
  </div><!--- End of Modal Dialog--->
</div><!--- End of Modal--->




<div class="modal" tabindex="-1" role="dialog" id="removeBrandModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="fas fa-trash-alt"></i> Remove Brand</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Do you really want to remove.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-thrash-alt"></i> Close</button>
        <button type="button" class="btn btn-primary"><i class="fas fa-thumbs-up"></i> Save Changes</button>
      </div>
      </div><!--- End of Modal Content--->
  </div><!--- End of Modal Dialog--->
</div><!--- End of Modal--->

<script src="custom/js/brand.js"></script>

<?php require_once 'includes/footer.php'; ?>