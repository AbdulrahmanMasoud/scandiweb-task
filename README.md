## Get example
DB::table('products')->where('id', '>', '0')->get();

## First example
DB::table('products')->where('id', '>', '0')->first();
## Create exampel
 $x = DB::table('products')->create([
    'title'=>'hello title',
     'content'=>'hello content',
 ]);

## Delete example
 $x=DB::table('products')->delete('id', [20,21]);