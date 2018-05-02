<?php

    
    $user = 'root';
    $password = 'root';
    $host = '127.0.0.1';
    $port = 8889;
    $db = 'assignment';

    $link = mysql_connect("127.0.0.1:8889", $user, $password);

    $db_selected = mysql_select_db($db, $link);
    
    
    date_default_timezone_set('UTC');

    $start_date =   '2016-01-01';
    $end_date   =   '2016-10-23';
    
    for($dat = strtotime($start_date); $dat<=strtotime($end_date); $dat = $dat+86400)
    {
        $count = 0;
        $date = date('Y-m-d', $dat);
    
        for($z =1; $z <=5; $z++) { //Loop execution for each store
             $store_id = $z;
          for($i=1; $i<= 80; $i++)
            {
                //echo $date;
                $count = $count + 1;
                $customer_id        = rand(1, 450);
                #store_id           = rand(1, 5);
                $id_salesperson     = rand(100001, 100010);
                $total_amount       = rand(1, 10);
                $count_visit_cust   = rand(1, 3);
               if ($count > 50 & $count <75)
                {
                $count_visit_cust = rand(2, 3);   
                }
                else {
                $count_visit_cust   = 1;
                 # code...
                }
                
                $sql_orders = 'INSERT INTO orders(id_customer, date_visited, total_amount, count_visit_cust, salesperson_id) VALUES ('.$customer_id.','.'"'.$date.'"'.','.$total_amount.','.$count_visit_cust.','.$id_salesperson.')';
                $query = mysql_query($sql_orders);  // execute the query 
                $insert_id = mysql_insert_id();
                echo $sql_orders;
                #$query = mysql_query($sql_orders);  // execute the query 
                #$last_insert_id = mysql_insert_id();
                //exit();
            }
        }   

    }  
     for($outer_loop=1; $outer_loop<$insert_id; $outer_loop++)
    {
        $order_details      = rand(1,2);
        for($i = 1; $i <= $order_details; $i++)
        {
             $product_id         = rand(1001, 1020);
             $quanity            = rand(1, 2);
             $costforquantity    = rand(2, 9);

            $sql_orders_details = 'INSERT INTO ordered_items(order_number, product_id, quantity, costforquantity)VALUES ('.$outer_loop.','.$product_id.','.$quanity.','.$costforquantity.')';
            $query = mysql_query($sql_orders_details);  // execute the query 
            $id = mysql_insert_id();
            echo $sql_orders_details;
        }
    }
    echo $last_insert_id;
    echo $id;
