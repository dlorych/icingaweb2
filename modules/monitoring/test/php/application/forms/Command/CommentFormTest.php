<?php
// @codingStandardsIgnoreStart
// {{{ICINGA_LICENSE_HEADER}}}
// {{{ICINGA_LICENSE_HEADER}}}

namespace Test\Monitoring\Forms\Command;

require_once __DIR__ .'/BaseFormTest.php';
require_once __DIR__ . '/../../../../../application/forms/Command/CommandForm.php';
require_once __DIR__ . '/../../../../../application/forms/Command/WithChildrenCommandForm.php';
require_once __DIR__ . '/../../../../../application/forms/Command/CommentForm.php';

use \Monitoring\Form\Command\CommentForm; // Used by constant FORMCLASS

class CommentFormTest extends BaseFormTest
{
    const FORMCLASS = 'Monitoring\Form\Command\CommentForm';

    public function testCorrectCommentValidation()
    {
        $form = $this->getRequestForm(array(
            'author'        => 'Author',
            'comment'       => 'Comment',
            'sticky'        => '0',
            'btn_submit'    => 'Submit'
        ), self::FORMCLASS);

        $this->assertTrue(
            $form->isSubmittedAndValid(),
            'Legal request data must be considered valid'
        );
    }

    public function testFormInvalidWhenCommentMissing()
    {
        $form = $this->getRequestForm(array(
            'author'        => 'Author',
            'comment'       => '',
            'sticky'        => '0',
            'btn_submit'    => 'Submit'

        ), self::FORMCLASS);

        $this->assertFalse(
            $form->isSubmittedAndValid(),
            'Missing comment must be considered not valid'
        );
    }

    public function testFormInvalidWhenAuthorMissing()
    {
        $form = $this->getRequestForm(array(
            'author'        => '',
            'comment'       => 'Comment',
            'sticky'        => '0',
            'btn_submit'    => 'Submit'
        ), self::FORMCLASS);

        $this->assertFalse(
            $form->isSubmittedAndValid(),
            'Missing author must be considered not valid'
        );
    }
}
// @codingStandardsIgnoreEnd
