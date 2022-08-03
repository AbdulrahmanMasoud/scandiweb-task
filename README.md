## Get example
```php
DB::table('products')->where('id', '>', '0')->get();
```
## First example
```php
DB::table('products')->where('id', '>', '0')->first();
```
## Create exampel
```php
 $x = DB::table('products')->create([
    'title'=>'hello title',
     'content'=>'hello content',
 ]);
```
## Delete example
 ```php
 $x = DB::table('products')->delete('id', [20,21]);
 ```
