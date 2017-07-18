<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| The following language lines contain the default error messages used by
	| the validator class. Some of these rules have multiple versions such
	| as the size rules. Feel free to tweak each of these messages here.
	|
	*/
	'oups'     => 'Oups',
	'error'    => 'Erreur',
	'general'  => 'Une erreur est survenue.',
	'generals' => 'Les erreurs suivantes sont survenues :',

	'accepted'             => ':attribute doit être validé.',
	'active_url'           => ':attribute n\'est pas une URL valide.',
	'after'                => ':attribute doit être une date supérieure à :date.',
	'alpha'                => ':attribute ne peut contenir que des lettres.',
	'alpha_dash'           => ':attribute ne peut contenir que des lettres, des chiffres ou un tiret.',
	'alpha_num'            => ':attribute ne peut contenir que des lettres et des chiffres.',
	'array'                => ':attribute doit être un tableau.',
	'before'               => ':attribute doit être une date inférieure à :date.',
	'between'              => [
		'numeric' => ':attribute doit être entre :min et :max.',
		'file'    => ':attribute doit être entre :min et :max kilobytes.',
		'string'  => ':attribute doit être entre :min and :max characters.',
		'array'   => ':attribute doit avoir entre :min et :max éléments.',
	],
	'boolean'              => ':attribute ne peut être que vrai ou faux.',
	'confirmed'            => ':attribute différent.',
	'luhn'                 => ':attribute invalide.',
	'date'                 => ':attribute n\'est pas une date valide.',
	'date_format'          => ':attribute ne correspond pas au format :format.',
	'different'            => ':attribute et :other doivent être différents.',
	'digits'               => ':attribute doit être de :digits chiffres.',
	'digits_between'       => ':attribute doit être entre :min and :max chiffres.',
	'dimensions'           => ':attribute a des dimensions invalides.',
	'distinct'             => ':attribute en double.',
	'email'                => ':attribute doit être une adresse e-email valide.',
	'exists'               => 'Sélection invalide pour le champ :attribute.',
	'file'                 => ':attribute doit être un fichier.',
	'filled'               => ':attribute obligatoire.',
	'image'                => ':attribute doit être une image.',
	'in'                   => 'Sélection invalide pour le champ :attribute',
	'in_array'             => ':attribute n\'existe pas dans :other.',
	'integer'              => ':attribute doit être un entier.',
	'ip'                   => ':attribute doit être une adresse IP valide.',
	'json'                 => ':attribute doit être une chaîne de type JSON.',
	'max'                  => [
		'numeric' => ':attribute ne peut être supérieur à :max.',
		'file'    => ':attribute ne peut être supérieur à :max kilobytes.',
		'string'  => ':attribute ne peut être supérieur à :max caractères.',
		'array'   => ':attribute ne peut avoir plus de :max éléments.',
	],
	'mimes'                => ':attribute doit être de type: :values.',
	'min'                  => [
		'numeric' => ':attribute doit être au minimum de :min.',
		'file'    => ':attribute doit être au minimum de :min kilobytes.',
		'string'  => ':attribute doit être au minimum de :min characters.',
		'array'   => ':attribute doit avoir au moins :min éléments.',
	],
	'not_in'               => ':attribute n\'est pas une sélection valide.',
	'numeric'              => 'Le champ :attribute doit être un chiffre.',
	'present'              => 'Le champ :attribute est obligatoire.',
	'regex'                => ':attribute invalide.',
	'required'             => 'Le champ :attribute est obligatoire.',
	//'required_if'          => ':attribute obligatoire quand :other vaut :value.',
	'required_if'          => ':attribute obligatoire.',
	'required_unless'      => ':attribute est obligatoire à moins que :other soit dans :values.',
	'required_with'        => ':attribute est obligatoire quand :values est défini.',
	'required_with_all'    => ':attribute est obligatoire quand :values est défini.',
	'required_without'     => ':attribute est obligatoire quand :values n\'est pas défini.',
	'required_without_all' => ':attribute est obligatoire quand aucune des valeurs de :values sont définies.',
	'same'                 => ':attribute et :other doivent correspondre.',
	'size'                 => [
		'numeric' => 'La taille de :attribute doit être de :size.',
		'file'    => 'Le poids de :attribute doit être de :size kilobytes.',
		'string'  => 'La longueur de :attribute doit être de :size caractères.',
		'array'   => ':attribute doit contenir :size éléments.',
	],
	'string'               => 'Le champ :attribute doit être une chaîne de caractères.',
	'timezone'             => ':attribute doit être un fuseau horaire.',
	'unique'               => 'La valeur de :attribute déjà définie.',
	'uploaded'             => ':attribute ne peut être supérieur à ' . maxUploadFileSize() . ' kilobytes.',
	'url'                  => 'Le format de :attribute n\'est pas valide.',

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| Here you may specify custom validation messages for attributes using the
	| convention "attribute.rule" to name the lines. This makes it quick to
	| specify a specific custom language line for a given attribute rule.
	|
	*/

	'custom' => [
		'attribute-name' => [
			'rule-name' => 'custom-message',
		]
	],

	'date_in_current_year' => "la date de début de mission doit être dans l'année en cours",
	'phone_number'         => ":attribute invalide (ex: +33601234567)",
	'password' 			   => "Minimum 10 caractères avec au moins une miniscule, une majuscule, un chiffre et un caractère non alphanumérique",

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Attributes
	|--------------------------------------------------------------------------
	|
	| The following language lines are used to swap attribute place-holders
	| with something more reader friendly such as E-Mail Address instead
	| of "email". This simply helps us make messages a little cleaner.
	|
	*/

	'attributes' => [
		'email'               => 'Adresse e-email',
		'fichier'             => 'Fichier',
		'password'            => 'Mot de passe',
		'name'                => 'Nom',
		'firstname'           => 'Prénom',
		'phonenumber'         => 'Tél',
		'company'             => 'Nom de l\'entreprise',
		'naf_code'            => 'Code NAF',
		'company_created_at'  => 'Date de création',
		'number_of_employees' => 'Nombre de salariés',
		'company_status'      => 'Statut',
		'revenues'            => 'CA',
		'agree_cgu'           => 'CGU',
		'lib'                 => 'Libellé',
		'lib_court'           => 'Libellé court',
		'code'                => 'Code',
		'domaine_id'          => 'Domaine',
		'niveau_id'           => 'Niveau',
		'type_id'             => 'Type',
		'titre_id'            => 'Titre',
		'qualification_id'    => 'Qualification',
		'specialite_id'       => 'Spécialité',
		'desc'                => 'Description',
		'siret'               => 'Siret',
		'da'                  => 'Numéro de déclaration d\'activité',
		'uai'                 => 'UAI',
		'commentaires'        => 'Les commentaires',
		'adresse'             => 'Adresse',
		'contact_nom'         => 'Nom',
		'contact_prenom'      => 'Prénom',
		'contact_email'       => 'E-email',
		'contact_fonction'    => 'Fonction',
		'contact_tel_fixe'    => 'Téléphone fixe',
		'contact_tel_mobile'  => 'Téléphone mobile',
		'adresse_voie'        => 'Adresse',
		'adresse_complement'  => 'Complément d\'adresse',
		'acronyme'            => 'Acronyme',
		'num'                 => 'Ce champ',
		'of_id'               => 'Établissement',
		'diplome_id'          => 'Diplôme',
		'employeur_id'        => 'Type d\'employeur',
		'empspecifique_id'    => 'Employeur spécifique',
		'role'                => 'Type d\'accès',
	],

];
