<?php

class Customer_model extends CI_Model {

    public function addCustomer($data)
    {
        $this->db->insert('addCustomer', $data);
        return $this->db->insert_id();        
    }
    public function getAllCustomer()
    {
        return $this->db->get('customer');
    }
    //front end call
    public function getActiveCustomer()
    {
        return $this->db->get_where('Customer', array('status' => 1));
    }  
    public function getCustomer($customerId)
    {
        return $this->db->from('customer')->where('customer_id', $customerId)->get()->row(); 
    }

    public function deleteCustomer($customerId)
    {
        $this->db->delete('customer', array('customer_id' => $customerId));
        //return array($this->db->affected_rows(), $this->db->error());
        return $this->db->affected_rows();
    }
    public function updateCustomer($Customer_data, $customer_id)
    {            
        $this->db->where('customer_id', $customer_id);
        $this->db->update('Customer', $Customer_data);
        return $this->db->affected_rows();
    }

}











