<?php namespace Layla\Module\Renderers;

use Bootsparks\Form;
use Bootsparks\HTML;

class Bootstrap extends Renderer {

	public function page_header($children)
	{
		return HTML::div(implode("\n", (array) $children), array('class' => 'page-header'));
	}

	public function float_right($children)
	{
		return $this->float('right', $children);
	}

	public function float_left($children)
	{
		return $this->float('left', $children);
	}

	protected function float($float, $children)
	{
		return HTML::div(implode("\n", (array) $children), array('class' => 'pull-right'));
	}

	public function title($title)
	{
		return HTML::h1($title);
	}

	public function search()
	{
		return
			Form::open('', 'GET').
				Form::text('q', null, array('placeholder' => 'Search')).
				Form::submit('go', array('class' => 'btn btn-primary')).
			Form::close();
	}

	public function form($children, $method = 'GET', $url = '')
	{
		return
			Form::open($url, strtoupper($method), array('class' => 'form-horizontal')).
				implode("\n", (array) $children).
			Form::close();
	}

	public function text($name, $label, $value = '')
	{
		return Form::field('text', $name, $label, array($value));
	}

	public function password($name, $label, $value = '')
	{
		return Form::field('password', $name, $label);
	}

	public function multiple($name, $label, $options, $selected = array())
	{
		return Form::field('select', $name, $label, array($options, $selected, array('multiple' => 'multiple')), array('error' => array()));
	}

	public function dropdown($name, $label, $options, $selected = array())
	{
		return Form::field('select', $name, $label, array($options, $selected));
	}

	public function actions($children)
	{
		return Form::actions((array) $children);
	}

	public function submit($text, $variant = '', $size = 'large')
	{
		return Form::submit($text, array('class' => 'btn'.($variant == '' ? '' : ' btn-'.$variant).' btn-'.$size));
	}

}