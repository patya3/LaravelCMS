<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Form;

class FormServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Form::component('text','components.form.text',['name','value' => null,'attributes' => array()]);
        Form::component('textarea','components.form.textarea',['name','value' => null,'attributes' => array()]);
        Form::component('submit','components.form.submit',['value' => 'Submit','attributes' => array()]);
        Form::component('file','components.form.file',['name','attributes' => array()]);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
