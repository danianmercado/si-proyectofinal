<?php

use Caffeinated\Shinobi\Models\Permission;
use Caffeinated\Shinobi\Models\Role;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('personal')->insert([
          'id' => '1',
          'ci' => '1234567',
          'nombre' => 'admin',
          'paterno' => 'admin',
          'materno' => 'admin',
          'direccion' => 'direccion',
          'telefono' => '123123',
          'fecha_nacimiento' =>Carbon::parse('2000-01-01')
        ]);
        DB::table('users')->insert([
          'id' => '1',
          'email' => 'admin@gmail.com',
          'password' => bcrypt('123123'),
          'id_personal' => '1'
        ]);
        DB::table('administrativo')->insert([
          'id' => '1',
          'area' => 'administracion',
          'id_personal' => '1'
        ]);
   //////////////// ADMINISTRATIVO //////////////////////////////////////////////
        Permission::create([
          'name'        => 'Navegador de Adminisradores',
          'slug'        => 'admin.index',
          'description' => 'Lista y navega todos los administradores del sistema'
        ]);
        Permission::create([
            'name'        => 'Ver detalle del administrativo',
            'slug'        => 'admin.show',
            'description' => 'Muestra los detalle de un administrativo'
        ]);
        Permission::create([
            'name'        => 'Crear un administrativo nuevo',
            'slug'        => 'admin.create',
            'description' => 'Crea un nuevo administrativo'
        ]);
        Permission::create([
            'name'        => 'Editar un administrativo nuevo',
            'slug'        => 'admin.edit',
            'description' => 'Editar un nuevo administrativo'
        ]);
        Permission::create([
            'name'        => 'Elimina un administrativo nuevo',
            'slug'        => 'admin.delete',
            'description' => 'Elimina un nuevo administrativo'
        ]);
        //////////////// TRABAJADORES //////////////////////////////////////////////
        Permission::create([
            'name'        => 'Navegador de trabajadores',
            'slug'        => 'trabajador.index',
            'description' => 'Lista y navega todos los trabajadores del sistema'
        ]);

        Permission::create([
            'name'        => 'Ver detalle del trabajador',
            'slug'        => 'trabajador.show',
            'description' => 'Muestra los detalle de un trabajador'
        ]);

        Permission::create([
            'name'        => 'Crear un trabajador nuevo',
            'slug'        => 'trabajador.create',
            'description' => 'Crea un nuevo trabajador'
        ]);

        Permission::create([
            'name'        => 'Editar un trabajador nuevo',
            'slug'        => 'trabajador.edit',
            'description' => 'Editar un trabajador nuevo'
        ]);

        Permission::create([
            'name'        => 'Elimina un trabajador nuevo',
            'slug'        => 'trabajador.delete',
            'description' => 'Elimina un nuevo trabajador'
        ]);

        //////////////// recepciones //////////////////////////////////////////////
        Permission::create([
            'name'        => 'Navegador de recepciones',
            'slug'        => 'recepcion.index',
            'description' => 'Lista y navega todos los recepciones del sistema'
        ]);

        Permission::create([
            'name'        => 'Ver detalle del recepcion',
            'slug'        => 'recepcion.show',
            'description' => 'Muestra los detalle de una recepcion'
        ]);

        Permission::create([
            'name'        => 'Crear una recepcion nuevo',
            'slug'        => 'recepcion.create',
            'description' => 'Crea una nuevo recepcion'
        ]);

        Permission::create([
            'name'        => 'Editar una recepcion nuevo',
            'slug'        => 'recepcion.edit',
            'description' => 'Editar una recepcion nuevo'
        ]);

        Permission::create([
            'name'        => 'Elimina una recepcion nuevo',
            'slug'        => 'recepcion.delete',
            'description' => 'Elimina una nuevo recepcion'
        ]);

        //////////////// clientes //////////////////////////////////////////////
        Permission::create([
            'name'        => 'Navegador de clientes',
            'slug'        => 'cliente.index',
            'description' => 'Lista y navega todos los clientes del sistema'
        ]);

        Permission::create([
            'name'        => 'Ver detalle del cliente',
            'slug'        => 'cliente.show',
            'description' => 'Muestra los detalle de un cliente'
        ]);

        Permission::create([
            'name'        => 'Crear un cliente nuevo',
            'slug'        => 'cliente.create',
            'description' => 'Crea un nuevo cliente'
        ]);

        Permission::create([
            'name'        => 'Editar un cliente nuevo',
            'slug'        => 'cliente.edit',
            'description' => 'Editar un cliente nuevo'
        ]);

        Permission::create([
            'name'        => 'Elimina un cliente nuevo',
            'slug'        => 'cliente.delete',
            'description' => 'Elimina un nuevo cliente'
        ]);

        //////////////// vehiculos //////////////////////////////////////////////
        Permission::create([
            'name'        => 'Navegador de vehiculos',
            'slug'        => 'vehiculo.index',
            'description' => 'Lista y navega todos los vehiculos del sistema'
        ]);

        Permission::create([
            'name'        => 'Ver detalle del vehiculo',
            'slug'        => 'vehiculo.show',
            'description' => 'Muestra los detalle de un vehiculo'
        ]);

        Permission::create([
            'name'        => 'Crear un vehiculo nuevo',
            'slug'        => 'vehiculo.create',
            'description' => 'Crea un nuevo vehiculo'
        ]);

        Permission::create([
            'name'        => 'Editar un vehiculo nuevo',
            'slug'        => 'vehiculo.edit',
            'description' => 'Editar un vehiculo nuevo'
        ]);

        Permission::create([
            'name'        => 'Elimina un vehiculo nuevo',
            'slug'        => 'vehiculo.delete',
            'description' => 'Elimina un nuevo vehiculo'
        ]);

        //////////////// diagnosticos //////////////////////////////////////////////
        Permission::create([
            'name'        => 'Navegador de diagnosticos',
            'slug'        => 'diagnostico.index',
            'description' => 'Lista y navega todos los diagnosticos del sistema'
        ]);

        Permission::create([
            'name'        => 'Ver detalle del diagnostico',
            'slug'        => 'diagnostico.show',
            'description' => 'Muestra los detalle de un diagnostico'
        ]);

        Permission::create([
            'name'        => 'Crear un diagnostico nuevo',
            'slug'        => 'diagnostico.create',
            'description' => 'Crea un nuevo diagnostico'
        ]);

        Permission::create([
            'name'        => 'Editar un diagnostico nuevo',
            'slug'        => 'diagnostico.edit',
            'description' => 'Editar un diagnostico nuevo'
        ]);

        Permission::create([
            'name'        => 'Elimina un diagnostico nuevo',
            'slug'        => 'diagnostico.delete',
            'description' => 'Elimina un nuevo diagnostico'
        ]);

        //////////////// servicios //////////////////////////////////////////////
        Permission::create([
            'name'        => 'Navegador de servicios',
            'slug'        => 'servicio.index',
            'description' => 'Lista y navega todos los servicios del sistema'
        ]);

        Permission::create([
            'name'        => 'Ver detalle del servicio',
            'slug'        => 'servicio.show',
            'description' => 'Muestra los detalle de un servicio'
        ]);

        Permission::create([
            'name'        => 'Crear un servicio nuevo',
            'slug'        => 'servicio.create',
            'description' => 'Crea un nuevo servicio'
        ]);

        Permission::create([
            'name'        => 'Editar un servicio nuevo',
            'slug'        => 'servicio.edit',
            'description' => 'Editar un servicio nuevo'
        ]);

        Permission::create([
            'name'        => 'Elimina un servicio nuevo',
            'slug'        => 'servicio.delete',
            'description' => 'Elimina un nuevo servicio'
        ]);

        //////////////// servicios tercerizados //////////////////////////////////////////////
        Permission::create([
            'name'        => 'Navegador de servicios tercerizados',
            'slug'        => 'servicio_tercerizado.index',
            'description' => 'Lista y navega todos los servicios tercerizados del sistema'
        ]);

        Permission::create([
            'name'        => 'Ver detalle del servicio tercerizado',
            'slug'        => 'servicio_tercerizado.show',
            'description' => 'Muestra los detalle de un servicio tercerizado'
        ]);

        Permission::create([
            'name'        => 'Crear un servicio tercerizado nuevo',
            'slug'        => 'servicio_tercerizado.create',
            'description' => 'Crea un nuevo servicio tercerizado'
        ]);

        Permission::create([
            'name'        => 'Editar un servicio tercerizado nuevo',
            'slug'        => 'servicio_tercerizado.edit',
            'description' => 'Editar un servicio tercerizado nuevo'
        ]);

        Permission::create([
            'name'        => 'Elimina un servicio tercerizado nuevo',
            'slug'        => 'servicio_tercerizado.delete',
            'description' => 'Elimina un nuevo servicio tercerizado'
        ]);



        //////////////// almacenes //////////////////////////////////////////////
        Permission::create([
            'name'        => 'Navegador de almacenes',
            'slug'        => 'almacen.index',
            'description' => 'Lista y navega todos los almacenes del sistema'
        ]);

        Permission::create([
            'name'        => 'Ver detalle del almacen',
            'slug'        => 'almacen.show',
            'description' => 'Muestra los detalle de un almacen'
        ]);

        Permission::create([
            'name'        => 'Crear un almacen nuevo',
            'slug'        => 'almacen.create',
            'description' => 'Crea un nuevo almacen'
        ]);

        Permission::create([
            'name'        => 'Editar un almacen nuevo',
            'slug'        => 'almacen.edit',
            'description' => 'Editar un almacen nuevo'
        ]);

        Permission::create([
            'name'        => 'Elimina un almacen nuevo',
            'slug'        => 'almacen.delete',
            'description' => 'Elimina un nuevo almacen'
        ]);

        //////////////// herramientas //////////////////////////////////////////////
        Permission::create([
            'name'        => 'Navegador de herramientas',
            'slug'        => 'herramienta.index',
            'description' => 'Lista y navega todos los herramientas del sistema'
        ]);

        Permission::create([
            'name'        => 'Ver detalle de la herramienta',
            'slug'        => 'herramienta.show',
            'description' => 'Muestra los detalle de una herramienta'
        ]);

        Permission::create([
            'name'        => 'Crear nueva herramienta ',
            'slug'        => 'herramienta.create',
            'description' => 'Crea una nueva herramienta'
        ]);

        Permission::create([
            'name'        => 'Editar una herramienta ',
            'slug'        => 'herramienta.edit',
            'description' => 'Editar una herramienta '
        ]);

        Permission::create([
            'name'        => 'Elimina una herramienta ',
            'slug'        => 'herramienta.delete',
            'description' => 'Elimina una nuevo herramienta'
        ]);

        //////////////// repuestos //////////////////////////////////////////////
        Permission::create([
            'name'        => 'Navegador de repuestos',
            'slug'        => 'repuesto.index',
            'description' => 'Lista y navega todos los repuestos del sistema'
        ]);

        Permission::create([
            'name'        => 'Ver detalle del repuesto',
            'slug'        => 'repuesto.show',
            'description' => 'Muestra los detalle de un repuesto'
        ]);

        Permission::create([
            'name'        => 'Crear un repuesto nuevo',
            'slug'        => 'repuesto.create',
            'description' => 'Crea un nuevo repuesto'
        ]);

        Permission::create([
            'name'        => 'Editar un repuesto nuevo',
            'slug'        => 'repuesto.edit',
            'description' => 'Editar un repuesto nuevo'
        ]);

        Permission::create([
            'name'        => 'Elimina un repuesto nuevo',
            'slug'        => 'repuesto.delete',
            'description' => 'Elimina un nuevo repuesto'
        ]);

        //////////////// DETALLE DE TRABAJO //////////////////////////////////////////////
        Permission::create([
            'name'        => 'Navegador de detalle de trabajo',
            'slug'        => 'detalle_trabajo.index',
            'description' => 'Lista y navega todos los detalles de trabajo'
        ]);

        Permission::create([
            'name'        => 'Ver detalle del detalle de trabajo',
            'slug'        => 'detalle_trabajo.show',
            'description' => 'Muestra los detalle de detalle de trabajo'
        ]);

        Permission::create([
            'name'        => 'Crear un detalle de trabajo nuevo',
            'slug'        => 'detalle_trabajo.create',
            'description' => 'Crea un nuevo detalle de trabajo'
        ]);

        Permission::create([
            'name'        => 'Editar un detalle de trabajo nuevo',
            'slug'        => 'detalle_trabajo.edit',
            'description' => 'Editar un detalle de trabajo nuevo'
        ]);

        Permission::create([
            'name'        => 'Elimina un detalle de trabajo nuevo',
            'slug'        => 'detalle_trabajo.delete',
            'description' => 'Elimina un nuevo detalle de repuesto'
        ]);

        //////////////// ORDEN DE TRABAJO //////////////////////////////////////////////
        Permission::create([
            'name'        => 'Navegador de orden de trabajo',
            'slug'        => 'orden_trabajo.index',
            'description' => 'Lista y navega todos las ordenes de trabajo'
        ]);

        Permission::create([
            'name'        => 'Ver detalle de la orden de trabajo',
            'slug'        => 'orden_trabajo.show',
            'description' => 'Muestra los detalle de la orden de trabajo'
        ]);

        Permission::create([
            'name'        => 'Crear un orden de trabajo nuevo',
            'slug'        => 'orden_trabajo.create',
            'description' => 'Crea un nuevo orden de trabajo'
        ]);

        Permission::create([
            'name'        => 'Editar una orden de trabajo nuevo',
            'slug'        => 'orden_trabajo.edit',
            'description' => 'Editar una orden de trabajo nuevo'
        ]);

        Permission::create([
            'name'        => 'Elimina una orden de trabajo nuevo',
            'slug'        => 'orden_trabajo.delete',
            'description' => 'Elimina una orden de trabajo'
        ]);



        Role::create([
          'name'    => 'Admin',
          'slug'    => 'admin',
          'special' => 'all-access'
        ]);

        Role::create([
            'name'    => 'Inactivo',
            'slug'    => 'inactivo',
            'special' => 'no-access'
        ]);
    }
}
