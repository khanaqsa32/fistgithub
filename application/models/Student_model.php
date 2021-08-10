<?php

class Student_model extends CI_Model {

    public function addStudent($data)
    {
        $this->db->insert('student', $data);
        return $this->db->insert_id();        
    }
    public function getAllStudent()
    {
        return $this->db->get('student');
    }
    //front end call
    public function getActiveStudent()
    {
        return $this->db->get_where('student', array('status' => 1));
    }  
    public function getStudent($studentId)
    {
        return $this->db->from('student')->where('student_id', $studentId)->get()->row(); 
    }

    public function deleteStudent($studentId)
    {
        $this->db->delete('student', array('student_id' => $studentId));
        //return array($this->db->affected_rows(), $this->db->error());
        return $this->db->affected_rows();
    }
    public function updateStudent($user_data, $studentId)
    {            
        $this->db->where('student_id', $studentId);
        $this->db->update('student', $user_data);
        return $this->db->affected_rows();
    }
}




