<?php $this->load->view('layout/header'); ?>
<h3><b>Edit Product</b></h3>
    <form action="<?php echo base_url('updateProduct/'.$products->id) ?>" method="POST">
      
        <div class="mb-3">
            <label for="pName" class="form-label">Product Name</label>
            <input type="text" class="form-control" id="pName" name="pName" value="<?= $products->product_name ?>">
        </div>
        <div class="mb-3">
            <label for="pName" class="form-label">Quantity</label>
            <input type="text" class="form-control" id="quantity" name="quantity" value="<?= $products->quantity ?>">
        </div>
        <div class="mb-3">
            <label for="pName" class="form-label">Selling Price</label>
            <input type="text" class="form-control" id="sPrice" name="sPrice" value="<?= $products->selling_price ?>">
        </div>
       
        <button type="submit" class="btn btn-primary">Update Product</button>

    </form>

    <?php $this->load->view('layout/footer'); ?>