<?php

namespace AppBundle\Controller;

use AppBundle\Closures\ClosureProduct;
use AppBundle\Closures\Totalizer;
use AppBundle\LateStaticBinding\OtherUser;
use AppBundle\LateStaticBinding\User;
use AppBundle\Services\DependencyInjector;
use AppBundle\Services\Workers\PerHourWorker;
use AppBundle\Services\Workers\PerMonthWorker;
use AppBundle\Services\Workers\WorkerRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class DefaultController
 * @package AppBundle\Controller
 */
class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')) . DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/layout", name="layout")
     */
    public function layoutAction()
    {
        return $this->render('AppBundle:Layout:index.html.twig', [

        ]);
    }


    /**
     * @Route("/late-static-binding", name="late-static-binding")
     */
    public function lateStaticBindingAction()
    {
        $user = User::create();
        $otherUser = OtherUser::create();

        dump($user);
        dump($otherUser);
        die;
    }

    /**
     * @Route("/trait", name="trait")
     */
    public function traitAction()
    {
        $utilityService = $this->get('learning.utility.service');
        $price = 20;

        $tax = $utilityService->getFinalPrice($price);
        $calculate = $utilityService->calculate($price);

        dump($calculate);
        dump($tax);
        die;
    }


    /**
     * @Route("/delegation", name="delegation")
     */
    public function delegationAction()
    {
        $person = $this->get('learning.delegation.person');

        $person->writeName();
        $person->writeAge();
        die;
    }

    /**
     * @Route("/closures", name="closures")
     */
    public function closuresAction()
    {
        $processSale = $this->get('learning.closures.process_sale');

        $processSale->registerCallback(Totalizer::warnAmount(8));

        $processSale->sale(new ClosureProduct("Туфли", 6));
        $processSale->sale(new ClosureProduct("Кофе", 6));

        die;
    }

    /**
     * @Route("/access-to-private-with-call", name="access-to-private-with-call")
     */
    public function accessToPrivateWithCallAction()
    {
        $obj = new class
        {
            private $foo = 'bar';
        };

        $fn = function () {
            var_dump($this->foo);
        };

        $fn->call($obj);

        die;
    }


    /**
     * @Route("/more-closures", name="more_closures")
     */
    public function moreClosuresAction()
    {
        $closureService = $this->get('learning.closures.service');
        $closure = $closureService->getClosure();

//        $closure->__invoke(1,3);
        $closure->call($this, 1, 3);
        die;

    }


    /**
     * @Route("/factorial/{number}", name="factorial")
     *
     * @param int $number
     */
    public function factorialAction($number)
    {
        $closureService = $this->get('learning.closures.service');
        $factorial = $closureService->getFactorial();

        $result = $factorial->__invoke($number);

        dump($result);
        die;
    }

    /**
     * @Route("/range-generator", name="range_generator")
     */
    public function rangeGeneratorAction()
    {
        $rangeGenerator = $this->get('learning.generator.range');

//      generator entity:  dump($rangeGenerator->xrange(1, 9, 2));

        foreach ($rangeGenerator->xrange(1, 9, 2) as $number) {
            echo "$number ";
        }

        die;
    }

    /**
     * @Route("/array-worker", name="array_worker")
     */
    public function arrayWorkerAction()
    {
        $array = [
            2,
            2.11231,
            [321.123123, 'string'],
            'value'
        ];

        $arrayWorker = $this->get('learning.array_work.helper');

        $arrayWorker->addHandler('round');
        $arrayWorker->addCustomHandler(function ($item) {
           return $item * 2;
        });

        $array = $arrayWorker->handle($array);

        dump($array);
        die;
    }

    /**
     * @Route("/parse", name="parse")
     */
    public function parseAction()
    {
        $parseService = $this->get('learning.parse.service');
        $parseService->run();
    }

    /**
     * @Route("/sorts", name="sorts")
     */
    public function sortsAction()
    {
//        $arr = [];
//        for($i = 0; $i < 1000; $i++) {
//            $arr[] = rand(1, 1000);
//        }

        $arr = [10, 5, 8, 3, 9];

        $sortService = $this->get('learning.sort.service');
//        $arr = $sortService->bubbleSort($arr);
//        $arr = $sortService->insertionSorting($arr);
//        $arr = $sortService->choiceSort($arr);
//        $arr = $sortService->mergeSort($arr);
        $arr = $sortService->quickSort($arr);
        dump($arr);
        die;

    }


    /**
     * @Route("/search", name="search")
     */
    public function searchAction()
    {
        $arr = [];

        for($i = 0; $i < 1000; $i++) {
            $arr[] = $i;
        }

        $searchService = $this->get('learning.search.service');
        $result = $searchService->recursiveBinarySearch($arr, 50);

        dump($result);
        die;
    }

    /**
     * @Route("/other", name="other")
     */
    public function otherAction()
    {
        $a = '1';
        $b = &$a;
        $b = "2$b";
        echo $a.", ".$b;
        die;
    }

    /**
     * @Route("/di-example", name="di_example")
     */
    public function diExampleAction()
    {
        $config = [
            'aws' => [
                'class' => 'AppBundle\Services\SortService',
                'lazy' => true,
                'arguments' => [
                    'key' => '123',
                    'privateKey' => 'abc'
                ]
            ]
//            'db' => [
//                'user' => 'jesse',
//                'password' => 'foo'
//            ]
        ];

        $di = new DependencyInjector($config);

        $aws = $di->getService('aws');
        dump($aws);
        die;
    }

    /**
     * @Route("/redis", name="redis")
     */
    public function redisAction()
    {
        $redis = $this->container->get('snc_redis.default');
//        $val = $redis->incr('foo:bar');
        $redis->set('foo', 1);

        $val = $redis->get('foo');

        dump($val);
        die;
    }

    /**
     * @Route("/worker", name="worker")
     */
    public function workerAction()
    {
        $workerRepository = new WorkerRepository();

        $worker = new PerMonthWorker(2000, 1, 'John');
        $otherWorker = new PerHourWorker(20, 1, 'Vasya');
        $otherWorker2 = new PerHourWorker(15, 1, 'Dysya');

        $workerRepository->addWorker($worker);
        $workerRepository->addWorker($otherWorker);
        $workerRepository->addWorker($otherWorker2);

        $result = $workerRepository
            ->getSortBySalary(false)
            ->getFirstNames();


        foreach ($result as $item) {
            dump($item->getMonthSalary());
        }

        die;
    }

    /**
     * @Route("/hello", name="hello")
     */
    public function helloAction()
    {
        $hello = new \ReflectionClass(PerHourWorker::class);
        $comment = $hello->getMethod('getHourPrice')->getDocComment();
        $pattern = '#(@[a-zA-Z]+\s*[a-zA-Z0-9, ()_].*)#';
        preg_match_all($pattern, $comment, $matches, PREG_PATTERN_ORDER);

        echo "<pre>"; print_r($matches);

        die;
    }
    
    
    /**
     * @Route("/tf-info", name="tf_info")
     */
    public function tfInfoAction()
    {
        $url = 'https://www.alphavantage.co/query?function=TIME_SERIES_DAILY&symbol=TECH.L&interval=60min&apikey=038SOZHRQZJTZDPQ';

        $result = (array)json_decode(file_get_contents($url));

        $metaData = (array)$result['Meta Data'];
        $info = (array)$result['Time Series (Daily)'];

        $currentInfo = (array)current($info);
        $currentDate = key($info);

        $persent = $this->calculatePersent($info);

        dump([
            'symbol' => $metaData['2. Symbol'],
            'name' => 'TechFinancials Inc (TECH)',
            'last_value' =>  $currentInfo['1. open'],
            'last_date' => $currentDate,
            'persent' => $persent . '%',
            'volume' => $currentInfo['5. volume']
        ]);
        die;

        return [
            'symbol' => $metaData['2. Symbol'],
            'name' => 'TechFinancials Inc (TECH)',
            'last_value' =>  $currentInfo['1. open'],
            'last_date' => $currentDate,
            'persent' => $persent . '%',
            'volume' => $currentInfo['5. volume']
        ];
    }

    public function calculatePersent(array $info)
    {
        $second = (array)current(array_slice($info, 1, 1));
        $current = (array)current($info);

        $current = $current['1. open'];
        $prev = $second['4. close'];

        return round(($current - $prev) / $prev * 100, 1);
    }
}
