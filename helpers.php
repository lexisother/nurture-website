<?php
// TODO: Make it `view`. Have it read through a `views` folder, yadda yadda.
// <https://laravel.com/api/8.x/[Global_Namespace].html#function_view>
// <https://github.com/laravel/framework/blob/8.x/src/Illuminate/Foundation/helpers.php#L924>
function includeWithVariables($filePath, $variables = array(), $print = true)
{
  $output = NULL;
  if (file_exists($filePath)) {
    // Extract the variables to a local namespace
    extract($variables);

    // Start output buffering
    ob_start();

    // Include the template file
    include $filePath;

    // End buffering and return its contents
    $output = ob_get_clean();
  }
  if ($print) {
    print $output;
  }
  return $output;
};
