<?php

function checkExpression($expression)
{
    $flag = true;
    $stack = new SplStack();
    for ($i = 0; $i < strlen($expression); $i++) {
        $sym = $expression[$i];
        switch ($sym) {
            case '(':
            case '{':
            case '[':
                $stack->push($sym);
                break;
            case ')':
            case '}':
            case ']':
                if ($stack->isEmpty()) {
                    $flag = false;
                } else {
                    $left = $stack->pop();
                    if (($sym == ")" && $left != "(")
                        || ($sym == "}" && $left != "{")
                        || ($sym == "]" && $left != "[")) {
                        $flag = false;
                    }
                }
                break;
        }
        if (!$flag) {
            break;
        }
    }
    if (!$stack->isEmpty()) {
        $flag = false;
    }
    return $flag;
}