<?php
    $str = file_get_contents('catalog.json');
    $json = json_decode($str, true);

function setAttributes($json) {

    foreach ($json['attributes'][0]['labels'] as $key => $value) {
        $color[$value['id']] = $value['title'];
    }
    foreach ($json['attributes'][1]['labels'] as $key => $value) {
        $shirt[$value['id']] = $value['title'];
    }
    foreach ($json['attributes'][2]['labels'] as $key => $value) {
        $pants[$value['id']] = $value['title'];
    }

    $attributes = array("color" => $color, "shirt" => $shirt, "pants" => $pants);
    return $attributes;
}

function setProducts($json) {

    $attributes = setAttributes($json);

    foreach ($json['products'] as $key => $value) {
        foreach ($value['categories'] as $key => $categories) {
            $cat[$categories['title']]['count'] = @$cat[$categories['title']]['count'] + 1;
            
            foreach ($value['labels'] as $key => $labels) {
                if(isset($attributes["color"][$labels])){
                    $cat[$categories['title']]['color'][$attributes["color"][$labels]]['count'] = @$cat[$categories['title']]['color'][$attributes["color"][$labels]]['count'] + 1;
                }
                if(isset($attributes["shirt"][$labels])){
                    $cat[$categories['title']]['size'][$attributes["shirt"][$labels]]['count'] = @$cat[$categories['title']]['size'][$attributes["shirt"][$labels]]['count'] + 1;
                }
                if(isset($attributes["pants"][$labels])){
                    $cat[$categories['title']]['size'][$attributes["pants"][$labels]]['count'] = @$cat[$categories['title']]['size'][$attributes["pants"][$labels]]['count'] + 1;
                }
                
            }

        }
    }
    return $cat;
}