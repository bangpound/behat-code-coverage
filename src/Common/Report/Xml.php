<?php
/**
 * Code Coverage XML Report
 *
 * @copyright 2013 Anthon Pang
 * @license BSD-3-Clause
 */

namespace LeanPHP\Behat\CodeCoverage\Common\Report;

use LeanPHP\Behat\CodeCoverage\Common\ReportInterface;
use SebastianBergmann\CodeCoverage\CodeCoverage;
use SebastianBergmann\CodeCoverage\Report\Xml\Facade;;

/**
 * XML report
 *
 * @author Anthon Pang <apang@softwaredevelopment.ca>
 */
class Xml implements ReportInterface
{
    /**
     * @var \SebastianBergmann\CodeCoverage\Report\XML
     */
    private $report;

    /**
     * @var array
     */
    private $options;

    /**
     * {@inheritdoc}
     */
    public function __construct(array $options)
    {
        if ( ! class_exists('SebastianBergmann\CodeCoverage\Report\Xml\Facade')) {
            throw new \Exception('XML requires CodeCoverage 4.0+');
        }

        if ( ! isset($options['target'])) {
            $options['target'] = null;
        }

        $this->report = new Facade(array());
        $this->options = $options;
    }

    /**
     * {@inheritdoc}
     */
    public function process(CodeCoverage $coverage)
    {
        return $this->report->process(
            $coverage,
            $this->options['target']
        );
    }
}
