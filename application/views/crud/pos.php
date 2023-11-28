<?php $this->load->view('layout/header'); ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <p style="text-align: right"><b> <?= date('Y-m-d') ?></b></p>
    <form method="post" action="<?php echo base_url('posdata') ?>">
        <div class="container">
            <div class="row">
                <div class="col-md-4">

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Customer Name</label>
                        <input type="text" class="form-control" name="cName" placeholder="Enter Customer Name"
                            aria-describedby="emailHelp">
                    </div>

                    <div class="mb-3">
                       
                            <label for="productDropdown" class="form-label">Select Products</label>
                            <select class="form-select" id="productDropdown" name="productIds[]" multiple = "multiple">
                                <option value="">Select products</option>
                                <?php foreach ($products as $product) { ?>
                                    <option quantity="<?= $product->quantity ?>" price="<?= $product->selling_price ?>"
                                        value="<?= $product->id ?>"><?= $product->product_name ?></option>
                                <?php } ?>
                            </select>
                        
                      
                        
                    </div>

                    <div class="mb-3">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="number" class="form-control" name="quantity" id="quantity"
                            placeholder="Type Quantity" >
                    </div>
                    <button type="button" id="addButton" class="btn btn-primary">ADD</button>
                </div>
                <div class="col-md-8">
                    <div id="print-section">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="table-responsive">
                                        <table class="table table-condensed table-bordered table-striped items_table">
                                            <thead class="bg-primary">
                                                <tr>
                                                    <th width="30%">product id </th>
                                                    <th width="30%">Item name</th>
                                                    <th width="10%">Quantity</th>
                                                    <th width="15%">Price</th>
                                                    <th width="15%">Subtotal</th>
                                                    <th width="5%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="pos-form-tbody" style="font-size: 16px; font-weight: bold;">
                                            
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- table ends here -->

                    <!-- this is the bottom of the table -->
                    <div class="box-footer bg-gray">
                        <div class="row">
                           
                            <div class="col-md-3 text-right">
                                <label>Total Amount:</label><br>
                                <span style="font-size: 19px;" id="total" name ="totalamount" class="tot_amt text-bold"></span>
                                <input type="text" id="totalamount1" name="totalamount">
                                <script>  document.getElementById('totalamount1').style.display = 'none';</script>

                            </div>

                            <div class="col-md-3 text-right">
                                <label>Grand Total:</label><br>
                                <span style="font-size: 19px;" class="tot_grand text-bold" id="grandTotal"></span>
                                <input type="text" id="grandTotal1" name="grandTotal">
                                <script>  document.getElementById('grandTotal1').style.display = 'none';</script>

                            </div>
                        
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="amount" class="form-label">Paid Amount</label>
                        <input type="number" class="form-control" name="paidAmount" id="paidAmount" placeholder="Type Amount">
                    </div>

                    <input type="text" id="total1" name="alltotal">
                    <script>  document.getElementById('total1').style.display = 'none';</script>
                    <input type="text" id="productIdsInput" name="productid" >
                    <script>  document.getElementById('productIdsInput').style.display = 'none';</script>
               
                    <button type="submit" class="btn btn-success">SAVE</button>
                    

                     <!-- Save button -->
                    


                </div>
            </div>
        </div>
       
    </form>

    
    
    <script>
     var totalAmount = 0;
    var grandTotal = 0;
    var allquantity = 0;
    var dueAmount ;

