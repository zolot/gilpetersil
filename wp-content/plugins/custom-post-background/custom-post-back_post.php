<?php
	define('CPB_DISPLAY_POSTPAGE', '0');
	define('CPB_DISPLAY_MAINPAGE', '1');
	define('CPB_DISPLAY_BOTHPAGES', '2');
	define('CPB_DISPLAY_BACKGROUND', '3');
	define('CPB_DISPLAY_DISABLED', '4');
	define('CPB_DISPLAY_WHOLEPAGE', '5');
	
	add_action('the_content', 'custompostback_process');
	
	function custompostback_style($results, $new_data)
	{
		if(strlen($results->url) > 0)
		{
			$new_data .= "background-image: url('".$results->url."');";
		}
		
		if(strlen($results->rep) > 0)
		{
			if($results->rep == "x" || $results->rep == "y")
			{
				$new_data .= "background-repeat: repeat-".$results->rep.";";
			}
			else if($results->rep == "both")
			{
				$new_data .= "background-repeat: repeat;";
			}
			else
			{
				$new_data .= "background-repeat: no-repeat;";
			}
		}
		
		if(strlen($results->color) > 0)
		{
			//probably should have some code to check if it's hexadecimal
			$new_data .= "background-color: ".$results->color.";";
		}
		
		if(strlen($results->css) > 0)
		{
			$new_data .= $results->css;
		}
		return $new_data;
	}
	
	function custompostback_process($data)
	{
		global $post;
		global $wpdb;
		
		//get the table name
		$table_name = $wpdb->prefix . constant("custPostBack_dbtable");	
		
		$post_id = get_the_ID();
		
		
		$display = true;
		if (is_home()) $display = false;
		if (is_archive()) $display = false;
		if (is_date()) $display = false;
		if (is_category()) $display = false;
		if (is_search()) $display = false;
		if (is_feed()) $display = false;
		
		//sql data
		$queryBacks = "SELECT * FROM ".$table_name." WHERE postid='".$post_id."' LIMIT 1";
		$results = $wpdb->get_row($queryBacks);
		
		//check if the display type is set to not display. If so there is no need to go any further
		if($results && $results->displaytype == CPB_DISPLAY_DISABLED)
		{
			return $data; //no need to continue. It is currently disabled.
		}
		
		if($display)
		{
			if($results && $results->displaytype != CPB_DISPLAY_MAINPAGE) //if it's set to only display on the main page, then only display on the main page
			{
				$new_data = "";
				if ($results->displaytype == CPB_DISPLAY_BACKGROUND || $results->displaytype == CPB_DISPLAY_WHOLEPAGE) 
				{
					$new_data = '<STYLE type="text/css">';
					$new_data .= 'body {';
				}
				
				//do the style part
				$new_data = custompostback_style($results, $new_data);
				
				if ($results->displaytype == CPB_DISPLAY_BACKGROUND || $results->displaytype == CPB_DISPLAY_WHOLEPAGE) 
				{
					$new_data .= '}';
					if ($results->displaytype == CPB_DISPLAY_WHOLEPAGE) 
						$new_data .= ' #wrapper { background-color: transparent; }';
					$new_data .= "</style>";
					$data = $new_data . $data;
				}
				else if($results->displaytype == CPB_DISPLAY_POSTPAGE || $results->displaytype == CPB_DISPLAY_BOTHPAGES) //display only on post or both
				{
					//add to the end of the actual data
					$data = '<div style="'.$new_data.'">'.$data.'</div>';
				}
			}
		}
		else
		{
			if($results && ($results->displaytype == CPB_DISPLAY_MAINPAGE || $results->displaytype == CPB_DISPLAY_BOTHPAGES)) //check to see if it equals 1 (so that means to display it on the main page and archives) or on both
			{
				$new_data = custompostback_style($results,$new_data);
				$data = '<div style="'.$new_data.'">'.$data.'</div>';
			}
		}
		return $data;
	}
?>