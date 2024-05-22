<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('unique'))
{
    function unique($value, $params)
    {
        $ci = & get_instance();
        // Allow for more than 1 parameter.
        $fields = explode(',', $params);

        // Extract the table and field from the first parameter.
        list($table, $field) = explode('.', $fields[0], 2);

        // Setup the db request.
        $ci->db->select($field)
                     ->from($table)
                     ->where($field, $value)
                     ->limit(1);

        // Check whether a second parameter was passed to be used as an
        // "AND NOT EQUAL" where clause
        // eg "select * from users where users.name='test' AND users.id != 4
        if (isset($fields[1])) {
            // Extract the table and field from the second parameter
            list($where_table, $where_field) = explode('.', $fields[1], 2);

            // Get the value from the post's $where_field. If the value is set,
            // add "AND NOT EQUAL" where clause.
            $where_value = $ci->input->post($where_field);
            if (isset($where_value)) {
                $ci->db->where("{$where_table}.{$where_field} <>", $where_value);
            }
        }

        // If any rows are returned from the database, validation fails
        $query = $ci->db->get();
        if ($query->row()) {
            //$ci->form_validation->set_message('unique', lang('bf_form_unique'));
            $ci->form_validation->set_message('unique', $ci->lang->line('form_validation_is_unique'));
            return false;
        }

        return true;
    }   
}