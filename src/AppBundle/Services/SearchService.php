<?php
/**
 * Created by PhpStorm.
 * User: andreypetko
 * Date: 11/16/17
 * Time: 11:35
 */

namespace AppBundle\Services;

/**
 * Class SearchService
 * @package AppBundle\Services
 */
class SearchService
{

    /**
     * @param array $array
     * @param int $findItem
     * @return int
     */
    public function binarySearch(array $array, int $findItem) : int
    {
        $firstIndex = 0;
        $lastIndex = count($array);

        while ($firstIndex !== $lastIndex) {
            $halfIndex = (int)(($firstIndex + $lastIndex) / 2);

            $halfItem = $array[$halfIndex];

            if($halfItem === $findItem) {
                return $halfIndex;
            }

            if($halfItem > $findItem) {
                $lastIndex = $halfIndex;
            } else {
                $firstIndex = $halfIndex;
            }
        }

        return 0;
    }


    /**
     * @param $array
     * @param $findItem
     * @return float|string
     */
    public function binarySearch2($array, $findItem)
    {
        $currentIndex = 0;
        $lastIndex = count($array) - 1;

        while($currentIndex <= $lastIndex)
        {
            $halfIndex = floor(($currentIndex + $lastIndex) / 2);

            if($array[$halfIndex] == $findItem)
            {
                return $halfIndex;
            }
            elseif($array[$halfIndex] > $findItem)
            {
                $lastIndex = $halfIndex - 1;
            }
            else
            {
                $currentIndex = $halfIndex + 1;
            }
        }

        return 'notFound';
    }


    /**
     * @param array $array
     * @param int $findItem
     * @return int|string
     */
    public function recursiveBinarySearch(array $array, int $findItem)
    {
        return $this->recBinarySearch($array, $findItem, 0, count($array) - 1);
    }

    /**
     * @param array $array
     * @param int $findItem
     * @param $startIndex
     * @param $finishIndex
     * @return int|string
     */
    private function recBinarySearch(array &$array, int $findItem, $startIndex, $finishIndex)
    {
        if($startIndex > $finishIndex) {
            return 'notFound';
        }

        $halfIndex = (int)(($startIndex + $finishIndex) / 2);

        if($array[$halfIndex] === $findItem) {
            return $halfIndex;
        } elseif($array[$halfIndex] > $findItem) {
            return $this->recBinarySearch($array, $findItem, $startIndex, $halfIndex - 1);
        } else {
            return $this->recBinarySearch($array, $findItem, $halfIndex + 1, $finishIndex);
        }
    }

}