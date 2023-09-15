<?php
/* membuat class dengan nama Login_model*/
class Login_model extends CI_Model
{
    /* membuat encapsulasi untuk properties %table */
    private $table;
    public function __construct()
    {
        parent::__construct();
        $this->table = "user";
    }
    function getcountlogin($user, $password)
    {
        $query = "SELECT * FROM user where username='$user' and password='$password'";
        return $this->db->query($query)->num_rows();
    }

    function getLogindata($user, $password)
    {
        $query = "SELECT * from user where username='$user' and password='$password' ";
        return $this->db->query($query);
    }
}
