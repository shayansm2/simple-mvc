<?php

namespace Core;

class View
{
    public static function render(string $view, array $parameters = []): string
    {
        $viewDirectory = __DIR__ . '/../app/Views/' . $view . '.html';

        $content = file_get_contents($viewDirectory);

//        foreach ($parameters as $key => $value) {
//            $content = str_replace("{{ $key }}", $value, $content);
//        }
//
//        return preg_replace('/{{ .* }}/', '', $content);

        return preg_replace_callback(
            '/{{ (.*?) }}/',
            function ($match) use ($parameters) {
                return $parameters[$match[1]] ?? '';
            },
            $content
        );
    }
}
