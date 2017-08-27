<?php
/**
 * Created by PhpStorm.
 * User: vetal
 * Date: 05.07.16
 * Time: 17:32
 */

namespace app\models\elasticsearch\node;


use yii\elasticsearch\ActiveRecord;

class ElasticNode extends ActiveRecord {

    public function attributes(){

        return [
            'id',
            'title',
            'preview_text',
            'detail_text',
            'url'
        ];
    }

    public static function index(){
        return 'nodes';
    }

    public static function type(){
        return 'node';
    }

    public static function mapping()
    {
        return [
            static::type() => [
                'properties' => [
                    'title'         => [
                        'type' => 'string',
                        'analyzer' => 'russian'
                    ],
                    'preview_text'  => [
                        'type' => 'string',
                        'analyzer' => 'russian'
                    ],
                    'detail_text'   => ['type' => 'string'],
                    'url'   => ['type' => 'string'],
                ]
            ],
        ];
    }


    public static function settings(){

        return [
            static::type() =>[
                'analysis' => [
                    'filter' => [
                        [
                            'russian_stop' => [
                                'type' => 'stop',
                                'stopwords' => '_russian_'
                            ],
                            'russian_keywords' => [
                                'type' => 'keyword_marker',
                                'keywords' => []
                            ],
                            'russian_stemmer' => [
                                'type' => 'stemmer',
                                'language' => 'russian'
                            ],
                        ]
                    ],
                    'analyzer' => [
                        'russian' => [
                            'tokenizer' => 'standard',
                            'filter' => [
                                'lowercase',
                                'russian_stop',
                                'russian_keywords',
                                'russian_stemmer'
                            ],
                            'char_filter' => ['html_strip']
                        ]
                    ]
                ]
            ]
        ];
    }

    /**
     * Set (update) mappings for this model
     */
    public static function updateMapping()
    {
        $db = static::getDb();
        $command = $db->createCommand();
        $command->setMapping(static::index(), static::type(), static::mapping());
    }

    /**
     * Create this model's index
     */
    public static function createIndex()
    {
        $db = static::getDb();
        $command = $db->createCommand();
        $command->createIndex(static::index(), [
            'settings' => static::settings(),
            'mappings' => static::mapping(),
            //'warmers' => [ /* ... */ ],
            //'aliases' => [ /* ... */ ],
            //'creation_date' => '...'
        ]);
    }

    /**
     * Delete this model's index
     */
    public static function deleteIndex()
    {
        $db = static::getDb();
        $command = $db->createCommand();
        $command->deleteIndex(static::index(), static::type());
    }
} 