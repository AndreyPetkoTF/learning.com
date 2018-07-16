<?php
/**
 * Created by PhpStorm.
 * User: andreypetko
 * Date: 11/15/17
 * Time: 11:10
 */

namespace AppBundle\Services;

/**
 * Class SortService
 * @package AppBundle\Services
 */
class SortService
{

    /**
     * @var string
     */
    private $key;
    /**
     * @var string
     */
    private $privateKey;

    public function __construct(string $key, string $privateKey)
    {
        $this->key = $key;
        $this->privateKey = $privateKey;
    }

    /**
     * @param array $arr
     * @return array
     */
    public function bubbleSort(array $arr)
    {
        $length = count($arr);

        do {
            $swapped = false;

            for($i = 1; $i < $length; $i++) {
                if($arr[$i - 1] - $arr[$i] > 0) {
                    $this->swap($arr, $i - 1, $i);
                    $swapped = true;
                }
            }
        } while($swapped !== false);

        return $arr;
    }

    /**
     * @param array $arr
     * @return array
     */
    public function insertionSorting(array $arr)
    {
        $sortedIndex = 1;
        $length = count($arr);

        while($sortedIndex < $length) {
            if($arr[$sortedIndex] - $arr[$sortedIndex - 1] < 0) {
                $insertIndex = $this->findInsertionIndex($arr, $arr[$sortedIndex], $length);
                $this->insert($arr, $insertIndex, $sortedIndex);
            }

            $sortedIndex++;
        }

        return $arr;
    }

    /**
     * @param array $array
     * @return array
     */
    public function choiceSort(array $array) : array
    {
        $sortedRange = 0;
        $length = count($array);

        while($sortedRange < $length) {
            $nextIndex = $this->findIndexOfSmallestFromIndex($array, $sortedRange, $length);
            $this->swap($array, $sortedRange, $nextIndex);

            $sortedRange++;
        }

        return $array;
    }


    /**
     * @param array $array
     * @return array
     */
    public function quickSort(array $array)
    {
        $this->quickSortRun($array, 0, count($array) - 1);
        return $array;
    }


    /**
     * @param array $array
     * @return array
     */
    public function mergeSort(array $array)
    {
        $this->sort($array);
        return $array;
    }

    /**
     * @param array $array
     * @param int $left
     * @param int $right
     */
    private function quickSortRun(array &$array, int $left, int $right)
    {
        if($left < $right) {
            $randomIndex = rand($left, $right);
            $newPivot = $this->partition($array, $left, $right, $randomIndex);

            $this->quickSortRun($array, $left, $newPivot - 1);
            $this->quickSortRun($array, $newPivot + 1, $right);
        }
    }

    /**
     * @param array $array
     * @param int $left
     * @param int $right
     * @param int $randomIndex
     * @return int
     */
    private function partition(array &$array, int $left, int $right, int $randomIndex)
    {
        // перекинули ключевой к конец
        // потом перекинули все кто меньше ключевого влево
        // по storeIndex знаем сколько перестановок было ( слево от него будут все кто меньше ключевого)
        // поставили ключевой на место storeIndex
        $randomValue = $array[$randomIndex];
        $this->swap($array, $randomIndex, $right);

        $storeIndex = $left;

        for($i = $left; $i < $right; $i++) {
            if($array[$i] - $randomValue < 0) {
                $this->swap($array, $i, $storeIndex);
                $storeIndex++;
            }
        }

        $this->swap($array, $storeIndex, $right);

        return $storeIndex;
    }

    /**
     * @param array $array
     * @return array
     */
    private function sort(array &$array)
    {
        $length = count($array);

        if($length <= 1) {
            return $array;
        }

        $leftSize = $length / 2;

        $left = array_slice($array, 0, $leftSize);
        $right = array_slice($array, $leftSize);

        $this->sort($left);
        $this->sort($right);
        $this->merge($array, $left, $right);
    }

    /**
     * @param array $arr
     * @param array $left
     * @param array $right
     */
    private function merge(array &$arr, array $left, array $right)
    {
        $leftIndex = 0;
        $rightIndex = 0;
        $targetIndex = 0;
        $countLeft = count($left);
        $countRight = count($right);

        $remaining = count($left) + count($right);

        while ($remaining > 0) {
            if($leftIndex >= $countLeft) {
                $arr[$targetIndex] = $right[$rightIndex++];
            } elseif ($rightIndex >= $countRight) {
                $arr[$targetIndex] = $left[$leftIndex++];
            } elseIf($left[$leftIndex] - $right[$rightIndex] < 0) {
                $arr[$targetIndex] = $left[$leftIndex++];
            } else {
                $arr[$targetIndex] = $right[$rightIndex++];
            }

            $targetIndex++;
            $remaining--;
        }
    }

    /**
     * @param array $array
     * @param int $sortedRange
     * @param int $length
     * @return int
     */
    private function findIndexOfSmallestFromIndex(array $array, int $sortedRange, int $length) : int
    {
        //smallest index in non sorted part
        $currentSmallest = $array[$sortedRange];
        $currentSmallestIndex = $sortedRange;

        for ($i = $sortedRange + 1; $i < $length; $i++) {
            if($currentSmallest - $array[$i] > 0) {
                $currentSmallest = $array[$i];
                $currentSmallestIndex = $i;
            }
        }

        return $currentSmallestIndex;
    }

    /**
     * @param array $arr
     * @param int $valueToInsert
     * @param int $length
     * @return int
     * @throws \Exception
     */
    private function findInsertionIndex(array &$arr, int $valueToInsert, int $length)
    {
        for ($index = 0; $index < $length; $index++) {
            if($arr[$index] - $valueToInsert > 0) {
                return $index;
            }
        }

        throw new \Exception("The insertion index was not found");
    }

    /**
     * @param array $arr
     * @param int $indexInsertingAt
     * @param int $indexInsertingFrom
     */
    private function insert(array &$arr, int $indexInsertingAt, int $indexInsertingFrom)
    {
        $temp = $arr[$indexInsertingAt];
        $arr[$indexInsertingAt] = $arr[$indexInsertingFrom];

        for ($current = $indexInsertingFrom; $current > $indexInsertingAt; $current--) {
            $arr[$current] = $arr[$current - 1];
        }

        $arr[$indexInsertingAt + 1] = $temp;
    }
    

    /**
     * @param array $arr
     * @param int $left
     * @param int $right
     */
    private function swap(array &$arr, int $left, int $right)
    {
        if($left !== $right) {
            $temp  = $arr[$left];
            $arr[$left] = $arr[$right];
            $arr[$right] = $temp;
        }

//        dump($arr);

    }
}