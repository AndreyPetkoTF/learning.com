<?php
/**
 * Created by PhpStorm.
 * User: andreypetko
 * Date: 11/10/17
 * Time: 10:25
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

/**
 * Class OtherController
 * @package AppBundle\Controller
 */
class OtherController extends Controller
{
    /**
     * @Route("/simple-numbers", name="simple_numbers")
     */
    public function simpleNumbersAction()
    {
        $i = 2;
        $simpleNumbers = [1];


        while ($i !== 101) {
            $isSimple = true;
            $j = 2;

            while ($j !== $i) {
                if ($i % $j === 0) {
                    $isSimple = false;
                    break;
                }
                $j++;
            }

            if ($isSimple) {
                $simpleNumbers[] = $i;
            }

            $i++;
        }

        dump($simpleNumbers);
        die;
    }

    /**
     * @Route("/replace/{word}", name="replace")
     *
     * @param string $word
     */
    public function replaceAction(string $word)
    {
        $bad = [
            'bad word',
        ];

        $good = [
          'b*****d'
        ];

        $word = str_ireplace($bad, $good, $word);

        dump($word);
        die;
    }

    /**
     * @Route("/dinamic-variables", name="dinamic_variables")
     */
    public function dinamicVariablesAction()
    {
        $varName = 'subject';
        $subject = "Hello world";

        dump($$varName);
        die;
    }

    /**
     * @Route("/finder", name="finder")
     */
    public function finderAction()
    {
        $files = Finder::create()
            ->in($this->getParameter('kernel.project_dir'))
            ->name('*.txt');


        /**
         * @var SplFileInfo $file
         */
        foreach ($files as $file) {
            dump($file->getContents());
            dump($file->openFile('w')->fwrite('asd'));
            die;
        }

        die;
    }
}