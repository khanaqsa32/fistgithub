<?php

class News_model extends CI_Model {

    public function addNews($data)
    {
        $this->db->insert('news', $data);
        return $this->db->insert_id();        
    }
    public function getAllNews()
    {
        return $this->db->get('news');
    }
    //front end call
    public function getActiveNews()
    {
        return $this->db->get_where('News', array('status' => 1));
    }  
    public function getNews($newsId)
    {
        return $this->db->from('news')->where('news_id', $newsId)->get()->row(); 
    }

    public function deleteNews($newsId)
    {
        $this->db->delete('news', array('news_id' => $newsId));
        //return array($this->db->affected_rows(), $this->db->error());
        return $this->db->affected_rows();
    }
    public function updateNews($News_data, $news_id)
    {            
        $this->db->where('news_id', $news_id);
        $this->db->update('News', $News_data);
        return $this->db->affected_rows();
    }

}