$(document).ready(function() {


    $("#productDropdown").change(function() {
        var productId = $(this).val();
                // Check if the  product ID is not already in the array
                if (selectedProductIds.indexOf(selectedProductId) === -1) {
         
            selectedProductIds.push(selectedProductId);
        }

 
        $.ajax({
            url: '/get-product-details/' + productId,
            type: 'GET',
            success: function(response) {
                $("#stock").text(response.quantity);
                $("#price").text(response.selling_price);
            },
            error: function(xhr) {
                console.log(xhr.responseText);
            }
        });
    });

    var selectedProductIds = []; // Initialize an empty array to store selected product IDs



        // Check if the selected product ID is not already in the array
        if (selectedProductIds.indexOf(selectedProductId) === -1) {
            // Add the selected product ID to the array
            selectedProductIds.push(selectedProductId);
        }

        
    });

    var productIdsArray = [];
   
    $("#addButton").click(function() {

       

        var productId = $("#productDropdown").val();
        var productName = $("#productDropdown option:selected").text();
        var quantity = $("#quantity").val();
        var stock = $("#productDropdown option:selected").attr('quantity');
        var price = $("#productDropdown option:selected").attr('price');

        $("#quantity").val('');
        var subtotal = quantity * price;

       

        totalAmount += subtotal;
        allquantity += quantity;
    
          document.getElementById('total').textContent = totalAmount.toFixed(2);
       

        // Getinput element for paid amount
        var paidAmountInput = document.getElementById('paidAmount');

        //  calculate grand total in real-time
        paidAmountInput.addEventListener('input', function() {

            document.getElementById('total1').value = totalAmount.toFixed(2);

            // Get the paid amount value
            var paidAmount = parseFloat(paidAmountInput.value) || 0;

          
            grandTotal = totalAmount - paidAmount;

             
        var dueAmount = grandTotal + totalAmount;


            // Update the grand total 
            document.getElementById('grandTotal').textContent = grandTotal.toFixed(2);
            document.getElementById('grandTotal1').value = grandTotal.toFixed(2);

            
        // Update the due amount 
        document.getElementById('dueAmount').textContent = dueAmount.toFixed(2);
        document.getElementById('dueAmount1').value = dueAmount.toFixed(2);
        
        });

        document.getElementById('total1').value = totalAmount.toFixed(2);
        $("#pos-form-tbody").append(`
            <tr>

                <td>${productId}</td>
                <td>${productName}</td>
                <td>${quantity}</td>
                <td>${price}</td>
                <td>${subtotal}</td>
                <td><button class="btn btn-danger btn-sm removeBtn">Remove</button></td>
            </tr>
        `);
        // ********************************************
        productIdsArray.push(productId);
        console.log(productIdsArray);
        $("#productIdsInput").val(productIdsArray.join(','));

    });

    $("#pos-form-tbody").on("click", ".removeBtn", function() {
        var removedSubtotal = parseFloat($(this).closest("tr").find("td:nth-child(5)").text());
        totalAmount -= removedSubtotal;
        document.getElementById('total').textContent = totalAmount.toFixed(2);
        $(this).closest("tr").remove();
    });


$("#saveButton").click(function() {
    // Create a new FormData
    var formData = new FormData();

    
    formData.append('cName', $("#cName").val());
    formData.append('paidAmount', $("#paidAmount").val());
    formData.append('dueAmount', $("#dueAmount1").val());
    formData.append('grandTotal', $("#grandTotal1").val());
    formData.append('totalamount', $("#totalamount1").val());
    formData.append('alltotal', $("#total1").val());
    // formData.append('productid', $("#productid").val());

    // Add the productIdArray to the form data
    formData.append('productIdArray', productIdArray.join(',')); 


    

var products = [];


$("#pos-form-tbody tr").each(function(index, row) {
    var cells = $(row).find('td');
    var product = {
        productId: $(cells[0]).data('productId'), 
        quantity: $(cells[1]).text(),
        price: $(cells[3]).text()
    };
    products.push(product);
});

// Add products array to the form data
formData.append('products', JSON.stringify(products));




function submitForm() {
    $.ajax({
        type: "POST",
        url: "posdata",
        data: {
            productIdArray: productIdArray,
        
        },
        success: function(response) {
           
            console.log(response);
        }
    });
}

});

</script>

<?php $this->load->view('layout/footer'); ?>
