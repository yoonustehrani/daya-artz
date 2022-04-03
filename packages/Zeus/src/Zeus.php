<?php

namespace Zeus;

use Exception;
use Zeus\Models\ModelType;
use Zeus\Traits\InteractWithModeltypes;
use Zeus\Traits\Routeable;
use Zeus\Traits\SchemaInitials;

class Zeus extends ZeusSchemaManager
{
    use SchemaInitials, Routeable, InteractWithModeltypes;
    // public $config;
    protected $input_types = [
        'number' => 'Number',
        'price' => 'Price',
        'text' => 'Line Text',
        'textarea' => 'Long Text',
        'email' => 'Email',
        'password' => 'Password',
        'slug' => 'Slug',
        // 'timezone', 'status' => ['draft' => 'custom classes','published' => ['custom', 'class'],]
        // 'badge', select with classes
        'date' => 'Date',
        'datetime' => 'Date & Time',
        'key-value' => 'JSON key-value',
        'richtext' => 'WYSIWYG Content',
        'json' => 'JSON',
        'select' => 'Select Option',
        'multi-select' => 'Multi Select Options',
        'checkbox' => 'Checkbox',
        'radio' => 'Radio Options',
        'file' => 'File Picker'
    ];
    protected $visibilities = ['browse', 'view', 'create', 'edit', 'trash'];
    protected $relationships = [
        'belongsTo',
        'belongsToMany',
        'hasOne',
        'hasMany'
    ];
    protected $required_types = ['create', 'edit', 'both'];
    public $extensions = [];
    public function __construct($config = null)
    {
        $default_extensions = [
            'photo_extension' => 'ZeusExtensions\UniquePhoto\PhotoExtension',
            'seoTool' => 'ZeusExtensions\SeoTool\SeoTool'
        ];
        foreach ($default_extensions as $key => $value) {
            $this->registerExtension($key, $value);
        }
        // $this->config = $config;
    }
    public function getDataTypes()
    {
        return $this->input_types;
    }
    public function getVisibilities()
    {
        return $this->visibilities;
    }
    public function getRequiredTypes()
    {
        return $this->required_types;
    }
    public function getDataTypeKeys()
    {
        return array_keys($this->input_types);
    }
    public function getModelTypes()
    {
        return \Cache::get('modeltypes', []);
    }
    public function getModelTypeById($id)
    {
        return $this->getModelTypes()->filter(fn($mt) => $mt->id === $id)->first();
    }
    public function getModelTypeBySlug($slug)
    {
        return ModelType::where('slug', $slug)->firstOrFail();
    }
    public function getModelTypeByModel($model_name)
    {
        return ModelType::where('model_class', $model_name);
        // return $this->getModelTypes()->firstWhere('model_class', $model_name);
    }
    public function getRelationTypes()
    {
        return $this->relationships;
    }
    public function linkTo($type, $slug, $params = [])
    {
        try {
            return route("zeus.$slug.$type", $params);
        } catch (\Exception $th) {
            return "";
        }
    }
    /**
     * @param string $model_class
     * @return Illuminate\Database\Eloquent\Model
     */
    public function getModel(string $model_class)
    {
        return app()->make($model_class);
    }
    public function registerExtension($name, $class)
    {
        $this->extensions[$name] = $class;
    }
    public function getExtensions()
    {
        return array_keys($this->extensions);
    }
    public function getExtension($name)
    {
        if (in_array($name, array_keys($this->extensions))) {
            return app()->make($this->extensions[$name]);
        }
        throw new Exception("extension does not exist");
    }
}