<?

namespace CrazyFactory\PHPUnit;

abstract class ExceptionExtension extends \PHPUnit_Framework_TestCase
{
	protected function assertExceptionThrown($fn, $exceptionClass, $message = null)
	{
		$message = $message ?: ("should have thrown " . $exceptionClass);
		$exception = null;

		try
		{
			$fn();
		}
		catch (\Exception $e)
		{
			$exception = $e;
		}

		$this->assertThat($exception, new PHPUnit_Framework_Constraint_IsDerivedOf($exceptionClass), $message);
	}
}

