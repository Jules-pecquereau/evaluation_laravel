<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Filename
    |--------------------------------------------------------------------------
    |
    | The default filename.
    |
    */

    'filename' => '_ide_helper.php',

    /*
    |--------------------------------------------------------------------------
    | Models filename
    |--------------------------------------------------------------------------
    |
    | The default filename for the models helper file.
    |
    */

    'models_filename' => '_ide_helper_models.php',

    /*
    |--------------------------------------------------------------------------
    | PhpStorm meta filename
    |--------------------------------------------------------------------------
    |
    | PhpStorm also supports the directory `.phpstorm.meta.php/` with arbitrary
    | files in it, should you need additional files for your project; e.g.
    | `.phpstorm.meta.php/laravel_ide_Helper.php'.
    |
    */
    'meta_filename' => '.phpstorm.meta.php',

    /*
    |--------------------------------------------------------------------------
    | Fluent helpers
    |--------------------------------------------------------------------------
    |
    | Set to true to generate commonly used Fluent methods.
    |
    */

    'include_fluent' => false,

    /*
    |--------------------------------------------------------------------------
    | Factory builders
    |--------------------------------------------------------------------------
    |
    | Set to true to generate factory generators for better factory()
    | method auto-completion.
    |
    | Deprecated for Laravel 8 or latest.
    |
    */

    'include_factory_builders' => false,

    /*
    |--------------------------------------------------------------------------
    | Write model magic methods
    |--------------------------------------------------------------------------
    |
    | Set to false to disable write magic methods of model.
    |
    */

    'write_model_magic_where' => true,

    /*
    |--------------------------------------------------------------------------
    | Write model external Eloquent builder methods
    |--------------------------------------------------------------------------
    |
    | Set to false to disable write external Eloquent builder methods.
    |
    */

    'write_model_external_builder_methods' => true,

    /*
    |--------------------------------------------------------------------------
    | Write model relation count and exists properties
    |--------------------------------------------------------------------------
    |
    | Set to false to disable writing of relation count and exists properties
    | to model DocBlocks.
    |
    */

    'write_model_relation_count_properties' => true,
    'write_model_relation_exists_properties' => false,

    /*
    |--------------------------------------------------------------------------
    | Write Eloquent model mixins
    |--------------------------------------------------------------------------
    |
    | This will add the necessary DocBlock mixins to the model class
    | contained in the Laravel framework. This helps the IDE with
    | auto-completion.
    |
    | Please be aware that this setting changes a file within the /vendor directory.
    |
    */

    'write_eloquent_model_mixins' => false,

    /*
    |--------------------------------------------------------------------------
    | Helper files to include
    |--------------------------------------------------------------------------
    |
    | Include helper files. By default not included, but can be toggled with the
    | -- helpers (-H) option. Extra helper files can be included.
    |
    */

    'include_helpers' => false,

    'helper_files' => [
        base_path().'/vendor/laravel/framework/src/Illuminate/Support/helpers.php',
        base_path().'/vendor/laravel/framework/src/Illuminate/Foundation/helpers.php',
    ],

    /*
    |--------------------------------------------------------------------------
    | Model locations to include
    |--------------------------------------------------------------------------
    |
    | Define in which directories the ide-helper:models command should look
    | for models.
    |
    | glob patterns are supported to easier reach models in sub-directories,
    | e.g. `app/Services/* /Models` (without the space).
    |
    */

    'model_locations' => [
        'app',
    ],

    /*
    |--------------------------------------------------------------------------
    | Models to ignore
    |--------------------------------------------------------------------------
    |
    | Define which models should be ignored.
    |
    */

    'ignored_models' => [
        // App\MyModel::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Models hooks
    |--------------------------------------------------------------------------
    |
    | Define which hook classes you want to run for models to add custom information.
    |
    | Hooks should implement Barryvdh\LaravelIdeHelper\Contracts\ModelHookInterface.
    |
    */

    'model_hooks' => [
        // App\Support\IdeHelper\MyModelHook::class
    ],

    /*
    |--------------------------------------------------------------------------
    | Extra classes
    |--------------------------------------------------------------------------
    |
    | These implementations are not really extended, but called with magic functions.
    |
    */

    'extra' => [
        'Eloquent' => ['Illuminate\Database\Eloquent\Builder', 'Illuminate\Database\Query\Builder'],
        'Session' => ['Illuminate\Session\Store'],
    ],

    'magic' => [],

    /*
    |--------------------------------------------------------------------------
    | Interface implementations
    |--------------------------------------------------------------------------
    |
    | These interfaces will be replaced with the implementing class. Some interfaces
    | are detected by the helpers, others can be listed below.
    |
    */

    'interfaces' => [
        // App\MyInterface::class => App\MyImplementation::class,
    ],

    'model_camel_case_properties' => false,

    'type_overrides' => [
        'integer' => 'int',
        'boolean' => 'bool',
    ],

    'include_class_docblocks' => false,

    'force_fqn' => false,

    'use_generics_annotations' => true,

    'macro_default_return_types' => [
        Illuminate\Http\Client\Factory::class => Illuminate\Http\Client\PendingRequest::class,
    ],

    'additional_relation_types' => [],
    'additional_relation_return_types' => [],

    'enforce_nullable_relationships' => true,

    'post_migrate' => [
        // 'ide-helper:models --nowrite',
    ],

];
