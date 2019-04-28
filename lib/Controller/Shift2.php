<?php

namespace MyApp\Controller;

class Shift2 {
    
    public $prev;
    public $next;
    public $yearMonth;
    private $_thisMonth;
    public $_today;
    public $_weekStart;
    public $_weekEnd;
//    private $_week;
    
    
    public function __construct() {
        
        try{
            if(!isset($_GET['t']) || !preg_match('/\A\d{4}-\d{2}-d{2}\z/', $_GET['t'])) {
                throw new \Exception();
            } 
            
            $this->_today = new \DateTime($_GET['t']);
            
        } catch(\Exception $e) {
            $this->_today = new \DateTime('today');
//            $this->_today = time();
//            echo(date('Y/m/d H:i:s'));
        }
        
        $this->_weekStart = $this->_getWeekStart();
        $this->_weekStart = $this->_getWeekEnd();
        
        $this->prev = $this->_createPrevLink();
        $this->next = $this->_createNextLink();
        
        $this->yearMonth = $this->_today->format('F Y');
    }
    
    private function _createPrevLink() {
        
        $clone = clone $this->_today;
        return $clone->modify('-7 days')->format('Y-m-d');
        
        return $prevLink;
        
    }
    
    private function _createNextLink() {
        
        $clone = clone $this->_today;
        return $clone->modify('+7 days')->format('Y-m-d');
        
        return $nextLink;
        
    }
    
    private function _getWeekStart() {
        
        $clone = clone $this->_today;
        return $clone->modify('-' . $this->_today->format('w') . 'days')->format('Y-m-d');
        
//        $weekStart = new \DateTime($this->_today->format('Y-m-d') . '-' . $this->_today->format('w') . ' days');
//        return $weekStart;
        
    }
    
    private function _getWeekEnd() {
        
        $this->_weekEnd = new \DateTime('+' . (6 - ($this->_today->format('w'))) . 'days');
        return $this->_weekEnd;
        
    }
    
    public function show() {
        
        $body = $this->_getBody();
//        $head = $this->_getHead();
        
        $html = '<tr>' . $body . '</tr>';
        
        echo $html;
        
    }
    
    private function _getBody() {
        
        $body = '';
        
        $period = new \DatePeriod(
        
            new $this->_weekStart,
            new \DateInterval('P1D'),
            new $this->_weekEnd
        
        );
        
        $today = new \DateTime('today');
        
        foreach($period as $day) {
            
            $todayClass = $day->format('Y-m-d') === $today->format('Y-m-d') ? 'today' : '';
            
            $body .= sprintf('<td class="youbi_%d %s">%d</td>', $day->format('w'), $todayClass, $day->format('d'));
            
        }
        
        return $body;
        
    }
    
//    private function _getHead() {
//        
//        $head = '';
//        
//        $firstDayOfNextMonth = new \DateTime('first day of' . $this->yearMonth . '+1 month');
//        
//        while($firstDayOfNextMonth->format('w') > 0) {
//            
//            $head .= sprintf('<td class="gray">%d</td>', $firstDayOfNextMonth->format('d'));
//            
//            $firstDayOfNextMonth->add(new \DateInterval('P1D'));
//            
//        }
//        
//        return $head;
//        
//    }
    
}