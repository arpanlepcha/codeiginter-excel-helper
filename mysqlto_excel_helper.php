<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

//library helper created by arpanlepcha@gmail.com


function mysqlto_excel($query, $filename='output')
{
   $table = "<table><tr>";
    $fields = $query->field_data();
    
    foreach ($fields as $field) {
        $table.= "<th>". $field->name . "</th>";
    }
    
    $table.="</tr>";
    
    foreach ($query->result() as $row) {
    
        $table.= "<tr>";
        
	foreach($row as $value) {                                            
            $table.= "<td align='center' >" . $value . "</td>";
        }

        $table.="</tr>";
   }

                         
          header("Content-type: application/x-msdownload");
          header("Content-Disposition: attachment; filename=$filename.xls");
          echo $table; 
}

