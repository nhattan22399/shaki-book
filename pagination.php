<?php
include_once ('./modun/connect.php');
class Pagination{
    public $_config = array(
        'current_page' => 1,
        'total_record' =>1,
        'total_page' =>1,
        'limit' => 12,
        'start' => 0,
        'link_full' =>'?apge={page}&start={start}&limit={limit}',
        'link_first' =>'?limit={limit}',
    );

    function init($config = array())
    {
        foreach ($config as $key => $val){
            if (isset($this->_config[$key])){
                $this->_config[$key] = $val;
            }
        }
         
        if ($this->_config['limit'] < 0){
            $this->_config['limit'] = 0;
        }
        $limit = $this->_config['limit'];
        $this->_config['total_page'] = ceil($this->_config['total_record'] / $this->_config['limit']);
         
        if (!$this->_config['total_page']){
            $this->_config['total_page'] = 1;
        }
         
        if ($this->_config['current_page'] < 1){
            $this->_config['current_page'] = 1;
        }
         
        if ($this->_config['current_page'] > $this->_config['total_page']){
            $this->_config['current_page'] = $this->_config['total_page'];
        }
         
        $this->_config['start'] = ($this->_config['current_page'] - 1) * $this->_config['limit'];
        $start =(int)$this->_config['start'];
    }

    private function __link($page,$start,$limit)
    {
        if ($page <= 1 && $this->_config['link_first']){
            $this->_config['link_first'] = str_replace('{limit}', $limit, $this->_config['link_first']);
            return $this->_config['link_first'];
        }
        $this->_config['link_full'] = str_replace('{page}', $page, $this->_config['link_full']) ;
        $this->_config['link_full'] = str_replace('{start}', $start, $this->_config['link_full']);
        $this->_config['link_full'] = str_replace('{limit}', $limit, $this->_config['link_full']);
        return $this->_config['link_full'];
    }
     
    function html()
    {   
        $p = '';
        // Kiểm tra tổng số trang lớn hơn 1 mới phân trang
        if ($this->_config['total_record'] > $this->_config['limit'])
        {
            $p = '<ul class="page">';
             
            // Nút prev và first
            if ($this->_config['current_page'] > 1)
            {
                $p .= '<li><a href="'.$this->__link('1','0',$this->_config['limit']).'">First</a></li>';
                $p .= '<li><a href="'.$this->__link($this->_config['current_page']-1,($this->_config['start'] - $this->_config['limit']),$this->_config['limit']).'">Prev</a></li>';
            }
             
            // lặp trong khoảng cách giữa min và max để hiển thị các nút
            for ($i = 1; $i <= $this->_config['total_page']; $i++)
            {
                // Trang hiện tại
                if ($this->_config['current_page'] == $i){
                    $p .= '<li><span>'.$i.'</span></li>';
                }
                else{
                    $p .= '<li><a href="'.$this->__link($i,($i - 1) * $this->_config['limit'],$this->_config['limit']).'">'.$i.'</a></li>';
                }
            }
 
            // Nút last và next
            if ($this->_config['current_page'] < $this->_config['total_page'])
            {
                $p .= '<li><a href="'.$this->__link($this->_config['current_page'] + 1,($this->_config['start'] + $this->_config['limit']),$this->_config['limit']).'">Next</a></li>';
                $p .= '<li><a href="'.$this->__link($this->_config['total_page'],$this->_config['start'],$this->_config['limit']).'">Last</a></li>';
            }
             
            $p .= '</ul>';
        }
        return $p;
    }
}
$totalRecords = mysqli_query($conn, "SELECT * FROM `sach`");
$totalRecords = $totalRecords->num_rows;
$link =  $_SERVER['REQUEST_URI'];  




?>
 
<style>
   .page li{float:left; margin: 3px; border: solid 1px gray; list-style: none;}
   .page a{padding: 5px; text-decoration: none;}
    .page span{display:inline-block; padding: 0px 3px; background: blue; color:white }
</style>
