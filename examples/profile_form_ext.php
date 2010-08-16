<?php

error_reporting(6143|2048);

require_once('../src/phorms.php');

class ProfileForm extends FieldsetPhorm
{
	protected function define_fields()
	{
		// Define form fields
		$this->user_id = new HiddenField(array('required'));
		$this->first_name = new AlphaField("First name", 25, 255, array(PhormValidation::Required));
		$this->last_name = new AlphaField("Last name", 25, 255, array(PhormValidation::Required));
		$this->email = new EmailField("Email address", 25, 255, array(PhormValidation::Required));
		$this->url = new URLField("Home page", 25, 255);
		$this->bio = new LargeTextField('Bio', 5, 40, array(PhormValidation::Required));
		
		// Add some help text
		$this->email->set_help_text('We will never give out your email address.');
	}
	
	protected function define_fieldsets()
	{
        $this->fieldsets = array(new Fieldset('name', 'Name', array('user_id', 
                                                                    'first_name', 
                                                                    'last_name')),
                                 new Fieldset('extra', 'Extra', array('email', 
                                                                      'url', 
                                                                      'bio')));
	}
	
	public function report()
	{
		var_dump( $this->cleaned_data() );
	}
}

// Set up the form
$post_id = 42;
$form = new ProfileForm(Phorm::POST, false, array('post_id'=>$post_id));

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr" dir="ltr">
	<head>
		<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
		<title>Profile form</title>
		<script src="../src/javascript/scriptaculous/lib/prototype.js" type="text/javascript"></script>
		<script src="../src/javascript/scriptaculous/src/effects.js" type="text/javascript"></script>
		<script src="../src/javascript/validation.js" type="text/javascript"></script>
		<style type="text/css">
			form .phorm_help {
				margin: 0;
				padding: 2px;
				font-size: 10pt;
				font-style: oblique;
				color: #666;
				display: block;
			}
			
			form
			{
				width: 60%;
			}

			form p
			{
				margin: 2px 0;
			}

			/* fieldset , legend */
			form fieldset
			{
				margin-bottom: 10px;
				border: #CCC 1px solid;
			}

			form fieldset legend
			{
				padding: 0 10px;
				border-left: #CCC 1px solid;
				border-right: #CCC 1px solid;
				font-size: 1.2em;
				color: #999;
			}

			/* Label */
			form label
			{
				background-color: #FFCC66;
				display: block;
				width: 39%;
				float: left;
				padding-right: 1%;
				text-align: right;
				letter-spacing: 1px;
			}

			/* Input */
			form input, form select
			{
				margin-left: 1%;
				border: #CCC 1px solid;
			}
			
			form input[type="text"], form select
			{
				width: 58%;
			}

			/* Textarea */
			form textarea
			{
				margin-left: 1%;
				width: 58%;
				border: #CCC 1px solid;
			}

			/* button submit */
			form input[type="submit"]
			{
				border: #DDEEFF 1px solid;
				width: 27%;
			}

			form input[type="submit"]:hover
			{
				background-color: #66CC33;
				cursor: pointer;
			}

			form input[type="reset"]
			{
				border: #DDEEFF 1px solid;
				width: 27%;
			}

			form input[type="reset"]:hover
			{
				background-color: #E6484D;
				cursor: pointer;
			}

			form .required
			{
				border-width: 2px;
			}
			
			/* Validation */
			form .validation-advice {
				margin: 5px 0;
				padding: 5px;
				background-color: #FF3300;
				color : #FFF;
				font-weight: bold;
			}

		</style>
	</head>
	<body>

		<?= $form->open() ?>
		<h2>Add a comment</h2>
		<?php if ( $form->has_errors() ): ?>
		<p class="phorm_error">Please correct the following errors.</p>
		<?php endif ?>
		<?= $form ?>
		<?= $form->buttons() ?>
		<?= $form->close() ?>
		
		<h4>Raw POST data:</h4>
		<?php var_dump($_POST); ?>
	
		<hr />
	
		<?php
		// Check form validity
		if ($form->is_bound() && $form->is_valid()): ?>
			<h4>Processed and cleaned form data:</h4>
			<? $form->report() ?>
		<?php elseif ($form->has_errors()): ?>
			<h4>Errors:</h4>
			<?php var_dump($form->get_errors()); ?>
		<?php else: ?>
			<p><em>The form is unbound.</em></p>
		<?php endif ?>
	</body>
</html>