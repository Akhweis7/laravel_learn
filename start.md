# Laravel Commands

## PHP & Composer
php -v
composer -v

## Laravel Project
composer create-project laravel/laravel my-app
php artisan serve
php artisan key:generate

## Database
php artisan migrate
php artisan migrate:rollback

## Make Commands
php artisan make:migration create_products_table
php artisan make:migration add_stock_to_products_table
php artisan make:migration create_orders_table
php artisan make:model Product
php artisan make:model Order
php artisan make:middleware CheckAge

## Tinker
php artisan tinker

### Inside Tinker
Schema::getColumnListing('products');

# Create a product
$p = new App\Models\Product(); $p->name = 'Phone'; $p->description = 'A smartphone'; $p->price = 999.99; $p->stock = 10; $p->save();

# Create a user
$u = new App\Models\User(); $u->name = 'Amro'; $u->email = 'amro@test.com'; $u->password = bcrypt('123456'); $u->save();

# Create an order
$o = new App\Models\Order(); $o->user_id = 1; $o->total = 999.99; $o->status = 'pending'; $o->save();

# Eloquent
App\Models\Product::all();
App\Models\Product::find(1);
App\Models\Product::first();
App\Models\Product::where('price', '>', 500)->get();

# Relationships
$u = App\Models\User::find(1); $u->orders;
$o = App\Models\Order::find(1); $o->user;

# Update
$p = App\Models\Product::find(1); $p->name = 'iPhone'; $p->save();

# Delete
$p = App\Models\Product::find(1); $p->delete();