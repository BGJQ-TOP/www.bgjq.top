<?php

class MarkdownParser {
    
    private static $instance = null;
    
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    public function parse($markdown) {
        if (empty($markdown)) return '';
        
        $html = $this->parseHeaders($markdown);
        $html = $this->parseBlockquotes($html);
        $html = $this->parseCodeBlocks($html);
        $html = $this->parseInlineCode($html);
        $html = $this->parseTables($html);
        $html = $this->parseBoldAndItalic($html);
        $html = $this->parseLinks($html);
        $html = $this->parseHorizontalRules($html);
        $html = $this->parseLists($html);
        $html = $this->parseParagraphs($html);
        
        return $html;
    }
    
    private function parseHeaders($text) {
        return preg_replace('/^### (.*+)$/m', '<h3>$1</h3>', 
            preg_replace('/^## (.*+)$/m', '<h2>$1</h2>', 
                preg_replace('/^# (.*+)$/m', '<h1>$1</h1>', $text)));
    }
    
    private function parseBlockquotes($text) {
        $text = preg_replace_callback('/^> (.*)$/m', function($matches) {
            $content = $matches[1];
            $content = $this->parseLinks($content);
            $content = $this->parseBoldAndItalic($content);
            return '<blockquote>' . $content . '</blockquote>';
        }, $text);
        
        $text = str_replace("</blockquote>\n<blockquote>", "\n", $text);
        
        return $text;
    }
    
    private function parseCodeBlocks($text) {
        return preg_replace_callback('/```(\w*)\n(.*?)```/s', function($matches) {
            $lang = $matches[1];
            $code = htmlspecialchars($matches[2]);
            $class = $lang ? " class=\"language-$lang\"" : '';
            return '<pre' . $class . '><code>' . $code . '</code></pre>';
        }, $text);
    }
    
    private function parseInlineCode($text) {
        return preg_replace('/`([^`]+)`/', '<code>$1</code>', $text);
    }
    
    private function parseTables($text) {
        return preg_replace_callback('/(\|.+\|(?:\n\|.+\|)+)/', function($matches) {
            $rows = explode("\n", trim($matches[1]));
            $html = '<div class="table-container"><table>';
            
            foreach ($rows as $index => $row) {
                $cells = array_map('trim', explode('|', trim($row, '| ')));
                $cells = array_filter($cells, function($cell) {
                    return !preg_match('/^[-:]+$/i', trim($cell));
                });
                
                if (empty($cells)) continue;
                
                $tag = $index === 0 ? 'th' : 'td';
                $cells = array_map(function($cell) use ($tag) {
                    return '<' . $tag . '>' . $cell . '</' . $tag . '>';
                }, $cells);
                
                $html .= '<tr>' . implode('', $cells) . '</tr>';
            }
            
            $html .= '</table></div>';
            return $html;
        }, $text);
    }
    
    private function parseBoldAndItalic($text) {
        $text = preg_replace('/\*\*\*(.*?)\*\*\*/', '<strong><em>$1</em></strong>', $text);
        $text = preg_replace('/\*\*(.*?)\*\*/', '<strong>$1</strong>', $text);
        $text = preg_replace('/\*(.*?)\*/', '<em>$1</em>', $text);
        return $text;
    }
    
    private function parseLinks($text) {
        return preg_replace('/\[([^\]]+)\]\(([^)]+)\)/', '<a href="$2" class="internal-link">$1</a>', $text);
    }
    
    private function parseHorizontalRules($text) {
        return preg_replace('/^---$/m', '<hr>', $text);
    }
    
    private function parseLists($text) {
        $text = preg_replace('/^- (.*+)$/m', '<li>$1</li>', $text);
        $text = preg_replace('/(<li>.*<\/li>)/s', '<ul>$1</ul>', $text);
        return preg_replace('/<\/ul>\s*<ul>/', '', $text);
    }
    
    private function parseParagraphs($text) {
        $lines = explode("\n", $text);
        $result = [];
        $paragraph = [];
        
        foreach ($lines as $line) {
            if (preg_match('/^<(h[1-6]|blockquote|pre|hr|ul|ol|div|table)/', $line) || empty($line)) {
                if (!empty($paragraph)) {
                    $result[] = '<p>' . implode(' ', $paragraph) . '</p>';
                    $paragraph = [];
                }
                if (!empty($line)) {
                    $result[] = $line;
                }
            } else {
                $paragraph[] = $line;
            }
        }
        
        if (!empty($paragraph)) {
            $result[] = '<p>' . implode(' ', $paragraph) . '</p>';
        }
        
        return implode("\n", $result);
    }
}
