<?php $this->load->view('layout/header'); ?>
<h3><b> Product List </b></h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Product Name</th>
                <th scope="col">Quantity</th>
                <th scope="col">Selling price</th>
                <th scope="col">SKU</th>
                <th scope="col">Action</th>

            </tr>
        </thead>
        <tbody>
            <?php
           foreach($products as $product ){
            ?>     
                <tr>
                    <td><?= $product->id ?></td>
                    <td><?= $product->product_name ?></td>
                    <td><?= $product->quantity ?></td>
                    <td><?= $product->selling_price ?></td>
                    <td><?= $product->sku ?></td>
                    <td>
                        <div style="display: flex;">
                            <div style="margin-right: 5px">
                                <a href="<?php echo base_url('editProduct/'.$product->id) ?>" class="btn btn-primary btn-sm">Edit</a>
                            </div>
                    
                         
                         <a href="<?php echo base_url('deleteProduct/'.$product->id) ?>" >  <button type="submit" value="<?= $product->id ?>" class="btn btn-danger btn-sm delete">Delete</button></a>
                     
                    </div>              
                    </td>
                </tr>
                <?php   } ?>
        
        </tbody>

    </table>
    <?php $this->load->view('layout/footer'); ?>