<?php
namespace Drupal\example1\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class Example1Form extends FormBase {
	
	public function getFormID(){
		 // Unique ID of the form.
    return 'Example1Form';
	}
	
	public function buildForm(array $form, FormStateInterface $form_state) {
		$form['fname'] = array(
		'#type' => 'textfield',
		#'#title' => $this->t('Your first name'),
		
		'#input_group' => TRUE,
    '#field_prefix' => '<span class=" glyphicon-user glyphicon2" aria-hidden="true"></span>',
	'#prefix' => '<div class="my_class form-group">',
  '#suffix' => '</div>',
   '#attributes' => array(   'placeholder' => array('Your first name')),
   
		);
		
 		$form['phone_number'] = array(
		'#type' => 'tel',
		#'#title' => $this->t('Your phone number')
		'#input_group' => TRUE,
    '#field_prefix' => '<span class=" glyphicon-earphone glyphicon2" aria-hidden="true"></span>',
	'#prefix' => '<div class="my_class form-group">',
  '#suffix' => '</div>',
   '#attributes' => array(   'placeholder' => array('Your phone number')),
		);
		
		$form['email'] = array(
		'#type' => 'email',
		#'#title' => $this->t('Your email'),
		'#input_group' => TRUE,
    '#field_prefix' => '<span class=" glyphicon-envelope glyphicon2" aria-hidden="true"></span>',
	'#prefix' => '<div class="my_class form-group">',
  '#suffix' => '</div>',
   '#attributes' => array(   'placeholder' => array('Your phone number')),
		);
		
		$form['date'] = array(
		'#type' => 'date',
		#'#title' => $this->t('Your date'),
		
		'#input_group' => TRUE,
    '#field_prefix' => '<span class="  glyphicon-calendar glyphicon2" aria-hidden="true"></span>',
	'#prefix' => '<div class="my_class form-group">',
  '#suffix' => '</div>',
		);
		
		$form['number'] = array(
		'#type' => 'number',
		#'#title' => $this->t('Enter number'),
		'#input_group' => TRUE,
    '#field_prefix' => '<span class=" glyphicon-usd glyphicon2" aria-hidden="true"></span>',
	'#prefix' => '<div class="my_class form-group">',
  '#suffix' => '</div>',
   '#attributes' => array(   'placeholder' => array('Enter number')),
		);
		
		$form['high_school']['test_taken'] = array(
		'#type' => 'checkboxes',
		 '#options' => array('SAT' => $this->t('SAT'), 'ACT' => $this->t('ACT')),
		#'#title' => $this->t('checkboxes title'),
		
		
		'#prefix' => '<div class="my_class form-group"><div class="input-group"><span class="input-group-addon"><span class=" glyphicon-list-alt glyphicon2" aria-hidden="true"></span></span>',
 '#suffix' => '</div></div>',
		);
		
		$form['image_example_image_fid'] = array(
  #'#title' => t('Image'),
  '#type' => 'managed_file',
'#field_prefix' => '<div class="input-group"><div class="input-group-addon"><span class=" glyphicon-picture glyphicon2" aria-hidden="true"></span></div>',
 '#field_suffix' => '</div>',
  #'#description' => t('The uploaded image will be displayed on this page using the image style choosen below.'),
  '#upload_location' => 'public://images/',
		);
		
		$form['actions']['#type'] = 'actions';
		$form['actions']['submit'] = array (
		'#type' => 'submit',
		'#value' => $this->t('Save'),
		'#button_type' => 'primary',
		);
		return $form;
	}
	
/* 	public function validateForm(array &$form, FormStateInterface $form_state) {
		if (strlen($form_state['values']['phone_number']) < 7 ) {
			\Drupal::formBuilder()->setErrorByName('date', $form_state, 'phone number must be at least 7 digits')
		}
	} */
	
	 public function submitForm(array &$form, FormStateInterface $form_state) {
		$dk = db_insert('exampleform')
		-> fields(array(
		'fname' => $form_state->getValue('fname'),
		'phone_number' => $form_state->getValue('phone_number'),
		'email' => $form_state->getValue('email'),
		'number' => $form_state->getValue('number'),
		'checkboxes' => $form_state->getValue('checkboxes'),
		'image_example_image_fid' => $form_state->getValue('image_example_image_fid'),
		'date' => $form_state->getValue('date'),
		
		
		))
		->execute(); 
		//dsm($dk);
		
/* 		$result = db_query_range('SELECT node_field_data.nid, node_field_data.title, node_field_data.created FROM {node_field_data} WHERE node_field_data.uid = :uid', 0, 2, array(':uid' => '1'));
		foreach ($result as $record) {dsm($record);
		// Perform operations on $record->title, etc. here.
		} */
		
		
	}
	
	
	
}