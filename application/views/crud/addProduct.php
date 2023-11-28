
<?php $this->load->view('layout/header'); ?>


<a href="<?php echo base_url('viewProduct') ?>"><button type="button" class="btn btn-success">VIEW PRODUCTS</button></a>

<center><h2><b>ADD PRODUCT</b></h2></center>
<form action="<?php echo base_url('productSave') ?>" method="post" onsubmit="return validateForm()">

    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Product Name</label>
      <input type="text" class="form-control" name= "pName" placeholder="Enter Product Name" aria-describedby="emailHelp">
      <span id="pNameError" class="text-danger"></span>
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Quantity</label>
      <input type="number" class="form-control" name="pQuantity" placeholder="Enter quantity">
      <span id="pQuantityError" class="text-danger"></span>
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Selling Price</label>
      <input type="number" class="form-control" name="sPrice"  placeholder="Enter Selling Price">
      <span id="sPriceError" class="text-danger"></span>
    </div>
  

    <input type="hidden" name="random_number" value="{{ rand() }}">

   
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>

    
<?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
<?php endif; ?>

<?php if (isset($error_message)): ?>
    <div class="alert alert-danger"><?= $error_message ?></div>
<?php endif; ?>
</form>


</div>
  


<script>
function validateForm() {
    var pName = document.querySelector('input[name="pName"]').value;
    var pQuantity = document.querySelector('input[name="pQuantity"]').value;
    var sPrice = document.querySelector('input[name="sPrice"]').value;
    var isValid = true;

    document.getElementById('pNameError').textContent = '';
    document.getElementById('pQuantityError').textContent = '';
    document.getElementById('sPriceError').textContent = '';

    if (pName.trim() === '') {
        document.getElementById('pNameError').textContent = 'Product Name is required';
        isValid = false;
    }

    if (pQuantity.trim() === '' || isNaN(pQuantity) || parseInt(pQuantity) <= 0) {
        document.getElementById('pQuantityError').textContent = 'Invalid Quantity';
        isValid = false;
    }

    if (sPrice.trim() === '' || isNaN(sPrice) || parseFloat(sPrice) <= 0) {
        document.getElementById('sPriceError').textContent = 'Invalid Selling Price';
        isValid = false;
    }

    return isValid;
}
</script>

<?php $this->load->view('layout/footer'); ?>