<?
	class Model{
		private $attributes = [];
		public function __set($key, $value)
		{
			$this->attributes[$key] = $value;
		}
		public function __get($key)
		{
			if (array_key_exists($key, $this->attributes)) {
		        return $this->attributes[$key];
		    }
		    return null;
		}
	}
?>