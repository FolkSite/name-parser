<?php

namespace TheIconic\NameParser\Mapper;

use TheIconic\NameParser\Part\Salutation;
use TheIconic\NameParser\Part\Firstname;
use TheIconic\NameParser\Part\Lastname;

class LastnameMapperTest extends AbstractMapperTest
{
    /**
     * @return array
     */
    public function provider()
    {
        return [
            [
                'input' => [
                    'Peter',
                    'Pan',
                ],
                'expectation' => [
                    'Peter',
                    new Lastname('Pan'),
                ],
            ],
            [
                'input' => [
                    new Salutation('Mr'),
                    'Peter',
                    'Pan',
                ],
                'expectation' => [
                    new Salutation('Mr'),
                    'Peter',
                    new Lastname('Pan'),
                ],
            ],
            [
                'input' => [
                    new Salutation('Mr'),
                    new Firstname('Peter'),
                    'Pan',
                ],
                'expectation' => [
                    new Salutation('Mr'),
                    new Firstname('Peter'),
                    new Lastname('Pan'),
                ],
            ],
            [
                'input' => [
                    new Salutation('Mr'),
                    'Lars',
                    'van',
                    'Trier',
                ],
                'expectation' => [
                    new Salutation('Mr'),
                    'Lars',
                    new Lastname('van'),
                    new Lastname('Trier'),
                ],
            ],
            [
                'input' => [
                    new Salutation('Mr'),
                    'Dan',
                    'Huong',
                ],
                'expectation' => [
                    new Salutation('Mr'),
                    'Dan',
                    new Lastname('Huong'),
                ],
            ],
            [
                'input' => [
                    new Salutation('Mr'),
                    'Von',
                ],
                'expectation' => [
                    new Salutation('Mr'),
                    new Lastname('Von'),
                ],
            ],
            [
                'input' => [
                    'Mr',
                    'Von',
                ],
                'expectation' => [
                    'Mr',
                    new Lastname('Von'),
                ],
            ],
            [
                'input' => [
                    'Kirk'
                ],
                'expectation' => [
                    'Kirk'
                ],
            ],
            [
                'input' => [
                    'Kirk',
                ],
                'expectation' => [
                    new Lastname('Kirk'),
                ],
                'options' => [
                    'match_single' => true
                ],
            ]
        ];
    }
}
