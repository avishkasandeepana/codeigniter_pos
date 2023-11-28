<?php
class PosModel extends CI_Model
{
    public function save($cName, $paidAmount, $dueAmount, $grandTotal, $totalamount, $alltotal, $productId)
    {

        $data = array(
            'customer_name' => $cName,
            'paid_amount' => $paidAmount,
            'Due_amount' => $dueAmount,
            'grand_total' => $grandTotal,
            'total_amount' => $alltotal,
            'product_id' => $productId
        );

        $this->db->insert('sales', $data);
    }


    public function view()
    {


        $products = $this->db->get('sales');
        return $products->result();
    }
    public function productView($id)
    {

        $products = $this->db->get_where('sales', ['id' => $id]);
        $product = $products->row();

        $productIds = explode(',', str_replace(['[', ']', '"'], '', $product->product_id));

        $this->db->where_in('id', $productIds);
        $query = $this->db->get('products');
        $productDetails = $query->result();
        $cusName =  $product->customer_name;

        return ['productDetails' => $productDetails, 'customerName' => $cusName];
    }
}
