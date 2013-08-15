<?php
// @codingStandardsIgnoreStart
// {{{ICINGA_LICENSE_HEADER}}}
// {{{ICINGA_LICENSE_HEADER}}}

namespace Test\Monitoring\Forms\Command;

require_once realpath(__DIR__ . '/BaseFormTest.php');
require_once realpath(__DIR__ . '/../../../../../application/forms/Command/CustomNotificationForm.php');

use \Monitoring\Form\Command\CustomNotificationForm; // Used by constant FORMCLASS

class CustomNotificationFormTest extends BaseFormTest
{
    const FORMCLASS = 'Monitoring\Form\Command\CustomNotificationForm';

    public function testFormInvalidWhenCommentMissing()
    {
        $form = $this->getRequestForm(array(
            'author'        => 'Author',
            'comment'       => '',
            'btn_submit'    => 'Submit'
        ), self::FORMCLASS);

        $this->assertFalse(
            $form->isSubmittedAndValid(),
            'Missing comment must be considered not valid'
        );
    }
}
// @codingStandardsIgnoreEnd
