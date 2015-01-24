<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// ------------------------------------------------------------------------

/**
 * Get Filenames
 *
 * Reads the specified directory and builds an array containing the filenames.
 * Any sub-folders contained within the specified path are read as well.
 *
 * @access	public
 * @param	string	path to source
 * @param	bool	whether to include the path as part of the filename
 * @param	bool	internal variable to determine recursion status - do not use in calls
 * @return	array
 */
if ( ! function_exists('get_imagefiles_from_folder'))
{
	function get_imagefiles_from_folder($source_dir, $folder)
	{
		static $_filedata = array();

		if ($fp = @opendir($source_dir))
		{
			while (FALSE !== ($file = readdir($fp)))
			{
				if (@is_dir($source_dir.$file) && strncmp($file, '.', 1) !== 0)
				{	
				}
				elseif (strncmp($file, '.', 1) !== 0)
				{
					
					if($folder == substr($file, 0, strpos($file, '@'))){
						$_filedata[] = substr($file, strpos($file, '@')+1);
					}
				}
			}
			return $_filedata;
		}
		else
		{
			return FALSE;
		}
	}
}