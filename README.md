We access `localhost/example`, app submit queries that is below.
```log
[2023-11-05 06:27:24] local.DEBUG: 4.50 ms, SQL: insert into `query_builder_boot_examples` (`name`, `model_boot_saving`, `updated_at`, `created_at`) values ('test', 'wrote it!!', '2023-11-05 06:27:24', '2023-11-05 06:27:24');  
[2023-11-05 06:27:24] local.DEBUG: 0.93 ms, SQL: insert into `query_builder_boot_examples` (`name`) values ('test');  
[2023-11-05 06:27:24] local.DEBUG: 0.21 ms, SQL: select * from `query_builder_boot_examples`;  
```

With the assumption that QueryBuilderBootExampleModel overrides `boot()` method that is below.
```php
    protected static function boot()
    {
        parent::boot();
        self::saving(function ($model) {
            $model->model_boot_saving = 'wrote it!!';
        });
    }
```

That method injects a value to `model_boot_saving` column when saving a model.

In controller, executed code is below.
```php
    public function __invoke()
    {
        QueryBuilderBootExample::create([
            'name' => 'test',
        ]);

        DB::table('query_builder_boot_examples')->insert([
            'name' => 'test',
        ]);
        return response()->json([
            'queryBuilderBootExample' => QueryBuilderBootExample::all(),
        ]);
    }
```

From the above code and the log, we can see that `saving()` method is executed when instantiating the Model, but not when using QueryBuilder.
