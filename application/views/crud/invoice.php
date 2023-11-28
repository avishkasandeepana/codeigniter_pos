<?php $this->load->view('layout/header'); ?>
<h3><b> Invoice  </b></h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Customer Name</th>
                <th scope="col">Total</th>
                <th scope="col">Paid Amount</th>
                <th scope="col">Action</th>

            </tr>
        </thead>
        <tbody>
             <?php foreach ($sales as $sales) { ?>
                <tr>
                    <td><?= $sales->customer_name ?></td>
                    <td><?= $sales->total_amount ?></td>
                    <td><?= $sales->paid_amount ?></td>
                    <td> 
                        <div style="display: flex;">
                            <div style="margin-right: 5px">
                                <a href="<?php echo base_url('salesProduct/'. $sales->id) ?>" class="btn btn-primary btn-sm">View Products</a> 
                            </div>
                        <form action="{{ route('deleteinvoice', $sales->id) }}" method="POST">
                     
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>              
                    </td>
                </tr>
           <?php } ?>
        </tbody>
    
       

    </table>
    <?php $this->load->view('layout/footer'); ?>