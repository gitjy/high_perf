<?php
/**
* 迭代器
**/
class Arr implements Iterator
{
	/**
	* @var array internal data storage
	*/
	public $_d = ['A' => 'limi', 'B' => 'xiaoming'];
	private $_p = null;

	    /**
         * Rewind the DirectoryIterator back to the start
         * @link http://php.net/manual/en/directoryiterator.rewind.php
         * @return void 
         * @since 5.0
         */
        public function rewind () {
        	$this->_p = reset($this->_d);
        }

        /**
         * Check whether current DirectoryIterator position is a valid file
         * @link http://php.net/manual/en/directoryiterator.valid.php
         * @return bool true if the position is valid, otherwise false
         * @since 5.0
         */
        public function valid () {
        	return null !== $this->_p;
        }

        /**
         * Return the key for the current DirectoryIterator item
         * @link http://php.net/manual/en/directoryiterator.key.php
	 	 * @return string The key for the current <b>DirectoryIterator</b> item.
         * @since 5.0
         */
        public function key () {
        	$this->p = key($this->_d);
        	return key($this->_d);
        }

        /**
         * Return the current DirectoryIterator item.
         * @link http://php.net/manual/en/directoryiterator.current.php
	 * @return DirectoryIterator The current <b>DirectoryIterator</b> item.
         * @since 5.0
         */
        public function current () {
        	return current($this->_d);
        }

        /**
         * Move forward to next DirectoryIterator item
         * @link http://php.net/manual/en/directoryiterator.next.php
         * @return void 
         * @since 5.0
         */
        public function next () {
        	next($this->_d);
        	$k = key($this->_d);
        	$this->_p = $this->_p == $k ? null : $k;
        }
} 

$ite = new Arr();

foreach ($ite as $k => $v) {
	var_dump($k, $v);
}





























