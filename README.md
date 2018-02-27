# LaraPress - Wordpress Plugin Boilerplate in laravel 5.5.* flavour.

![](https://i.imgur.com/Xfxbbkc.png)

![](https://img.shields.io/badge/stable-v1.1-brightgreen.svg) ![](https://img.shields.io/badge/license-MIT-%2346897A.svg)

# Requirements

- PHP >=7.0
- WORDPRESS >= 4.x.x

# Installation

```
composer create-project yhshanto/larapress plugin-name
```

After install larapress project open plugin-name.php file and edit following as your need.

```
/*
 * Plugin Name:       Your Plugin name
 * Plugin URI:        your-plugin-url
 * Description:       This is a short description
 * Version:           1.0.0
 * Author:            Plugin Author
 * Author URI:        Author Url
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       Text Domain
*/
```

# Usage

### Database

To Use **Wordpress Database** like **Laravel Eloquent** Style, First Create A class in plugin directory which extend **Illuminate\Database\Eloquent\Model** Class.

Example **plugin/Post.php**

    <?php
    
    namespace Plugin;
    
    use Illuminate\Database\Eloquent\Model;
    
    class Post extends Model
    {
        //
    }

You Can Use It Like **Plugin\Post::all()** Which return all post from wordpress database.

To learn More about Laravel Eloquent. [Go To Doc](https://laravel.com/docs/5.5/eloquent "Go To Doc")

### Blade View

**LaraPress** also include **Laravel Blade Template Engine** To Compile And Render View.

All view file must be store in **resources/views** folder.

Example: **resources/views/welcome.blade.php**

    <h1>
    	{{ $heading }}
    </h1>
    
    <p>
    	{!! $description !!}
    </p>

You Can Use This View By view( $view, $data = array(), $return = false ) function.

Example: Echo This View
```php
$data['heading'] = 'Larapress';
$data['description'] = 'Write Something Here';

view('welcome', $data);
```
Or To return

```php
$data['heading'] = 'Larapress';
$data['description'] = 'Write Something Here';

$view = view('welcome', $data, true);
```
To learn More about **Laravel Blade Template Engine**. [Go To Doc](https://laravel.com/docs/5.5/blade "Go To Doc")

### Wordpress Action Hook

Wordpress makes life easier by its hooking functionality. LaraPress brings a more easier and formatted way to working with wordpress action and filter hook.

In Larapress you can create special Hook class that uses for hooking.

All hooks class must be store in plugin/Hooks folder.

A Hook Example: **plugin/Hooks/Auto.php**

```php
<?php
namespace Plugin\Hooks;

class Auto extends Hook
{
	
	function boot()
	{

		$this->loader->add_filter('the_title', 'title');

	}

	function title($title)

	{

		return 'LaraPress';

	}
}
```
After Creating A New Hook class You Must Add it with **$hooks** array which located in **config/plugin.php**

Example: **config/plugin.php $hooks Array**

```php
$hooks = array(
	'Auto'
);
```
The $loader property of all hook class is a object of **Plugin\Lpress\Loader** Class. Which have two function for hooking. Functions - 

```php
add_action( $hook, $callback, $priority = 10, $accepted_args = 1 )
```

```php
add_filter( $hook, $callback, $priority = 10, $accepted_args = 1 )
```