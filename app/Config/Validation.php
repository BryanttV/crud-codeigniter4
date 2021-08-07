<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation
{
    //--------------------------------------------------------------------
    // Setup
    //--------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public $templates = [
        'list' => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    //--------------------------------------------------------------------
    // Rules
    //--------------------------------------------------------------------

    // Validacion para Personas
    public $person = [
        'name' => [
            'rules' => 'required|alpha_space|min_length[2]|max_length[30]',
            'errors' => [
                'required' => 'El campo de nombre no puede estar vacío',
                'alpha_space' => 'El campo de nombre solo debe contener letras o espacios',
            ],
        ],
        'lastname' => [
            'rules' => 'required|alpha_space|min_length[2]|max_length[30]',
            'errors' => [
                'required' => 'El campo de apellido no puede estar vacío',
                'alpha_space' => 'El campo de apellido solo debe contener letras o espacios',
            ],
        ],
        'age' => [
            'rules' => 'required|is_natural_no_zero',
            'errors' => [
                'required' => 'El campo de edad no puede estar vacío',
                'is_natural_no_zero' => 'El campo de edad no puede ser negativo',
            ],
        ],
        'photo' => [
            'rules' => 'max_size[photo, 512]|is_image[photo]',
            'errors' => [
                'max_size' => 'Tamaño de archivo excedido, no puede ser superior a 512 kb',
                'is_image' => 'El archivo debe ser una imagen con extensión .jpg, .jpeg o .png'
            ],
        ],
    ];
}
