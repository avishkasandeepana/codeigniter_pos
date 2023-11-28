<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CrudController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function index()
    {
        $this->load->model('ProductModel');
        $data['products'] = $this->ProductModel->view();
        $this->load->view('crud/homepage', $data);
    }

    public  function addProduct()
    {
        $this->load->view('crud/addProduct');
    }
    public  function salesProduct($id)
    {
        $this->load->model('PosModel');
        $result = $this->PosModel->productView($id);


        $productDetails = $result['productDetails'];
        $cusName = $result['customerName'];

        // Pass the array of product details to the view
        $data['products'] = $productDetails;
        $data['customer'] = $cusName;
        $this->load->view('crud/salesProduct', $data);
    }

    public  function viewProduct()
    {
        $this->load->model('ProductModel');
        $data['products'] = $this->ProductModel->view();
        $this->load->view('crud/viewProduct', $data);
    }

    public  function editProduct($id)
    {

        $this->load->model('ProductModel');
        $data['products'] = $this->ProductModel->edit($id);
        $this->load->view('crud/editProduct', $data);
    }


    public  function pos()
    {
        $this->load->model('ProductModel');
        $data['products'] = $this->ProductModel->view();
        $this->load->view('crud/pos', $data);
    }

    public  function invoice()
    {
        $this->load->model('PosModel');
        $data['sales'] = $this->PosModel->view();
        $this->load->view('crud/invoice', $data);
    }


    public function save()
    {


        $product_name =   $this->input->post('pName');
        $quantity  =  $this->input->post('pQuantity');
        $selling_price  =  $this->input->post('sPrice');
        $sku = random_string('alnum', 4);;


        $this->load->model('ProductModel');
        $this->ProductModel->insertProduct($product_name,  $quantity, $selling_price, $sku);



        $this->session->set_flashdata('success_message', 'Product added successfully.');


        redirect('CrudController/addProduct');
    }

    public function update($id)
    {

        $data = [
            'product_name' =>   $this->input->post('pName'),
            'selling_price'  =>  $this->input->post('sPrice'),
            'quantity'  =>  $this->input->post('quantity')
        ];


        $this->load->model('ProductModel');
        $this->ProductModel->update($data, $id);
        redirect('CrudController/viewProduct');
    }

    public function delete($id)
    {
        $this->load->model('ProductModel');
        $this->ProductModel->delete($id);
        redirect('CrudController/viewProduct');
    }

    public function savePos()
    {
        $cName = $this->input->post('cName');
        $paidAmount = $this->input->post('paidAmount');
        $dueAmount = $this->input->post('dueAmount');
        $grandTotal = $this->input->post('grandTotal');
        $totalamount = $this->input->post('totalamount');
        $alltotal = $this->input->post('alltotal');
        $productId = $this->input->post('productid');
        $jsonEncoded = json_encode($productId);

        $this->load->model('PosModel');


        $this->PosModel->save($cName, $paidAmount, $dueAmount, $grandTotal, $totalamount, $alltotal,  $jsonEncoded);


        redirect('CrudController/pos');
    }
}
