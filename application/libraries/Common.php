<?php

class Common
{
   private $asort_field = array();
   private $adefault_field = '';
   private $sdefault_order = 'desc';
   private $CI;
   private $cond_operators = array('=', "<", "<=", ">", ">=");

   public function __construct()
   {
      $this->CI =& get_instance();
   }

   public function curl_request( $url , $param = null)
   {
      $cl = curl_init();
      $opts[CURLOPT_RETURNTRANSFER] = 1;
      $opts[CURLOPT_URL] = $url;

      if(is_null($param) === false){
         $opts[CURLOPT_POST] = true;
         $opts[CURLOPT_POSTFIELDS] = $param;
      }
      curl_setopt_array($cl, $opts);
      return curl_exec($cl);
  }

	public function get_cond_operators(){
		return $this->$cond_operators;
	}

    public function get_file_type($sfile)
	{
	  return explode('/',$this->get_mime_type($sfile))[0];
	}
  
   public function get_mime_type($sfile)
   {
      $mime_types = array(
         "pdf"=>"application/pdf"
         ,"exe"=>"application/octet-stream"
         ,"zip"=>"application/zip"
         ,"docx"=>"application/msword"
         ,"doc"=>"application/msword"
         ,"xlsx"=>"application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"
         ,"xls"=>"application/vnd.ms-excel"
         ,"ppt"=>"application/vnd.ms-powerpoint"
         ,"gif"=>"image/gif"
         ,"png"=>"image/png"
         ,"jpeg"=>"image/jpg"
         ,"jpg"=>"image/jpg"
         ,"mp3"=>"audio/mpeg"
         ,"wav"=>"audio/x-wav"
         ,"mpeg"=>"video/mpeg"
         ,"mpg"=>"video/mpeg"
         ,"mpe"=>"video/mpeg"
         ,"mov"=>"video/quicktime"
         ,"avi"=>"video/x-msvideo"
         ,"3gp"=>"video/3gpp"
         ,"css"=>"text/css"
         ,"jsc"=>"application/javascript"
         ,"js"=>"application/javascript"
         ,"php"=>"text/html"
         ,"htm"=>"text/html"
         ,"html"=>"text/html"
         ,"txt" => "text/plain"
         ,"xml" => "application/xml"
         ,"xsl" => "application/xml"
         ,"tar" => "application/x-tar"
         ,"swf" => "application/x-shockwave-flash"
         ,"odt" => "application/vnd.oasis.opendocument.text"
         ,"ods" => "application/vnd.oasis.opendocument.spreadsheet"
         ,"odp" => "application/vnd.oasis.opendocument.presentation"
      );

	  $extension = strtolower(pathinfo($sfile, PATHINFO_EXTENSION));
	  return $mime_types[$extension];
   }

   public function vd($var)
   {
      echo "<pre>";
      var_dump($var);
      echo "</pre>";
   }

	public function apiData($status,$type,$message,$data=null)
	{
		$data = array(
			'status' => $status,
			'type'=> $type,
			'message' => $message,
			'data' => $data,
		);
		
		return $data;
	}

	public function restDataToArray($restData)
	{
		return json_decode(json_encode($restData),true);
	}

	public function _send_email($tpl_name,$aData)
	{
	
		$this->CI->load->library('email');
		
		$config = array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_user' => 'itechglobal.noreply@gmail.com',
			'smtp_pass' => 'p@assw0rd',
			'smtp_port' => 465,
			'mailtype' => 'html',
			'newline' => "\r\n",
		);
		
		$this->CI->email->initialize($config);
		$this->CI->email->from('itechglobal.noreply@gmail.com', 'Project Everest');
		$this->CI->email->to($aData['email']);
		$this->CI->email->subject($aData['subject'] . ' | CRM Logging Tool');
		$this->CI->email->message($this->CI->load->view('site/emails/'.$tpl_name, $aData, TRUE));
		
