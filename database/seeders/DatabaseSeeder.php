<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'product']);
        Permission::create(['name' => 'allproduct']);
        Permission::create(['name' => 'kategori']);
        Permission::create(['name' => 'kecamatan']);
        Permission::create(['name' => 'tempat']);
        Permission::create(['name' => 'alluser']);
        Permission::create(['name' => 'permission']);

        $role1 = Role::create(['name' => 'admin']);
        $role1->givePermissionTo('product');
        $role1->givePermissionTo('allproduct');
        $role1->givePermissionTo('kategori');
        $role1->givePermissionTo('kecamatan');
        $role1->givePermissionTo('tempat');
        $role1->givePermissionTo('alluser');
        $role1->givePermissionTo('permission');

        $role2 = Role::create(['name' => 'pembeli']);

        $role3 = Role::create(['name' => 'penjual']);

        $superAdmin = User::create([
            'name' => 'Helmi Pradita',
            'username' => 'helmipradita',
            'email' => 'helmipradita@test.com',
            'password' => bcrypt('password123'),
        ]);
        $superAdmin->assignRole($role1);

        User::factory(3)->create();

        Category::create([
            'name' => 'Bayam',
            'slug' => 'bayam',
        ]);

        Category::create([
            'name' => 'Kangkung',
            'slug' => 'kangkung',
        ]);

        //Product::factory(20)->create();

        // Product::create([
        //     'title' => 'product ke satu',
        //     'category_id' => '1',
        //     'user_id' => '1',
        //     'slug' => 'product-ke-satu',
        //     'excerpt' => 'Lorem ke satu',
        //     'body' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Culpa fuga sed cupiditate similique! Enim, non error? Quidem tenetur voluptatum molestias esse quam impedit, minima iusto, magnam ut possimus officia ducimus culpa sapiente eum voluptas sed perferendis reprehenderit. Veniam cumque eum quibusdam fugiat pariatur obcaecati! Sequi aspernatur minima iste enim ex expedita, veniam alias laboriosam, dignissimos corporis ducimus consectetur nesciunt atque libero incidunt qui beatae quisquam obcaecati voluptatum magnam! Aperiam illo optio molestiae quam magni nobis corrupti nisi, accusantium blanditiis architecto deserunt quae provident neque distinctio vitae corporis voluptates similique vel dolorem, incidunt ipsum minima aut itaque. Ad reiciendis iusto esse.'
        // ]);

        // Product::create([
        //     'title' => 'product ke dua',
        //     'category_id' => '2',
        //     'user_id' => '1',
        //     'slug' => 'product-ke-dua',
        //     'excerpt' => 'Lorem ke dua',
        //     'body' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Culpa fuga sed cupiditate similique! Enim, non error? Quidem tenetur voluptatum molestias esse quam impedit, minima iusto, magnam ut possimus officia ducimus culpa sapiente eum voluptas sed perferendis reprehenderit. Veniam cumque eum quibusdam fugiat pariatur obcaecati! Sequi aspernatur minima iste enim ex expedita, veniam alias laboriosam, dignissimos corporis ducimus consectetur nesciunt atque libero incidunt qui beatae quisquam obcaecati voluptatum magnam! Aperiam illo optio molestiae quam magni nobis corrupti nisi, accusantium blanditiis architecto deserunt quae provident neque distinctio vitae corporis voluptates similique vel dolorem, incidunt ipsum minima aut itaque. Ad reiciendis iusto esse.'
        // ]);
    }
}
