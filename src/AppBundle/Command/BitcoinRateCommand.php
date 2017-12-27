<?php

namespace AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\DomCrawler\Crawler;

class BitcoinRateCommand extends ContainerAwareCommand
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('app:bitcoin_rate_command')
            ->setDescription('Hello PhpStorm');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $html = @file_get_contents('https://myfin.by/crypto-rates/bitcoin');
        $crawler = new Crawler($html);
        $val = $crawler->filter('.birzha_info_head_rates')->first()->text();

        $output->writeln((float)$val . "$");
    }
}