		return $this->CI->email->send();
		
	}

	public function compilation_date($date=null){
		
		// $date = 'May 31, 2016';
		$needle = $date ?  strtotime($date) : strtotime('now');
		
		//textual representation of a day
		$textDay = date('l', $needle);
		
		$lastTextDay = strtotime('last '.$textDay, $needle);
		
		$needle = $lastTextDay;

		$monday = strtotime('last monday', strtotime('tomorrow',$needle));
		$sunday = strtotime('+6 days', $monday);
		
		$month = date('M', $needle);
		$day = date('j', $needle); // without leading zero
		$year = date('Y', $needle);
		$dateOfLastDayOfTheMonth =  date('M t, Y', $needle);
		$dayOrderOfFirstDayofTheMonth = date('w', strtotime($month.' 01, '.$year));
		$dayOrderOfLastDayofTheMonth = date('w', strtotime($dateOfLastDayOfTheMonth));
		$dayOfLastDayofTheMonth = date('t', $needle);
		
		$firstSundayOfTheMonth = strtotime("first Sunday of ".$month." ".$year);
		$dayOfFirstSundayOfTheMonth = date('j', $firstSundayOfTheMonth);
		
		$fourthMondayOfTheMonth = strtotime("fourth Monday of ".$month." ".$year);
		$dayOfFourthMondayOfTheMonth = date('j', $fourthMondayOfTheMonth);
		
		if($dayOrderOfFirstDayofTheMonth>=1 && $dayOrderOfFirstDayofTheMonth<=3 && $day<=$dayOfFirstSundayOfTheMonth){
			$monday = strtotime('+'. $dayOrderOfFirstDayofTheMonth-1 .' day', $monday);
		}
		
		if($dayOrderOfLastDayofTheMonth<3 && $dayOfFourthMondayOfTheMonth <= $day && $day<=$dayOfLastDayofTheMonth){
			$monday = $fourthMondayOfTheMonth;
			$sunday = strtotime("last Day of ".$month." ".$year);
		}
		
		$mondayTxt = date('M d, Y', $monday);
		$sundayTxt = date('M d, Y', $sunday);
		return  $mondayTxt. " - " . $sundayTxt;

	}
	
	public function numToExcelColumn($num) {
		$numeric = ($num - 1) % 26;
		$letter = chr(65 + $numeric);
		$num2 = intval(($num - 1) / 26);
		if ($num2 > 0) {
			return $this->numToExcelColumn($num2) . $letter;
		} else {
			return $letter;
		}
	}
	
	public function ordSuffixFloor($n) 
	{
	  if($n==''){return '';}
	  $str = "$n";
	  $t = $n > 9 ? substr($str,-2,1) : 0;
	  $u = substr($str,-1);
	  if ($t==1) 
		return $str . 'th';
	  else 
		  switch ($u) 
		  {
			  case 1: return $str . 'st Floor';
			  case 2: return $str . 'nd Floor';
			  case 3: return $str . 'rd Floor';
			  default: return $str . 'th Floor';
		  }
	}
   

   public function file_size($ifile_size)
   {
       if ($ifile_size < 1024) {
           return array($ifile_size, 'B');
       } elseif ($ifile_size < 1048576) {
           return array(round($ifile_size / 1024, 2),'KiB');
       } elseif ($ifile_size < 1073741824) {
           return array(round($ifile_size / 1048576, 2),'MiB');
       } elseif ($ifile_size < 1099511627776) {
           return array(round($ifile_size / 1073741824, 2), 'GiB');
       } elseif ($ifile_size < 1125899906842624) {
           return array(round($ifile_size / 1099511627776, 2),'TiB');
       } elseif ($ifile_size < 1152921504606846976) {
           return array(round($ifile_size / 1125899906842624, 2),'PiB');
       } elseif ($ifile_size < 1180591620717411303424) {
           return array(round($ifile_size / 1152921504606846976, 2),'EiB');
       } elseif ($ifile_size < 1208925819614629174706176) {
           return array(round($ifile_size / 1180591620717411303424, 2),'ZiB');
       } else {
           return array(round($ifile_size / 1208925819614629174706176, 2),'YiB');
       }
   }

	public function ssp_filter($request,$columns)
	{
		$columnFilter = array();
		$dtColumns = $this->ssp_pluck( $columns, 'dt' );
		if ( isset($request['search']) && $request['search']['value'] != '' ) {
			$str = $request['search']['value'];
			for ( $i=0, $ien=count($request['columns']) ; $i<$ien ; $i++ ) {
				$requestColumn = $request['columns'][$i];
				$columnIdx = array_search( $requestColumn['data'], $dtColumns );
				$column = $columns[ $columnIdx ];
				if ( $requestColumn['searchable'] == 'true' ) {
					$columnFilter[] = $column['db'];
				}
			}
			return $columnFilter;
		}
	}
   
   public function ssp_pluck ( $a, $prop )
	{
		$out = array();
		for ( $i=0, $len=count($a) ; $i<$len ; $i++ ) {
			$out[] = $a[$i][$prop];
		}
		return $out;
	}
   
   public function ssp_order ( $request, $columns )
	{
		// $order = ar;
		if ( isset($request['order']) && count($request['order']) ) {
			$orderBy = array();
			$dtColumns = $this->ssp_pluck( $columns, 'dt' );
			for ( $i=0, $ien=count($request['order']) ; $i<$ien ; $i++ ) {
				//Convert the column index into the column data property
				$columnIdx = intval($request['order'][$i]['column']);
				$requestColumn = $request['columns'][$columnIdx];
				$columnIdx = array_search( $requestColumn['data'], $dtColumns );
				$column = $columns[ $columnIdx ];
				if ( $requestColumn['orderable'] == 'true' ) {
					$dir = $request['order'][$i]['dir'] === 'asc' ?
						'ASC' :
						'DESC';
					$orderBy[] = array($column['db'],$dir);
				}
			}
			return $orderBy;
		}
		// return $order;
	}
   
   public function ssp_data_output ( $columns, $data )
	{
		$out = array();
		for ( $i=0, $ien=count($data) ; $i<$ien ; $i++ ) {
			$row = array();
			for ( $j=0, $jen=count($columns) ; $j<$jen ; $j++ ) {
				$column = $columns[$j];
				// Is there a formatter?
				if ( isset( $column['formatter'] ) ) {
					$row[ $column['dt'] ] = $column['formatter']( $data[$i][ $column['db'] ], $data[$i] );
				}
				else {
					$row[ $column['dt'] ] = $data[$i][ $columns[$j]['db'] ];
				}
			}
			$out[] = $row;
		}
		return $out;
	}
	
	public function ssp_data_format($draw,$total,$filtered,$data,$columns)
	{
		return array(
			"draw"            => $draw,
			"recordsTotal"    => $total,
			"recordsFiltered" => $filtered,
			"data"            => $this->ssp_data_output($columns, $data )
		);
	}

	public function get_tracker_status_label($tracker_status = null){
		$label = '';
		switch($tracker_status){
			case 'PENDING' :
			$label = '<span class="label label-warning">PENDING</span>';
			break;
			case 'ON-TIME' :
			$label = '<span class="label label-success">ON-TIME</span>';
			break;
			case 'LATE' :
			$label = '<span class="label label-danger">LATE</span>';
			break;
			default:
			$label = '<span class="label">N/A</span>';
			break;
		}
		return $label;
	}

	public function getFieldTemplate($name, $label, $value, $type, $col_width = 12, $options=null, $placeholder="", $dragndrop = false, $order = null){
		$html = '';
		$drag_func_str = $dragndrop? 'draggable="true" ondragstart="drag(event)" id="drag_'.$name.'" data-order="'.$order.'"' : '';
		$drop_func_str = $dragndrop? 'ondrop="drop(event)" ondragover="allowDrop(event)" id="drop_'.$name.'" data-order="'.$order.'"':'';
		if($type == 'input_hidden' || $type == 'input_hidden_generated'){
			$html .= '<input type="hidden" name="'.$name.'" value="">';
		}else{
			if($type != 'form_group_title'){
				$html .= '<div class="col-sm-'.$col_width.' mb-10" '.$drop_func_str.'>';
			}else{
				$html .= '<div class="col-sm-'.$col_width.' mb-20"  data-order="'.$order.'"'.' id="drop_'.$name.'">';
			}

			switch($type) {
				case 'input_text':
					$html .= '<label class="control-label" '.$drag_func_str.'>'.$label.'</label>';
					$html .= '<input type="text" class="form-control" value="'.$value.'" name="'.$name.'" placeholder="'.$placeholder.'" id="'.$name.'">';
				break;
				case 'input_date':
					$html .= '<div class="input-date-group">
                    			<label class="control-label" '.$drag_func_str.'>'.$label.'</label>
		                        	<div class="input-group date">
		                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" name="'.$name.'" class="form-control" value="'.$value.'" id="'.$name.'" placeholder="'.$placeholder.'">
		                        	</div>
                    			</div>';
				break;
				case 'input_clock':
					$html .= '<label class="control-label" '.$drag_func_str.'>'.$label.'</label>
							<div class="input-group clockpicker" data-autoclose="true">
								<span class="input-group-addon">
                                    <span class="fa fa-clock-o"></span>
                                </span>
                                <input type="text" class="form-control" placeholder="'.$placeholder.'" name="'.$name.'" value="'.$value.'" id="'.$name.'">
                            </div>';
				break;
				case 'input_password':
					$value = '';
					$html .= '<label class="control-label" '.$drag_func_str.'>'.$label.'</label>';
					$html .= '<input type="password" class="form-control" value="'.$value.'" name="'.$name.'" id="'.$name.'">';
				break;
				case 'textarea':
					$html .= '<label class="control-label" '.$drag_func_str.'>'.$label.'</label>';
					$html .= '<textarea name="'.$name.'" id="'.$name.'" rows="4" style="resize: vertical; width:100%;" placeholder="'.$placeholder.'">'.$value.'</textarea>';
				break;
				case 'select_box':
					$html .= '<label class="control-label" '.$drag_func_str.'>'.$label.'</label>';
					$html .= '<select class="form-control" name="'.$name.'" id="'.$name.'">';
					if($options == ''){
						$html .= '<option value=""></option>';
					}else{
						$html .= '<option value=""></option>';
						$options = explode(',', rtrim($options,','));
						foreach($options as $option){
							$opt = explode('|', $option);
							if($opt[0] == $value){
								$html .= '<option value="'.$opt[0].'" selected>'.$opt[1].'</option>';
							}else{
								$html .= '<option value="'.$opt[0].'">'.$opt[1].'</option>';
							}
						}
					}
					$html .= '</select>';
				break;
				case 'checkbox':
					if($options != ''){
						$options = explode(',', rtrim($options,','));
						$html .= '<div class="form-group">';
						$html .= '<label class="col-sm-2 control-label" '.$drag_func_str.'>'.$label.'</label>';
						$html .= '<div class="col-sm-10 checkbox-wrap">';
						$i = 0;
						foreach($options as $option){
							$opt = explode('|', $option);
							$values = explode(',', $value);
							$html .= '<div class="checkbox checkbox-info checkbox-inline">';
							if(in_array($opt[0], $values)){
	                        	$html .= '<input type="checkbox" id="'.$name.'_'.$i.'" value="'.$opt[0].'" name="'.$name.'[]" checked>';   
	                        }else{
	                        	$html .= '<input type="checkbox" id="'.$name.'_'.$i.'" value="'.$opt[0].'" name="'.$name.'[]">';  
	                        }         
	                        $html .= '<label for="'.$name.'_'.$i.'">'.$opt[1].'</label>
	                                </div>';
	                        $i++;
						}
						$html .= '</div>';
						$html .= '</div>';
					}
					
				break;
				case 'radio':
	                
					if($options != ''){
						$options = explode(',', rtrim($options,','));
						$html .= '<div class="form-group">';
						$html .= '<label class="col-sm-2 control-label" '.$drag_func_str.'>'.$label.'</label>';
						$html .= '<div class="col-sm-10 checkbox-wrap">';
						$i = 0;
						foreach($options as $option){
							$opt = explode('|', $option);
							$html .= '<div class="radio radio-info radio-inline">';
							if($opt[0] == $value){
							$html .= '<input type="radio" id="'.$name.'_'.$i.'" value="'.$opt[0].'" name="'.$name.'" checked>';
							}else{
							$html .= '<input type="radio" id="'.$name.'_'.$i.'" value="'.$opt[0].'" name="'.$name.'">';	
							}
							$html .= '<label for="'.$name.'_'.$i.'">'.$opt[1].'</label></div>';
							$i++;
						}
						$html .= '</div>';
						$html .= '</div>';
					}
				break;
				case 'form_group_title':
					$html .= '<div class="row">';
					$html .= '<h3 class="m-t-none m-b col-sm-12 log-form-form-group-title" >'.$label.'</h3>';
					$html .= '</div>';
				break;
			}
			$html .= '</div>';
		}
		return $html;
	}

	public function getTimeFormat($overbreak_time){
		$time = ltrim($overbreak_time , ' ');
		$time = ltrim($overbreak_time , ':');
		$time_arr = explode(':', $time);
		if(count($time_arr) > 2){
			$time = $time_arr[0].':'.$time_arr[1].':'.$time_arr[2];
		}else if(count($time_arr) == 2){
			$time = '00:'.$time; 
		}else{
			$time = '00:00:'.$time_arr[0];
		}
		return $time;
	}

	public function date_string_dhms($time){
	
		$time = explode(':', $time);
		$timestr = '';
		if(intval($time[0]) > 0){
			$timestr .= $time[0] .'h ';
		}
		if(intval($time[1]) > 0){
			$timestr .= $time[1] .'m ';
		}
		if(intval($time[2]) > 0){
			$timestr .= $time[2] .'s ';
		}

		if(intval($time[0]) == 0 && intval($time[1]) == 0 && intval($time[2]) == 0 ){
			$timestr = '0';
		}
		return $timestr;
	}
}