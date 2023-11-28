<?php $this->load->view('layout/header'); ?>

<center><b><h3> <?= $customer ?></h3></b></center>

<div class="container">
    <div class="row">
        <?php foreach($products as $product) { ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?= $product->product_name ?></h5>
                        <p class="card-text">Selling Price: Rs <?= $product->selling_price ?></p>
                        <p class="card-text">SKU: <?= $product->sku ?></p>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<?php $this->load->view('layout/footer'); ?>
