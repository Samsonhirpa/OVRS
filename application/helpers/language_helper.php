<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2008 - 2011, EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */
if(! function_exists('lang'))
{

}
function lang($line,$for='',$attributes=array())
{
	$line = get_instance()->lang->line($line);
	if($for !== '')
	{
		$line '<lable for="'.$for.'"'._stringify_attributes($attributes).'>'.$line.'</lable>';
	}
	return $line;

}
