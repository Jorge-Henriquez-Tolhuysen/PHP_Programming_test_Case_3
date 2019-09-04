<?php

class CategoryTree
{
    private $root = [];

    public function addCategory(string $category, string $parent=null) : void
    {
        if (is_null($parent)) {
           $this->root[$category] = [];
           return;
        }
        $foundCategory = &$this->findCategory($this->root,$parent);
        if (!is_null($foundCategory)) { 
            $foundCategory[$category] = [];
       }
    }

    private function &findCategory(array &$children, string $category): array {
        if (array_key_exists($category, $children)) return $children[$category];
        foreach($children as &$child) {
            $founCategory=&$this->findCategory($child, $category);
            if (!is_null($founCategory)) return $founCategory;
        }
        return null;
    }

    public function getChildren(string $parent) : array
    {
        $children = [];
        $foundCategory = &$this->findCategory($this->root,$parent);
        if (!is_null($foundCategory)) {
            foreach($foundCategory as $key => $value) {
                $children[] = $key;
            }
        }
        return $children;
    }
}

$c = new CategoryTree;
$c->addCategory('A', null);
$c->addCategory('B', 'A');
$c->addCategory('C', 'A');
echo implode(',', $c->getChildren('A'));

?>
