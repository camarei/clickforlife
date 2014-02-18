<?php

class Session extends MY_Model {
	//@var string $_table_name Database table name
	protected $_table_name = 'sessions';

	//@var string $_primery_key Primery key field
	protected $_primery_key = 'id';

	//@var string $_primery_filter Filter method for a primery key
	protected $_primery_filter = 'intval';

	//@var string $_order_by Default ordering
	protected $_order_by = '';

	//@var array $_rules The validation rules
	protected $_rules = array();

	//@var boolean $_timestamps Requed or not timestamps field
	protected $_timestamps = FALSE;
}