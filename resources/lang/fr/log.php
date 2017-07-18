<?php

return [
    'events'               =>
        [
            'commons'      => [
                'create'      => 'Ajout :attribute',
                'update'      => 'Modification :attribute',
                'delete'      => 'Suppression :attribute',
                'update_with' => 'Modification :class avec changement attribut :attribute',
                'create_with' => 'Modification :class avec ajout :attribute',
                'delete_with' => 'Modification :class avec suppression :attribute'
            ],
            'Contact'      => [
                'lib'        => 'contact',
                'attributes' => [
                    'liste_diffusion' => [
                        'update_with' => 'Modification avec changement attribut liste de diffusion'
                    ],
                    'principal'       => [
                        'update_with' => 'Modification avec changement attribut principal'
                    ]
                ]
            ],
            'Pyramide'     => [
                'lib' => 'pyramide'
            ],
            'Of'           => [
                'lib'       => 'Établissement',
                'relations' => [
                    'Diplome' => [
                        'created'  => 'Ajout liaison Diplôme/Ecole',
                        'deleted'  => 'Suppression liaison Diplôme/Ecole',
                        'updated'  => 'Mise à jour liaison Diplôme/Ecole'
                    ]
                ]
            ],
            'Mission'      => [
                'lib'        => 'mission',
                'attributes' => [
                    'valideur_id' => [
                        'update_with' => 'Modification contact Valideur recrutement',
                        'deleted'     => ''
                    ],
                    'tuteur_id'   => [
                        'update_with' => 'Modification contact Tuteur',
                        'deleted'     => ''
                    ],
                    'rh_id'       => [
                        'update_with' => 'Modification contact RH',
                        'deleted'     => ''
                    ],
                    'site_id'     => [
                        'update_with' => "Modification adresse",
                        'deleted'     => ''
                    ],
                    'statut'      => [
                        'update_with' => 'Changement de statut mission',
                        'deleted'     => ''
                    ]

                ],
                'relations' => [
                    'Candidat'  => [
                        'created'  => 'Ajout candidature',
                        'deleted'  => 'Suppression candidature',
                        'updated'  => 'Mise à jour candidature'
                    ],
                    'Pyramide'  => [
                        'created'  => 'Ajout pyramide',
                        'deleted'  => 'Suppession pyramide',
                        'updated'  => 'Mise à jour pyramide'
                    ],
                    'Of'        => [
                        'created'  => 'Diffusion mission',
                    ],
                    'Diplome'   => [
                        'created'  => 'Ajout hypothèse de sourcing',
                        'deleted'  => 'Suppression hypothèse de sourcing'
                    ]
                ]
            ],
            'Candidat'     => [
                'lib'          => 'candidat',
                'attributes'   => [
                    'of_id'      => [
                        'update_with' => 'Modification diplôme',
                        'deleted'     => ''
                    ],
                    'diplome_id' => [
                        'update_with' => 'Modification établissement',
                        'deleted'     => ''
                    ],
                ],
                'relations'    => [
                    'Mission'  => [
                        'created'  => 'Ajout candidature',
                        'deleted'  => 'Suppression candidature',
                        'updated'  => 'Mise à jour candidature'
                    ]
                ]
            ],
            'CompteClient' => [
                'lib' => 'compte client',
            ],
            'Adresse'      => [
                'lib' => 'adresse',
            ],
            'Document'     => [
                'lib' => 'Document',
                'attributes' => [
                    'valide' =>
                        [
                            'update_with' => 'Validation document '
                        ]
                ]
            ],
            'Diplome'      => [
                'lib' => 'diplôme',
                'attributes' => [],
                'relations' => [
                    'Of'  => [
                        'created'  => 'Ajout liaison Diplôme/Ecole',
                        'deleted'  => 'Suppression liaison Diplôme/Ecole',
                        'updated'  => 'Mise à jour liaison Diplôme/Ecole'
                    ],
                    'Domaine' => [
                        'created'  => 'Ajout liaison Diplôme/Domaine',
                        'deleted'  => 'Suppression liaison Diplôme/Domaine',
                    ]
                ]
            ]
        ],
    'description'          =>
        [
            'commons'      => [
                'created'     => ':user a ajouté :object ":lib" ',
                'updated'     => ':user a modifié :object ":lib" ',
                'deleted'     => ':user a supprimé :object ":lib" ',
                'update_with' => ':user a modifié :object ":lib" ',
                'create_with' => '',
                'delete_with' => ''
            ],
            'CompteClient' => [
                'lib'        => 'le compte client',
                'attributes' => [
                    ''
                ]
            ],
            'Document'     => [
                'lib'        => 'Document',
                'attributes' => [
                    'valide' =>
                        [
                            'update_with' => [
                                '1' => ':user a validé le document ":lib".'
                            ]
                        ],
                ]
            ],
            'Contact'      => [
                'lib'        => 'le contact',
                'attributes' => [
                    'liste_diffusion' => [
                        'update_with' => [
                            '0' => ":user a modifié le contact :lib. :lib n'est plus dans la liste de diffusion.",
                            '1' => ":user a modifié le contact :lib, :lib est maintenant dans la liste de diffusion."
                        ]
                    ],
                    'principal'       => [
                        'update_with' => [
                            '0' => ":user a modifié le contact :lib. :lib n'est plus le contact principal.",
                            '1' => ":user a modifié le contact :lib. :lib est maintenant le contact principal."
                        ]
                    ]
                ]
            ],
            'Of'           => [
                'lib'        => "l'établissement",
                'attributes' => [

                ],
                'relations'  => [
                    'Diplome'  => [
                        'created'       => ':user a ajouté la liaison Diplôme :relation / Ecole :entity',
                        'deleted'       => ':user a supprimé la liaison Diplôme :relation / Ecole :entity',
                        'updated_with'  => [
                            'ca'      => ':user a mis à jour une liaison Diplôme :entity / Ecole :relation avec modification de l\'attribut Contrat d\'apprentissage',
                            'cp'      => ':user a mis à jour une liaison Diplôme :entity / Ecole :relation avec modification de l\'attribut Contrat de professionnalisation',
                            'cout_ca' => ':user a mis à jour une liaison Diplôme :entity / Ecole :relation avec modification de l\'attribut cout_ca',
                            'cout_cp' => ':user a mis à jour une liaison Diplôme :entity / Ecole :relation avec modification de l\'attribut cout_cp'
                        ],
                        'notifications' => [

                        ]
                    ],
                ]
            ],
            'Mission'      => [
                'lib'        => 'la mission',
                'attributes' => [
                    'valideur_id' => [
                        'update_with' => ':user a modifié le valideur du recrutement',
                        'deleted'     => ''
                    ],
                    'tuteur_id'   => [
                        'update_with' => ':user a modifié le tuteur',
                        'deleted'     => ''
                    ],
                    'rh_id'       => [
                        'update_with' => ':user a modifié le contact RH',
                        'deleted'     => ''
                    ],
                    'site_id'     => [
                        'update_with' => ":user a modifié le site d'exécution de la mission",
                        'deleted'     => ''
                    ],
                    'statut'      => [
                        'update_with' => 'La mission est maintenant dans le statut :statut',
                        'deleted'     => ''
                    ]

                ],
                'custom'     => [
                    'sourcing'  => [
                        'created'  => ':user a ajouter une hypothèse de sourcing',
                        'deleted'  => ':user a supprimé une hypothèse de sourcing',
                        'updated'  => ':user a modifié une hypothèse de sourcing'
                    ],
                    'notification' => [
                        'broadcasted'  => 'Mission diffusée',
                        'rebrodcasted' => 'Mission rediffusée'
                    ]
                ],
                'relations'  => [
                    'Candidat'  => [
                        'created'       => ':user a ajouté la candidature ":relation"',
                        'deleted'       => ':user a supprimé la candidature ":relation"',
                        'updated_with'  => [
                            'statut'    => 'Candidature Mission ":relation" a changée de statut ":newValue"',
                        ]
                    ],
                    'Pyramide'  => [
                        'created'       => ':user a ajouté pyramide',
                        'deleted'       => ':user a supprimé pyramide :relation',
                        'updated_with'  => [

                        ]
                    ],
                    'Of'        => [
                        'created'  => ':user a diffusé la mission ":entity" a l\'établissement ":relation"',
                    ],
                    'Diplome'   => [
                        'created'  => ':user a ajouter hypothèse de sourcing ',
                        'deleted'  => ':user a supprimé une hypothèse de sourcing'
                    ]
                ]
            ],
            'Adresse'      => [
                'lib'        => "l'adresse",
                'attributes' => [
                    'principal' => [
                        'update_with' => [
                            '0' => ":user a modifié le site :lib. :lib n'est plus le site principal.",
                            '1' => ":user a modifié le site :lib. :lib est maintenant le site principal."
                        ]
                    ]
                ]
            ],
            'Diplome'      => [
                'lib'        => 'le diplôme',
                'attributes' => [

                ],
                'relations'  => [
                    'Of'  => [
                        'created'       => ':user a ajouté la liaison Diplôme :entity / Ecole :relation',
                        'deleted'       => ':user a supprimé la liaison Diplôme :entity / Ecole :relation',
                        'updated_with'  => [
                            'ca'      => ':user a mis à jour la liaison Diplôme :entity / Ecole :relation avec modification de l\'attribut Contrat d\'apprentissage',
                            'cp'      => ':user a mis à jour la liaison Diplôme :entity / Ecole :relation avec modification de l\'attribut Contrat de professionnalisation',
                            'cout_ca' => ':user a mis à jour la liaison Diplôme :entity / Ecole :relation avec modification de l\'attribut cout_ca',
                            'cout_cp' => ':user a mis à jour la liaison Diplôme :entity / Ecole :relation avec modification de l\'attribut cout_cp'
                        ],
                        'notifications' => [

                        ]
                    ],
                    'Domaine' => [
                        'created'  => ':user a ajouté la liaison Diplôme ":entity" / Domaine ":relation"',
                        'deleted'  => ':user a supprimé la liaison Diplôme ":entity" / Domaine ":relation"',
                    ]
                ]
            ],
            'Pyramide'     => [
                'lib' => 'la pyramide'
            ],
            'Candidat'     => [
                'lib'        => 'le candidat',
                'attributes' => [
                    'of_id'      => [
                        'update_with' => ':user a modifié l\'établissement rattaché',
                        'deleted'     => ''
                    ],
                    'diplome_id' => [
                        'update_with' => ':user a modifié le diplôme rattaché',
                        'deleted'     => ''
                    ],
                ],
                'relations' => [
                    'Mission'  => [
                        'created'       => ':user a ajouté la candidature ":relation"',
                        'deleted'       => ':user a supprimé la candidature ":relation"',
                        'updated_with'  => [
                            'statut'    => 'Candidature ":relation" a changée de statut ":newValue"',
                        ]
                    ],
                ]
            ],
        ]
];