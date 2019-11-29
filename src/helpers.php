<?php

if (! function_exists('treeview')) {
    /**
     * Построение массива для фронта treeview
     *
     * @param array $tree
     * @param array $selected
     * @return array
     */
    function treeview(array $tree, array $selected = [])
    {
        $res = [];

        foreach ($tree as $branch) {
            if(count($branch['children']) < 1) {
                if($selected && in_array($branch['id'], $selected)) {
                    $res[] = ['id' => $branch['id'], 'text' => $branch['name'], 'selectable' => false, 'state' => ['expanded' => true, 'checked' => true]];
                } else {
                    $res[] = ['id' => $branch['id'], 'text' => $branch['name'], 'selectable' => false, 'state' => ['expanded' => true]];
                }
            } else {
                if($selected && in_array($branch['id'], $selected)) {
                    $res[] = ['id' => $branch['id'], 'text' => $branch['name'], 'selectable' => false, 'state'=>['expanded' => true, 'checked' => true], 'nodes' => treeview($branch['children'], $selected)];
                } else {
                    $res[] = ['id' => $branch['id'], 'text' => $branch['name'], 'selectable' => false, 'state' => ['expanded' => true], 'nodes' => treeview($branch['children'], $selected)];
                }
            }
        }

        return $res;
    }
}