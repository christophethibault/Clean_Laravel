<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 22/03/2017
 * Time: 09:03
 */

return [
	"errors" => [
		'notExistsInDisk' => "Le fichier :name n'existe pas.",
		'notExistsInDb'   => "Le fichier n'existe pas.",
		'alreadyExist'    => "Le fichier :name existe déjà.",
		'invalidFile'     => "Le fichier :name est invalide."
	],
	"table"  => [
	    'headers' => [
            'documentName' => 'NOM DU DOCUMENT',
            'dateMaj'      => 'DATE DE MAJ ',
            'dateVal'      => 'VALIDATION',
            'actions'      => 'ACTIONS',
        ],
        'contents' => [
            'dateVal'      => 'Validé le :date par :user',
            'dateMaj'      => 'Pas de document',
            'documentName' => [
                'obligatoire' => 'Obligatoire'
            ],
        ]
	],
	"title"  => 'Document',
	"form"   => [
		"fields" => [
			'libelle'     => "Libellé",
			'description' => "Description",
			'file'        => "Fichier"
		]
	],
	'empty' => 'Aucun document ne correspond à vos critères de recherche'
];