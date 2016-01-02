<?php

namespace AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class TestCommand extends ContainerAwareCommand
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('test:test')
            ->setDescription('Test')
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $rootPath = $this->getContainer()->get('kernel')->getRootDir().'/../';
        require_once($rootPath.'vendor/mike42/escpos-php/Escpos.php');

        $imagePath = $rootPath.'resources/elephant-70x70.png';
        $img = new \EscposImage($imagePath);

        //$connector = new \FilePrintConnector('~/test.log');
        $connector = new \FilePrintConnector('/dev/usb/lp0');
        $printer = new \Escpos($connector);
        $printer->initialize();

        $printer->text('Elephant test !');
        $printer->feed(2);

        try {
            $printer->graphics($img, \Escpos::IMG_DEFAULT);
            //$printer->bitImage($img, \Escpos::IMG_DEFAULT);
        } catch (\Exception $e) {
            /* Images not supported on your PHP, or image file not found */
            echo $e;
        }
        $printer->feed(10);

        /* Always close the printer! On some PrintConnectors, no actual
         * data is sent until the printer is closed. */
        $printer->close();

        return 0;
    }
}
