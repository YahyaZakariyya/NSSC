<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_model {
    
    public function login()
    {
        $user_name = $this->input->post('user_name');
        $user_password = md5($this->input->post('user_password'));
        $query = "CALL validate_login('{$user_name}','{$user_password}')";
        $sql = $this->db->query($query);
        if($sql->num_rows()>0){
            $result = $sql->result_array();
            return $result;
        }else{
            return Array();
        }
    }

    public function signup()
    {
        $user_name = $this->input->post('user_name');
        $user_email = $this->input->post('user_email');
        $first_name = $this->input->post('first_name');
        $last_name = $this->input->post('last_name');
        $user_password = md5($this->input->post('user_password'));
        // $user_password = $this->input->post('user_password');
        $gender = $this->input->post('gender');
        $check_query = "SELECT user_name, user_email FROM users WHERE user_name='{$user_name}' OR user_email='{$user_email}'";
        $check_sql = $this->db->query($check_query);
        $check_result = $check_sql->result_array();
        if(empty($check_result)){
            $query = "CALL add_user('{$user_name}','{$user_email}','{$first_name}','{$last_name}','{$user_password}','{$gender}')";
            $this->db->query($query);
            return true;
        }else{
            return false;
        }
    }

    public function insert_notes($notes_file)
    {
        $notes_title = $this->input->post('notes_title');
        $notes_description = $this->input->post('notes_description');
        $author = $_SESSION['user_id'];
        $notes_subject = $this->input->post('notes_subject');
        $date = date('Y-m-d');
        $query = "CALL insert_notes('{$notes_title}','{$notes_description}',{$author},'{$notes_file}','{$notes_subject}','{$date}')";
        print_r($query);
        $this->db->query($query);
    }

    public function select_notes($user_id)
    {
        $query = "SELECT * FROM notes WHERE author={$user_id}";
        $sql = $this->db->query($query);
        $result = $sql->result_array();
        return $result;
    }

    public function select_note($notes_id)
    {
        $query = "SELECT * FROM notes WHERE notes_id={$notes_id}";
        $sql = $this->db->query($query);
        $result = $sql->result_array();
        return $result;
    }


    public function profile_data($user_id)
    {
        $following = "SELECT COUNT(*) AS following FROM followers WHERE following={$user_id}";
        $followers = "SELECT COUNT(*) AS followers FROM followers WHERE follower={$user_id}";
        $notes = "SELECT COUNT(*) AS notes FROM notes WHERE author={$user_id}";
        $query1 = $this->db->query($following);
        $query2 = $this->db->query($followers);
        $query3 = $this->db->query($notes);
        $result1 = $query1->result_array();
        $result2 = $query2->result_array();
        $result3 = $query3->result_array();
        $count = Array($result1[0]['following'],$result2[0]['followers'],$result3[0]['notes']);
        return $count;
    }

    public function update_notes($notes_id)
    {
        $notes_title = $this->input->post('notes_title');
        $notes_description = $this->input->post('notes_description');
        $notes_subject = $this->input->post('notes_subject');
        $query = "CALL update_notes('{$notes_title}','{$notes_description}','{$notes_subject}','{$notes_id}')";
        $this->db->query($query);
    }

    public function select_courses()
    {
        $sql = $this->db->get('courses');
        $result = $sql->result_array();
        return $result;
    }

    public function search_notes()
    {
        $search = $this->input->get('search');
        $query = "SELECT n.notes_id, n.notes_title, n.notes_description, n.notes_file, n.author, u.user_id AS user_id, n.upload_date, u.user_name AS author, c.course_name AS notes_subject FROM notes n JOIN users u ON n.author=u.user_id JOIN courses c ON n.notes_subject=c.course_id WHERE n.notes_title LIKE '%{$search}%' OR n.notes_description LIKE '%{$search}%'";
        $sql = $this->db->query($query);
        $result = $sql->result_array();
        return $result;
    }

    public function check_follow($user_id)
    {
        $query = "SELECT * FROM followers WHERE following='{$user_id}' AND follower='{$_SESSION['user_id']}'";
        $sql = $this->db->query($query);
        $result = $sql->result_array();
        if(empty($result)){
            return false;
        }else{
            return true;
        }
    }

    public function follow_unfollow($user_id)
    {
        $query = "SELECT * FROM followers WHERE following={$user_id} AND follower={$_SESSION['user_id']}";
        $sql = $this->db->query($query);
        $result = $sql->result_array();
        if(empty($result))
        {
            $query = "INSERT INTO followers(following, follower) VALUES ({$user_id},{$_SESSION['user_id']})";
            $this->db->query($query);
        }
        else
        {
            $query = "DELETE FROM followers WHERE following={$user_id} AND follower={$_SESSION['user_id']}";
            $this->db->query($query);
        }
    }

    public function check_user($user_id)
    {
        $query = "SELECT user_id,user_name FROM users WHERE user_id='{$user_id}' OR user_name='{$user_id}'";
        $sql = $this->db->query($query);
        $result = $sql->result_array();
        if(!empty($result)){
            return $result;
        }else{
            return Array();
        }
    }

    public function show_followers($user_id)
    {
        $query = "SELECT u.user_name FROM followers f JOIN users u ON f.follower=u.user_id WHERE f.following={$user_id}";
        // $query = "CALL view_followers('{$user_id}')";
        $sql = $this->db->query($query);
        $result = $sql->result_array();
        return $result;
    }

    public function show_following($user_id)
    {
        $query = "SELECT u.user_name FROM followers f JOIN users u ON f.following=u.user_id WHERE f.follower={$user_id}";
        $sql = $this->db->query($query);
        $result = $sql->result_array();
        return $result;
    }


    public function check_like($notes_id)
    {
        $query = "SELECT * FROM likes WHERE notes_id='{$notes_id}' AND follower='{$_SESSION['user_id']}'";
        $sql = $this->db->query($query);
        $result = $sql->result_array();
        if(empty($result)){
            return false;
        }else{
            return true;
        }
    }


    public function like_dislike($notes_id)
    {
        $query = "SELECT * FROM likes WHERE notes_id={$notes_id} AND liker={$_SESSION['user_id']}";
        $sql = $this->db->query($query);
        $result = $sql->result_array();
        if(empty($result))
        {
            $query = "INSERT INTO likes(notes_id, liker) VALUES ({$notes_id},{$_SESSION['user_id']})";
            $this->db->query($query);
        }
        else
        {
            $query = "DELETE FROM likes WHERE notes_id={$notes_id} AND liker={$_SESSION['user_id']}";
            $this->db->query($query);
        }
    }

    public function select_liked_notes()
    {
        $query = "SELECT notes_id FROM likes WHERE liker={$_SESSION['user_id']}";
        $sql = $this->db->query($query);
        $result = $sql->result_array();
        return $result;
    }

    public function delete_notes($notes_id)
    {
        $query = "DELETE FROM notes where notes_id={$notes_id}";
        $this->db->query($query);
    }

    public function insert_query()
    {
        $query = $this->input->post('query');
        $inquirer = $_SESSION['user_id'];
        $query_category = $this->input->post('query_catagory');
        $query = "CALL insert_query('{$query}','{$query_category}','{$inquirer}')";
        $this->db->query($query);
    }
}