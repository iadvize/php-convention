# iAdvize PHP Style Guide

## <a name='TOC'>Table of Contents</a>

  1. [Files](#files)
  1. [Lines](#lines)
  1. [Keywords](#keywords)
  1. [Comments](#comments)
  1. [Variables](#variables)
  1. [Type casting](#type-casting)
  1. [Namespaces and use declarations](#namespaces-use)
  1. [String](#strings)
  1. [Arrays](#arrays)
  1. [Classes, Properties, and Methods](#classes)
  1. [Interfaces, Traits](#interfaces)
  1. [Function and Method Calls](#function-method-calls)
  1. [Control Structures](#control-structures)
  1. [Closures](#closures)
  1. [Best practices](#best-practices)

## <a name='files'>Files</a>

  - Use only `UTF-8 without BOM`.
  
  - Use only the Unix LF (linefeed) line ending.
  
  - All PHP files must end with a single blank line.

  - Use the long `<?php ?>` tags for non-views scripts.

```php
<?php

echo 'test';
```

  - Use the short-echo `<?= ?>` tags for view scripts.

```php
<title><?=∙$title;∙?></title>
```

  - The closing `?>` tag must be omitted from files containing only PHP.
  
  - Limit on line length limit must be `120 characters`.
  
  - File must contain only one statement of namespace.
  
  - Code must use `4 spaces` for indenting, not tabs.

## <a name='lines'>Lines</a>
 
  - Blank lines may be added to improve readability and to indicate related blocks of code.
  
```php
// nah
function foo()
{
    $foo = 'test';
    $foo = strtoupper($foo);
    return $foo;
}

// good
function bar()
{
    $foo = 'test';
    $foo = strtoupper($foo);

    return $foo;
}

```
  
  - There must not be more than one statement per line.

```php
// bad
$foo = substr(strtoupper('test'), 0, 1);

// good
$foo = 'test';
$foo = strtoupper($foo);
$foo = substr($foo, 0, 1);
```

## <a name='keywords'>Keywords</a>

  - All PHP keywords must be in lower case (Eg: `true`, `false`, `null`, etc.)

## <a name='namespaces-use'>Namespaces and use declarations</a>

  - Namespaces names must be delcared in `UpperCamelCase`.

```php
// bad
namespace Vendor\fooBar;

// bad
namespace Vendor\foo_bar;

// good
namespace Vendor\FooBar;
```

  - Namespaces declaration never begin by a backslash `Vendor\Space\Space`.
  
  - There must be one blank line before and after the `namepsace` declaration.
  
  - There must be one blank line after the block of `use` declaration.
  
  - `use` declaration must not separated by comma.
  
  - `use` block declarations must be grouped by package:
  
```php
// bad
use Foo\Bar,
    Qux\Quux,
    Foo\Baz;

// bad
use Foo\Bar;
use Qux\Quux;
use Foo\Baz;

// good
use Foo\Bar;
use Foo\Baz;
use Qux\Quux;
use Qux\Corge\Grault;
```

  - `use` alias declaration should be composed with sub-namespaces names.

```php
// bad
use Foo\Bar as Baz;

// bad
use Baz\Qux\Quux as BQQ;

// good
use Foo\Bar as FooBar;

// good
use Baz\Qux\Quux as BazQuxQuux;
```

## <a name='comments'>Comments</a>

### In-line code comments

  - Comments should be on a separate line immediately before the code line or block they reference.

```php
// bad
$foo = 'bar'; // Bar in foo

// good
// Foo assignment for example
$foo = 'bar';

// good
// Foo assignment
// for example
$foo = 'bar';
```

### Block code comments

  - You must add PHPDoc blocks for all classes, methods, and functions, but you can omit the `@return` tag if the method does not return anything.

```php
/**
 * Foo
 *
 * @package Vendor\Bar\Baz
 */
class Foo
{
    /**
     * The description of bar
     *
     * @param string $baz The baz
     * 
     * @return string The return of bar
     */    
    public function bar($baz)
    {
        // Returned value
        return 'Do something...';
    }
}
```

  - You must add PHPDoc blocks for all variable references.

```
/** @var Bar\Baz $foo Baz object */
$foo = $bar->baz();
```

```php
/**
 * Foo
 *
 * @package Vendor\Bar\Baz
 */
class Foo
{
    /** @var string $bar It's bar! */
    public $bar = '';
}
```

  - `@todo` and `@fixme` must be used in PHPDoc blocks like annotations.

```php
/** @todo Think to check value */
$foo = 'bar';

/** @fixme Change qux to quux */
$baz = 'qux';
```

## <a name='variables'>Variables</a>

### User variables

  - Variables should be in `lowerCamelCase`.

```php
// bad
$_foo='';

// bad
$foo_bar = '';

// bad
$fooBar='';

// good
$fooBar∙=∙'';
```

  - You must set off operators with spaces.

```php
// bad
$foo = (5+6)/5;

// good
$foo∙=∙(5∙+∙6)∙/∙5;
```

  - You must conserve a great alignment.

```php
// bad
$foo = 'Ba';
$foo .= 'r';
$quux = 'Qu';
$quux .= 'x';

// good
$foo   = 'Ba';
$foo  .= 'r';
$quux  = 'Qu';
$quux .= 'x';
```

```php
// bad
$fooBarBazQux->bar()->
    baz()->qux();

// good
$fooBarBazQux
∙∙∙∙->bar()
∙∙∙∙->baz()
∙∙∙∙->qux();
```

### Global variables

  - You must used `$_POST`, `$_GET` and `$_COOKIE` instead of `$_REQUEST`. If you use a framework, use `Request` component.

## <a name='strings'>Strings</a>

  - A string must be enclosed in single quotes `'hello'`.

  - A concatenated string must use single quotes `'foo' . $bar`

  - A concatenated string must use spaces around points `'foo' . $bar`

  - A string declaration in multiline must be aligned

```php
$foo = 'Bar'
      .'Baz'
      .'Qux';
```

  - A string must not concatenate with functions or methods

```php
// bad
$foo = ucfisrt('bar') . ' baz';

// good
$foo = ucfirst('bar');
$foo = $foo . ' baz';

// very good
$foo  = ucfirst('bar');
$foo .= ' baz';
```

## <a name='type-casting'>Type casting</a>

  - You must use `(int) $foo` instead of `intval($foo)`.

  - You must use `(bool) $foo` instead of `boolval($foo)`.

  - You must use `(float) $foo` instead of `floatval($foo)`.

  - You must use `(string) $foo` instead of `strval($foo)`.

## <a name='arrays'>Arrays</a>

  - Arrays with few data must be declared like this:

```php
$foo∙=∙['Bar',∙'Baz',∙'Qux'];
```
  
  - Arrays with lots of data must be declared like this:

```php
$foo = [
∙∙∙∙'bar'∙∙=>∙'abc',
∙∙∙∙'baz'∙∙=>∙123,
∙∙∙∙'qux'∙∙=>∙true,
∙∙∙∙'quux'∙=>∙[
∙∙∙∙∙∙∙∙'corge'∙∙=>∙[],
∙∙∙∙∙∙∙∙'grault'∙=>∙123.456,
∙∙∙∙],
];
```

  - For the arrays with lots of data, lines must be terminated by a comma. (Easy to copy/paste)

## <a name='classes'>Classes, Properties, and Methods</a>

### Classes

  - The `extends` and `implements` keywords should be declared on the same line as the class name.

  - The opening brace for the class must go on its own line; the closing brace for the class must go on the next line after the body.

```php
<?php

namespace Vendor\Foo;

class Foo extends Bar implements Baz, Qux, Quux
{
    // Do something...
}
```

  - Lists of implements may be split across multiple lines, where each subsequent line is indented once. When doing so, the first item in the list MUST be on the next line, and there MUST be only one interface per line.

```php
<?php

namespace Vendor\Foo;

class Foo extends Bar implements
∙∙∙∙Baz,
∙∙∙∙Qux,
∙∙∙∙Quux
{
    // Do something...
}
```

### Properties
  - Visibility must be declared on all properties.

```php
// bad
/** @var string $foo Property description */
$foo = '';

// good
/** @var string $foo Property description */
public $foo = '';
```

  - There must not be more than one property declared per statement.

```php
// bad
public $foo = '',
       $bar = '';

// good
/** @var string $foo Property description */
public $foo = '';

/** @var string $bar Property description */
protected $bar = '';
```

  - Property names must not be prefixed with a single underscore to indicate `protected` or `private` visibility.

```php
// bad
/** @var string $_bar Property description */
protected $_bar = '';

/** @var string $_baz Property description */
private $_baz = '';

// good
/** @var string $bar Property description */
protected $bar = '';

/** @var string $baz Property description */
private $baz = '';
```

  - When present, the `static` declaration must come after the visibility declaration.

```php
// bad
/** @var string $foo Property description */
static public $foo = '';

// good
/** @var string $foo Property description */
public static $foo = '';
```

### Methods
  - Visibility must be declared on all methods. (Eg: `public|protected|private foo()`)

  - Method names should not be prefixed with a single underscore to indicate protected or private visibility.

```php
// bad
protected function _foo()
{
    // Do something...
}

// good
protected function foo()
{
    // Do something...
}
```

  - Method names must not be declared with a space after the method name.

```php
// bad
public function foo∙()
{
    // Do something...
}

// good
public function foo()
{
    // Do something...
}
```

  - There must not be a space after the opening parenthesis, and there must not be a space before the closing parenthesis.

```php
// bad
public function foo()∙{∙
    // Do something...
∙}

// good
public function foo()
{
    // Do something...
}
```

  - The opening brace must go on its own line, and the closing brace must go on the next line following the body.

```php
// bad
public function foo()∙{
    // Do something...}

// good
public function foo()
{
    // Do something...
}
```
  - In the argument list, there must not be a space before each comma, and there must be one space after each comma.

```php
// bad
public function foo($bar∙,∙&$baz∙,∙$qux = [])
{
    // Do something...
}

// bad
public function foo(∙$bar, &$baz, $qux = []∙)
{
    // Do something...
}

// good
public function foo($bar,∙&$baz,∙$qux∙=∙[])
{
    // Do something...
}
```
  - Argument lists may be split across multiple lines, where each subsequent line is indented once.

  - When doing so, the first item in the list must be on the next line, and there must be only one argument per line.

   - When the argument list is split across multiple lines, the closing parenthesis and opening brace must be placed together on their own line with one space between them.

```php
// good
public function foo(
∙∙∙∙$bar,
∙∙∙∙&$baz,
∙∙∙∙$qux = []
) {
    // Do something...
}
```

  - When present, the `abstract` and `final` declarations must precede the visibility declaration.

  - When present, the `static` declaration must come after the visibility declaration.

```php
// bad
protected abstract function foo();

static public final function bar()
{
    // Do something...
}

// good
abstract protected function foo();

final public static function bar()
{
    // Do something...
}
```
## <a name='interfaces'>Interfaces, Traits</a>

### Interfaces
  - The interface name must be suffixed with `Interface`.


```php
<?php

namespace Vendor\Foo;

/**
 * Interface Foo
 * 
 * @package Vendor\Foo
 */
interface FooInterface
{
    /**
     * Set Foo
     *
     * @param string $foo
     */
    public function setFoo($foo);
}
```

### Traits
  - The trait name must be suffixed with `Trait`.


```php
<?php

namespace Vendor\Foo;

/**
 * Trait Foo
 *
 * @package Vendor\Foo
 */
trait FooTrait
{
    /** @var \Vendor\Bar */
    protected $bar;

    /**
     * Set Bar
     *
     * @param string $bar
     */
    public function setBar($bar)
    {
        $this->bar = $bar;
    }
}
```

## <a name='function-method-calls'>Function and Method Calls</a>

  - There must not be a space between the method or function name and the opening parenthesis.

```php
// bad
foo∙();
$bar->baz∙();

// good
foo();
$bar->baz();
```

  - There must not be a space after the opening parenthesis and there must not be a space before the closing parenthesis. In the argument list.

```php
// bad
foo(∙$qux∙);
$bar->baz(∙$qux∙);

// good
foo($qux);
$bar->baz($qux);
```

  - There must not be a space before each comma and there must be one space after each comma.

```php
// bad
foo($bar∙,∙$baz∙,∙$qux);

// good
foo($bar,∙$baz,∙$qux);
```

  - Argument lists may be split across multiple lines, where each subsequent line is indented once. When doing so, the first item in the list must be on the next line, and there must be only one argument per line.

```php
// bad
foo($longFoo,
    $longBar,
    $longBaz
);

// bad
foo($longFoo,
    $longBar,
    $longBaz);

// good
foo(
∙∙∙∙$longFoo,
∙∙∙∙$longBar,
∙∙∙∙$longBaz
);
```

  - When you pass an array as the only argument, the array brackets should be on the same lines as the method parenthesis.

```php
// bad
foo(
    [
        'foo' => 'bar',
    ]
);

// good
foo([
    'foo' => 'bar',
]);
```

## <a name='control-structures'>Control structures</a>

### General

  - There must be one space after the control structure keyword

  - There must not be a space after the opening parenthesis

  - There must not be a space before the closing parenthesis

  - There must be one space between the closing parenthesis and the opening brace

  - The structure body must be indented once

  - The closing brace must be on the next line after the body
  
  - The body of each structure must be enclosed by braces. This standardizes how the structures look, and reduces the likelihood of introducing errors as new lines get added to the body.

### `if`, `elseif`, `else`

- The keyword `elseif` should be used instead of `else if` so that all control keywords look like single words.

#### Example

```php
// bad
if(EXPRESSION){
   // Do something...
}

// bad
if (EXPRESSION) {
// Do something...
}

// bad
if (EXPRESSION)
{
    // Do something...
}

// bad
if (EXPRESSION) {
    // Do something...
}
else {
    // Do something...
}

// good
if∙(EXPRESSION)∙{
∙∙∙∙// Do something...
}∙elseif∙(OTHER_EXPRESSION)∙{
∙∙∙∙// Do something...
}∙else∙{
∙∙∙∙// Do something...
}
```

### Ternary (`?:`)

  - You should not use nesting ternary.

#### Example

```php
// bad
$foo = EXPRESSION ? 'bar' : OTHER_EXPRESSION ? 'baz' : 'qux';

// good
$foo∙=∙EXPRESSION∙?∙'bar'∙:∙'baz';

// good
$foo∙=∙EXPRESSION
∙∙∙∙?∙'bar'
∙∙∙∙:∙'baz';
```

### `switch` and `case`

  - The `case` statement must be indented once from `switch`, and the `break` keyword (or other terminating keyword) must be indented at the same level as the `case` body.
  
  - There must be a comment such as `// no break` when fall-through is intentional in a non-empty case body.
  
#### Example

```php
// bad
switch(EXPRESSION)
{
    case 0:
        // Do something...
    break;
}

// good
switch∙(EXPRESSION)∙{
∙∙∙∙case∙0:
∙∙∙∙∙∙∙∙// Do something...
∙∙∙∙∙∙∙∙break;
∙∙∙∙case∙1:
∙∙∙∙∙∙∙∙// Do something with no break...
∙∙∙∙∙∙∙∙// no break
∙∙∙∙case∙2:
∙∙∙∙case∙3:
∙∙∙∙case∙4:
∙∙∙∙∙∙∙∙// Do something with return instead of break...
∙∙∙∙∙∙∙∙return;
∙∙∙∙default:
∙∙∙∙∙∙∙∙// Do something in default case...
∙∙∙∙∙∙∙∙break;
}
```

### `while` and `do while`

#### Example

```php
// bad
while(EXPRESSION)
{
    // Do something...
}

// bad
do
{
    // Do something...
} while(EXPRESSION);

// good
while∙(EXPRESSION)∙{
∙∙∙∙// Do something...
}

// good
do∙{
∙∙∙∙// Do something...
}∙while∙(EXPRESSION);
```

### `for`

#### Example

```php
// bad
for( $i=0;$i<10;$i++ )
{
    // Do something...
}

// good
for∙($i∙=∙0;∙$i∙<∙10;∙$i++)∙{
∙∙∙∙// Do something...
}
```

### `foreach`

#### Example

```php
// bad
foreach( $foo as $key=>$value )
{
    // Do something...
}

// good
foreach∙($foo∙as∙$key∙=>∙$value)∙{
∙∙∙∙// Do something...
}
```
### `try` and `catch`

#### Example

```php
// bad
try
{
    // Do something...
}
catch(FooException $e)
{
    // Do something...
}

// good
try∙{
∙∙∙∙// Do something...
}∙catch∙(FooException∙$exception)∙{
∙∙∙∙// Do something...
}∙catch∙(BarException∙$exception)∙{
∙∙∙∙// Do something...
}∙finally∙{
∙∙∙∙// Do something...
}
```

## <a name='closures'>Closures</a>

  - Closures must be declared with a space after the function keyword, and a space before and after the use keyword.
  
  - The opening brace must go on the same line, and the closing brace MUST go on the next line following the body.
  
  - There must not be a space after the opening parenthesis of the argument list or variable list, and there must not be a space before the closing parenthesis of the argument list or variable list.
  
  - In the argument list and variable list, there must not be a space before each comma, and there must be one space after each comma.
  
  - Closure arguments with default values must go at the end of the argument list.

  - Argument lists and variable lists may be split across multiple lines, where each subsequent line is indented once.
  
  - When doing so, the first item in the list must be on the next line, and there must be only one argument or variable per line.
  
  - When the ending list (whether or arguments or variables) is split across multiple lines, the closing parenthesis and opening brace must be placed together on their own line with one space between them.
  
### Example (declaration)

```php
// good
$closureWithArguments∙=∙function∙($foo,∙$bar)∙{
∙∙∙∙// Do something...
};

// good
$closureWithArgumentsAndVariables∙=∙function∙($foo,∙$bar)∙use∙($baz,∙$qux)∙{
∙∙∙∙// Do something...
};

// good
$longArgumentsNoVariables∙=∙function∙(
∙∙∙∙$longArgumentFoo,
∙∙∙∙$longArgumentBar,
∙∙∙∙$longArgumentBaz
)∙{
∙∙∙∙// Do something...
};

// good
$noArgumentsLongVariables∙=∙function∙()∙use∙(
∙∙∙∙$longVariableFoo,
∙∙∙∙$longVariablBar,
∙∙∙∙$longVariableBaz
)∙{
∙∙∙∙// Do something...
};

// good
$longArgumentsLongVariables∙=∙function∙(
∙∙∙∙$longArgumentFoo,
∙∙∙∙$longArgumentBar,
∙∙∙∙$longArgumentBaz
)∙use∙(
∙∙∙∙$longVariableFoo,
∙∙∙∙$longVariableBar,
∙∙∙∙$longVariableBaz
)∙{
∙∙∙∙// Do something...
};

// good
$longArgumentsShortVariables∙=∙function∙(
∙∙∙∙$longArgumentFoo,
∙∙∙∙$longArgumentBar,
∙∙∙∙$longArgumentBaz
)∙use∙($variableFoo)∙{
∙∙∙∙// Do something...
};

// good
$shortArgumentsLongVariables∙=∙function∙($argumentFoo)∙use∙(
∙∙∙∙$longVariableFoo,
∙∙∙∙$longVariableBar,
∙∙∙∙$longVariableBaz
)∙{
∙∙∙∙// Do something...
};
```

### Example (usage)

```php
$foo->bar(
∙∙∙∙$argumentFoo,
∙∙∙∙function∙($argumentBar)∙use∙($variableFoo)∙{
∙∙∙∙∙∙∙∙// Do something...
∙∙∙∙},
∙∙∙∙$argumentBaz
);
```

## <a name='best-practices'>Best practices</a>

### Date

  - You must use `new \DateTime('2014-01-01 00:00:00')` instead of `date('2014-01-01 00:00:00')`.

  - You must use `new \DateTime('Sunday')` instead of `strtotime('Sunday')`.

### Readibility

  - When possible, avoid nestings of more than 2 levels and prefer "return early" structures.


```php
// bad
$response = [];
if ($foo) {
    foreach($foo->getBars() as $bar) {
        if ($bar->hasBaz()) {
            // 3 nested levels
        }
    }
}
return $response;


// good
$response = [];
if (!$foo) {
    return $response;
}

foreach($foo->getBars() as $bar) {
    if ($bar->hasBaz()) {
        // only 2 nested levels
    }
}
return $response;
```

  
