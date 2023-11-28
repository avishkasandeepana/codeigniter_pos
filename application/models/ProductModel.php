<?php
class ProductModel extends CI_Model
{
  public function insertProduct($product_name, $quantity, $selling_price, $sku)
  {
    $data = array(
      'product_name' => $product_name,
      'quantity' => $quantity,
      'selling_price' => $selling_price,
      'sku' => $sku

    );

    return  $this->db->insert('products', $data);
  }


  public function view()
  {

    $products = $this->db->get('products');
    return $products->result();
  }


  public function edit($id)
  {

    $products = $this->db->get_where('products', ['id' => $id]);

    return $products->row();
  }




  public function update($data, $id)
  {

    return $products = $this->db->update('products', $data, ['id' => $id]);
  }

  public function delete($id)
  {

    return $products = $this->db->delete('products', ['id' => $id]);
  }
}
