<?php

	return [
		'currency' => 'AZN',
		'merch' => [
			'name' => 'Bakiemlak.az',
			'url' => 'https://bakiemlak.az/users/profile',
			'email' => 'payments@bakiemlak.az',
			'gmt' => '+4'
		],
		'terminal' => '17202616',
		'key_for_sign' => '692b06f6bac6f27288937f0e252eeb9b',
		'trtype' => '1',
		'country' => 'AZ',
		'desc' => 'Description of the sale',

		'backref' => 'https://bakiemlak.az/api/payment/result',
		'url' => [
			'test' => 'https://testmpi.3dsecure.az/cgi-bin/cgi_link',
			'prod' => 'https://mpi.3dsecure.az/cgi-bin/cgi_link'
		],

		'lang' => 'AZ',

		'order_min_length' => 6,
		'sale_type' => '1',
		'reversal_type' => '22'
	];