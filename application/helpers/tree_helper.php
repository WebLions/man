<?php

function setKeysId(array $array, $key = 'id')
{
    $newArr = array();
    foreach ($array as $value){
        $newArr[$value[$key]] = $value;
    }
    return $newArr;
}

function setTreeByParentId(array $array, $parent_id = 'parent_id')
{
    $tree = array();
    foreach ($array as $key=>$value){
        $tree[$value[$parent_id]][$key] = $value;
    }
    return $tree;
}

function buildTree(array $elements, $parentId = 0) {
    $branch = array();

    foreach ($elements as $element) {
        if ($element['parent_id'] == $parentId) {
            $children = buildTree($elements, $element['id']);
            if ($children) {
                $element['children'] = $children;
            }
            $branch[] = $element;
        }
    }

    return $branch;
}

function viewTreeList(array $tree)
{
    foreach ($tree as $element){
        echo '<ul>';
            echo '<li>';
                echo $element['category'];
                if(!empty($element['children'])) {
                    viewTreeList($element['children']);
                }
            echo '</li>';
        echo '</ul>';
    }
}