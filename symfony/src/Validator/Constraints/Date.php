<?php
namespace App\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
/**
 * Class Date
 * @package WikiBundle\Validator\Constraints
 * @Annotation
 */
class Date extends Constraint
{
    public $message = '"%string%" doesn\'t a valid date';
}