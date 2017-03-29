<?php 
class PropertyTemplateFinder extends DbFinder
{
	protected $class = 'PropertyTemplate';
	
	public function orderByProperty($order = 'asc')
	{
	return $this->orderBy('Property.Name', $order);
	}

}
