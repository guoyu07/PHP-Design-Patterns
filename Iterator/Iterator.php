<?php
class sample implements Iterator {
    
    private $_items ;
 
    public function __construct(&$data) {
        $this->_items = $data;
    }
    public function current() {
        return current($this->_items);
    }
 
    public function next() {
        next($this->_items);   
    }
 
    public function key() {
        return key($this->_items);
    }
 
    public function rewind() {
        reset($this->_items);
    }
 
    public function valid() {                                                                              
        return ($this->current() !== FALSE);
    }
}
 
// client
$data = array(1, 2, 3, 4, 5);
$sa = new sample($data);
foreach ($sa AS $key => $row) {
    echo $key, ' ', $row, '<br />';
}