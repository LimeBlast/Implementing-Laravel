<?php  namespace Impl\Service\Validation;

class ArticleLaravelValidator extends AbstractLaravelValidator {

	/**
	 * Validation rules
	 *
	 * @var array
	 */
	protected $rules = [
		'title'     => 'required',
		'user_id'   => 'required|exists:users,id',
		'status_id' => 'required|exists:statuses,id',
		'excerpt'   => 'required',
		'content'   => 'required',
		'tags'      => 'required',
	];

	protected $messages = [
		'user_id.exists'   => 'That user does not exist',
		'status_id.exists' => 'That status does not exist',
	];

}