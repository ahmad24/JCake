<?php
  
//JToolbarHelper::modal('modal', 'icon-save', 'Show Modal');
function loadForm($name, $source = null, $options = array(), $clear = false, $xpath = false)
{
    // Handle the optional arguments.
    $options['control'] = JArrayHelper::getValue($options, 'control', false);

	JForm::addFormPath(JPATH_COMPONENT . '/app/View/tests/forms');
    /*JForm::addFieldPath(JPATH_COMPONENT . '/models/fields');
    JForm::addFormPath(JPATH_COMPONENT . '/model/form');
    JForm::addFieldPath(JPATH_COMPONENT . '/model/field');*/

    try
    {
        $form = JForm::getInstance($name, $source, $options, false, $xpath);
        if (isset($options['load_data']) && $options['load_data'])
        {
            // Get the data for the form.
            //////$data = $this->loadFormData();
        }
        else
        {
            $data = array();
        }

        // Allow for additional modification of the form, and events to be triggered.
        // We pass the data because plugins may require it.
        //////$this->preprocessForm($form, $data);

        // Load the data into the form after the plugins have operated.
        $form->bind($data);

    }
    catch (Exception $e)
    {
        //$this->setError($e->getMessage());
        print_r($e->getMessage());exit;
        return false;
    }
    return $form;
}
$form = loadForm('com_jcake.weblink', 'weblink', array('control' => 'data'));
?>

        <fieldset>
		<?php echo JHtml::_('bootstrap.startTabSet', 'myTab', array('active' => 'details')); ?>

            <?php
            // Get the form fieldsets.
            $fieldsets = $form->getFieldsets();
			foreach ($fieldsets as $fieldset) :
				if ($fieldset->name == 'user_details') :
					continue;
				endif;
			?>
			<?php echo JHtml::_('bootstrap.addTab', 'myTab', $fieldset->name, JText::_($fieldset->label, true)); ?>
				<?php foreach ($form->getFieldset($fieldset->name) as $field) : ?>
					<?php if ($field->hidden) : ?>
						<div class="control-group">
							<div class="controls">
								<?php echo $field->input; ?>
							</div>
						</div>
					<?php else: ?>
						<div class="control-group">
							<div class="control-label">
								<?php echo $field->label; ?>
							</div>
							<div class="controls">
								<?php echo $field->input; ?>
							</div>
						</div>
					<?php endif; ?>
				<?php endforeach; ?>
		<?php echo JHtml::_('bootstrap.endTab'); ?>
		<?php endforeach; ?>

        <?php echo JHtml::_('bootstrap.endTabSet'); ?>
        </fieldset>






<!--div id="modal" style="width: 200px;height: 200px;background-color: white;position: relative;z-index: 100000;">Test</div-->
