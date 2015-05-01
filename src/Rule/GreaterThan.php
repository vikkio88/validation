<?php
namespace Sirius\Validation\Rule;

class GreaterThan extends AbstractRule
{

    const OPTION_MIN = 'min';
    const OPTION_INCLUSIVE = 'inclusive';

    protected static $defaultMessageTemplate = 'This input must be greater than {min}';
    const MESSAGE = 'This input should be greater than {min}';
    const LABELED_MESSAGE = '{label} should be greater than {min}';
    
    protected $options = array(
        'inclusive' => true
    );

    public function validate($value, $valueIdentifier = null)
    {
        $this->value = $value;
        if (!isset($this->options['min'])) {
            $this->success = true;
        } else {
            if ($this->options['inclusive']) {
                $this->success = $value >= $this->options['min'];
            } else {
                $this->success = $value > $this->options['min'];
            }
        }
        return $this->success;
    }
}
