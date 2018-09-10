<?php

class Util {

    public static function cleanupData(array $array, array $output) {
        $relationsFound = [];
        foreach ($array as $key => $item) {
            if (!in_array($key, $output)) {
                unset($array[$key]);
            }
            if (is_array($item)) {
                $array[$key] = self::cleanupData($item, $output);
                $relationsFound[] = $key;
            }
        }

        foreach ($relationsFound as $relation) {
            $key = $relation . 'Id';
            if (isset($array[$key])) {
                unset($array[$key]);
            }
        }

        return $array;
    }

}
