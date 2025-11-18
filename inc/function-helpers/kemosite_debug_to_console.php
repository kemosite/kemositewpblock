<?php
function kemosite_debug_to_console( $input, $error_string = "", $error_file = "", $error_line = "" ) {

        ob_start();

        $error_file_parts = pathinfo( $error_file );

        $data_array = array();
        $data_array[] = $input;
        $data_array[] = $error_string;
        $data_array[] = $error_file;
        $data_array[] = $error_line;
        $data_array[] = $error_file_parts;
        $data_array[] = debug_backtrace();


        $data = json_encode( $data_array );
        
        /*
        if ( empty( $_POST ) && !is_admin() ):
                echo "<script>console.log(" . $data . ");</script>";
        endif;
        */

        $output  = 'console.info(\'kemosite_debug_to_console:\');';
        $output .= 'console.log(' . json_encode($data) . ');';
        $output  = sprintf('<script>%s</script>', $output);

        echo $output;
        
}
