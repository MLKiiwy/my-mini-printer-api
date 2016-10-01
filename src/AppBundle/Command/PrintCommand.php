<?php

namespace AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class PrintCommand extends ContainerAwareCommand
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('print')
            ->setDescription('Print on the printer')
            ->addArgument('filePath', InputArgument::REQUIRED, 'file path of file input')
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $printerManager = $this->getContainer()->get('printer.manager');
        $printer = $printerManager->getDefault();
        $markdownParser = $this->getContainer()->get('markdown.parser');
        $fileManager = $this->getContainer()->get('file.manager');

        $filePath = $input->getArgument('$filePath');
        $fileContent = $fileManager->readFromFile($filePath);
        $printInstructions = $markdownParser->parse($fileContent);

        return $printer->execute($printInstructions);
    }
}
